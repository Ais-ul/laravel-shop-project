<!DOCTYPE html>
<html>
<head>
    <title>Editează categorie</title>
</head>
<body>

    <h1>Editează categorie</h1>

    <form action="{{ route('categories.update', $category->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Nume:</label>
        <br>
        <input type="text"
               name="name"
               value="{{ $category->name }}">
        <br><br>

        <label>Slug:</label>
        <br>
        <input type="text"
               name="slug"
               value="{{ $category->slug }}">
        <br><br>

        <button type="submit">
            Actualizează
        </button>

    </form>

    <br>

    <a href="{{ route('categories.index') }}">
        Înapoi
    </a>

</body>
</html>