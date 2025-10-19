<x-layout>
            <div class="max-w-2xl mx-auto py-10 px-6 text-gray-800">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Task</h2>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data"
                            class="bg-white p-8 rounded-2xl shadow-lg space-y-6 border border-gray-100">

            @csrf
            <!--Title Field -- -->
            <x-forms.input id="title" name="title" label="" type="text" placeholder="Enter Task Title"
                value="{{ old('title') }}" required>
            </x-forms.input>
            <!--Description Field -->
            <x-forms.input id="description" name="description" label="" type="text" placeholder="Enter Task Description"
                value="{{ old('description') }}">
            </x-forms.input>
            <!--Status Field -->
            <x-forms.select id="status" name="status" label="">
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </x-forms.select>
            <!--Due Date Field -->
            <x-forms.datetime accesskey="due_date" name="due_date" label="" aria-placeholder="Due date"
                value="{{ old('due_date') }}" />
            <!--Project Field -->
            <x-forms.select id="project_id" name="project_id" label="">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach>
            </x-forms.select>
            <!--User Field -->
            <x-forms.select id="user_id" name="user_id" label="">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach>
            </x-forms.select>
            <!--File Field -->
           <x-forms.file label="" name="document" />


            <x-forms.button type="submit"
                class=" bg-sky-600 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                Create Task
            </x-forms.button>
    </div>
</form>
    </div>
</x-layout>