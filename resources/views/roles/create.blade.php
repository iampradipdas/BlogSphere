<x-layouts.app title="Roles">
    <div>
        <div class="flex justify-between">
            <div>
                <h2>Roles / Create</h2>
            </div>
            <div>
                <a href="{{ route('roles.index') }}"
                    class="bg-gray-400 text-sm rounded-sm text-white px-3 py-2 font-semibold">Back</a>
            </div>
        </div>
        <div class="p-6 mt-2 text-gray-900 bg-gray-50">
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div>
                    <label for="name" class="text-lg font-medium">Name</label>
                    <div class="my-3">
                        <input value="{{ old('name') }}" name="name" placeholder="Enter Name" type="text"
                            class="border-gray-950 shadow-sm w-1/2 rounded-lg p-2">
                        @error('name')
                            <p class="text-red-400 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <label class="text-lg font-medium">Permissions</label>
                    <div class="my-3 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                        @foreach ($permissions as $permission)
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}"
                                    class="rounded">
                                <label for="perm_{{ $permission->id }}" class="text-gray-700">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('permissions')
                        <p class="text-red-400 font-medium">{{ $message }}</p>
                    @enderror

                    <button class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 mt-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
