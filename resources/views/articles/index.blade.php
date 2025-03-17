<x-layouts.app title="Articles">
    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-semibold">Articles</h2>
        <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-3 py-2 rounded">Create Article</a>
    </div>

    @if (session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Author</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td class="border px-4 py-2">{{ $article->title }}</td>
                    <td class="border px-4 py-2">{{ $article->auther }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('articles.show', $article->id) }}" class="text-blue-600">View</a> |
                        <a href="{{ route('articles.edit', $article->id) }}" class="text-yellow-600">Edit</a> |
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600" onclick="return confirm('Are you sure?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $articles->links() }}
</x-layouts.app>
