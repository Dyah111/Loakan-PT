@extends('layouts.app')

@section('content')
    <div class="container py-4 border border-black p-4">
        <h1 class="mb-4 text-center">Cari Barang Furnitur Bekas</h1>

        <!-- Form Pencarian -->
        <form action="{{ route('furnitur.index') }}" method="GET" class="mb-5 w-full max-w-lg mx-auto">
            <div class="input-group flex">
                <input type="text" name="search"
                    class="form-control flex-1 p-3 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Cari Furnitur..." value="{{ $search }}">
                <button class="btn btn-primary p-3 bg-blue-600 text-white rounded-r-md hover:bg-blue-700" type="submit">
                    Cari
                </button>
            </div>
        </form>

        <!-- Daftar Barang Lainnya dalam Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse ($furniturs as $index => $furnitur)
                <div class="bg-white rounded shadow p-4 flex flex-col">
                    <img src="{{ $furnitur['gambar'] }}" alt="{{ $furnitur['judul'] }}" class="h-40 w-full object-cover rounded mb-2">
                    <h2 class="text-lg font-semibold mb-1">{{ $furnitur['judul'] }}</h2>
                    <p class="text-sm text-gray-600 mb-2">Pengirim: {{ $furnitur['nama_pengirim'] }}</p>
                    <a href="{{ route('furnitur.detail', ['id' => $index]) }}"
                       class="mt-auto bg-[#f5a25d] text-white px-4 py-2 rounded hover:bg-[#e58a3f]">
                        Lihat Detail →
                    </a>
                </div>
            @empty
                <p class="text-center w-full">Barang tidak ditemukan.</p>
            @endforelse
        </div>
    </div>
@endsection