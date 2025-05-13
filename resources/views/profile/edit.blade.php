@extends('layouts.app')

@section('content')
<section class="max-w-3xl mx-auto p-8 bg-white rounded-2xl shadow-lg">

    <!-- Foto Profil di Paling Atas -->
    @if ($user->profile_photo)
        <div class="flex justify-center mb-6">
            <img src="{{ asset('storage/' . $user->profile_photo) }}"
                alt="Profile Photo"
                class="w-32 h-32 rounded-full object-cover shadow-lg">
        </div>
    @endif

    <header class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-gray-800">Profile</h2>
        <p class="text-sm text-gray-600 mt-2">Update your account's profile information and email address.</p>
    </header>

    <!-- Form -->
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" name="name" type="text"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('email', $user->email) }}" required autocomplete="username">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- About Me -->
        <div>
            <label for="about_me" class="block text-sm font-medium text-gray-700">About Me</label>
            <textarea id="about_me" name="about_me" rows="4"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Tell us about yourself...">{{ old('about_me', $user->about_me ?? '') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('about_me')" />
        </div>

        <!-- Phone -->
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input id="phone" name="phone" type="text"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('phone', $user->phone ?? '') }}">
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <!-- Upload Foto Profil -->
        <div>
            <label for="profile_photo" class="block text-sm font-medium text-gray-700">Upload New Photo</label>
            <input id="profile_photo" name="profile_photo" type="file"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-50 file:text-indigo-700
                        hover:file:bg-indigo-100">
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        <!-- Tombol -->
        <div class="flex items-center gap-4">
            <button type="submit"
                    class="bg-indigo-600 text-white px-5 py-2 rounded-lg shadow hover:bg-indigo-700 transition-all">
                Save Changes
            </button>
            @if (session('status') === 'profile-updated')
                <p class="text-sm text-green-600">Profile updated.</p>
            @endif
        </div>
    </form>
</section>
@endsection
 