@extends("layout.main")

@section("content")
    <section class="w-full mt-20 flex justify-center items-center">
        <form
            method="POST"
            action="{{ route("books.store") }}"
            class="form"
        >
            @csrf
            @method("POST")

            <h1 class="form-title">Add a book</h1>

            @error("title")
                <p class="form-error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="title" class="form-label">Title:</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    @class(["input", "border-red-600" => $errors->has("email")])
                >
            </div>

            @error("author")
            <p class="form-error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="author" class="form-label">Author:</label>
                <input
                    type="text"
                    id="author"
                    name="author"
                    @class(["input", "border-red-600" => $errors->has("email")])
                >
            </div>

            @error("description")
                <p class="form-error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="description" class="form-label">Description:</label>
                <textarea
                    type="text"
                    id="description"
                    name="description"
                    @class(["input", "border-red-600" => $errors->has("description")])
                ></textarea>
            </div>

            @error("published_date")
            <p class="form-error">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="published_date" class="form-label">Published date:</label>
                <input
                    type="datetime-local"
                    id="published_date"
                    name="published_date"
                    @class(["input", "border-red-600" => $errors->has("published_date")])
                    value="{{ now() }}"
                >
            </div>

            <span class="flex justify-center">
                <button type="submit" class="btn block mx-auto">Add</button>
            </span>
        </form>
    </section>
@endsection
