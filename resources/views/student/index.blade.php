<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Students</h2>
            <a href="{{route('student.create')}}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm">
                + New Student
            </a>
        </div>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">

        <!-- Search -->
        <form method="GET" action="{{ route('student.index') }}" class="mb-6 flex gap-2">
            <input type="text" name="search"
                value="{{ $search ?? '' }}"
                placeholder="Search students..."
                class="w-full rounded-lg border-gray-200 focus:ring-indigo-500">

            <button class="bg-gray-800 text-white px-4 rounded-lg hover:bg-gray-900">
                Search
            </button>
        </form>

        <!-- Success -->
        @if (session('success'))
            <div class="mb-4 bg-green-50 text-green-700 px-4 py-2 rounded-lg">
                {{session('success')}}
            </div>
        @endif

        <!-- TABLE -->
        <div class="bg-white shadow-sm rounded-2xl overflow-hidden border border-gray-100">

            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-3 text-left">#</th>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Roll No</th>
                        <th class="p-3 text-left">Class</th>
                        <th class="p-3 text-left">Section</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @foreach ($students as $student)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3">{{ $i++ }}</td>
                        <td class="p-3 font-medium">{{ $student->name }}</td>
                        <td class="p-3">{{ $student->roll_no }}</td>
                        <td class="p-3">{{ $student->class }}</td>
                        <td class="p-3">{{ $student->section }}</td>

                        <td class="p-3 flex gap-2 flex-wrap">

                            <a href="{{route('student.edit', $student->id)}}"
                               class="px-3 py-1 text-xs bg-blue-500 text-white rounded hover:bg-blue-600">
                                Edit
                            </a>

                            <form action="{{route('student.destroy', $student->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="px-3 py-1 text-xs bg-red-500 text-white rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>

                            <a href="{{ route('analysis', $student->id) }}"
                               class="px-3 py-1 text-xs bg-purple-500 text-white rounded hover:bg-purple-600">
                                Analyze
                            </a>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>