<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>

<body>
    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="body">Body</label>
            <textarea name="body" id="body" rows="5" cols="30" class="border rounded p-2 w-full">{{ old('body') }}</textarea>
        </div>

        <div>
            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>
        <div>
            <label>Categories</label><br>

            @foreach($categories as $category)
            <label>
                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                    {{ (is_array(old('categories')) && in_array($category->id, old('categories'))) ? 'checked' : '' }}>
                {{ $category->name }}
            </label><br>
            @endforeach

            @error('categories')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Create</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</body>

</html>