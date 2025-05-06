<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakeUpController extends Controller
{
    public function index(Request $request)
    {
        // Data Dummy Elektronik
        $makeups = [
            [
                'judul' => 'lipstik',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => '9999999999999999996hhueif.',
                'nama_pengirim' => 'Una.',
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
            $makeups = array_filter($makeups, function ($book) use ($search) {
                return stripos($book['judul'], $search) !== false;
            });
        }

        return view('makeup.index', [
            'makeups' => $makeups,
            'search' => $search
        ]);
    }

    public function detail($id)
    {
        // Data Dummy harus sama seperti di index
        $makeups = [ 
            [
                'judul' => 'lipstik',
                'gambar' => 'https://i.pinimg.com/736x/8f/81/a4/8f81a4b35fba476ce1b0b6077de148a4.jpg',
                'deskripsi' => '9999999999999999996hhueif.',
                'nama_pengirim' => 'Una.',
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

        if (!isset($makeups[$id])) {
            abort(404);
        }

        $produk = $makeups[$id];

        return view('makeup.detail', compact('produk'));
    }
}