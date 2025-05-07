@extends('layouts.app')

@section('content')
    <div class="container py-4 border border-black p-4">
        <h1 class="mb-4 text-center">Cari Buku Bekas</h1>

        <!-- Form Pencarian -->
        <form action="{{ route('buku.index') }}" method="GET" class="mb-5 w-full max-w-lg mx-auto">
            <div class="input-group flex">
                <input type="text" name="search"
                    class="form-control flex-1 p-3 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Cari judul buku..." value="{{ $search }}">
                <button class="btn btn-primary p-3 bg-blue-600 text-white rounded-r-md hover:bg-blue-700" type="submit">
                    Cari
                </button>
            </div>
        </form>

        <a href="{{ route('buku.create') }}" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Tambah Buku
        </a>


        <!-- Daftar Barang Lainnya dalam Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse ($bukus as $index => $book)
                <div class="bg-white rounded shadow p-4 flex flex-col">
                    <img src="{{ $book['gambar'] }}" alt="{{ $book['judul'] }}" class="h-40 w-full object-cover rounded mb-2">
                    <h2 class="text-lg font-semibold mb-1">{{ $book['judul'] }}</h2>
                    <p class="text-sm text-gray-600 mb-1">Penulis: {{ $book['penulis'] }}</p> <!-- ✅ Tambahkan ini -->
                    <p class="text-sm text-gray-600 mb-2">Pengirim: {{ $book->user->name }}</p>
                    <a href="{{ route('buku.detail', ['id' => $book['id']]) }}"
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