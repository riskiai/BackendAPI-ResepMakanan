<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // protected $fillable = ['judul', 'description', 'image'];
    protected $guarded = ['id'];

    /* Menampilkan Data User Yang Memiliki Beberapa Article */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

