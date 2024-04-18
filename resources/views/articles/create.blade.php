<html>

<body>
    <div class="card-header">Créer un nouvel article</div>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf {{-- Protection contre les attaques CSRF --}}

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>

    </form>
</body>

</html>