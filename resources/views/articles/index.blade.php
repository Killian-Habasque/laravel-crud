<html>

<body>
    <h1>Tous les articles</h1>
    @foreach($articles as $article)
    <fieldset>
        <h2>{{ $article->title }}</h2>
        <p>{{ $article->content }}</p>
        <div style="display: flex; gap: 20px;">
            <a href="{{ route('articles.show', $article->id) }}">Voir</a>

            <a href="{{ route('articles.edit', $article->id) }}">Modifier</a>
            <form action="{{ route('articles.destroy', $article) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    </fieldset>
    @endforeach

</body>

</html>