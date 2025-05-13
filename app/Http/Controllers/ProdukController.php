<?php

namespace App\Http\Controllers;

use App\Models\Furnitur;
use App\Models\Lainnya;
use App\Models\Pakaian;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\MakeUp;
use App\Models\Elektronik;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {

        $buku = Buku::with('user')->inRandomOrder()->limit(2)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'penulis' => $item->penulis,
                'deskripsi' => $item->deskripsi,
                'gambar' => $item->gambar,
                'nama_pengirim' => $item->user->name ?? 'Anonim',
                'category' => 'buku'
            ];
        });        

        $makeUp = MakeUp::with('user')->inRandomOrder()->limit(2)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi,
                'gambar' => $item->gambar,
                'nama_pengirim' => $item->user->name ?? 'Anonim',
                'penulis' => null, // tambahkan ini
                'category' => 'makeup'
            ];
        });

        $elektronik = Elektronik::with('user')->inRandomOrder()->limit(2)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi,
                'gambar' => $item->gambar,
                'nama_pengirim' => $item->user->name ?? 'Anonim',
                'penulis' => null, // tambahkan ini
                'category' => 'elektronik'
            ];
        });

        $furnitur = Furnitur::with('user')->inRandomOrder()->limit(2)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi,
                'gambar' => $item->gambar,
                'nama_pengirim' => $item->user->name ?? 'Anonim',
                'penulis' => null, // tambahkan ini
                'category' => 'makeup'
            ];
        });

        $lainnya = Lainnya::with('user')->inRandomOrder()->limit(2)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi,
                'gambar' => $item->gambar,
                'nama_pengirim' => $item->user->name ?? 'Anonim',
                'penulis' => null, // tambahkan ini
                'category' => 'lainnya'
            ];
        });

        $pakaian = Pakaian::with('user')->inRandomOrder()->limit(2)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi,
                'gambar' => $item->gambar,
                'nama_pengirim' => $item->user->name ?? 'Anonim',
                'penulis' => null, // tambahkan ini
                'category' => 'pakaian'
            ];
        });

        $list = $buku->merge($makeUp)->merge($elektronik)
        ->merge($furnitur)->merge($lainnya)->merge($pakaian);

        return view('dashboard', compact('list'));
    }
}
