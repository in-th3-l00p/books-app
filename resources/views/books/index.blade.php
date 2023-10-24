@extends("layout.main")

@section("content")
    @auth
    @endauth

    <section>
        <ul class="list-none flex flex-col gap-8">
            @forelse ($books as $book)
                <li>
                    <a
                        href="{{ route("books.show", ["book" => $book]) }}"
                        class="p-8 md:mx-20 lg:mx-32
                            grid grid-cols-2
                            rounded-md border-2 shadow-md
                            hover:bg-slate-100 dark:hover:bg-zinc-900 "
                    >
                        <span>
                            <h2 class="text-xl">{{ $book->title }} <span class="font-light">~ {{ $book->author }}</span></h2>
                            <p class="max-w-">{{ $book->description }}</p>
                        </span>
                        <span class="text-right">
                            <p class="font-light">{{ date("Y-m-d h:i:s A", strtotime($book->published_date)) }}</p>
                        </span>
                    </a>
                </li>
            @empty
                <h2 class="text-center text-3xl">No books available</h2>
            @endforelse
        </ul>
        {{ $books->links() }}
    </section>
@endsection
