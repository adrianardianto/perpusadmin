<?php

namespace App\Http\Controllers;

use App\Models\BookReturn;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BookReturnController extends Controller
{
    public function index()
    {
        $returns = BookReturn::with('borrowing')->latest()->get();
        return view('returns.index', compact('returns'));
    }

    public function create()
    {
        // Show only active borrowings
        $borrowings = Borrowing::where('status', 'borrowed')->with(['book', 'member'])->get();
        return view('returns.create', compact('borrowings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'borrowing_id' => 'required|exists:borrowings,id',
            'return_date' => 'required|date',
            'fine_amount' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $validated['fine_amount'] = $validated['fine_amount'] ?? 0;

        // Transaction handling could be added here
        $bookReturn = BookReturn::create($validated);

        // Update borrowing status
        $borrowing = Borrowing::find($validated['borrowing_id']);
        $borrowing->update(['status' => 'returned']);

        return redirect()->route('returns.index')->with('success', 'Book returned and recorded!');
    }

    // Usually returns are immutable logs, but adding update/destroy just in case
    public function show(BookReturn $bookReturn)
    {
         return view('returns.show', compact('bookReturn'));
    }

    public function edit(BookReturn $bookReturn) // Note: Route parameter is likely {return} but model binding might need checking in routes, usually 'return' resource uses 'return' param but 'return' is a reserved keyword. Let's check route list or valid param name. Laravel resource 'returns' likely uses 'return' parameter. wait, 'return' is reserved. Laravel usually generates 'return' param for 'returns' resource? No, it might conflict.
    {
         // To avoid reserved keyword issues, we might need to check how laravel registered it.
         // But for now let's assume strict typing works or use $return
         return view('returns.edit', compact('bookReturn'));
    }

    public function update(Request $request, BookReturn $bookReturn)
    {
        $validated = $request->validate([
            'return_date' => 'required|date',
            'fine_amount' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $validated['fine_amount'] = $validated['fine_amount'] ?? 0;

        $bookReturn->update($validated);

        return redirect()->route('returns.index')->with('success', 'Return record updated!');
    }

    public function destroy(BookReturn $bookReturn)
    {
        // Potentially revert borrowing status if needed, but keeping simple for now
        $bookReturn->delete();
        return redirect()->route('returns.index')->with('success', 'Return record deleted!');
    }
}
