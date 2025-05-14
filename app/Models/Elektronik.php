<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elektronik extends Model
{
    use HasFactory;
    protected $table = 'elektroniks';

    protected $fillable = [
        'judul', 'deskripsi','nama_pengirim', 'gambar', 'telepon', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}