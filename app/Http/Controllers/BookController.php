<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function __construct() {
        $this->authorizeResource(Book::class);
    }

    public function index(Request $request) {
        $books = Book::query()->latest()
            ->when(isset($request->search), function ($query) use ($request) {
                $query->where("title", "like", "%" . $request->search . "%");
            })
            ->paginate(5);
        return view("books.index", [
            "books" => $books
        ]);
    }

    public function create() {
        return view("books.create");
    }

    public function store(Request $request)
    {
        $book = Book::create([
            ...$request->validate([
                "title" => "required|min:1|max:255|unique:books,title",
                "author" => "required|min:1|max:255",
                "description" => "required|min:1",
                "published_date" => "required|date"
            ]),
            "user_id" => auth()->user()->id
        ]);
        return redirect()->route("books.show", [
            "book" => $book
        ]);
    }

    public function show(Book $book)
    {
        return view("books.show", [
            "book" => $book
        ]);
    }

    public function edit(Book $book)
    {
        return view("books.edit", [
            "book" => $book
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->validate([
            "title" => "required|min:1|max:255",
            "author" => "required|min:1|max:255",
            "description" => "required|min:1",
            "published_date" => "required|date"
        ]));

        return redirect()->route("books.show", [
            "book" => $book
        ]);
    }

    public function destroy(Book $book) {
        $book->delete();
        return redirect()->route("books.index");
    }
}
