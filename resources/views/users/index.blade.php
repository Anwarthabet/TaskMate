<x-layout>

  
        <!-- Users Table Section -->
        <section class="max-w-6xl mx-auto mt-10">
            <div class="overflow-x-auto bg-white shadow rounded-xl">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center flex justify-center gap-2">
                                <a href="{{ route('users.show', $user) }}" 
                                   class="text-blue-600 hover:bg-blue-100 px-3 py-1 rounded transition">View</a>
                                <a href="{{ route('users.edit', $user) }}" 
                                   class="text-yellow-600 hover:bg-yellow-100 px-3 py-1 rounded transition">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:bg-red-100 px-3 py-1 rounded transition"
                                            onclick="return confirm('هل أنت متأكد من الحذف؟')">delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">لا يوجد مستخدمين حالياً.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

</x-layout>
