@extends('layouts.app')

@section('content')
<div class="bg-[#f8f8e3] min-h-screen py-10 px-4">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <img src="{{ $produk['gambar'] }}" alt="{{ $produk['judul'] }}" class="w-full h-80 object-cover">
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-2">{{ $produk['judul'] }}</h2>

            <p class="text-gray-600 mb-2"><strong>Penulis:</strong> {{ $produk['penulis'] }}</p>
            <p class="text-gray-600 mb-2"><strong>Profil Pengirim:</strong> {{ $produk['nama_pengirim'] }}</p>
            <p class="text-gray-600 mb-2"><strong>Deskripsi:</strong> {{ $produk['deskripsi'] }}</p>
            <p class="text-gray-600 mb-6"><strong>Nomor Telepon:</strong> {{ $produk['telepon'] }}</p>

            <a href="{{ route('buku.index') }}" class="inline-block bg-[#f5a25d] text-white px-4 py-2 rounded hover:bg-[#e38a3f]">← Kembali ke Daftar Elektronik</a>

        </div>
    </div>
</div>
@endsection