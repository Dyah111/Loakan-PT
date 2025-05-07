<?php

namespace App\Http\Controllers;

use App\Models\Elektronik;
use App\Models\Furnitur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElektronikController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Elektronik::query();

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        }

        $elektroniks = $query->get();

        return view('elektronik.index', [
            'elektroniks' => $elektroniks,
            'search' => $search
        ]);
    }

    public function detail($id)
    {

        $produk = Elektronik::findOrFail(id: $id);

        return view('elektronik.detail', compact('produk'));
    }

    public function create() {
        return view('elektronik.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|url',
            'nama_pengirim' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
        ]);

        // Menambahkan user_id yang berasal dari user yang login
        $validated['user_id'] = Auth::user()->id;

        // Membuat furnitur baru dengan data yang sudah tervalidasi
        Elektronik::create(attributes: $validated);

        return redirect()->route('elektronik.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $elektronik = Elektronik::findOrFail($id);

        // Memastikan user yang login adalah pemilik postingan
        if ($elektronik->user_id !== Auth::id()) {
            abort(403, 'Kamu tidak punya akses untuk menghapus postingan ini.');
        }

        // Hapus postingan
        $elektronik->delete();

        return redirect()->route('elektronik.index')->with('success', 'Postingan berhasil dihapus.');
    }
}