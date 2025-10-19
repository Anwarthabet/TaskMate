<x-layout>
    <div class="max-w-2xl mx-auto py-10 px-6 text-gray-800">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Task</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
              <form action="{{ route('tasks.update', $task) }}" method="POST" enctype="multipart/form-data"
                            class="bg-white p-8 rounded-2xl shadow-lg space-y-6 border border-gray-100">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $task->title) }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $task->description) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="pending" {{ $task->status=='pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $task->status=='in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="done" {{ $task->status=='done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Due Date</label>
                <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Project</label>
                <select name="project_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $task->project_id==$project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Assigned To</label>
                <select name="assigned_to" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $task->assigned_to==$user->id ? 'selected' : '' }}>
                            {{ $user->username }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">File</label>
                <input type="file" name="file"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">

                @if($task->file)
                    <p class="mt-2">
                        Current File: 
                        <a href="{{ asset('storage/' . $task->file) }}" target="_blank" class="text-blue-600 hover:underline">
                            View File
                        </a>
                    </p>
                @endif
            </div>

         
            <x-forms.button type="submit"
                class=" bg-sky-600 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                update Task
            </x-forms.button>
        </form>
    </div>
</x-layout>
