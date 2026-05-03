<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                Edit Student
            </h2>
            <span class="text-sm text-gray-500">Update record</span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 p-8">

                <form action="{{route('student.update', $student->id)}}" method="POST" class="space-y-5">
                    @csrf
                    @method('put')

                    <!-- Name -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name"
                            value="{{old('name', $student->name)}}"
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Roll No -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Roll No</label>
                        <input type="text" name="roll_no"
                            value="{{old('roll_no', $student->roll_no)}}"
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Class -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Class</label>
                        <input type="text" name="class"
                            value="{{old('class', $student->class)}}"
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Section -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Section</label>
                        <input type="text" name="section"
                            value="{{old('section', $student->section)}}"
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Button -->
                    <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg transition">
                        Update Student
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>