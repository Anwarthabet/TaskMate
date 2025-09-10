<x-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-500 to-green-400 font-sans">
        <div class="bg-white rounded-3xl shadow-2xl p-10 max-w-md text-center">
            <h1 class="text-3xl font-bold text-blue-600 mb-4">
                مرحباً بك في <span class="text-green-500">TaskMate</span>
            </h1>
            <p class="text-gray-600 mb-8">
                نظام إدارة المهام والمستخدمين الخاص بك. قم بتسجيل الدخول أو عرض المستخدمين للمتابعة.
            </p>

            <div class="flex flex-col gap-4">
                <a href="{{ route('login') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-full font-semibold transition">
                   تسجيل الدخول
                </a>
            </div>
        </div>
    </div>
</x-layout>
