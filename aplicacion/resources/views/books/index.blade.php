<x-layouts.public>

    <ul class="space-y-6 mb-4">
        @foreach($books as $book)
            <li>
                <article class="bg-gray-800 rounded shadow-lg">
                    <img class="h-72 w-full object-cover object-center" src="{{ $book->cover_path }}" alt="">
                    <div class="px-6 py-2">
                        <h1 class="font-semibold text-xl mb-2">
                            <a href="{{ route('books.show', $book) }}">
                                {{ $book->title }}
                            </a>
                        </h1>

                        <div>
                            {{ $book->summary }}
                        </div>
                    </div>
                </article>
            </li>
        @endforeach
    </ul>

    <div>
        {{ $books->links() }}
    </div>

</x-layouts.public>
