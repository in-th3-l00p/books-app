@extends("layout.main")


@section("content")
    <section class="border-b-2 pb-8 ps-4">
        <h1 class="text-3xl mb-3">{{ $book->title }}</h1>
        <h2 class="ms-8 text-2xl font-light mb-5 italic">~ {{ $book->author }}</h2>
        <p>{{ $book->description }}</p>
    </section>

    @if (auth()->user() && auth()->user()->id === $book->user_id)
        <section class="my-8 pb-8 border-b-2">
            <p class="mb-4 text-xl">Admin control:</p>
            <div class="flex flex-wrap gap-8">
                <a
                    href="{{ route("books.edit", ["book" => $book]) }}"
                    class="btn"
                    title="Update"
                >
                    <img
                        src="/icons/update.svg"
                        alt="update"
                        class="w-10 h-10"
                        style="filter: invert(100%)"
                    >
                </a>
                <form
                    method="POST"
                    action="{{ route("books.destroy", ["book" => $book]) }}"
                >
                    @csrf
                    @method("DELETE")
                    <button
                        type="submit"
                        class="btn"
                        title="Delete"
                    >
                        <img
                            src="/icons/delete.svg"
                            alt="delete"
                            class="w-10 h-10"
                            style="filter: invert(100%)"
                        >
                    </button>
                </form>
            </div>
        </section>
    @endif

    @auth
        <section>
            <h2 class="text-xl my-4">Write a review</h2>
            <form
                method="POST"
                action="{{ route("books.reviews.store", [ "book" => $book ]) }}"
                class="w-full max-w-2xl gap-4"
            >
                @csrf
                @method("POST")

                <x-rating-input />

                <div class="flex mb-4">
                    <label for="title" class="form-label">Title:</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        @class(["input w-full", "border-red-600" => $errors->has("title")])
                    >
                </div>
                @error("title")
                    <p class="form-error mb-4">{{ $message }}</p>
                @enderror

                <div class="mb-4">
                    <label for="message">Message:</label>
                    <textarea
                        id="message"
                        name="message"
                        @class(["input w-full mt-1", "border-red-600" => $errors->has("message")])
                    ></textarea>
                </div>
                @error("message")
                    <p class="form-error mb-8">{{ $message }}</p>
                @enderror

                <button
                    type="submit"
                    class="btn block mx-auto mb-4"
                >
                    Send
                </button>
            </form>
        </section>
    @endauth

    @if ($reviews->count() > 0)
        <section class="border-t-2">
            <h2 class="text-xl my-4">Reviews</h2>
            <ul class="list-none flex flex-col gap-8">
                @foreach ($reviews as $review)
                    <li class="px-8 py-4 rounded-md dark:hover:bg-zinc-900">
                        <span class="flex justify-between flex-wrap mb-4">
                            <h2 class="text-xl font-bold">{{ $review->title }}</h2>
                            <h3 class="font-light text-slate-300">
                                written by:
                                {{ \App\Models\User::find($review->user_id)->name }},
                                at:
                                {{ $review->created_at }}
                            </h3>
                        </span>
                        <x-rating-display
                            rating="{{ $review->rating }}"
                            class="mb-4"
                        />
                        <p class="ms-4">
                            {{ $review->message }}
                        </p>
                        @if ($review->user_id === auth()->user()->id)
                            <div class="flex gap-4 mt-4">
                                <a
                                    title="Update"
                                    href="{{ route("books.reviews.edit", [
                                        "book" => $book,
                                        "review" => $review
                                    ]) }}"
                                    class="btn"
                                >
                                    <img
                                        src="/icons/update.svg"
                                        alt="update"
                                        class="w-8 h-8"
                                        style="filter: invert(100%)"
                                    >
                                </a>
                                <form
                                    method="POST"
                                    action="{{ route("books.reviews.destroy", [
                                        "book" => $book,
                                        "review" => $review
                                    ]) }}"
                                >
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn" title="Delete">
                                        <img
                                            src="/icons/delete.svg"
                                            alt="delete"
                                            class="w-8 h-8"
                                            style="filter: invert(100%)"
                                        >
                                    </button>
                                </form>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
            {{ $reviews->links() }}
        </section>
    @endif
@endsection
