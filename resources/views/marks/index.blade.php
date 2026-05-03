<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Marks Records</h2>

            <a href="{{route('marks.create')}}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm">
                + Add Marks
            </a>
        </div>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">

        <!-- SEARCH -->
        <form method="GET" action="{{ route('marks.index') }}" class="mb-6 flex gap-2">

            <input type="text" name="student"
                placeholder="Search student..."
                value="{{ request('student') }}"
                class="w-full rounded-lg border-gray-200 focus:ring-indigo-500">

            <input type="text" name="subject"
                placeholder="Search subject..."
                value="{{ request('subject') }}"
                class="w-full rounded-lg border-gray-200 focus:ring-indigo-500">

            <button class="bg-gray-800 text-white px-4 rounded-lg hover:bg-gray-900">
                Search
            </button>

            <a href="{{ route('marks.index') }}"
               class="bg-gray-400 text-white px-4 rounded-lg flex items-center">
                Reset
            </a>
        </form>

        <!-- TABLE -->
        <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-3 text-left">#</th>
                        <th class="p-3 text-left">Student</th>
                        <th class="p-3 text-left">Subject</th>
                        <th class="p-3 text-left">Marks</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse($marks as $mark)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="p-3">{{ $i++ }}</td>
                            <td class="p-3 font-medium">{{ $mark->student->name }}</td>
                            <td class="p-3">{{ $mark->subject->name }}</td>

                            <td class="p-3 font-semibold text-indigo-600">
                                {{ $mark->marks }}
                            </td>

                            <td class="p-3 flex gap-2">

                                <a href="{{ route('marks.edit', $mark->id) }}"
                                   class="px-3 py-1 text-xs bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('marks.destroy', $mark->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1 text-xs bg-red-500 text-white rounded hover:bg-red-600">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-6 text-gray-500">
                                No Records Found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
    </div>
</x-app-layout>