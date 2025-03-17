<x-layouts.app title="Permissions">
    <div class="p-6">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-semibold">Permissions</h2>
            <a href="{{ route('permissions.create') }}"
                class="bg-gray-400 text-sm rounded-sm text-white px-3 py-2 font-semibold">
                Create
            </a>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg shadow">
            <x-message></x-message>

            <table class="min-w-full bg-white border border-gray-200 rounded-md">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Created At</th>
                        <th class="py-2 px-4 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $permission->id }}</td>
                            <td class="py-2 px-4">{{ $permission->name }}</td>
                            <td class="py-2 px-4">{{ $permission->created_at->format('d M, Y') }}</td>
                            <td class="py-2 px-4 flex justify-center space-x-2">
                                <a href="{{ route('permissions.edit', $permission->id) }}"
                                    class="text-blue-500">Edit</a>
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>
