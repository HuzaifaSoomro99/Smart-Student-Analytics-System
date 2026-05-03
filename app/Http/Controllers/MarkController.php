<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Http;

class MarkController extends Controller
{
public function index(Request $request)
{
    $query = Mark::with(['student', 'subject']);

    if ($request->student) {
        $query->whereHas('student', function ($q) use ($request) {
            $q->where('name', 'like', "%{$request->student}%");
        });
    }

    if ($request->subject) {
        $query->whereHas('subject', function ($q) use ($request) {
            $q->where('name', 'like', "%{$request->subject}%");
        });
    }

    $marks = $query->latest()->get();
    $i = 1;

    return view('marks.index', compact('marks', 'i'));
}
public function create()
{
    $students = Student::latest()->get();
    $subjects = Subject::latest()->get();

    return view('marks.create', compact('students', 'subjects'));
}

public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'subject_id' => 'required|exists:subjects,id',
        'marks' => 'required|numeric',
    ]);
    Mark::create([
        'student_id' => $request->student_id,
        'subject_id' => $request->subject_id,
        'marks' => $request->marks,
    ]);

    return redirect()->route('marks.index')->with('success', 'Record Added Successfully');
}

    public function edit($id){
        $mark = Mark::findOrFail($id);
        $students = Student::latest()->get();
        $subjects = Subject::latest()->get();

        return view('marks.edit', compact('students', 'subjects', 'mark'));
    }
public function update(Request $request, $id)
{
    $marks = Mark::findOrFail($id);
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'subject_id' => 'required|exists:subjects,id',
        'marks' => 'required|numeric',
    ]);
    $marks->update([
        'student_id' => $request->student_id,
        'subject_id' => $request->subject_id,
        'marks' => $request->marks,
    ]);

    return redirect()->route('marks.index')->with('success', 'Record Updated Successfully');
}

public function destroy($id){
    $marks = Mark::findOrFail($id)->delete();
    return redirect()->route('marks.index')->with('success', 'Record Deleted Successfully');
}

public function results(){
    $students = Student::with('marks')->latest()->get();
    
    
    foreach($students as $student){
        $total = $student->marks->sum('marks');
        $count = $student->marks->count();

        $percentage = $count > 0 ? $total / $count : 0;
        $student->total = $total;
        $student->percentage = round($percentage, 2);
        $student->status = $percentage >= 40 ? 'Pass' : 'Fail';
    }
        return view('result.index', compact('students'));
}

public function pythonAnalysis($studentId){
    $marks = \App\Models\Mark::where('student_id', $studentId)->pluck('marks')->toArray();
    $response = Http::post('http://127.0.0.1:5000/analyze', [
        'marks' => $marks
    ]);

    $result = $response->json();
    return view('analysis', compact('result'));
}
}   
