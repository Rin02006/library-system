<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. THE 20 CATEGORIES
        $categories = [
            'Fiction',
            'Non-Fiction',
            'Science',
            'Technology',
            'History',
            'Mathematics',
            'Literature',
            'Business & Economics',
            'Arts & Music',
            'Philosophy',
            'Psychology',
            'Health & Medicine',
            'Engineering',
            'Law & Politics',
            'Education',
            'Travel & Geography',
            'Cooking & Food',
            'Sports & Recreation',
            'Religion & Spirituality',
            'Children\'s Books'
        ];

        // Create the categories safely
        foreach ($categories as $catName) {
            Category::firstOrCreate(['name' => $catName]);
        }

        // 2. SAMPLE BOOKS (Optional, but makes the dashboard look nice)
        $fiction = Category::where('name', 'Fiction')->first();
        $science = Category::where('name', 'Science')->first();
        $tech = Category::where('name', 'Technology')->first();
        $history = Category::where('name', 'History')->first();

        // Science Books
        Book::firstOrCreate(['isbn' => '978-0553380163'], ['title' => 'A Brief History of Time', 'author' => 'Stephen Hawking', 'category_id' => $science->id, 'status' => 'Available']);
        Book::firstOrCreate(['isbn' => '978-0345539434'], ['title' => 'Cosmos', 'author' => 'Carl Sagan', 'category_id' => $science->id, 'status' => 'Available']);
        Book::firstOrCreate(['isbn' => '978-0198788607'], ['title' => 'The Selfish Gene', 'author' => 'Richard Dawkins', 'category_id' => $science->id, 'status' => 'Available']);

        // Fiction Books
        Book::firstOrCreate(['isbn' => '978-0747532743'], ['title' => 'Harry Potter', 'author' => 'J.K. Rowling', 'category_id' => $fiction->id, 'status' => 'Available']);
        Book::firstOrCreate(['isbn' => '978-0547928227'], ['title' => 'The Hobbit', 'author' => 'J.R.R. Tolkien', 'category_id' => $fiction->id, 'status' => 'Available']);
        Book::firstOrCreate(['isbn' => '978-0451524935'], ['title' => '1984', 'author' => 'George Orwell', 'category_id' => $fiction->id, 'status' => 'Available']);

        // Tech Books
        Book::firstOrCreate(['isbn' => '978-0132350884'], ['title' => 'Clean Code', 'author' => 'Robert C. Martin', 'category_id' => $tech->id, 'status' => 'Available']);
        Book::firstOrCreate(['isbn' => '978-0201616224'], ['title' => 'The Pragmatic Programmer', 'author' => 'Andrew Hunt', 'category_id' => $tech->id, 'status' => 'Available']);

        // History Books
        Book::firstOrCreate(['isbn' => '978-0062316097'], ['title' => 'Sapiens', 'author' => 'Yuval Noah Harari', 'category_id' => $history->id, 'status' => 'Available']);
    }
}