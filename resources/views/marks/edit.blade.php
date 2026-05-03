<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                Edit Marks
            </h2>
            <span class="text-sm text-gray-500">Update record</span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

                <form action="{{ route('marks.update', $mark->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Student -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Student</label>

                        <input type="text" id="studentSearch"
                            placeholder="Search student..."
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500">

                        <select name="student_id"
                            class="mt-2 w-full rounded-lg border-gray-200 focus:ring-indigo-500">

                            @foreach($students as $student)
                                <option value="{{ $student->id }}"
                                    {{ $mark->student_id == $student->id ? 'selected' : '' }}>
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

                        <select name="subject_id"
                            class="mt-2 w-full rounded-lg border-gray-200 focus:ring-indigo-500">

                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}"
                                    {{ $mark->subject_id == $subject->id ? 'selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Marks -->
                    <div>
                        <label class="text-sm font-medium text-gray-700">Marks</label>

                        <input type="number" name="marks"
                            value="{{ old('marks', $mark->marks) }}"
                            class="mt-1 w-full rounded-lg border-gray-200 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Button -->
                    <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg transition">
                        Update Record
                    </button>

                </form>

            </div>
        </div>
    </div>

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