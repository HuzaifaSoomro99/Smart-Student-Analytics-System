<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                Smart Student Dashboard
            </h2>

            <span class="text-sm text-gray-500">
                Overview & Analytics
            </span>
        </div>
    </x-slot>

    <div class="p-6 space-y-6 bg-gray-50 min-h-screen">

        <!-- STATS GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Students -->
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-5 border border-gray-100">
                <div class="text-sm text-gray-500">Total Students</div>
                <div class="text-3xl font-bold text-blue-600 mt-2">
                    {{ $totalStudents }}
                </div>
            </div>

            <!-- Subjects -->
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-5 border border-gray-100">
                <div class="text-sm text-gray-500">Total Subjects</div>
                <div class="text-3xl font-bold text-green-600 mt-2">
                    {{ $totalSubjects }}
                </div>
            </div>

            <!-- Marks -->
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-5 border border-gray-100">
                <div class="text-sm text-gray-500">Marks Records</div>
                <div class="text-3xl font-bold text-yellow-500 mt-2">
                    {{ $totalMarks }}
                </div>
            </div>

            <!-- Average -->
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-5 border border-gray-100">
                <div class="text-sm text-gray-500">Average Marks</div>
                <div class="text-3xl font-bold text-purple-600 mt-2">
                    {{ round($averageMarks, 2) }}
                </div>
            </div>

        </div>

        <!-- TOP STUDENT CARD -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">
                    Top Student
                </h3>
                <span class="text-xs text-gray-500">Performance Highlight</span>
            </div>

            @if($topStudent)
                <div class="space-y-2">
                    <p class="text-gray-700">
                        <span class="font-medium">Name:</span>
                        {{ $topStudent->name }}
                    </p>

                    <p class="text-gray-700">
                        <span class="font-medium">Total Marks:</span>
                        <span class="text-green-600 font-semibold">
                            {{ $topStudent->marks->sum('marks') }}
                        </span>
                    </p>
                </div>
            @else
                <div class="text-gray-500">
                    No data available
                </div>
            @endif

        </div>

    </div>
</x-app-layout>