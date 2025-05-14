<?php

namespace App\Http\Controllers;

use App\Models\Pakaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PakaianController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Pakaian::query();

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        }

        $pakaians = $query->get();

        return view('pakaian.index', [
            'pakaians' => $pakaians,
            'search' => $search
        ]);
    }

    public function detail($id)
    {

        $produk = Pakaian::findOrFail(id: $id);

        return view('pakaian.detail', compact('produk'));
    }

    public function create() {
        return view('pakaian.create');
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
        Pakaian::create(attributes: $validated);

        return redirect()->route('pakaian.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $pakaian = Pakaian::findOrFail($id);

        // Memastikan user yang login adalah pemilik postingan
        // if ($pakaian->user_id !== Auth::id()) {
        //     abort(403, 'Kamu tidak punya akses untuk menghapus postingan ini.');
        // }

        // Hapus postingan
        $pakaian->delete();

        return redirect()->route('pakaian.index')->with('success', 'Postingan berhasil dihapus.');
    }
}