@extends("layout.main")

@push("resources")
    @vite(["resources/js/books/show.js"])
@endpush

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
                    method="GET"
                    action="{{ route("books.destroy", ["book" => $book]) }}"
                >
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

        <section>
            <h2 class="text-xl mb-4">Reviews</h2>
            @auth
                <form
                    method="POST"
                    action="{{ route("books.reviews.store", [ "book" => $book ]) }}"
                    class="w-full max-w-2xl gap-4"
                >
                    @csrf
                    @method("POST")

                    <div class="flex items-center mb-4">
                        <label for="rating" class="me-3">Rating:</label>
                        <input type="number" id="rating" name="rating" value="0" hidden>
                        <div class="flex" id="stars">
                            @for ($i = 0; $i < 5; $i++)
                                <div class="relative w-10 h-10" id="star-{{ $i }}">
                                    <img
                                        src="/icons/stars/star.svg"
                                        alt="star"
                                        class="w-full h-full"
                                        style="filter: invert(100%)"
                                    >
                                    <img
                                        src="/icons/stars/star.svg"
                                        alt="star"
                                        class="w-full h-full absolute top-0 left-0"
                                        style="filter: invert(100%)"
                                    >
                                    <div class="absolute top-0 left-0 w-full h-full flex">
                                        <button
                                            type="button"
                                            id="first-{{$i}}"
                                            class="w-full h-full"
                                        ></button>
                                        <button
                                            type="button"
                                            id="second-{{$i}}"
                                            class="w-full h-full"
                                        ></button>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="flex">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" id="title" name="title" class="input w-full">
                    </div>
                </form>
            @endauth
        </section>
    @endif
@endsection
