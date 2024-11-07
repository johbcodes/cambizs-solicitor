@extends('layouts.app')


@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body p-5">
                        <h3>Your Conversations</h3>
                        <div class="list-group mt-4">
                            @forelse ($conversations as $chatParticipation)
                                @php
                                    // Get the conversation details
                                    $conversation = $chatParticipation->conversation;

                                    // Get the other participant in the conversation
                                    $otherParticipant = $conversation->participants->firstWhere(
                                        'messageable_id',
                                        '!=',
                                        Auth::id(),
                                    );

                                    // Get the latest message in the conversation
                                    $latestMessage = $conversation->messages->last() ?? null;
                                @endphp

                                <a href="{{ route('chat.conversation', ['id' => $conversation->id]) }}"
                                    class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">
                                            {{ $otherParticipant ? $otherParticipant->messageable->name : 'Unknown' }}</h5>
                                        <small class="text-muted">
                                            {{ $latestMessage ? $latestMessage->created_at->diffForHumans() : 'No messages' }}
                                        </small>
                                    </div>
                                    <p class="mb-1">
                                        {{ $latestMessage ? ($latestMessage->type === 'text' ? $latestMessage->body : '[Attachment]') : 'No messages yet' }}
                                    </p>
                                </a>
                            @empty
                                <p class="text-muted">You have no conversations yet.</p>
                            @endforelse

                            {{-- Pagination Links --}}
                            <div class="mt-4">
                                {{ $conversations->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
