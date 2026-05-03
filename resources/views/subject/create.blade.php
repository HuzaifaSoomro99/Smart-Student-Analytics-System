<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                Create Subject
            </h2>
            <span class="text-sm text-gray-500">New entry</span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-2xl mx-auto">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

                <form action="{{route('subject.store')}}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Subject Name</label>
                        <input type="text" name="name"
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter subject name">
                    </div>

                    <!-- Button -->
                    <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg transition">
                        Add Subject
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>