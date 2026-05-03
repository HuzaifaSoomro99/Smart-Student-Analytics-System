<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{

    public function index(Request $req)
    {
        $search = $req->search;

        $subjects = Subject::when($search, function($query, $search){
        return $query->where('name', 'like', "$search%");
        })->latest()->get();
        $i = 1;
        return view('subject.index', compact('subjects', 'i'));
    }

    public function create()
    {
        return view('subject.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|string',
        ]);

        Subject::create([
            'name' => $req->name
        ]);

        return redirect()->route('subject.index')->with('success', 'Record Added Successfully');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subject.edit', compact('subject'));
    }

    public function update(Request $req, $id)
    {
        $subject = Subject::findOrFail($id);
        $req->validate([
            'name' => 'required|string',
        ]);

        $subject->update([
            'name' => $req->name
        ]);

        return redirect()->route('subject.index')->with('success', 'Record Updated Successfully');
    }

    public function destroy($id){
        $subject = Subject::findOrFail($id)->delete();
        return redirect()->route('subject.index')->with('success', 'Record Deleted Successfully');
    }
}
