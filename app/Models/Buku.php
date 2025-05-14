<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';

    protected $fillable = [
        'judul', 'penulis', 'deskripsi','nama_pengirim', 'gambar', 'telepon', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
