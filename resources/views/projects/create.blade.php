<x-layout>
    <div class="max-w-2xl mx-auto py-10 px-6 text-gray-800">

        {{-- Title --}}
        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Create  Project</h2>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-400 text-red-700 p-4 rounded-lg mb-6 shadow-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('projects.store') }}" method="POST" 
              class="bg-white p-8 rounded-2xl shadow-lg space-y-6 border border-gray-100">
            @csrf

            {{-- Project Name --}}
            <x-forms.input 
                id="name"
                name="name" 
                label="" 
                type="text" 
                placeholder="Enter your Project Name"
                value="{{ old('name') }}"
                required
            />

            {{-- Project Description --}}
            <x-forms.input 
                id="description"
                name="description" 
                label="" 
                type="text" 
                placeholder="Enter your Project Description"
                value="{{ old('description') }}"
            />

            {{-- Status --}}
            <x-forms.select 
                id="status"
                name="status" 
                label="Status">
                <option value="pending" {{ old('status')=='pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ old('status')=='in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ old('status')=='completed' ? 'selected' : '' }}>Completed</option>
            </x-forms.select>

            {{-- Owner --}}
            <x-forms.select 
                id="owner_id"
                name="owner_id" 
                label="Owner">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('owner_id')==$user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </x-forms.select>

            {{-- Buttons --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('projects.index') }}" 
                   class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
                    Cancel
                </a>
               <x-forms.button type="submit" class=" bg-sky-600 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    Create Project
                </x-forms.button>
            </div>
        </form>
    </div>
</x-layout>
