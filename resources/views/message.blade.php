@extends('master')

@section('title', 'Home')
@section('activeMessage', 'active')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card chat-room shadow-sm" style="height: 70vh; overflow-y: auto">
                <div class="card-body">
                    <div class="chat-messages">
                        @foreach ($messages as $msg)
                        <div
                            class="d-flex {{ $msg->sender_id === auth()->user()->id ? 'justify-content-end' : 'justify-content-start' }} mb-3">
                            <div class="message p-3 rounded-3 {{ $msg->sender_id === auth()->user()->id ? 'bg-primary text-white' : 'bg-light' }}"
                                style="max-width: 75%;">
                                <p class="mb-0">{{ $msg->message }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('send-message') }}" class="mt-3">
                @csrf
                <div class="input-group">
                    <input type="text" name="message" class="form-control" placeholder="Enter your message" required>
                    <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection