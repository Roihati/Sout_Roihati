@extends('layouts.app_acceil')

@section('meta')
<meta name="description" content="about for website">
@endsection

@section('tittle')
<title>register</title>
@endsection
<!----verification des erreur de vue--------->


@section('style')
<!-- Inclure Font Awesome pour les icônes -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha384-oS3vJWv+0UjzB1q6iZ6ztE1xzu4w5Oq3T1ZC1Rv8nGx5iykK0sE7O6ChwdP2K5jK" crossorigin="anonymous">
<style>
    /* Styles pour attirer l'attention */
    body {
        background-color: #f7fafc;
        font-family: 'Arial', sans-serif;
    }

    form {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    x-input-label {
        font-weight: bold;
        color: #333;
    }

    x-text-input {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    x-text-input:focus {
        border-color: #3182ce;
        outline: none;
    }

    .mt-4 {
        margin-top: 16px;
    }

 .flex {
        display: flex;
    }

    .items-center {
        align-items: center;
    }

    .justify-center {
        justify-content: center;
    }

    .justify-end {
        justify-content: flex-end;
    }

    .mt-1 {
        margin-top: 8px;
    }

    .text-gray-600 {
        color: #718096;
    }

    .text-gray-900 {
        color: #1a202c;
    }

    .hover\:text-gray-900:hover {
        color: #1a202c;
    }

    .rounded-md {
        border-radius: 4px;
    }

    .focus\:outline-none:focus {
        outline: none;
    }

    .focus\:ring-2:focus {
        box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.5);
    }

    .focus\:ring-offset-2:focus {
        box-shadow: 0 0 0 4px rgba(66, 153, 225, 0.5);
    }

    .focus\:ring-indigo-500:focus {
        box-shadow: 0 0 0 2px #5a67d8;
    }

    .dark\:text-gray-400 {
        color: #a0aec0;
    }

    .dark\:hover\:text-gray-100:hover {
        color: #f7fafc;
    }

    .dark\:focus\:ring-offset-gray-800:focus {
        box-shadow: 0 0 0 4px rgba(45, 55, 72, 0.5);
    }

    .ms-4 {
        margin-left: 16px;
    }

    x-primary-button {
        background-color: #3182ce;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    x-primary-button:hover {
        background-color: #2c5282;
    }

    /* Icônes des réseaux sociaux */
    .fab {
        transition: color 0.3s;
    }

    .fab:hover {
        color: #3182ce;
    }

    .flex.items-center.justify-center.mt-4 a {
        margin: 0 8px;
        color: #718096;
    }

    .flex.items-center.justify-center.mt-4 a:hover {
        color: #1a202c;
    }
</style>
@endsection

@section('content')
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
          <!-- phone-->
          <div>
            <x-input-label for="phone" :value="__('phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
          <!-- address -->
          <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- rôle -->
<div class="mt-4">
    <x-input-label for="role_id">Rôle</x-input-label>
    <select id="role_id" class="block mt-1 w-full" name="role_id" required>
        @foreach(App\Enums\RoleType::cases() as $role)
            <option value="{{ $role->value }}">{{ $role->label() }}</option>
        @endforeach
    </select>
</div>
      
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <!-- Icônes des réseaux sociaux -->
        <div class="flex items-center justify-center mt-4">
            <a href="https://www.facebook.com" target="_blank" class="mx-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                <i class="fab fa-facebook fa-2x"></i>
            </a>
            <a href="https://www.whatsapp.com" target="_blank" class="mx-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                <i class="fab fa-whatsapp fa-2x"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank" class="mx-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                <i class="fab fa-twitter fa-2x"></i>
            </a>
            <a href="https://www.linkedin.com" target="_blank" class="mx-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                <i class="fab fa-linkedin fa-2x"></i>
            </a>
        </div>
    </form>
</x-guest-layout>

@endsection

@section('script')
<script>
    /* Ajoutez vos scripts personnalisés ici */
</script>
@endsection