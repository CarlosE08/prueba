<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title', 'category_id', 'quantity', 'editorials_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function editorial()
    {
        return $this->belongsTo(Editorial::class, 'editorials_id');
    }

    public function writers()
    {
        return $this->belongsToMany(Writer::class, 'book_writer', 'book_id', 'writer_id');
    }
}
