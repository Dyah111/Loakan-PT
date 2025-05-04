@props(['book'])

<div
    class="w-full bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col">
    <div class="aspect-square overflow-hidden rounded-t-lg">
        <img src="{{ $book['gambar'] }}" alt="Gambar Buku" class="object-cover w-full h-full" />
    </div>
    <div class="p-4 flex-1 flex flex-col">
        <h5 class="text-lg font-semibold text-gray-900 mb-2 truncate">
            {{ $book['judul'] }}
        </h5>
        <p class="text-sm text-gray-600 mb-4">
            {{ $book['penulis'] }}
        </p>
        <a href="#"
            class="mt-auto inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition-colors">
            Lihat Detail
            <svg class="ml-2 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
</div>