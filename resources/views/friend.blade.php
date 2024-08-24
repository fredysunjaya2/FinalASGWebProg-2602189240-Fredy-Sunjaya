@extends('master')

@section('title', 'Home')
@section('activeFriend', 'active')

@section('content')
<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($users as $item)
    <div class="col">
        <div class="card h-100">
            <img src="{{ asset($item->friend->avatar->image_path) }}" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">{{ $item->friend->name }}</h5>
                <p class="card-text">{{ $item->friend->fields_of_hobby }}</p>
            </div>
            <div class="card-footer text-body-secondary d-flex justify-content-end">
                <form action="{{ route('remove-friend-request') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $item->friend_id }}" name="friend_id">
                    <button type="submit" class="btn btn-danger">
                        Remove Friend
                    </button>
                </form>
                <form action="{{ route('message', $item->friend_id) }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Message
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $users->links() }}
@endsection
