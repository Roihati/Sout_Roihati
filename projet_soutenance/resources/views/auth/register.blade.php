@extends('layouts.app_acceil')

@section('meta')
    <meta name="description" content="about for website">
@endsection

@section('title')
    <title>Register</title>
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f7fafc; font-family: 'Arial', sans-serif; }
        form { max-width: 500px; margin: 50px auto; padding: 20px; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px; }
        x-input-label { font-weight: bold; color: #333; }
        x-text-input { width: 100%; padding: 10px; margin-top: 8px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px; transition: border-color 0.3s; }
        x-text-input:focus { border-color: #3182ce; outline: none; }
        .x-primary-button { background-color: #3182ce; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s; }
        .x-primary-button:hover { background-color: #2c5282; }
    </style>
@endsection

@section('content')
    <x-guest-layout>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Address -->
            <div>
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Role Selection -->
            <div class="mt-4">
                <x-input-label for="role_id" :value="__('Select Role')" />
                <select id="role_id" name="role_id" class="block mt-1 w-full">
                    @foreach ($roles as $role)
                        <option value="{{ $role->value }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900">{{ __('Already registered?') }}</a>
                <x-primary-button class="ms-4">{{ __('Register') }}</x-primary-button>
            </div>
        </form>
    </x-guest-layout>
@endsection

@section('script')
    <!-- Ajoutez vos scripts personnalisés ici -->
@endsection