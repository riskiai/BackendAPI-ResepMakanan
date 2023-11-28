<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recep extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_resep', 'porsi', 'waktu', 'deskripsi', 'author', 'bahan', 'langkah', 'image'
    ];

    /**
     * Get the writer that owns the Recep
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }
}
