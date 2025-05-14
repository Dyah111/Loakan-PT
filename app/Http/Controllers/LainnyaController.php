<?php

namespace App\Http\Controllers;

use App\Models\Lainnya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LainnyaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Lainnya::query();

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        }

        $lainnyas = $query->get();

        return view('lainnya.index', [
            'lainnyas' => $lainnyas,
            'search' => $search
        ]);
    }

    public function detail($id)
    {

        $produk = Lainnya::findOrFail(id: $id);

        return view('lainnya.detail', compact('produk'));
    }

    public function create() {
        return view('lainnya.create');
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
        Lainnya::create(attributes: $validated);

        return redirect()->route('lainnya.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $lainnya = Lainnya::findOrFail($id);

        // Memastikan user yang login adalah pemilik postingan
        // if ($lainnya->user_id !== Auth::id()) {
        //     abort(403, 'Kamu tidak punya akses untuk menghapus postingan ini.');
        // }

        // Hapus postingan
        $lainnya->delete();

        return redirect()->route('lainnya.index')->with('success', 'Postingan berhasil dihapus.');
    }
}