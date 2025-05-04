<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        // Data Dummy Buku
        $books = [
            ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'harga' => 30000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
            ['judul' => 'Bumi', 'penulis' => 'Tere Liye', 'harga' => 25000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
            ['judul' => 'Negeri 5 Menara', 'penulis' => 'Ahmad Fuadi', 'harga' => 28000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
            ['judul' => 'Rich Dad Poor Dad', 'penulis' => 'Robert Kiyosaki', 'harga' => 35000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
            ['judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'harga' => 27000, 'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg'],
        ];

        // Ambil input search dari user
        $search = $request->query('search');

        if ($search) {
            // Filter buku berdasarkan judul
            $books = array_filter($books, function ($book) use ($search) {
                return stripos($book['judul'], $search) !== false;
            });
        }

        return view('buku.index', compact('books', 'search'));
    }
}
