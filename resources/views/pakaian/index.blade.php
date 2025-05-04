@extends('layouts.app')

@section('content')
    <div class="container py-4 border border-black p-4">
        <h1 class="mb-4 text-center">Cari Pakaian</h1>

        <!-- Form Pencarian -->
        <form action="{{ route('pakaian.index') }}" method="GET" class="mb-5 w-full max-w-lg mx-auto">
            <div class="input-group flex">
                <input type="text" name="search"
                    class="form-control flex-1 p-3 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Cari Pakaian..." value="{{ $search }}">
                <button class="btn btn-primary p-3 bg-blue-600 text-white rounded-r-md hover:bg-blue-700" type="submit">
                    Cari
                </button>
            </div>
        </form>

        <!-- Daftar Elektronik dalam Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse ($books as $book)
                <x-card :book="$book" />
            @empty
                <p class="text-center w-full">Pakaian tidak ditemukan.</p>
            @endforelse
        </div>
    </div>
@endsection