<?php

namespace App\Http\Controllers;

use App\Models\Furnitur;
use App\Models\Lainnya;
use App\Models\Pakaian;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\MakeUp;
use App\Models\Elektronik;
use App\Models\Forum;
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
        })->toArray();        

        $makeUp = MakeUp::with('user')->inRandomOrder()->limit(2)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi,
                'gambar' => $item->gambar,
                'nama_pengirim' => $item->user->name ?? 'Anonim',
                'penulis' => null,
                'category' => 'makeup'
            ];
        })->toArray();

        $elektronik = Elektronik::with('user')->inRandomOrder()->limit(2)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi,
                'gambar' => $item->gambar,
                'nama_pengirim' => $item->user->name ?? 'Anonim',
                'penulis' => null,
                'category' => 'elektronik'
            ];
        })->toArray();

        $furnitur = Furnitur::with('user')->inRandomOrder()->limit(2)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi,
                'gambar' => $item->gambar,
                'nama_pengirim' => $item->user->name ?? 'Anonim',
                'penulis' => null,
                'category' => 'furnitur'
            ];
        })->toArray();

        $lainnya = Lainnya::with('user')->inRandomOrder()->limit(2)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi,
                'gambar' => $item->gambar,
                'nama_pengirim' => $item->user->name ?? 'Anonim',
                'penulis' => null,
                'category' => 'lainnya'
            ];
        })->toArray();

        $pakaian = Pakaian::with('user')->inRandomOrder()->limit(2)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi,
                'gambar' => $item->gambar,
                'nama_pengirim' => $item->user->name ?? 'Anonim',
                'penulis' => null,
                'category' => 'pakaian'
            ];
        })->toArray();

        // Gabungkan semua array
        $list = array_merge($buku, $makeUp, $elektronik, $furnitur, $lainnya, $pakaian);

         $latestForums = Forum::with('user')->latest()->take(5)->get();

        return view('dashboard', compact('list', 'latestForums'));
    }
}