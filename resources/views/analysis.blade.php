<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                Python Analysis Result
            </h2>

            <span class="text-sm text-gray-500">
                AI / Performance Insights
            </span>
        </div>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen flex items-center justify-center">

        <div class="w-full max-w-xl">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-6">

                <!-- Title -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Student Performance Analysis
                    </h3>
                    <p class="text-sm text-gray-500">
                        Generated from Python AI module
                    </p>
                </div>

                <!-- Average Card -->
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                    <p class="text-sm text-gray-500">Average Score</p>
                    <p class="text-2xl font-bold text-gray-800">
                        {{ $result['average'] ?? 'N/A' }}
                    </p>
                </div>

                <!-- Status Card -->
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">

                    <p class="text-sm text-gray-500 mb-2">Performance Status</p>

                    @php
                        $status = $result['status'] ?? '';
                    @endphp

                    @if($status == 'Weak')
                        <span class="inline-flex items-center px-4 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-700">
                            Weak
                        </span>

                    @elseif($status == 'Average')
                        <span class="inline-flex items-center px-4 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-700">
                            Average
                        </span>

                    @else
                        <span class="inline-flex items-center px-4 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-700">
                            Strong
                        </span>
                    @endif

                </div>

            </div>

        </div>
    </div>
</x-app-layout>