<?php

namespace App\Http\Controllers;

use App\Models\MakeUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MakeUpController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = MakeUp::query();

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        }

        $make_ups = $query->get();

        return view('makeup.index', [
            'make_ups' => $make_ups,
            'search' => $search
        ]);
    }

    public function detail($id)
    {

        $produk = MakeUp::findOrFail(id: $id);

        return view('makeup.detail', compact('produk'));
    }

    public function create() {
        return view('makeup.create');
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
        MakeUp::create(attributes: $validated);

        return redirect()->route('makeup.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $makeup = MakeUp::findOrFail($id);

        // Memastikan user yang login adalah pemilik postingan
        if ($makeup->user_id !== Auth::id()) {
            abort(403, 'Kamu tidak punya akses untuk menghapus postingan ini.');
        }

        // Hapus postingan
        $makeup->delete();

        return redirect()->route('makeup.index')->with('success', 'Postingan berhasil dihapus.');
    }
}