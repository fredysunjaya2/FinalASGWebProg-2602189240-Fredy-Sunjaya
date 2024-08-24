@extends('master')

@section('title', 'Home')
@section('activeHome', 'active')

@section('content')
<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($users as $item)
    <div class="col">
        <div class="card h-100">
            <img src="{{ asset($item->avatar->image_path) }}" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5>
                <p class="card-text">{{ $item->fields_of_hobby }}</p>
            </div>
            <div class="card-footer text-body-secondary d-flex justify-content-end">
                <form action="{{ route('send-friend-request') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $item->id }}" name="id">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-hand-thumbs-up"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $users->links() }}

<!-- Button trigger modal -->
<button id="status-btn" type="button" class="btn btn-primary invisible" data-bs-toggle="modal"
    data-bs-target="#staticBackdrop">
    Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">INFO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="modal-content-text-1"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
    @isset($friendRequest)
    if('{{ $friendRequest }}' == 'Pending') {
        document.querySelector('.modal-content-text-1').textContent = "You already make a friend request";
    } else if('{{ $friendRequest }}' == 'Accepted') {
        document.querySelector('.modal-content-text-1').textContent = "You already friend with this user";
    } else if('{{ $friendRequest }}' == 'Request') {
        document.querySelector('.modal-content-text-1').textContent = "Your friend request is sent";
    }
    document.addEventListener("DOMContentLoaded", (event) => {
        document.querySelector('#status-btn').click()
    });
    @endisset
</script>
@endsection
