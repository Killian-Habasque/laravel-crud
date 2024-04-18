<html>

<body>
    <h1>Tous les articles</h1>

    @if(Auth::check())
    <fieldset>
        <a href="{{ route('articles.create') }}">Créer un article</a>
    </fieldset>
    @endif

    @foreach($articles as $article)
    <fieldset>
        <h2>{{ $article->title }}</h2>
        <p>{{ $article->content }}</p>
        <p><strong>Author :</strong> {{ $article->user->name }}</p>

        <a href="{{ route('articles.show', $article->id) }}">Voir</a>

        @isset($article->category->name)
        <p><strong>Category :</strong> {{ $article->category->name }}</p>
        @endisset

        @if(Auth::check())
        <div style="display: flex; gap: 20px;">

            <a href="{{ route('articles.edit', $article->id) }}">Modifier</a>
            <form action="{{ route('articles.destroy', $article) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
        @endif
    </fieldset>
    @endforeach

</body>

</html>