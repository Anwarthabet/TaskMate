<x-layout>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Title --}}
            <h2 class="text-3xl font-bold text-gray-800">Dashboard</h2>

            {{-- Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Users Card --}}
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-6 rounded-2xl shadow-lg hover:scale-105 transform transition duration-300">
                    <h3 class="text-lg font-semibold">Total Users</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalUsers }}</p>
                    <p class="mt-1 text-sm">Active: {{ $activeUsers }} | Inactive: {{ $inactiveUsers }}</p>
                </div>

                {{-- Tasks Card --}}
                <div class="bg-gradient-to-r from-green-500 to-green-700 text-white p-6 rounded-2xl shadow-lg hover:scale-105 transform transition duration-300">
                    <h3 class="text-lg font-semibold">Total Tasks</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalTasks }}</p>
                    <p class="mt-1 text-sm">Completed: {{ $doneTasks }} | Pending: {{ $pendingTasks }}</p>
                </div>

                {{-- Quick Links Card --}}
                <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white p-6 rounded-2xl shadow-lg hover:scale-105 transform transition duration-300">
                    <h3 class="text-lg font-semibold">Quick Links</h3>
                    <div class="mt-4 space-y-2">
                        <a href="{{ route('users.index') }}" class="block w-full text-center bg-white text-indigo-700 rounded-lg px-4 py-2 font-medium hover:bg-gray-100 transition">Manage Users</a>
                        <a href="{{ route('users.create') }}" class="block w-full text-center bg-white text-indigo-700 rounded-lg px-4 py-2 font-medium hover:bg-gray-100 transition">Add User</a>
                        {{-- <a href="{{ route('tasks.index') }}" class="block w-full text-center bg-white text-indigo-700 rounded-lg px-4 py-2 font-medium hover:bg-gray-100 transition">Manage Tasks</a> --}}
                    </div>
                </div>
            </div>

            {{-- Chart Card --}}
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Task Statistics</h3>
                <canvas id="tasksChart" class="w-full h-64"></canvas>
            </div>

        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('tasksChart');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'Pending'],
                datasets: [{
                    data: [{{ $doneTasks }}, {{ $pendingTasks }}],
                    backgroundColor: ['#16a34a','#facc15'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: { size: 14 }
                        }
                    }
                }
            }
        });
    </script>
    @endpush
</x-layout>
