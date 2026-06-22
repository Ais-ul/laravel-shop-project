<!DOCTYPE html>
<html>
<head>
    <title>Editeaza produs</title>
</head>
<body>

    <h1>Editeaza produs</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Categorie:</label>
        <br>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected($category->id == $product->category_id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Nume:</label>
        <br>
        <input type="text" name="name" value="{{ $product->name }}">
        <br><br>

        <label>Slug:</label>
        <br>
        <input type="text" name="slug" value="{{ $product->slug }}">
        <br><br>

        <label>Descriere:</label>
        <br>
        <textarea name="description" rows="5" cols="40">{{ $product->description }}</textarea>
        <br><br>

        <label>Pret:</label>
        <br>
        <input type="number" name="price" step="0.01" value="{{ $product->price }}">
        <br><br>

        <label>Stoc:</label>
        <br>
        <input type="number" name="stock" value="{{ $product->stock }}">
        <br><br>

        <label>Imagine:</label>
        <br>
        <input type="text" name="image" value="{{ $product->image }}">
        <br><br>

        <button type="submit">
            Actualizeaza
        </button>
    </form>

    <br>

    <a href="{{ route('products.index') }}">
        Inapoi
    </a>

</body>
</html>
