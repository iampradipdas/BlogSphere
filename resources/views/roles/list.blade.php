<x-layouts.app title="Roles">
    <div class="p-6">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-semibold">Roles</h2>
            <a href="{{ route('roles.create') }}"
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
                        <th class="py-2 px-4 border-b">Role Name</th>
                        <th class="py-2 px-4 border-b">Permissions</th>
                        <th class="py-2 px-4 border-b">Created At</th>
                        <th class="py-2 px-4 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $role->id }}</td>
                            <td class="py-2 px-4">{{ $role->name }}</td>
                            <td class="py-2 px-4">
                                @if ($role->permissions->isNotEmpty())
                                    <span class="text-sm text-gray-700">
                                        {{ implode(', ', $role->permissions->pluck('name')->toArray()) }}
                                    </span>
                                @else
                                    <span class="text-gray-500">No Permissions</span>
                                @endif
                            </td>
                            <td class="py-2 px-4">{{ $role->created_at->format('Y-m-d H:i') }}</td>
                            <td class="py-2 px-4 flex justify-center space-x-2">
                                <a href="{{ route('roles.edit', $role->id) }}" class="text-blue-500">Edit</a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                {{ $roles->links() }} <!-- Pagination Links -->
            </div>
        </div>
    </div>
</x-layouts.app>
