<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BlogSphere</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col justify-center items-center text-center">
        <!-- Hero Section -->
        <div class="max-w-3xl mx-auto p-6">
            <h1 class="text-5xl font-bold text-gray-900">Welcome to <span class="text-blue-600">BlogSphere</span></h1>
            <p class="mt-4 text-gray-700 text-lg">A place where ideas come to life. Share your thoughts, explore stories, and connect with others.</p>
            <div class="mt-6">
                <a href="/register" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700">Get Started</a>
                <a href="/login" class="ml-4 border border-gray-600 text-gray-900 px-6 py-3 rounded-lg hover:bg-gray-200">Login</a>
            </div>
        </div>

        <!-- Features Section -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800">Easy Publishing</h3>
                <p class="text-gray-600 mt-2">Create and manage your posts effortlessly with our intuitive editor.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800">Engage with Readers</h3>
                <p class="text-gray-600 mt-2">Interact with your audience through comments and discussions.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800">Stay Organized</h3>
                <p class="text-gray-600 mt-2">Categorize and manage your content with ease.</p>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-12 text-gray-600">
            &copy; 2025 BlogSphere. All rights reserved.
        </footer>
    </div>
</body>

</html>