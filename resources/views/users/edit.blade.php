<x-layouts.app title="Edit User">
    <h1 class="text-xl font-semibold mb-4">Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Name</label>
            <input type="text" name="name" class="border p-2 w-full rounded" value="{{ old('name', $user->name) }}">
            @error('name') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" class="border p-2 w-full rounded" value="{{ old('email', $user->email) }}">
            @error('email') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Assign Roles</label>
            @foreach ($roles as $role)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                           class="rounded" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                    <span>{{ $role->name }}</span>
                </label>
            @endforeach
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update User</button>
    </form>
</x-layouts.app>
