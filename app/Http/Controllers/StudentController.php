<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function index(Request $req){
        
        $search = $req->search;
        $students = Student::when($search, function($query, $search){
            $query->where(function($q) use ($search){
                $q->where('name', 'like', "$search%")->orWhere('roll_no', 'like', "$search%");
            });
        })->latest()->get();
        $i = 1;
        return view('student.index', compact('students', 'i'));        
    }

    public function create(){
        return view('student.create');
    }

    public function store(Request $req){
        $req->validate([
            'name' => 'required|string',
            'roll_no' => 'required|string',
            'class' => 'required|string',
            'section' => 'required|string',
        ]);

        Student::create([
            'name' => $req->name,
            'roll_no' => $req->roll_no,
            'class' => $req->class,
            'section' => $req->section,
        ]);

        return redirect()->route('student.index')->with('success', 'Record Added Successsfully');
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $req, $id){
        $student = Student::findOrFail($id);
        $req->validate([
            'name' => 'required|string',
            'roll_no' => 'required|string',
            'class' => 'required|string',
            'section' => 'required|string',
        ]);

        $student->update([
            'name' => $req->name,
            'roll_no' => $req->roll_no,
            'class' => $req->class,
            'section' => $req->section,
        ]);

        return redirect()->route('student.index')->with('success', 'Record Updated Successsfully');
    }

    public function destroy($id){
        $student = Student::findOrFail($id)->delete();
        return redirect()->route('student.index')->with('success', 'Record Deleted Successsfully');
    }

}
