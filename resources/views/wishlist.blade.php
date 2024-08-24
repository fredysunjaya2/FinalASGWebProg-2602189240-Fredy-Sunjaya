@extends('master')

@section('title', 'Home')
@section('activeHome', 'active')

@section('content')
<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($users as $item)
    <div class="col">
        <div class="card h-100">
            @if($item->user_id == Auth::user()->id)
            <img src="{{ asset($item->friend->avatar->image_path) }}" class="card-img-top" alt="">
            @elseif($item->friend_id == Auth::user()->id)
            <img src="{{ asset($item->user->avatar->image_path) }}" class="card-img-top" alt="">
            @endif
            <div class="card-body">
                @if($item->user_id == Auth::user()->id)
                <h5 class="card-title">{{ $item->friend->name }}</h5>
                <p class="card-text">{{ $item->friend->fields_of_hobby }}</p>
                @elseif($item->friend_id == Auth::user()->id)
                <h5 class="card-title">{{ $item->user->name }}</h5>
                <p class="card-text">{{ $item->user->fields_of_hobby }}</p>
                @endif
            </div>
            <div class="card-footer text-body-secondary d-flex justify-content-end">
                @if ($item->user_id == Auth::user()->id && $item->status == 'Pending')
                <p>Wait for your request to be accepted</p>
                @elseif($item->user_id == Auth::user()->id && $item->status == 'Declined')
                <p>Your friend request has been declined</p>
                @elseif($item->friend_id == Auth::user()->id && $item->status == 'Pending')
                <p>Do you want to accept the friend request?</p>
                <form method="POST" action="{{ route('accept-friend-request') }}">
                    @csrf
                    <input type="hidden" value="{{ $item->user_id }}" name="id">
                    <button type="submit" class="btn btn-primary">
                        Accept
                    </button>
                </form>
                <form method="POST" action="{{ route('decline-friend-request') }}">
                    @csrf
                    <input type="hidden" value="{{ $item->user_id }}" name="id2">
                    <button type="submit" class="btn btn-secondary">
                        Decline
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $users->links() }}
@endsection
