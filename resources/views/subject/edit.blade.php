<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                Edit Subject
            </h2>
            <span class="text-sm text-gray-500">Update record</span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-2xl mx-auto">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

                <form action="{{route('subject.update', $subject->id)}}" method="POST" class="space-y-5">
                    @csrf
                    @method('put')

                    <!-- Name -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Subject Name</label>
                        <input type="text" name="name"
                            value="{{old('name', $subject->name)}}"
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Button -->
                    <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg transition">
                        Update Subject
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>