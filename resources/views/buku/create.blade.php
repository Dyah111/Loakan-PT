@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow mt-10">
    <h2 class="text-xl font-bold mb-4">Tambah Buku Baru</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Judul</label>
            <input type="text" name="judul" class="w-full border p-2 rounded" value="{{ old('judul') }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Penulis</label>
            <input type="text" name="penulis" class="w-full border p-2 rounded" value="{{ old('penulis') }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border p-2 rounded" required>{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">URL Gambar</label>
            <input type="url" name="gambar" class="w-full border p-2 rounded" value="{{ old('gambar') }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Nama Pengirim</label>
            <input type="text" name="nama_pengirim" class="w-full border p-2 rounded" value="{{ old('nama_pengirim') }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Nomor Telepon</label>
            <input type="text" name="telepon" class="w-full border p-2 rounded" value="{{ old('telepon') }}" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Buku
        </button>
    </form>
</div>
@endsection