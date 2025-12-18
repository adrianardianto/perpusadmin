<?php

namespace App\Http\Controllers;

use App\Models\BookCondition;
use App\Models\Book;
use Illuminate\Http\Request;

class BookConditionController extends Controller
{
    public function index()
    {
        $conditions = BookCondition::with('book')->latest()->get();
        return view('book_conditions.index', compact('conditions'));
    }

    public function create()
    {
        $books = Book::all();
        return view('book_conditions.create', compact('books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'condition' => 'required|in:baik,rusak ringan,rusak berat,hilang',
            'description' => 'required|string',
        ]);

        BookCondition::create($validated);

        return redirect()->route('book-conditions.index')->with('success', 'Book condition recorded successfully!');
    }

    public function edit(BookCondition $bookCondition)
    {
        $books = Book::all();
        return view('book_conditions.edit', compact('bookCondition', 'books'));
    }

    public function update(Request $request, BookCondition $bookCondition)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'condition' => 'required|in:baik,rusak ringan,rusak berat,hilang',
            'description' => 'required|string',
        ]);

        $bookCondition->update($validated);

        return redirect()->route('book-conditions.index')->with('success', 'Book condition updated successfully!');
    }

    public function destroy(BookCondition $bookCondition)
    {
        $bookCondition->delete();
        return redirect()->route('book-conditions.index')->with('success', 'Book condition deleted successfully!');
    }
}
