<!DOCTYPE html>
<html>
<head>
    <title>Recipe List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('layouts.style')
</head>
<body>
    <div class="container">
        <h1>Recipe List</h1>

        @if(session('success'))
            <p class="success" id="success-message">{{ session('success') }}</p>
        @endif

        <form action="/recipes" method="GET" class="search-form">
            <div>
                <label>Search by name</label>
                <input type="text" name="search" value="{{ request('search') }}">
            </div>
            <div>
                <label>Difficulty</label>
                <select name="difficulty">
                    <option value="">All</option>
                    <option value="Easy" {{ request('difficulty') == 'Easy' ? 'selected' : '' }}>Easy</option>
                    <option value="Medium" {{ request('difficulty') == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Hard" {{ request('difficulty') == 'Hard' ? 'selected' : '' }}>Hard</option>
                </select>
            </div>
            <button type="submit" class="recipe-btn">Search</button>
            <a href="/recipes" class="recipe-btn">Reset</a>
        </form>

        <p><a href="/recipes/create" class="recipe-btn">Add Recipe</a></p>

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
                            <a href="/recipes/{{ $recipe->id }}/edit" class="recipe-btn">Edit</a>
                            <form action="/recipes/{{ $recipe->id }}" method="POST" class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="recipe-btn" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette recette?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $recipes->appends(request()->query())->links() }}
    </div>

    <script>
        setTimeout(function () {
            var msg = document.getElementById('success-message');
            if (msg) msg.style.display = 'none';
        }, 3000);
    </script>
</body>
</html>
