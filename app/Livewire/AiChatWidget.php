<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\ChatbotSession;
use App\Models\Internship;
use App\Models\SupportTicket;
use App\Models\UserInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class AiChatWidget extends Component
{
    public string $message = '';

    public array $messages = [];

    public bool $isTyping = false;

    public ?int $sessionId = null; // DB row ID of ChatbotSession

    /** @var array<int, array{id: int, title: string, preview: string, date: string, short_date: string}> */
    public array $conversations = [];

    public bool $chatting = false;

    // ─────────────────────────────────────────────────────────────────
    // Lifecycle
    // ─────────────────────────────────────────────────────────────────

    public function mount(): void
    {
        $this->loadConversationList();
        $this->chatting = false;
    }

    // ─────────────────────────────────────────────────────────────────
    // Conversation Management
    // ─────────────────────────────────────────────────────────────────

    public function loadConversationList(): void
    {
        if (!Auth::check()) {
            $this->conversations = [];
            return;
        }

        $this->conversations = ChatbotSession::where('user_id', Auth::id())
            ->latest()
            ->take(20)
            ->get()
            ->map(fn($s) => [
                'id' => $s->id,
                'title' => $s->title,
                'preview' => $s->preview ?? 'New conversation',
                'date' => $s->created_at->format('M j \a\t g:i A'),
                'short_date' => $s->created_at->format('M j'),
            ])
            ->values()
            ->toArray();
    }

    public function loadMessages(): void
    {
        if (!$this->sessionId) {
            return;
        }

        $session = ChatbotSession::where('user_id', Auth::id())->find($this->sessionId);

        if ($session) {
            $this->messages = $session->messages ?? [];
        } else {
            $this->messages = $this->defaultWelcomeMessages();
        }
    }

    public function newConversation(): void
    {
        if (!Auth::check()) {
            $this->redirect(route('login'));
            return;
        }

        $welcome = $this->defaultWelcomeMessages();

        $session = ChatbotSession::create([
            'user_id' => Auth::id(),
            'title' => 'New conversation',
            'preview' => 'New conversation',
            'messages' => $welcome,
        ]);

        $this->sessionId = $session->id;
        $this->messages = $welcome;
        $this->chatting = true;

        $this->loadConversationList();
        $this->dispatch('scroll-to-bottom');
    }

    public function selectConversation(int $id): void
    {
        $this->sessionId = $id;
        $this->loadMessages();
        $this->chatting = true;
        $this->dispatch('scroll-to-bottom');
    }

    public function backToHome(): void
    {
        $this->chatting = false;
        $this->sessionId = null;
        $this->loadConversationList();
    }

    public function deleteConversation(int $id): void
    {
        ChatbotSession::where('user_id', Auth::id())->where('id', $id)->delete();

        if ($this->sessionId === $id) {
            $this->sessionId = null;
            $this->chatting = false;
        }

        $this->loadConversationList();
    }

    // ─────────────────────────────────────────────────────────────────
    // Messaging
    // ─────────────────────────────────────────────────────────────────

    public function sendMessage(): void
    {
        if (trim($this->message) === '') {
            return;
        }

        // Ensure we have an active session
        if (!$this->sessionId) {
            $this->newConversation();
        }

        $userMessage = $this->message;
        $this->message = '';

        $this->messages[] = [
            'role' => 'user',
            'content' => $userMessage,
        ];

        // Persist immediately
        $this->persistMessages($userMessage);

        $this->isTyping = true;
        $this->dispatch('scroll-to-bottom');
        $this->dispatch('trigger-ai-response', message: $userMessage);
    }

    public function setQuickAction(string $action): void
    {
        $texts = [
            'find_internships' => 'Can you help me find internship opportunities that match my profile?',
            'view_applications' => 'Show me my current applications and their status.',
            'track_status' => 'What is the current status of my applications?',
            'contact_support' => 'I need to contact support. Can you help me create a support ticket?',
            'find_companies' => 'Which companies are currently posting internships on InternLink?',
            'profile_tips' => 'Give me tips to optimize my intern profile and increase my chances.',
            'interview_prep' => 'Help me prepare for an upcoming internship interview.',
            'create_ticket' => 'I want to create a support ticket. What information do I need?',
            // Company-specific
            'view_applicants' => 'Show me recent applicants for my company\'s internship postings.',
            'post_internship' => 'How do I post a new internship offer on InternLink?',
            'send_offer' => 'How can I send a targeted offer to a specific intern?',
            'company_analytics' => 'Give me an overview of my company\'s recruitment analytics.',
        ];

        $this->message = $texts[$action] ?? $action;
        $this->sendMessage();
    }

    #[On('trigger-ai-response')]
    public function triggerAiResponse(string $message): void
    {
        $apiKey = env('GEMINI_API_KEY');

        if (!$apiKey) {
            $this->appendAiMessage('Gemini API key is not configured. Please add GEMINI_API_KEY to your .env file.');
            $this->isTyping = false;
            $this->dispatch('scroll-to-bottom');
            return;
        }

        try {
            // Build context about the current user for the AI
            $systemInstruction = $this->buildSystemPrompt();

            // Build message history for Gemini
            $contents = [];
            foreach ($this->messages as $msg) {
                // Skip the last user message — it's already in messages but we want to exclude AI typing placeholder
                $contents[] = [
                    'role' => $msg['role'] === 'user' ? 'user' : 'model',
                    'parts' => [['text' => $msg['content']]],
                ];
            }

            $response = Http::timeout(30)->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}",
                [
                    'systemInstruction' => [
                        'parts' => [['text' => $systemInstruction]],
                    ],
                    'contents' => $contents,
                    'generationConfig' => [
                        'maxOutputTokens' => 500,
                        'temperature' => 0.7,
                    ],
                ]
            );

            if ($response->successful()) {
                $responseText = $response->json('candidates.0.content.parts.0.text');
                if (empty($responseText)) {
                    $responseText = "I'm sorry, I couldn't generate a response. Please try again.";
                }
            } else {
                $responseText = "I'm having trouble connecting right now. Please try again in a moment.";
            }

            $this->appendAiMessage(trim($responseText));

        } catch (\Exception $e) {
            $this->appendAiMessage('An error occurred while processing your request. Please try again.');
        }

        $this->isTyping = false;
        $this->dispatch('scroll-to-bottom');
    }

    // ─────────────────────────────────────────────────────────────────
    // Quick Actions (role-aware)
    // ─────────────────────────────────────────────────────────────────

    #[Computed]
    public function quickActions(): array
    {
        $user = Auth::user();
        if (!$user) {
            return [];
        }

        $role = $user->role;

        if ($role === 'intern') {
            return [
                ['action' => 'find_internships', 'label' => '🔍 Find Internships'],
                ['action' => 'view_applications', 'label' => '📋 View My Applications'],
                ['action' => 'track_status', 'label' => '📊 Track Application Status'],
                ['action' => 'interview_prep', 'label' => '🎯 Interview Preparation'],
                ['action' => 'profile_tips', 'label' => '✨ Profile Optimization Tips'],
                ['action' => 'find_companies', 'label' => '🏢 Find Companies'],
                ['action' => 'contact_support', 'label' => '💬 Contact Support'],
                ['action' => 'create_ticket', 'label' => '🎫 Create Support Ticket'],
            ];
        }

        if ($role === 'company_manager') {
            return [
                ['action' => 'view_applicants', 'label' => '👥 View Applicants'],
                ['action' => 'post_internship', 'label' => '📝 Post Internship'],
                ['action' => 'send_offer', 'label' => '📨 Send Offer to Intern'],
                ['action' => 'company_analytics', 'label' => '📈 Company Analytics'],
                ['action' => 'contact_support', 'label' => '💬 Contact Support'],
                ['action' => 'create_ticket', 'label' => '🎫 Create Support Ticket'],
            ];
        }

        return [
            ['action' => 'contact_support', 'label' => '💬 Contact Support'],
            ['action' => 'create_ticket', 'label' => '🎫 Create Support Ticket'],
        ];
    }

    // ─────────────────────────────────────────────────────────────────
    // Helpers
    // ─────────────────────────────────────────────────────────────────

    private function buildSystemPrompt(): string
    {
        $user = Auth::user();

        if (!$user) {
            return "You are a helpful assistant for InternLink, an internship management platform. Keep responses concise and helpful.";
        }

        $role = $user->role;
        $name = $user->name;
        $context = '';

        if ($role === 'intern') {
            // Gather intern-specific context
            $userInfo = UserInfo::where('user_id', $user->id)->first();
            $applicationCount = Application::where('user_id', $user->id)->count();
            $pendingCount = Application::where('user_id', $user->id)->where('status', 'pending')->count();
            $acceptedCount = Application::where('user_id', $user->id)->where('status', 'accepted')->count();

            $profileInfo = '';
            if ($userInfo) {
                $profileInfo = "
- University: {$userInfo->university}
- Field of Study: {$userInfo->field_of_study}
- Skills: {$userInfo->skills}
- Career Field: {$user->career_field}
";
            }

            $context = "
You are assisting an intern named {$name} on the InternLink platform.

INTERN PROFILE:
{$profileInfo}
- Total Applications: {$applicationCount}
- Pending Applications: {$pendingCount}
- Accepted Applications: {$acceptedCount}
- Career Field: {$user->career_field}

You have access to their profile and application data. Help them with:
- Finding relevant internship opportunities
- Understanding application status
- Profile optimization advice
- Interview preparation tips
- Creating support tickets
- Navigating the platform

Be concise, friendly, and specific to InternLink. Do not use heavy markdown formatting.
";
        } elseif ($role === 'company_manager') {
            $company = $user->company;
            $companyName = $company?->name ?? 'your company';
            $internshipCount = Internship::where('company_id', $user->company_id)->count();
            $activeCount = Internship::where('company_id', $user->company_id)->where('status', 'active')->count();
            $applicationCount = Application::whereHas('internship', fn($q) => $q->where('company_id', $user->company_id))->count();

            $context = "
You are assisting a company manager from {$companyName} on the InternLink platform.

COMPANY DATA:
- Company: {$companyName}
- Total Internship Postings: {$internshipCount}
- Active Postings: {$activeCount}
- Total Applications Received: {$applicationCount}

Help them with:
- Managing internship postings
- Understanding applicant data
- Sending targeted offers to interns
- Recruitment best practices
- Platform navigation
- Support tickets

Be professional, concise, and focused on recruitment goals.
";
        } else {
            $context = "You are a helpful assistant for InternLink, an internship management platform. Help the user with platform navigation and questions.";
        }

        return $context;
    }

    private function appendAiMessage(string $text): void
    {
        $this->messages[] = [
            'role' => 'ai',
            'content' => $text,
        ];

        // Persist to DB
        if ($this->sessionId) {
            ChatbotSession::where('user_id', Auth::id())
                ->where('id', $this->sessionId)
                ->update(['messages' => $this->messages]);
        }
    }

    private function persistMessages(string $lastUserMessage): void
    {
        if (!$this->sessionId) {
            return;
        }

        // Auto-title the conversation from first user message
        $session = ChatbotSession::where('user_id', Auth::id())->find($this->sessionId);
        if ($session) {
            $updateData = [
                'messages' => $this->messages,
                'preview' => Str::limit($lastUserMessage, 60),
            ];

            // Set title from first real user message (not the welcome)
            $userMessages = collect($this->messages)->where('role', 'user');
            if ($userMessages->count() === 1 && $session->title === 'New conversation') {
                $updateData['title'] = Str::limit($lastUserMessage, 40);
            }

            $session->update($updateData);
        }
    }

    private function defaultWelcomeMessages(): array
    {
        $user = Auth::user();
        $name = $user?->name ? ' ' . explode(' ', $user->name)[0] : '';

        return [
            [
                'role' => 'ai',
                'content' => "Welcome to InternLink Assistant!{$name} 🚀\nHow can I help you today? You can use the quick actions below or type your question directly.",
            ],
        ];
    }

    public function render(): View
    {
        return view('livewire.ai-chat-widget');
    }
}
