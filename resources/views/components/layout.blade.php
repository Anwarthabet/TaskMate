<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Mata</title>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body class="bg-gray-50 font-sans h-screen flex flex-col">

    <!-- Navigation -->
    <nav class="flex justify-between items-center p-6 bg-gradient-to-r from-sky-600 to-indigo-600 text-white shadow-lg">
        <div class="text-2xl font-extrabold tracking-tight">
            Task Mata
        </div>
        <div class="space-x-6 text-lg">
            @auth
                <a href="#" class="hover:text-gray-200 transition duration-300">Dashboard</a>
            @endauth
            @guest
                <a href="#" class="hover:text-gray-200 transition duration-300">Sign Up</a>
                <a href="#" class="hover:text-gray-200 transition duration-300">Log In</a>
            @endguest
        </div>
    </nav>

        <div class="flex-grow p-6">
            
            {{ $slot }}
    
        </div>

    <!-- Footer -->
    <footer class="p-6 bg-gray-100 text-center text-gray-600">
        &copy; 2025 Task Mata. All rights reserved.
    </footer>

</body>

</html>
