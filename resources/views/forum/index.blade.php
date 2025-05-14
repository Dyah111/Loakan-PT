@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-8 relative">

        {{-- Tombol back --}}
        <a href="{{ route('dashboard') }}"
            class="absolute top-4 left-4 flex items-center justify-center w-12 h-12 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-full text-3xl transition duration-200 shadow">
            ←
        </a>

        <h2 class="text-2xl font-bold mb-4 text-[#caa46c] text-center">Forum Diskusi</h2>

        <div class="bg-white p-4 rounded shadow mb-6">
            <form action="{{ route('forum.store') }}" method="POST">
                @csrf
                <textarea name="message" rows="3" class="w-full border border-gray-300 rounded p-2 mb-2"
                    placeholder="Apa yang ingin kamu bagikan?"></textarea>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kirim</button>
            </form>
        </div>

        @foreach($forums as $forum)
            <div class="bg-white rounded-lg p-6 shadow mb-4 relative" x-data="{ open: false }">
                {{-- Titik 3 di kanan atas --}}
                <div class="absolute top-4 right-4">
                    <button class="focus:outline-none" @click="open = !open">
                        <svg class="w-6 h-6 text-gray-500 hover:text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </button>

                    <div x-show="open" x-cloak @click.away="open = false"
                        class="mt-2 w-40 bg-white border rounded shadow absolute right-0 z-10">
                        <ul class="text-sm text-gray-700">
                            <li>
                                <a href="https://wa.me/6282229818657?text={{ urlencode('Halo, saya ingin melaporkan postingan forum dengan detail berikut:

                            ID Forum: ' . $forum->id . '
                            Nama Pengguna: ' . $forum->user->name . '
                            Email Pengguna: ' . $forum->user->email) }}" target="_blank"
                                    class="block px-4 py-2 hover:bg-gray-100 text-blue-600">
                                    Laporkan
                                </a>
                            </li>

                            @if ($forum->user_id === Auth::id() || Auth::user()->is_admin == true)
                                <form action="{{ route('forum.destroy', $forum->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">Hapus</button>
                                </form>
                            @endif
                        </ul>
                    </div>
                </div>

                {{-- Isi forum --}}
                <div class="font-bold">
                    <a href="{{ route('forum.showProfile', ['id' => $forum->user->id]) }}"
                        class="text-blue-600 hover:underline">{{ $forum->user->name }}</a>
                </div>
                <div class="text-sm text-gray-500">{{ $forum->created_at->diffForHumans() }}</div>
                <p class="mt-2">{{ $forum->message }}</p>

                {{-- Tombol Like --}}
                <form action="{{ route('forum.like', $forum->id) }}" method="POST" class="mt-2 flex items-center gap-1">
                    @csrf
                    @if(!$forum->isLikedBy(auth()->user()))
                        <button type="submit" class="text-red-500 hover:text-red-700">❤️</button>
                    @else
                        <span class="text-red-600">❤️</span>
                    @endif
                    <span class="text-gray-500">{{ $forum->likedByUsers()->count() }}</span>
                </form>

            </div>
        @endforeach
    </div>
@endsection
