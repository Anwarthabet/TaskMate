<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Mata</title>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body class="bg-gray-50 font-sans  from-sky-600 h-screen flex to-indigo-600 text-black from-sky-600">

    <!-- Sidebar -->
    <aside class="w-45 bg-linear-to-r from-cyan-500 to-blue-500 shadow-lg flex flex-col">
 <!-- Logo -->
    <div class="h-16 flex items-center justify-center font-bold text-xl border-b">
        TaskMate
    </div>

    <!-- User Info -->
    <div class="p-4 border-b text-center">
        <div class="w-16 h-16 mx-auto rounded-full bg-gray-200 flex items-center justify-center text-2xl font-bold text-blue-600">
            {{ strtoupper(substr(Auth::user()->username ?? 'G', 0, 1)) }}
        </div>
        <h1 class="mt-3 text-lg font-bold text-gray-800">
            Welcome, {{ Auth::user()->username ?? 'Guest' }}
        </h1>
        <p class="text-sm text-gray-500">
            {{ Auth::user()->role ?? 'Viewer' }}
        </p>
    </div>
        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition {{ request()->routeIs('dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
                🏠 <span class="mr-2">Dashboard</span>
            </a>
<a href="{{ route('projects.index') }}" 
               class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition {{ request()->routeIs('projects.*') ? 'bg-gray-200 font-semibold' : '' }}">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 14H4m6.5 3L8 20m5.5-3 2.5 3M4.88889 17H19.1111c.4909 0 .8889-.4157.8889-.9286V4.92857C20 4.41574 19.602 4 19.1111 4H4.88889C4.39797 4 4 4.41574 4 4.92857V16.0714c0 .5129.39797.9286.88889.9286ZM13 14v-3h4v3h-4Z"/>
</svg>
 <span class="mr-2">projects</span>
            </a>
            <a href="{{ route('users.index') }}" 
               class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition {{ request()->routeIs('users.*') ? 'bg-gray-200 font-semibold' : '' }}">
                👥 <span class="mr-2">Users</span>
            </a>

            <a href="" 
               class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition {{ request()->routeIs('tasks.*') ? 'bg-gray-200 font-semibold' : '' }}">
                📋 <span class="mr-2">Tasks</span>
            </a>

            <a href="#" 
               class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition">
                📊 <span class="mr-2">Reports</span>
            </a>

            <a href="#" 
               class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition">
                ⚙️ <span class="mr-2">Settings</span>
            </a>
        </nav>

    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Page Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="p-6 bg-gray-100 text-center text-gray-600">
            &copy; 2025 TaskMate. All rights reserved.
        </footer>
    </div>

</body>

</html>
