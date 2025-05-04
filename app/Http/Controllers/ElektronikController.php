<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElektronikController extends Controller
{
    public function index(Request $request)
    {
        // Data Dummy Buku
        $books = [
            ['judul' => 'Redragon M602 RGB, Wired Gaming Mouse RGB', 'penulis' => 'Andrea Hirata', 'harga' => 30000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
            ['judul' => 'Komputer', 'penulis' => 'Tere Liye', 'harga' => 25000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
            ['judul' => 'Laptop', 'penulis' => 'Ahmad Fuadi', 'harga' => 28000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
            ['judul' => 'Kipas', 'penulis' => 'Robert Kiyosaki', 'harga' => 35000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
            ['judul' => 'Headset ', 'penulis' => 'Henry Manampiring', 'harga' => 27000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
        ];

        // Ambil input search dari user
        $search = $request->query('search');

        if ($search) {
            // Filter buku berdasarkan judul
            $books = array_filter($books, function ($book) use ($search) {
                return stripos($book['judul'], $search) !== false;
            });
        }

        return view('elektronik.index', compact('books', 'search'));
    }
}
