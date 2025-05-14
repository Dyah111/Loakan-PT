@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-8 h-screen relative">
        {{-- Tombol back dengan lingkaran --}}
        <button onclick="window.history.back()"
            class="absolute top-4 left-4 flex items-center justify-center w-12 h-12 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-full text-3xl transition duration-200 shadow">
            ←
        </button>

        <h2 class="text-2xl font-bold mb-4 text-[#caa46c] text-center">Profil Pengguna</h2>

        <div class="bg-white p-4 rounded shadow mb-6">
            <h3 class="text-xl font-bold mb-2">Informasi Pengguna</h3>
            <p class="mb-2"><strong>Nama:</strong> {{ $user->name }}</p>
            <p class="mb-2"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="mb-2"><strong>Nomor Telepon:</strong>
                @if ($user->phone)
                    {{ $user->phone }}
                @else
                    <span class="text-gray-500">Nomor telepon tidak tersedia</span>
                @endif
            </p>
        </div>
    </div>
@endsection