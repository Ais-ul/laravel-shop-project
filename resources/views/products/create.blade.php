<!DOCTYPE html>
<html>
<head>
    <title>Adauga produs</title>
</head>
<body>

    <h1>Adauga produs</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label>Categorie:</label>
        <br>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Nume:</label>
        <br>
        <input type="text" name="name">
        <br><br>

        <label>Slug:</label>
        <br>
        <input type="text" name="slug">
        <br><br>

        <label>Descriere:</label>
        <br>
        <textarea name="description" rows="5" cols="40"></textarea>
        <br><br>

        <label>Pret:</label>
        <br>
        <input type="number" name="price" step="0.01">
        <br><br>

        <label>Stoc:</label>
        <br>
        <input type="number" name="stock">
        <br><br>

        <label>Imagine:</label>
        <br>
        <input type="text" name="image">
        <br><br>

        <button type="submit">
            Salveaza
        </button>
    </form>

    <br>

    <a href="{{ route('products.index') }}">
        Inapoi
    </a>

</body>
</html>
