<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $all_students = Student::get();
        return view('home', compact('all_students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = date('YmdHis').'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $student = new Student();
        $student->photo= $final_name;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();

        return redirect()->route('home')->with('success', 'Student is added successfully.');
    }

    public function edit($id)
    {
        $student_single = Student::where('id', $id)->first();
        return view('edit', compact('student_single'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if(file_exists(public_path('uploads/'.$student->photo)) && !empty($student->photo))
            {
                unlink(public_path('uploads/'.$student->photo));
            }


            $ext = $request->file('photo')->extension();
            $final_name = date('YmdHis').'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $student->photo = $final_name;
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->update();
        return redirect()->route('home')->with('success', 'Student is updated successfully.');

    }

    public function delete(Request $request, $id)
    {
        $student = Student::where('id', $id)->first();
        if(file_exists(public_path('uploads/'.$student->photo)) && !empty($student->photo))
        {
            unlink(public_path('uploads/'.$student->photo));
        }
        $student->delete();
        return redirect()->route('home')->with('success', 'Student is deleted successfully.');
    }
}
