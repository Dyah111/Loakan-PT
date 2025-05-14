<?php

namespace App\Http\Controllers;

use App\Models\Furnitur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FurniturController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Furnitur::query();

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        }

        $furniturs = $query->get();

        return view('furnitur.index', [
            'furniturs' => $furniturs,
            'search' => $search
        ]);
    }

    public function detail($id)
    {

        $produk = Furnitur::findOrFail(id: $id);

        return view('furnitur.detail', compact('produk'));
    }

    public function create() {
        return view('furnitur.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'nama_pengirim' => 'required|string|max:255',
            'gambar' => 'nullable|url',
            'telepon' => 'required|string|max:20',
        ]);

        // Menambahkan user_id yang berasal dari user yang login
        $validated['user_id'] = Auth::user()->id;

        // Membuat furnitur baru dengan data yang sudah tervalidasi
        Furnitur::create(attributes: $validated);

        return redirect()->route('furnitur.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $furnitur = Furnitur::findOrFail($id);

        // Memastikan user yang login adalah pemilik postingan
        // if ($furnitur->user_id !== Auth::id()) {
        //     abort(403, 'Kamu tidak punya akses untuk menghapus postingan ini.');
        // }

        // Hapus postingan
        $furnitur->delete();

        return redirect()->route('furnitur.index')->with('success', 'Postingan berhasil dihapus.');
    }
}