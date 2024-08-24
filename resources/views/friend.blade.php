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

            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $users->links() }}
@endsection