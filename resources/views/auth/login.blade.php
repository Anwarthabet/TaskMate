<x-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center px-4 bg-gradient-to-br py-30hg px-4 sm:px-6 lg:px-8">
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
                          <x-forms.input 
                          id="email"
                        name="email" 
                        label="Your Name" 
                        type="eimail" 
                        placeholder="Enter your email" 
                        required
                    />
                </div>

                <div>
                    <x-forms.input 
                        id="password"
                        name="password" 
                        label="Password" 
                        type="password" 
                        placeholder="Enter your password" 
                        required
                    />
                </div>

                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="form-checkbox h-5 w-5 text-sky-600">
                        <span class="ml-2 text-gray-700">Remember Me</span>
                    </label>
                    {{-- <a href="{{ route('password.request') }}" class="text-sky-600 hover:underline text-sm">Forgot Password?</a> --}}
                </div>

                <x-forms.button type="submit" class="w-full bg-sky-600 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    Login
          </x-forms.button>
                </form>

            {{-- <p class="text-center mt-4 text-gray-500">Don't have an account? 
                <a href="{{ route('register') }}" class="text-sky-600 font-semibold hover:underline">Register</a>
            </p> --}}
        </div>
    </div>
</x-layout>
