<?php

namespace App\Http\Controllers;

use App\Models\ChatbotFaq;
use App\Models\Conversation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatbotFaqController extends Controller
{
    public function random(): JsonResponse
    {
        $faqs = ChatbotFaq::query()
            ->inRandomOrder()
            ->limit(4)
            ->get(['id', 'question', 'answer']);

        return response()->json($faqs);
    }

    public function chat(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:1000'],
        ]);

        $reply = $this->generateReply($validated['message']);

        Conversation::query()->create([
            'user_message' => strip_tags($validated['message']),
            'bot_response' => strip_tags($reply),
        ]);

        return response()->json(['reply' => $reply]);
    }

    /** @var array<string, string> */
    private const KEYWORD_RESPONSES = [
        'find' => 'You can find an internship by navigating to the "Internships" or "Find Batch" section on our platform. Use the search and filter tools to match your skills and interests!',
        'post' => 'To post an internship, please create an Employer account and navigate to your dashboard. Click on "Post Internship" and fill out the details.',
        'status' => 'You can track your application status directly from your candidate dashboard under the "Applications" tab.',
        'mentor' => 'Our mentorship programs pair you with experienced professionals. Check out the "Mentorship" tab on your dashboard to see available mentors in your field!',
        'learn' => 'InterLink is a platform dedicated to connecting students with top-tier internships and mentorship opportunities. We bridge the gap between academic learning and professional experience!',
        'account' => 'For account-related help, please go to Settings in your dashboard. You can update your profile, change your password, and manage your preferences there.',
        'ticket' => 'To create a support ticket, log in to your dashboard and click "New Ticket". Fill in the subject, description, and priority level.',
        'password' => 'To reset your password, go to the Sign In page and click "Forgot your password?". Enter your email and we will send you a reset link.',
        'feature' => 'Our platform includes personalized internship matching, application tracking, mentorship programs, and resume building tools.',
        'help' => 'I am here to help! You can ask me about finding internships, posting opportunities, application status, or our mentorship programs. What would you like to know?',
        'hello' => 'Hello! Welcome to InterLink. How can I assist you today? Feel free to ask about our internships, mentorships, or anything else.',
        'hi' => 'Hi there! How can I help you today? You can ask me about finding an internship, application statuses, or account management.',
        'thank' => 'You are welcome! Is there anything else I can help you with?',
    ];

    private function generateReply(string $message): string
    {
        $message = mb_strtolower($message);

        foreach (self::KEYWORD_RESPONSES as $keyword => $response) {
            if (str_contains($message, $keyword)) {
                return $response;
            }
        }

        return 'Thank you for your message. I am not sure I understand that fully, but I want to help! You can ask me about finding internships, posting opportunities, application tracking, or account management. Or, would you like me to connect you with a human agent?';
    }
}
