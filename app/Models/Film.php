<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'cover',
    ];

    /**
     * URL pública da capa, salva no disco "public" (storage/app/public).
     */
    protected function coverUrl(): Attribute
    {
        return Attribute::get(fn () => asset('storage/' . $this->cover));
    }
}
