<!DOCTYPE html>
<html>
<head>
    
    <title>Categorii</title>
    
</head>
<body>

    <h1>Lista Categorii</h1>

    <a href="{{ route('categories.create') }}">
        Adaugă categorie
    </a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nume</th>
            <th>Slug</th>
            <th>Acțiuni</th>
        </tr>

        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>

                <td>
                    
                    <a style="margin-right:10px;" href="{{ route('categories.show', $category->id) }}">
                        Vezi
                    </a>

                    <a style="margin-right:10px;" href="{{ route('categories.edit', $category->id) }}">
                        Edit
                    </a>

                    <form action="{{ route('categories.destroy', $category->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button style="margin-right:10px;" type="submit">
                            Șterge
                        </button>
                    </form>
               
                </td>
            </tr>
        @endforeach

    </table>

</body>
</html>