<x-layouts.app title="Create Article">
    <h2 class="text-xl font-semibold mb-4">Create Article</h2>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <label>Title</label>
        <input type="text" name="title" class="border p-2 w-full" required>
        
        <label>Text</label>
        <textarea name="text" class="border p-2 w-full"></textarea>

        <label>Author</label>
        <input type="text" name="auther" class="border p-2 w-full" required>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-4">Save</button>
    </form>
</x-layouts.app>
