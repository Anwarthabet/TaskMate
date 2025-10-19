<x-layout>
    <div class="max-w-7xl mx-auto py-8 text-gray-800 px-6">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Tasks</h2>
            
            <a href="{{ route('tasks.create') }}" class=" bg-sky-600 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                + New Task
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Project</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Assigned To</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Due Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">File</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($tasks as $task)
                        <tr>
                            <td class="px-6 py-4">{{ $task->title }}</td>
                            <td class="px-6 py-4">{{ $task->project->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $task->user->username ?? 'N/A' }}</td>
                            <td class="px-6 py-4 capitalize">{{ $task->status }}</td>
                            <td class="px-6 py-4">{{ $task->due_date }}</td>
                            <td class="px-6 py-4">
                                @if($task->file)
                                    <a href="{{ asset('storage/' . $task->file) }}" target="_blank" class="text-blue-600 hover:underline">
                                        View File
                                    </a>
                                @else
                                    <span class="text-gray-400">No File</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="" class="text-blue-600 hover:underline">Edit</a>
                                <form action="" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($tasks->isEmpty())
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No tasks found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
