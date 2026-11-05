<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BorrowingController extends Controller
{
    // ADMIN: View all records
    public function index()
    {
        $borrowings = Borrowing::with(['book', 'user'])->latest()->paginate(10);
        return view('borrowings.index', compact('borrowings'));
    }

    // ADMIN: Mark a book as returned
    public function returnBook(Borrowing $borrowing)
    {
        $borrowing->update(['returned_at' => now()]);
        $borrowing->book->update(['status' => 'Available']);
        return redirect()->route('borrowings.index')->with('success', 'Book returned successfully!');
    }

    // USER: Show available books
    public function borrowPage()
    {
        $books = Book::where('status', 'Available')->latest()->get();
        return view('user.borrow-books', compact('books'));
    }

    // USER: Borrow a book
    public function store(Book $book)
    {
        if ($book->status === 'Borrowed') {
            return back()->withErrors(['error' => 'This book is already borrowed!']);
        }

        Borrowing::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
            'due_date' => now()->addDays(7), // Adds exactly 7 days
        ]);

        $book->update(['status' => 'Borrowed']);
        return redirect()->route('user.records')->with('success', 'Book borrowed successfully!');
    }

    // USER: View personal history
    public function myRecords()
    {
        $borrowings = Borrowing::with('book')->where('user_id', Auth::id())->latest()->get();
        return view('user.my-records', compact('borrowings'));
    }
}