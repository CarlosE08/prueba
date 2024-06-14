<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookWriter extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id', 'writer_id',
    ];

    // Definir la relación con el modelo Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Definir la relación con el modelo Writer
    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }
}
