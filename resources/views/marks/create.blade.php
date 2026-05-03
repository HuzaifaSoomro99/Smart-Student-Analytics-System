<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                Add Marks
            </h2>
            <span class="text-sm text-gray-500">Student performance entry</span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

                <form action="{{ route('marks.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Student -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Student</label>

                        <input type="text" id="studentSearch"
                            placeholder="Search student..."
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500">

                        <select name="student_id" id="studentSelect"
                            class="mt-2 w-full rounded-lg border-gray-200 focus:ring-indigo-500">

                            @foreach($students as $student)
                                <option value="{{ $student->id }}">
                                    {{ $student->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Subject -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Subject</label>

                        <input type="text" id="subjectSearch"
                            placeholder="Search subject..."
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500">

                        <select name="subject_id" id="subjectSelect"
                            class="mt-2 w-full rounded-lg border-gray-200 focus:ring-indigo-500">

                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">
                                    {{ $subject->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Marks -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Marks</label>

                        <input type="number" name="marks" required
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter marks">
                    </div>

                    <!-- Button -->
                    <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg transition">
                        Save Record
                    </button>

                </form>

            </div>
        </div>
    </div>

    <!-- Search Script -->
    <script>
        function filterOptions(searchId, selectId) {
            document.getElementById(searchId).addEventListener('keyup', function () {
                let value = this.value.toLowerCase();
                let options = document.getElementById(selectId).options;

                for (let i = 0; i < options.length; i++) {
                    let text = options[i].text.toLowerCase();
                    options[i].style.display = text.includes(value) ? '' : 'none';
                }
            });
        }

        filterOptions('studentSearch', 'studentSelect');
        filterOptions('subjectSearch', 'subjectSelect');
    </script>
</x-app-layout>