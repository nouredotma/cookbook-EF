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
            <p class="success">{{ session('success') }}</p>
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
                    <td><a href="/recipes/{{ $recipe->id }}/edit" class="btn">Edit</a></td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
