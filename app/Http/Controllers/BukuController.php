<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Buku::query();

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        }

        $bukus = $query->get();

        return view('buku.index', [
            'bukus' => $bukus,
            'search' => $search
        ]);
    }

    public function detail($id)
    {
        $produk = Buku::findOrFail($id);

        return view('buku.detail', compact('produk'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|url',
            'nama_pengirim' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
        ]);

        // Menambahkan user_id yang berasal dari user yang login
        $validated['user_id'] = Auth::user()->id;

        // Membuat buku baru dengan data yang sudah tervalidasi
        Buku::create(attributes: $validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }


    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        // Memastikan user yang login adalah pemilik postingan
        if ($buku->user_id !== Auth::id()) {
            abort(403, 'Kamu tidak punya akses untuk menghapus postingan ini.');
        }

        // Hapus postingan
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Postingan berhasil dihapus.');
    }
}