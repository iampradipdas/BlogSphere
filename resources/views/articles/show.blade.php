<x-layouts.app title="Article Details">
    <h2 class="text-xl font-semibold">{{ $article->title }}</h2>
    <p class="text-gray-700">{{ $article->text }}</p>
    <p class="text-sm text-gray-500">Author: {{ $article->auther }}</p>
</x-layouts.app>
