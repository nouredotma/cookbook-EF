<!DOCTYPE html>
<html>
<head>
    <title>Recipe List</title>
    @include('layouts.style')
</head>
<body>
    <div class="container">
        <h1>Recipe List</h1>

        @if(session('success'))
            <p class="success" id="success-message">{{ session('success') }}</p>
        @endif

        <p><a href="/recipes/create" class="btn">Add Recipe</a></p>

        <table>
            <tr>
                <th>Name</th>
                <th>Preparation Time</th>
                <th>Difficulty</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            @foreach($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->name }}</td>
                    <td>{{ $recipe->preparation_time }} min</td>
                    <td>{{ $recipe->difficulty }}</td>
                    <td>{{ $recipe->description }}</td>
                    <td>
                        <div class="actions">
                            <a href="/recipes/{{ $recipe->id }}/edit" class="btn">Edit</a>
                            <form action="/recipes/{{ $recipe->id }}" method="POST" class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <script>
        setTimeout(function () {
            var msg = document.getElementById('success-message');
            if (msg) msg.style.display = 'none';
        }, 3000);
    </script>
</body>
</html>
