<html>

<body>
    <h1>Tous les articles</h1>
    @foreach($articles as $article)
    <div class="article">
        <h2>{{ $article->title }}</h2>
        <p>{{ $article->content }}</p>
        <fieldset>
            <a href="{{ route('articles.show', $article->id) }}">Voir</a>
            <br>
            <a href="{{ route('articles.edit', $article->id) }}">Modifier</a>
            <br>
            <form action="{{ route('articles.destroy', $article) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </fieldset>

    </div>
    @endforeach

</body>

</html>