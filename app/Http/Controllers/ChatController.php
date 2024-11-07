<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Musonza\Chat\Facades\ChatFacade as Chat;

class ChatController extends Controller
{
    // Start a new conversation between client and solicitor
    public function startConversation(Request $request, $solicitorId)
    {
        $solicitor = User::findOrFail($solicitorId);
        $client = Auth::user();

        // Fetch existing conversation if it exists
        $existingConversations = Chat::conversations()->between($client, $solicitor)->get();

        if ($existingConversations->isNotEmpty()) {
            // Redirect to the existing conversation
            return redirect()->route('chat.conversation', ['id' => $existingConversations->first()->id]);
        }

        // Create a new conversation if no existing conversation is found
        $conversation = Chat::createConversation([$client, $solicitor])->makeDirect();

        return redirect()->route('chat.conversation', ['id' => $conversation->id]);
    }

    // Show a specific conversation with messages
    public function showConversation($conversationId)
    {
        $conversation = Chat::conversations()->getById($conversationId);
        $messages = Chat::conversation($conversation)->setParticipant(Auth::user())->getMessages();

        return view('chat.conversation', compact('conversation', 'messages'));
    }

    // Send a message in a conversation, with optional file attachment
    public function sendMessage(Request $request, $conversationId)
    {
        $request->validate([
            'message' => 'nullable|string|max:1000',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,doc,docx,pdf,txt,zip|max:10240', // max 10MB
        ]);

        $conversation = Chat::conversations()->getById($conversationId);

        // Initialize message builder
        $messageBuilder = Chat::message($request->message ?: 'File attached')
            ->from(Auth::user())
            ->to($conversation);

        // If there is a file, upload it and add details to message
        if ($request->hasFile('file')) {
            $file = $request->file('file')->store('uploads', 'public');
            $messageBuilder->type('attachment')->data([
                'file_name' => $request->file('file')->getClientOriginalName(),
                'file_url' => asset('storage/' . $file),
            ]);
        }

        $messageBuilder->send();

        return redirect()->route('chat.conversation', ['id' => $conversationId]);
    }

    public function allMessages(Request $request)
    {
        $user = Auth::user();

        // Retrieve paginated conversations for the participant with sorting
        $conversations = Chat::conversations()
            ->setParticipant($user) // Set the participant
            ->setPaginationParams([
                'page' => $request->input('page', 1), // Set the page, defaulting to 1
                'perPage' => 10,                       // Set items per page
                'sorting' => 'desc',                   // Sort by descending order
                'columns' => ['*'],                    // Retrieve all columns
                'pageName' => 'page'                   // Page name in URL
            ])
            ->get(); // Get the paginated conversations


        return view('chat.all-messages', compact('conversations'));
    }
}
