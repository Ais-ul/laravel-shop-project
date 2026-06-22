<!DOCTYPE html>
<html>
<head>
    <title>Adaugă categorie</title>
</head>
<body>

    <h1>Adaugă categorie</h1>

    <form action="{{ route('categories.store') }}" method="POST">

        @csrf

        <label>Nume:</label>
        <br>
        <input type="text" name="name">
        <br><br>

        <label>Slug:</label>
        <br>
        <input type="text" name="slug">
        <br><br>

        <button type="submit">
            Salvează
        </button>

    </form>

    <br>

    <a href="{{ route('categories.index') }}">
        Înapoi
    </a>

</body>
</html>