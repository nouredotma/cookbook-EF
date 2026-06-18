<!DOCTYPE html>
<html>
<head>
    <title>Edit Recipe</title>
    @include('layouts.style')
</head>
<body>
    <div class="container">
        <h1>Edit Recipe</h1>

        <form action="/recipes/{{ $recipe->id }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name', $recipe->name) }}">
                @error('name')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label>Preparation Time</label>
                <input type="number" name="preparation_time" value="{{ old('preparation_time', $recipe->preparation_time) }}"> minutes
                @error('preparation_time')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label>Difficulty</label>
                <select name="difficulty">
                    <option value="">Choose</option>
                    <option value="Easy" {{ old('difficulty', $recipe->difficulty) == 'Easy' ? 'selected' : '' }}>Easy</option>
                    <option value="Medium" {{ old('difficulty', $recipe->difficulty) == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Hard" {{ old('difficulty', $recipe->difficulty) == 'Hard' ? 'selected' : '' }}>Hard</option>
                </select>
                @error('difficulty')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label>Description</label>
                <textarea name="description">{{ old('description', $recipe->description) }}</textarea>
                @error('description')<p class="error">{{ $message }}</p>@enderror
            </div>

            <button type="submit" class="btn">Update</button>
        </form>
    </div>
</body>
</html>
