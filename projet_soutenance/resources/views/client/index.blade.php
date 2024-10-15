
@extends('client.deconnexion')
@extends('client.style')
@section('content')

{{--  mettre du style  --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<div class="container">
    <h1>User Feedback</h1>

    @foreach($feedbacks as $feedback)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $feedback->user->name }}</h5>
                <p class="card-text">{{ $feedback->comment }}</p>
                <p class="card-text"><small class="text-muted">Rating: {{ $feedback->rating }}</small></p>
            </div>
        </div>
    @endforeach
</div>
@endsection

