@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body p-5">
                        <h3>Chat with {{ $conversation->participants->except(Auth::id())->first()->name }}</h3>

                        <div class="chat-box border rounded p-3 mb-3" style="height: 400px; overflow-y: scroll;">
                            @foreach ($messages as $message)
                                <div
                                    class="message {{ $message->sender->id === Auth::id() ? 'text-end' : 'text-start' }} mb-3">
                                    <strong>{{ $message->sender->name }}</strong>:
                                    @if ($message->type === 'attachment')
                                        <a href="{{ $message->data['file_url'] }}"
                                            target="_blank">{{ $message->data['file_name'] }}</a>
                                    @else
                                        {{ $message->body }}
                                    @endif
                                    <br>
                                    <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                                </div>
                            @endforeach
                        </div>

                        <form action="{{ route('chat.send', $conversation->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="message" class="form-control"
                                    placeholder="Type your message here...">
                                <input type="file" name="file" class="form-control">
                                <button class="btn btn-primary" type="submit">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
