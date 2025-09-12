<x-layout>
 <div class="min-h-screen flex items-center justify-center bg-gradient-to-br ">
    <div class="bg-white rounded-3xl shadow-2xl p-10 max-w-md w-full text-center">
        
        <!-- Title -->
        <h1 class="text-3xl font-bold text-blue-600 mb-4">
            Welcome to <span class="text-green-500">TaskMate</span>
        </h1>
       
        <!-- Buttons -->
        <div class="flex flex-col gap-4">
            <a href="{{ route('login') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-full font-semibold transition duration-300">
               🔑 Log In
            </a>
            
            <a href="" 
               class="bg-green-500 hover:bg-green-600 text-white py-3 rounded-full font-semibold transition duration-300">
               ✨ Sign Up
            </a>
        </div>
    </div>
</div>

</x-layout>
