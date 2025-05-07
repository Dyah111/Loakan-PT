<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elektronik extends Model
{
    use HasFactory;
    protected $table = 'elektroniks';

    protected $fillable = [
        'judul', 'deskripsi', 'gambar', 'nama_pengirim', 'telepon', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}