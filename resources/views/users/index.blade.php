<x-layouts.app title="Users">
    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-semibold">Users List</h1>
        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-3 py-2 rounded">Create User</a>
    </div>
    @if (session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
    @endif
    <table class="w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">ID</th>
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Roles</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-t">
                    <td class="p-2">{{ $user->id }}</td>
                    <td class="p-2">{{ $user->name }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ $user->roles->pluck('name')->join(', ') }}</td>
                    <td class="p-2 flex space-x-2">
                        <a href="{{ route('users.edit', $user->id) }}"
                            class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.app>
