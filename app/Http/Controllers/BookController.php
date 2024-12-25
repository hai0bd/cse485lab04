<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function index()
    {
        $book = Book::orderBy('created_at', 'desc')->paginate(20);
        return view('books.index', compact('book'));
    }

    public function create()
    {
        $book = new Book;
        return view('books.create', compact('book'));
    }

    public function store(Request $request)
    {
//validate dữ liệu đầu vào
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer',
            'quantity' => 'required|integer',
        ]);
        //tạo sách mới
        Book::create($validated);
        return redirect()->route('books.index')
            ->with('success', 'Book created successfully!');
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
        ]);
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}