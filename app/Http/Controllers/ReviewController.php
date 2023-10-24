<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Book $book)
    {
        Review::create([
            ...$request->validate([
                "title" => "required|min:1|max:255",
                "message" => "required|min:1|max:2000",
                "rating" => "required|numeric|min:1|max:5"
            ]),
            "user_id" => auth()->user()->id,
            "book_id" => $book->id
        ]);
        return back();
    }

    public function edit(Book $book, Review $review) {
        return view("reviews.edit", [
            "book" => $book,
            "review" => $review
        ]);
    }

    public function update(Request $request, Book $book, Review $review) {
        $review->update($request->validate([
            "title" => "required|min:1|max:255",
            "message" => "required|min:1|max:2000",
            "rating" => "required|numeric|min:1|max:5"
        ]));
        return redirect()->route("books.show", ["book" => $book]);
    }

    public function destroy(Book $book, Review $review) {
        $review->delete();
        return back();
    }
}
