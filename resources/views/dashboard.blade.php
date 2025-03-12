<x-layouts.app title="Dashboard">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl bg-gradient-to-br  p-6">
        <!-- Top Navbar -->
        <header class="bg-white shadow p-4 flex justify-between items-center rounded-lg">
            <h2 class="text-lg font-semibold text-indigo-700">Dashboard</h2>
            <div>
                <span class="text-gray-700">Admin</span>
                <button class="ml-4 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow-md transition">Logout</button>
            </div>
        </header>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-indigo-500">
                <h3 class="text-lg font-semibold text-gray-700">Total Posts</h3>
                <p class="text-3xl font-bold text-indigo-600">120</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
                <h3 class="text-lg font-semibold text-gray-700">Active Users</h3>
                <p class="text-3xl font-bold text-green-600">35</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
                <h3 class="text-lg font-semibold text-gray-700">Comments</h3>
                <p class="text-3xl font-bold text-yellow-600">450</p>
            </div>
        </div>
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Recent Posts</h3>
            <ul>
                <li class="border-b py-2 text-gray-600 hover:text-indigo-600 transition">How to Write Engaging Blog Content</li>
                <li class="border-b py-2 text-gray-600 hover:text-indigo-600 transition">Understanding SEO for Bloggers</li>
                <li class="py-2 text-gray-600 hover:text-indigo-600 transition">10 Tips for Writing Better Articles</li>
            </ul>
        </div>
    </div>
</x-layouts.app>
