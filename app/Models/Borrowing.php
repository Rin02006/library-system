<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'borrowed_at',
        'returned_at',
    ];

    // A borrowing record belongs to a book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // A borrowing record belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}