@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-8 ">
        <h2 class="text-2xl font-bold mb-4 text-[#caa46c]">Forum Diskusi</h2>

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

                    <div x-show="open" @click.away="open = false"
                        class="mt-2 w-40 bg-white border rounded shadow absolute right-0 z-10">
                        <ul class="text-sm text-gray-700">
                            <li @click="alert('Laporan terkirim')" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Laporkan
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

                <div class="font-bold">
                    <a href="#" class="text-blue-600 hover:underline">{{ $forum->user->name }}</a>
                </div>
                <div class="text-sm text-gray-500">{{ $forum->created_at->diffForHumans() }}</div>
                <p class="mt-2">{{ $forum->message }}</p>
            </div>
        @endforeach
    </div>
@endsection