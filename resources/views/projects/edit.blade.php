<x-layout>
        <div class="max-w-2xl mx-auto py-10 px-6 text-gray-800">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Project</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.update', $project) }}" method="POST" class="bg-white p-8 rounded-2xl shadow-lg space-y-6 border border-gray-100 text-gray-800">
            @csrf
            @method('PUT')
            <div>
                <x-forms.input 
                    id="name"
                    name="name" 
                    label="Poject Name" 
                    type="text" 
                    placeholder="Enter your Project Name"
                    value="{{ old('name', $project->name) }}"
                    required
                    >
                </x-forms.input>
            </div>

            <div>
                <x-forms.input 
                    id="description"
                    name="description" 
                    label="Project Description" 
                    type="text" 
                    placeholder="Enter your Project Description"
                    value="{{ old('description', $project->description) }}"
                    >         
                   </x-forms.input>
            </div>

            <div>
               <x-forms.select 
                    id="status"
                    name="status" 
                    label="Status">
                    <option value="pending" {{ (old('status', $project->status)=='pending') ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ (old('status', $project->status)=='in_progress') ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ (old('status', $project->status)=='completed') ? 'selected' : '' }}>Completed</option>
                </x-forms.select>
            </div>

            <div>
                <x-forms.select 
                    id="owner_id"
                    name="owner_id" 
                    label="Owner">
                    <option value="">Select Owner</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ (old('owner_id', $project->owner_id) == $user->id) ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                    
                </x-forms.select>
            </div>

            <div class="flex justify-end">
                <x-forms.button type="submit" class=" bg-sky-600 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    Update Project
                </x-forms.button>
            </div>
   
</div>

        </form>
</x-layout>
