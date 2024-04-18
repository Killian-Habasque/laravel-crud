<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('App') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::check())
            <div class="mb-4">
                <a href="{{ route('articles.create') }}" class="bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Créer un article
                </a>
            </div>
            @endif

            @foreach($articles as $article)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ $article->title }}</h2>
                <p class="text-gray-600">{{ $article->content }}</p>
                <p class="text-gray-700 mt-2"><strong>Author :</strong> {{ $article->user->name }}</p>

                @isset($article->category->name)
                <p class="text-gray-700 mt-2"><strong>Category :</strong> {{ $article->category->name }}</p>
                @endisset
                <div class="mt-4 flex gap-4">
                    <a href="{{ route('articles.show', $article->id) }}" class="bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voir</a>

                    @if(Auth::check())
                    <a href="{{ route('articles.edit', $article->id) }}" class="bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier</a>
                    <form action="{{ route('articles.destroy', $article) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>