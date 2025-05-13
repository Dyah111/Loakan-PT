@extends('layouts.app')

@section('content')
    <div class="container py-4 border border-black p-4 h-screen">
        <h1 class="mb-4 text-center">Loakan MakeUp</h1>

        <!-- Form Pencarian -->
        <form action="{{ route('makeup.index') }}" method="GET" class="mb-5 w-full max-w-lg mx-auto">
            <div class="input-group flex">
                <input type="text" name="search"
                    class="form-control flex-1 p-3 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Cari Pakaian..." value="{{ $search }}">
                <button class="btn btn-primary p-3 bg-blue-600 text-white rounded-r-md hover:bg-blue-700" type="submit">
                    Cari
                </button>
            </div>
        </form>

        <a href="{{ route('makeup.create') }}" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Tambah Barang
        </a>

        <!-- Daftar Barang Lainnya dalam Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse ($make_ups as $index => $makeup)
                <div class="bg-white rounded shadow p-4 flex flex-col">
                    <img src="{{ $makeup['gambar'] }}" alt="{{ $makeup['judul'] }}" class="h-40 w-full object-cover rounded mb-2">
                    <h2 class="text-lg font-semibold mb-1">{{ $makeup['judul'] }}</h2>
                    <p class="text-sm text-gray-600 mb-2">Pengirim: {{ $makeup->user->name }}</p>
                    <a href="{{ route('makeup.detail', ['id' => $makeup['id']]) }}"
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