<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';

    protected $fillable = [
        'judul', 'penulis', 'deskripsi', 'gambar', 'nama_pengirim', 'telepon', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
