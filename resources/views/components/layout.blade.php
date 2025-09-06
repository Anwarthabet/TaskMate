<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Mata</title>
    <link 
    href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&display=swap" 
    rel="stylesheet">
    {{-- استدعاء الملفات عبر Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        <nav class="flex justify-between items-center p-4 bg-sky-700/100 text-white"  >
         
        <div>
           
        </div>
      
        <div>
            @auth
<a href="#">Dashboard</a>
            @endauth
            @guest
              <a href="#">Sign Up</a>
              <a href="#">Log In</a>
            @endguest
        </div>
        </nav>
    </div>

    <div class="max-w-6xl mx-auto mt-8">
        {{ $slot }}
    </div>
</body>

</html>
