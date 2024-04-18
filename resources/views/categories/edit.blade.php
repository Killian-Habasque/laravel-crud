<html>

<body>
    <div class="card-header">Modifier une catégorie</div>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf

        @method('PUT') 
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>

    </form>
</body>

</html>