<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                Student Results
            </h2>

            <span class="text-sm text-gray-500">
                Performance Overview
            </span>
        </div>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">

        <!-- TABLE CARD -->
        <div class="bg-white shadow-sm border border-gray-100 rounded-2xl overflow-hidden">

            <!-- Header Strip -->
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-800">
                    Results Summary
                </h3>
                <p class="text-sm text-gray-500">
                    Student performance analysis
                </p>
            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-gray-100 text-gray-600">
                        <tr>
                            <th class="text-left p-4">Student</th>
                            <th class="text-left p-4">Total Marks</th>
                            <th class="text-left p-4">Percentage</th>
                            <th class="text-left p-4">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">

                        @foreach($students as $student)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="p-4 font-medium text-gray-800">
                                    {{ $student->name }}
                                </td>

                                <td class="p-4 text-gray-700">
                                    {{ $student->total }}
                                </td>

                                <td class="p-4 font-semibold text-indigo-600">
                                    {{ $student->percentage }}%
                                </td>

                                <td class="p-4">

                                    @if($student->status == 'Pass')
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                            Pass
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
                                            Fail
                                        </span>
                                    @endif

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
        </div>
    </div>
</x-app-layout>