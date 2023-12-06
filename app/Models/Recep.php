<?php

namespace App\Models;

use App\Models\Recep;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recep extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'judul_resep', 'porsi', 'waktu', 'deskripsi', 'bahan_langkah', 'image', 'author'
    ];

    //create json mutator for data

    /**
     * Get the writer that owns the Recep
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    /**
     * Get all of the comments for the Recep
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'receps_id', 'id');
    }
}
