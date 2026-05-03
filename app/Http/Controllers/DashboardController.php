<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Mark;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalSubjects = Subject::count();
        $totalMarks = Mark::count();

        // average marks
        $averageMarks = Mark::avg('marks');

        // top student
        $topStudent = Student::with('marks')
            ->get()
            ->sortByDesc(function ($student) {
                return $student->marks->sum('marks');
            })
            ->first();

        return view('dashboard', compact(
            'totalStudents',
            'totalSubjects',
            'totalMarks',
            'averageMarks',
            'topStudent'
        ));
    }
}

