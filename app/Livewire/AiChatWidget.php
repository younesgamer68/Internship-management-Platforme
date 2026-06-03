<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class AiChatWidget extends Component
{
    public string $message = '';

    public array $messages = [];

    public bool $isTyping = false;

    public ?string $conversationId = null;

    /** @var array<int, array{id: string, title: string, date: string, preview: string}> */
    public array $conversations = [];

    public bool $chatting = false;

    public function mount(): void
    {
        $this->conversationId = Session::get('chat_conversation_id');
        $this->loadConversationList();

        if ($this->conversationId) {
            $this->loadMessages();
        }

        $this->chatting = false;
    }

    public function loadConversationList(): void
    {
        $this->conversations = [];
        $saved = Session::get('chat_conversations', []);
        
        foreach ($saved as $id => $conv) {
            $this->conversations[] = [
                'id' => $id,
                'title' => $conv['title'],
                'preview' => $conv['preview'] ?? 'New conversation',
                'date' => $conv['date'],
                'short_date' => $conv['short_date'],
            ];
        }
    }

    public function loadMessages(): void
    {
        if (! $this->conversationId) {
            return;
        }

        $saved = Session::get('chat_conversations', []);
        if (isset($saved[$this->conversationId])) {
            $this->messages = $saved[$this->conversationId]['messages'];
        } else {
            $this->messages = [
                [
                    'role' => 'ai',
                    'content' => "Welcome to the InterLink System! 🚀\nHow can I assist you today?",
                ]
            ];
        }
    }

    #[\Livewire\Attributes\On('start-new-conversation')]
    public function newConversation(): void
    {
        $this->conversationId = (string) \Illuminate\Support\Str::uuid();
        Session::put('chat_conversation_id', $this->conversationId);

        $this->messages = [
            [
                'role' => 'ai',
                'content' => "Welcome to the InterLink System! 🚀\nHow can I assist you today?",
            ],
        ];

        $this->chatting = true;

        $conversations = Session::get('chat_conversations', []);
        $conversations[$this->conversationId] = [
            'id' => $this->conversationId,
            'title' => 'New conversation',
            'preview' => 'New conversation',
            'date' => now()->format('M j \a\t g:i A'),
            'short_date' => now()->format('M j'),
            'messages' => $this->messages,
        ];
        
        Session::put('chat_conversations', $conversations);
        Session::save();

        $this->dispatch('scroll-to-bottom');
    }

    public function selectConversation(string $id): void
    {
        $this->conversationId = $id;
        Session::put('chat_conversation_id', $id);
        Session::save();

        $this->loadMessages();
        $this->chatting = true;
        $this->dispatch('scroll-to-bottom');
    }

    public function backToHome(): void
    {
        $this->chatting = false;
        $this->loadConversationList();
    }

    public function deleteConversation(string $id): void
    {
        $conversations = Session::get('chat_conversations', []);
        unset($conversations[$id]);
        Session::put('chat_conversations', $conversations);

        if ($this->conversationId === $id) {
            $this->conversationId = null;
            Session::forget('chat_conversation_id');
            $this->chatting = false;
        }

        Session::save();
        $this->loadConversationList();
    }

    public function sendMessage(): void
    {
        if (trim($this->message) === '') {
            return;
        }

        $userMessage = $this->message;
        $this->message = '';

        $this->messages[] = [
            'role' => 'user',
            'content' => $userMessage,
        ];

        if ($this->conversationId) {
            $conversations = Session::get('chat_conversations', []);
            if (isset($conversations[$this->conversationId])) {
                $conversations[$this->conversationId]['messages'] = $this->messages;
                $conversations[$this->conversationId]['preview'] = \Illuminate\Support\Str::limit($userMessage, 60);
                Session::put('chat_conversations', $conversations);
                Session::save();
            }
        }

        $this->isTyping = true;
        $this->dispatch('scroll-to-bottom');
        $this->dispatch('trigger-ai-response', message: $userMessage);
    }

    public function setQuickReply(string $text): void
    {
        $this->message = $text;
        $this->sendMessage();
    }

    #[\Livewire\Attributes\On('trigger-ai-response')]
    public function triggerAiResponse(string $message): void
    {
        $apiKey = env('GEMINI_API_KEY');

        if (! $apiKey) {
            $this->messages[] = [
                'role' => 'ai',
                'content' => 'Gemini API key is not configured. Please add GEMINI_API_KEY to your .env file.',
            ];
            $this->isTyping = false;
            $this->dispatch('scroll-to-bottom');
            return;
        }

        try {
            $contents = [];
            foreach ($this->messages as $msg) {
                $contents[] = [
                    'role' => $msg['role'] === 'user' ? 'user' : 'model',
                    'parts' => [
                        ['text' => $msg['content']]
                    ]
                ];
            }

            $systemInstruction = "You are a knowledgeable, friendly customer support assistant for the InterLink Internship Management Platform. Keep every response under 3 sentences. Do not use markdown formatting like ** or # or bullet lists, except you may use markdown links when referencing resources. Assist students with applications, resumes, profiles, documents, or how to create support tickets.";

            $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}", [
                'systemInstruction' => [
                    'parts' => [
                        ['text' => $systemInstruction]
                    ]
                ],
                'contents' => $contents
            ]);

            if ($response->successful()) {
                $responseText = $response->json('candidates.0.content.parts.0.text');
                if (empty($responseText)) {
                    $responseText = "I'm sorry, I couldn't generate a response. Please try again.";
                }
            } else {
                $responseText = "Error from Gemini API: " . $response->body();
            }

            $this->messages[] = [
                'role' => 'ai',
                'content' => trim($responseText)
            ];

            if ($this->conversationId) {
                $conversations = Session::get('chat_conversations', []);
                if (isset($conversations[$this->conversationId])) {
                    $conversations[$this->conversationId]['messages'] = $this->messages;
                    Session::put('chat_conversations', $conversations);
                    Session::save();
                }
            }

        } catch (\Exception $e) {
            $this->messages[] = [
                'role' => 'ai',
                'content' => 'An error occurred: ' . $e->getMessage(),
            ];
        }

        $this->isTyping = false;
        $this->dispatch('scroll-to-bottom');
    }

    public function render(): View
    {
        return view('livewire.ai-chat-widget');
    }
}
