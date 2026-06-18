<!DOCTYPE html>
<html>
<head>
    <title>Add Recipe</title>
    @include('layouts.style')
</head>
<body>
    <div class="container">
        <h1>Add Recipe</h1>

        <form action="/recipes" method="POST" class="page-form">
            @csrf

            <div>
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label>Preparation Time</label>
                <input type="number" name="preparation_time" value="{{ old('preparation_time') }}"> minutes
                @error('preparation_time')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label>Difficulty</label>
                <select name="difficulty">
                    <option value="">Choose</option>
                    <option value="Easy" {{ old('difficulty') == 'Easy' ? 'selected' : '' }}>Easy</option>
                    <option value="Medium" {{ old('difficulty') == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Hard" {{ old('difficulty') == 'Hard' ? 'selected' : '' }}>Hard</option>
                </select>
                @error('difficulty')<p class="error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label>Description</label>
                <textarea name="description">{{ old('description') }}</textarea>
                @error('description')<p class="error">{{ $message }}</p>@enderror
            </div>

            <button type="submit" class="recipe-btn">Save</button>
        </form>
    </div>
</body>
</html>
