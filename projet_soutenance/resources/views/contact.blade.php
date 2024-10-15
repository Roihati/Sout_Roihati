@extends('layouts.app_acceil')
@section('meta')
<meta name="description" content="Contact page for website">
@endsection
@section('title')
<title>Contact</title>
@endsection
@section('style')
@section('style')

<!-- Inclure Font Awesome pour les icônes -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<style>
    .contact-form-section {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
    }
    .contact-form-section input,
    .contact-form-section textarea {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .contact-form-section button {
        padding: 10px 20px;
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div class="contact-form-section">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div>
           <div>
    <input type="text" name="firstname" placeholder="Name" value="{{ old('firstname', $details['firstname']) }}" />
    @error('firstname')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <input type="text" name="lastname" placeholder="Lastname" value="{{ old('lastname', $details['lastname']) }}" />
    @error('lastname')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <input type="email" name="email" placeholder="Email" value="{{ old('email', $details['email']) }}" />
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <input type="text" name="phone" placeholder="Phone" value="{{ old('phone', $details['phone']) }}" />
    @error('phone')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div>
    <textarea name="message" placeholder="Message">{{ old('message', $details['message']) }}</textarea>
    @error('message')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
        
        <div class="d-flex">
            <button type="submit">SEND</button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Contact page loaded');
    });
</script>
@endsection