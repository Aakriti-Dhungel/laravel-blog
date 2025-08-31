<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>

<body>
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
            @error('title')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
       
        <div>
            <label for="body">Body</label>
            <textarea name="body" id="body" rows="5" cols="30">{{ old('body', $post->body) }}</textarea>
            @error('body')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
            </select>
             @error('status')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Categories</label><br>
            @foreach($categories as $category)
            <label>
                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                    {{ (in_array($category->id, old('categories',$post->categories->pluck('id')->toArray()))) ? 'checked' : '' }}>
                {{ $category->name }}
            </label><br>
            @endforeach

            @error('categories')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Update</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</body>

</html>
