<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PakaianController extends Controller
{
    public function index(Request $request)
    {
        // Data Dummy Elektronik
        $pakaians = [
            [
                'judul' => 'baju trendi',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => '123456789kjnbvcxsdfghjknbvfesaqaz',
                'nama_pengirim' => 'Bambang',
                'telepon' => '081234567890'
            ],
            [
                'judul' => 'Komputer',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Komputer rakitan, cocok untuk pekerjaan kantor.',
                'nama_pengirim' => 'Rina S.',
                'telepon' => '082233445566'
            ],
            [
                'judul' => 'Laptop',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Laptop second, Core i5, RAM 8GB, SSD 256GB.',
                'nama_pengirim' => 'Andi T.',
                'telepon' => '085677889900'
            ],
            [
                'judul' => 'Kipas',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Kipas angin berdiri, hemat listrik.',
                'nama_pengirim' => 'Siti N.',
                'telepon' => '081111111111'
            ],
            [
                'judul' => 'Headset',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Headset gaming dengan mikrofon, suara jernih.',
                'nama_pengirim' => 'Budi K.',
                'telepon' => '082222222222'
            ],
        ];

        $search = $request->query('search');

        if ($search) {
            $pakaians = array_filter($pakaians, function ($book) use ($search) {
                return stripos($book['judul'], $search) !== false;
            });
        }

        return view('pakaian.index', [
            'pakaians' => $pakaians,
            'search' => $search
        ]);
    }

    public function detail($id)
    {
        // Data Dummy harus sama seperti di index
        $pakaians = [ 
            [
                'judul' => 'baju trendi',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => '123456789kjnbvcxsdfghjknbvfesaqaz',
                'nama_pengirim' => 'Bambang',
                'telepon' => '081234567890'
            ],
            [
                'judul' => 'Komputer',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Komputer rakitan, cocok untuk pekerjaan kantor.',
                'nama_pengirim' => 'Rina S.',
                'telepon' => '082233445566'
            ],
            [
                'judul' => 'Laptop',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Laptop second, Core i5, RAM 8GB, SSD 256GB.',
                'nama_pengirim' => 'Andi T.',
                'telepon' => '085677889900'
            ],
            [
                'judul' => 'Kipas',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Kipas angin berdiri, hemat listrik.',
                'nama_pengirim' => 'Siti N.',
                'telepon' => '081111111111'
            ],
            [
                'judul' => 'Headset',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => 'Headset gaming dengan mikrofon, suara jernih.',
                'nama_pengirim' => 'Budi K.',
                'telepon' => '082222222222'
            ],
         ];

        if (!isset($pakaians[$id])) {
            abort(404);
        }

        $produk = $pakaians[$id];

        return view('pakaian.detail', compact('produk'));
    }
}