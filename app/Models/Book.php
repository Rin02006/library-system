<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // This is the fix! It allows these fields to be saved.
    protected $fillable = [
        'category_id',
        'title',
        'author',
        'isbn',
        'status',
    ];

    // Relationship to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}