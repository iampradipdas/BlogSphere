<x-layouts.app title="Edit Article">
    <h2 class="text-xl font-semibold mb-4">Edit Article</h2>

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title</label>
        <input type="text" name="title" class="border p-2 w-full" value="{{ old('title', $article->title) }}" required>

        <label>Text</label>
        <textarea name="text" class="border p-2 w-full">{{ old('text', $article->text) }}</textarea>

        <label>Author</label>
        <input type="text" name="auther" class="border p-2 w-full" value="{{ old('auther', $article->auther) }}" required>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4">Update</button>
    </form>
</x-layouts.app>
