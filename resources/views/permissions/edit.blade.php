<x-layouts.app title="Permissions">
    <div>
        <div class="flex justify-between">
            <div>
                <h2>Permissions / Edit</h2>
            </div>
            <div>
                <a href="{{ route('permissions.index') }}"
                    class="bg-gray-400 text-sm rounded-sm text-white px-3 py-2 font-semibold">Back</a>
            </div>
        </div>
        <div class="p-6 mt-2 text-gray-900 bg-gray-50">
            <form action="{{ route('permissions.update', $permission->id) }}" method="post">
                @csrf
                <div>
                    <label for="" class="text-lg font-medium">Name</label>
                    <div class="my-3">
                        <input value="{{ old('name', $permission->name) }}" name="name" placeholder="Enter Name"
                            type="text" class="border-gray-950 shadow-sm w-1/2 rounded-lg p-2">
                        @error('name')
                            <p class="text-red-400 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
