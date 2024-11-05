@extends('layouts.app_acceil')

@section('meta')
<meta name="description" content="Contact page for website">
@endsection

@section('title')
<title>Contact</title>
@endsection

@section('style')
<!-- Inclure Tailwind CSS -->

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="contact-form-section p-6 bg-gray-100 rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4 text-center">Formulaire de Contact</h2>
    <p class="text-center text-gray-600 mb-4">Envoyez-nous un message et nous vous répondrons dès que possible.</p>

    @if(session('success'))
        <div class="alert alert-success bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div>
            <input type="text" name="firstname" placeholder="Prénom" value="{{ old('firstname', $details['firstname']) }}" class="w-full p-3 border border-gray-300 rounded mb-2" />
            @error('firstname')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="text" name="lastname" placeholder="Nom" value="{{ old('lastname', $details['lastname']) }}" class="w-full p-3 border border-gray-300 rounded mb-2" />
            @error('lastname')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="email" name="email" placeholder="Email" value="{{ old('email', $details['email']) }}" class="w-full p-3 border border-gray-300 rounded mb-2" />
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="text" name="phone" placeholder="Téléphone" value="{{ old('phone', $details['phone']) }}" class="w-full p-3 border border-gray-300 rounded mb-2" />
            @error('phone')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <textarea name="message" placeholder="Message" class="w-full p-3 border border-gray-300 rounded mb-2">{{ old('message', $details['message']) }}</textarea>
            @error('message')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            ENVOYER
        </button>
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