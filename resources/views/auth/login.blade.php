<x-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br ">
        <div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md">
            
            <h2 class="text-3xl font-bold text-center text-sky-700 mb-6">Login</h2>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="absolute top-2 right-2 text-red-700" onclick="this.parentElement.remove();">&times;</button>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" required autofocus value="{{ old('email') }}" 
                        class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-400">
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-400">
                </div>

                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="form-checkbox h-5 w-5 text-sky-600">
                        <span class="ml-2 text-gray-700">Remember Me</span>
                    </label>
                    {{-- <a href="{{ route('password.request') }}" class="text-sky-600 hover:underline text-sm">Forgot Password?</a> --}}
                </div>

                <button type="submit" class="w-full bg-sky-600 text-white py-3 rounded-xl font-bold hover:bg-sky-500 transition duration-300">
                    Login
                </button>
            </form>

            {{-- <p class="text-center mt-4 text-gray-500">Don't have an account? 
                <a href="{{ route('register') }}" class="text-sky-600 font-semibold hover:underline">Register</a>
            </p> --}}
        </div>
    </div>
</x-layout>
