<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        // Data Dummy Elektronik
        $books = [
            [
                'judul' => 'Semua Akan Terlihat',
                'penulis' => 'Hanny Bunny',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Buku inspirasi kehidupan yang akan sangat relate dengan kehidupan kita',
                'nama_pengirim' => 'Bambang',
                'telepon' => '081234567890'
            ],
            [
                'judul' => 'baju trendi',
                'penulis' => 'Hanny Bunny',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Buku inspirasi kehidupan yang akan sangat relate dengan kehidupan kita',
                'nama_pengirim' => 'Bambang',
                'telepon' => '081234567890'
            ],
            [
                'judul' => 'baju trendi',
                'penulis' => 'Hanny Bunny',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Buku inspirasi kehidupan yang akan sangat relate dengan kehidupan kita',
                'nama_pengirim' => 'Bambang',
                'telepon' => '081234567890'
            ],
            [
                'judul' => 'baju trendi',
                'penulis' => 'Hanny Bunny',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Buku inspirasi kehidupan yang akan sangat relate dengan kehidupan kita',
                'nama_pengirim' => 'Bambang',
                'telepon' => '081234567890'
            ],
            [
                'judul' => 'baju trendi',
                'penulis' => 'Hanny Bunny',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Buku inspirasi kehidupan yang akan sangat relate dengan kehidupan kita',
                'nama_pengirim' => 'Bambang',
                'telepon' => '081234567890'
            ],
        ];

        $search = $request->query('search');

        if ($search) {
            $books = array_filter($books, function ($book) use ($search) {
                return stripos($book['judul'], $search) !== false;
            });
        }

        return view('buku.index', [
            'books' => $books,
            'search' => $search
        ]);
    }

    public function detail($id)
    {
        // Data Dummy harus sama seperti di index
        $books = [ 
            [
                'judul' => 'Semua Akan Terlihat',
                'penulis' => 'Hanny Bunny',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Buku inspirasi kehidupan yang akan sangat relate dengan kehidupan kita',
                'nama_pengirim' => 'Bambang',
                'telepon' => '081234567890'
            ],
            [
                'judul' => 'baju trendi',
                'penulis' => 'Hanny Bunny',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Buku inspirasi kehidupan yang akan sangat relate dengan kehidupan kita',
                'nama_pengirim' => 'Bambang',
                'telepon' => '081234567890'
            ],
            [
                'judul' => 'baju trendi',
                'penulis' => 'Hanny Bunny',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Buku inspirasi kehidupan yang akan sangat relate dengan kehidupan kita',
                'nama_pengirim' => 'Bambang',
                'telepon' => '081234567890'
            ],
            [
                'judul' => 'baju trendi',
                'penulis' => 'Hanny Bunny',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Buku inspirasi kehidupan yang akan sangat relate dengan kehidupan kita',
                'nama_pengirim' => 'Bambang',
                'telepon' => '081234567890'
            ],
            [
                'judul' => 'baju trendi',
                'penulis' => 'Hanny Bunny',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Buku inspirasi kehidupan yang akan sangat relate dengan kehidupan kita',
                'nama_pengirim' => 'Bambang',
                'telepon' => '081234567890'
            ],
         ];

        if (!isset($books[$id])) {
            abort(404);
        }

        $produk = $books[$id];

        return view('buku.detail', compact('produk'));
    }
}