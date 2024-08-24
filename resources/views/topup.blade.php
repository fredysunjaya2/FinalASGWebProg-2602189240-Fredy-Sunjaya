@extends('master')

@section('title', 'Home')
@section('activeTopup', 'active')

@section('content')
<form action="{{ route('update-coin') }}" method="POST" class="d-flex flex-column justify-center align-items-center">
    @csrf
    <p class="fs-4 text-center">Your coin now: {{ Auth::user()->coin }}</p>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Top-Up</button>
    </div>
</form>
@endsection