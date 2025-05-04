<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        // Data dummy untuk ditampilkan
        $forums = [
            ['user' => 'Budi Santoso', 'time' => '2 jam yang lalu', 'message' => 'Saya punya beberapa pakaian bekas yang masih bagus. Ada yang berminat?', 'likes' => 15],
            ['user' => 'Siti Rahayu', 'time' => '5 jam yang lalu', 'message' => 'Baru saja menemukan buku-buku lama di gudang. Masih dalam kondisi baik!', 'likes' => 10],
            ['user' => 'Agus Wijaya', 'time' => '1 hari yang lalu', 'message' => 'Ada yang mencari laptop bekas? Saya punya beberapa yang masih berfungsi dengan baik.', 'likes' => 23],
        ];

        return view('forum.index', compact('forums'));
    }
}
