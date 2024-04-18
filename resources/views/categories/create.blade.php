<html>

<body>
    <div class="card-header">Créer une nouvelle catégorie</div>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>

    </form>
</body>

</html>