<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lainnya extends Model
{
    use HasFactory;
    protected $table = 'lainnyas';

    protected $fillable = [
        'judul', 
        'deskripsi', 
        'gambar', 
        'nama_pengirim', 
        'telepon', 
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}