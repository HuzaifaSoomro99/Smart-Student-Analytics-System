<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                Create Student
            </h2>
            <span class="text-sm text-gray-500">Add new record</span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 p-8">

                <form action="{{route('student.store')}}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name"
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter student name">
                    </div>

                    <!-- Roll No -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Roll No</label>
                        <input type="text" name="roll_no"
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter roll number">
                    </div>

                    <!-- Class -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Class</label>
                        <input type="text" name="class"
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter class">
                    </div>

                    <!-- Section -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Section</label>
                        <input type="text" name="section"
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter section">
                    </div>

                    <!-- Button -->
                    <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg transition">
                        Add Student
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>