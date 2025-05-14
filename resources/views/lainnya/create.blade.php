@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow my-5">
        <h2 class="text-xl font-bold mb-4">Tambah Barang Baru</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lainnya.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1">Judul</label>
                <input type="text" name="judul" class="w-full border p-2 rounded" value="{{ old('judul') }}" required>
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
                <textarea name="nama_pengirim" class="w-full border p-2 rounded" required>{{ old('nama_pengirim') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Nomor Telepon</label>
                <input type="text" name="telepon" class="w-full border p-2 rounded" value="{{ old('telepon') }}" required>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Barang
            </button>

            <button onclick="window.history.back()"
                class="inline-block bg-[#f5a25d] text-white px-4 py-2 rounded hover:bg-[#e38a3f]">Back
            </button>
        </form>
    </div>
@endsection