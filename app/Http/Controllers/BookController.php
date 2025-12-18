<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // Cek apakah ada parameter pencarian
        $query = Book::with('category');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
        }

        // Ambil semua data buku (yang sudah difilter kalau ada pencarian)
        $books = $query->orderBy('created_at', 'desc')->get();
        $categories = Category::all();

        // Kirim data ke view
        return view('books.index', compact('books', 'categories'));
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data buku
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Menyimpan buku baru ke database
        Book::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function api()
    {
        // Mengembalikan data buku dalam format JSON
        return response()->json(Book::all());
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $book->update($validatedData);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        // Menghapus buku dari database
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
