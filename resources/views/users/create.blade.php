<x-layouts.app title="Create User">
    <h1 class="text-xl font-semibold mb-4">Create New User</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold">Name</label>
            <input type="text" name="name" class="border p-2 w-full rounded" value="{{ old('name') }}">
            @error('name') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" class="border p-2 w-full rounded" value="{{ old('email') }}">
            @error('email') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Password</label>
            <input type="password" name="password" class="border p-2 w-full rounded">
            @error('password') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Assign Roles</label>
            @foreach ($roles as $role)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="rounded">
                    <span>{{ $role->name }}</span>
                </label>
            @endforeach
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</button>
    </form>
</x-layouts.app>
