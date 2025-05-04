<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $list = [
            ['id' => 1, 'nama' => 'Kemeja Flanel Vintage', 'category' => 'Pakaian', 'image' => 'https://i.pinimg.com/736x/5d/ee/d4/5deed4733b53eb468208d5d4589fc0d0.jpg', 'linkwa' => null],
            ['id' => 2, 'nama' => 'Meja Belajar Kayu', 'category' => 'Furnitur', 'image' => 'https://i.pinimg.com/736x/5d/ee/d4/5deed4733b53eb468208d5d4589fc0d0.jpg', 'linkwa' => 'https://wa.me/628123456789'],
            ['id' => 3, 'nama' => 'Lipstik Bekas', 'category' => 'MakeUp', 'image' => 'https://example.com/lipstik.jpg', 'linkwa' => null],
            
            // Tambahkan data lainnya...
        ];

        return view('dashboard', compact('list'));
    }
}
