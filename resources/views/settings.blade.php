@extends('master')

@section('title', 'Home')
@section('activeSettings', 'active')

@section('content')
<div class="card col-3 ms-auto me-auto">
    <img src="{{ asset(Auth::user()->avatar->image_path) }}" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title text-center">Name: {{ Auth::user()->name }}</h5>
        <p class="card-text text-center">Hobby: {{ Auth::user()->fields_of_hobby }}</p>
        <p class="card-text text-center">Gender: {{ Auth::user()->gender }}</p>
    </div>
</div>

@csrf
@if (Auth::user()->isPrivate)
<form action="{{ route('update-public') }}" method="POST" <div
    class="col-auto d-flex flex-column justify-center align-items-center mt-5">
    @csrf
    <button type="submit" class="btn btn-primary mb-3">Make Public</button>
    </div>
</form>
@else
<form action="{{ route('update-private') }}" method="POST" <div
    class="col-auto d-flex flex-column justify-center align-items-center mt-5">
    @csrf
    <button type="submit" class="btn btn-primary mb-3">Make Private</button>
    </div>
</form>
@endif
@endsection