<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Member;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['member', 'book'])->latest()->get();
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $members = Member::where('status', 'active')->get();
        $books = Book::all(); // Should check availability in real app
        return view('borrowings.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after:borrow_date',
        ]);

        // Default status is borrowed
        $validated['status'] = 'borrowed';

        Borrowing::create($validated);

        return redirect()->route('borrowings.index')->with('success', 'Book borrowed successfully!');
    }

    public function edit(Borrowing $borrowing)
    {
        $members = Member::all();
        $books = Book::all();
        return view('borrowings.edit', compact('borrowing', 'members', 'books'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after:borrow_date',
            'status' => 'required|in:borrowed,returned',
        ]);

        $borrowing->update($validated);

        return redirect()->route('borrowings.index')->with('success', 'Borrowing updated!');
    }

    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();
        return redirect()->route('borrowings.index')->with('success', 'Borrowing record deleted!');
    }
}
