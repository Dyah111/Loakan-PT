<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LainnyaController extends Controller
{
    public function index(Request $request)
    {
        // Data Dummy Buku
        $books = [
            ['judul' => 'Jam Tangan', 'penulis' => 'Andrea Hirata', 'harga' => 30000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
            ['judul' => 'Tas Slempang', 'penulis' => 'Tere Liye', 'harga' => 25000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
            ['judul' => 'Topi', 'penulis' => 'Ahmad Fuadi', 'harga' => 28000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
            ['judul' => 'Gelang', 'penulis' => 'Robert Kiyosaki', 'harga' => 35000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
            ['judul' => 'Kacamata', 'penulis' => 'Henry Manampiring', 'harga' => 27000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
        ];

        // Ambil input search dari user
        $search = $request->query('search');

        if ($search) {
            // Filter buku berdasarkan judul
            $books = array_filter($books, function ($book) use ($search) {
                return stripos($book['judul'], $search) !== false;
            });
        }

        return view('lainnya.index', compact('books', 'search'));
    }
}