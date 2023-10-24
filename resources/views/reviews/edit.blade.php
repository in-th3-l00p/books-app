@extends("layout.main")

@section("content")
    <section class="w-full mt-20 flex justify-center items-center">
        <form
            method="POST"
            action="{{ route("books.reviews.update", [
                "book" => $book,
                "review" => $review
            ]) }}"
            class="form"
        >
            @csrf
            @method("PUT")

            <h1 class="form-title">Edit review</h1>

            <x-rating-input
                value="{{ $review->rating }}"
                labelMargin="3"
            />

            @error("title")
                <p class="form-error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="title" class="form-label">Title:</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ $review->title }}"
                    @class(["input", "border-red-600" => $errors->has("email")])
                >
            </div>

            @error("message")
                <p class="form-error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="message" class="form-label">Message:</label>
                <textarea
                    type="text"
                    id="message"
                    name="message"
                    @class(["input", "border-red-600" => $errors->has("message")])
                >{{ $review->message }}</textarea>
            </div>

            <span class="flex justify-center">
                <button type="submit" class="btn block mx-auto">Add</button>
            </span>
        </form>
    </section>
@endsection
