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
        @php
            $forums = [
                ['user' => 'Budi Santoso', 'time' => '2 jam yang lalu', 'message' => 'Saya punya beberapa pakaian bekas yang masih bagus. Ada yang berminat?', 'likes' => 15],
                ['user' => 'Siti Rahayu', 'time' => '5 jam yang lalu', 'message' => 'Baru saja menemukan buku-buku lama di gudang. Masih dalam kondisi baik!', 'likes' => 10],
                ['user' => 'Agus Wijaya', 'time' => '1 hari yang lalu', 'message' => 'Ada yang mencari laptop bekas? Saya punya beberapa yang masih berfungsi dengan baik.', 'likes' => 23],
            ];
        @endphp

        @foreach($forums as $forum)
            <div class="bg-white rounded-lg p-6 shadow">
                <div class="font-bold">{{ $forum['user'] }}</div>
                <div class="text-sm text-gray-500">{{ $forum['time'] }}</div>
                <p class="mt-2">{{ $forum['message'] }}</p>
                <div class="mt-2 text-gray-500 flex items-center">
                    <span class="mr-1">❤️</span> {{ $forum['likes'] }}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Barang Loakan -->
    <h2 class="text-2xl font-bold mb-4 text-[#caa46c]">Barang Loakan</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 p-2">

        @foreach($list as $item)
            <div class="bg-white rounded-lg p-4 shadow flex flex-col items-center">
                <div class="bg-gray-200 w-full h-32 flex items-center justify-center mb-4 overflow-hidden rounded">
                    @if (isset($item['image']))
                        <img src="{{ $item['image'] }}" alt="{{ $item['nama'] }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-gray-400">No Image</span>
                    @endif
                </div>
                <div class="font-bold text-center">{{ $item['nama'] }}</div>
                <div class="mt-1 text-sm text-gray-600 text-center">
                    <span class="bg-[#f0e5be] px-2 py-1 rounded">{{ $item['category'] }}</span>
                </div>
                <a href="{{ $item['linkwa'] }}" class="w-3/4 py-1 text-center bg-blue-500 text-white hover:bg-blue-600 rounded-md font-bold mt-4">View Detail</a>
            </div>

        @endforeach
    </div>
@endsection