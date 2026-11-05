<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function dashboard() {
        // 1. Security Check: Force OTP verification
        if (auth()->user()->otp_code !== null) {
            return redirect()->route('otp.verify.form');
        }

        // 2. Role Check: Send normal Users to their own dashboard
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('user.dashboard');
        }

        // 3. Admin Dashboard Data
        $totalBooks = Book::count();
        $available = Book::where('status', 'Available')->count();
        $borrowed = Book::where('status', 'Borrowed')->count();

        // Fetch Recent Activity (Last 5 borrows)
        $recentActivity = Borrowing::with(['user', 'book'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('totalBooks', 'available', 'borrowed', 'recentActivity'));
    }

    public function index(Request $request) {
        $search = $request->input('search');
        $categoryId = $request->input('category_id'); 

        $books = Book::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                         ->orWhere('author', 'like', "%{$search}%");
        })
        ->when($categoryId, function ($query, $categoryId) {
            return $query->where('category_id', $categoryId); 
        })
        ->paginate(10);

        $categories = Category::all(); 

        return view('books.index', compact('books', 'search', 'categories', 'categoryId'));
    }

    public function create() {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        Book::create($request->only(['title', 'author', 'isbn', 'category_id']));
        
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function edit(Book $book) {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book) {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id,
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:Available,Borrowed'
        ]);
        
        $book->update($request->only(['title', 'author', 'isbn', 'category_id', 'status']));
        
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book) {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}