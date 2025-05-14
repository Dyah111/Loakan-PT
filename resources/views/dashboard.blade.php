@extends('layouts.app')

@section('content')
    <!-- Kategori -->
    <h2 class="text-2xl font-bold mb-4 text-[#caa46c]">Kategori</h2>
    <div class="grid grid-cols-2 md:grid-cols-6 gap-4 mb-10 p-4">
        @php
            $categories = [
                ['name' => 'Pakaian', 'icon' => '👕'],
                ['name' => 'Elektronik', 'icon' => '📱'],
                ['name' => 'Furnitur', 'icon' => '🪑'],
                ['name' => 'Buku', 'icon' => '📚'],
                ['name' => 'Make Up', 'icon' => '💄'],
                ['name' => 'Lainnya', 'icon' => '👜'],
            ];
        @endphp

        @foreach($categories as $category)
            <a href="{{ url('/' . strtolower(str_replace(' ', '', $category['name']))) }}"
                class="bg-[#f5a25d] rounded-lg p-6 flex flex-col items-center justify-center hover:scale-105 transition">
                <div class="text-4xl">{{ $category['icon'] }}</div>
                <div class="text-white font-bold mt-2">{{ $category['name'] }}</div>
            </a>
        @endforeach
    </div>


    <!-- Forum Diskusi -->
    <div class="space-y-4 mb-10 p-4 bg-gray-50">
        <div class="w-full flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-[#caa46c]">Forum Diskusi</h2>
            <a href="{{ route('forum.index') }}"
                class="px-4 border border-gray-400 py-2 hover:bg-gray-200 rounded-md text-center">Lainnya</a>
        </div>

        @forelse ($latestForums as $forum)
            <div class="bg-white rounded-lg p-6 shadow">
                <div class="font-bold">
                    <a href="{{ route('forum.showProfile', ['id' => $forum->user->id]) }}"
                        class="text-blue-600 hover:underline">
                        {{ $forum->user->name }}
                    </a>
                </div>
                <div class="text-sm text-gray-500">{{ $forum->created_at->diffForHumans() }}</div>
                <p class="mt-2">{{ $forum->message }}</p>
            </div>
        @empty
            <p class="text-gray-600">Belum ada postingan forum.</p>
        @endforelse
    </div>


    <!-- Barang Loakan -->
    <h2 class="text-2xl font-bold mb-4 text-[#caa46c]">Barang Loakan</h2>
    <div class="flex gap-6 overflow-x-auto p-2 mb-10">
        @forelse($list as $item)
            <div class="bg-white rounded shadow p-4 flex-shrink-0 w-64">
                <img src="{{ $item['gambar'] }}" alt="{{ $item['judul'] }}" class="h-40 w-full object-cover rounded mb-2">
                <h2 class="text-lg font-semibold mb-1">{{ $item['judul'] }}</h2>
                @if (!empty($item['penulis']))
                    <p class="text-sm text-gray-600 mb-1">Penulis: {{ $item['penulis'] }}</p>
                @endif
                <p class="text-sm text-gray-600 mb-2">Pengirim: {{ $item['nama_pengirim'] }}</p>

                @if ($item['category'] == 'buku')
                    <a href="{{ route('buku.detail', ['id' => $item['id']]) }}"
                        class="mt-auto bg-[#f5a25d] text-white px-4 py-2 rounded hover:bg-[#e58a3f]">
                        Lihat Detail →
                    </a>
                @elseif($item['category'] == 'makeup')
                    <a href="{{ route('makeup.detail', ['id' => $item['id']]) }}"
                        class="mt-auto bg-[#f5a25d] text-white px-4 py-2 rounded hover:bg-[#e58a3f]">
                        Lihat Detail →
                    </a>
                @elseif($item['category'] == 'elektronik')
                    <a href="{{ route('elektronik.detail', ['id' => $item['id']]) }}"
                        class="mt-auto bg-[#f5a25d] text-white px-4 py-2 rounded hover:bg-[#e58a3f]">
                        Lihat Detail →
                    </a>
                @elseif($item['category'] == 'furnitur')
                    <a href="{{ route('furnitur.detail', ['id' => $item['id']]) }}"
                        class="mt-auto bg-[#f5a25d] text-white px-4 py-2 rounded hover:bg-[#e58a3f]">
                        Lihat Detail →
                    </a>
                @elseif($item['category'] == 'lainnya')
                    <a href="{{ route('lainnya.detail', ['id' => $item['id']]) }}"
                        class="mt-auto bg-[#f5a25d] text-white px-4 py-2 rounded hover:bg-[#e58a3f]">
                        Lihat Detail →
                    </a>
                @elseif($item['category'] == 'pakaian')
                    <a href="{{ route('pakaian.detail', ['id' => $item['id']]) }}"
                        class="mt-auto bg-[#f5a25d] text-white px-4 py-2 rounded hover:bg-[#e58a3f]">
                        Lihat Detail →
                    </a>
                @endif
            </div>
        @empty
            <div class="text-center w-full text-gray-500 mt-8">
                Belum ada data yang tersedia.
            </div>
        @endforelse


    </div>
@endsection