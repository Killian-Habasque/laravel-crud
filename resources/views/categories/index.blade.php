<html>

<body>
    <h1>Toutes les categories</h1>
    <fieldset>
        <a href="{{ route('categories.create') }}">Créer une catégorie</a>
    </fieldset>
    @foreach($categories as $category)
    <fieldset>
        <h2>{{ $category->name }}</h2>
        <div style="display: flex; gap: 20px;">
            <a href="{{ route('categories.edit', $category->id) }}">Modifier</a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    </fieldset>
    @endforeach

</body>

</html>