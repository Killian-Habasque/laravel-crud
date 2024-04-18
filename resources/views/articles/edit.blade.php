<html>

<body>
    <div class="card-header">Modifier un article</div>

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf

        @method('PUT') 
        
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $article->title }}" required>
        </div>

        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ $article->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $article->author }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>

    </form>
</body>

</html>