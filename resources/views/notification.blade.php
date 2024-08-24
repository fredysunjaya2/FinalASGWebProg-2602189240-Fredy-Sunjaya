@extends('master')

@section('title', 'Home')
@section('activeNotification', 'active')

@section('content')
@foreach($notifications as $item)
<div class="mx-5 alert alert-primary" role="alert">
    {{ $item->description }}
</div>
@endforeach
@endsection