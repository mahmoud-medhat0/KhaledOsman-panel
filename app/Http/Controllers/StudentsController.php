<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StudentStoreRequest;
use Illuminate\Validation\Rule;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::all();
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentStoreRequest $request)
    {
        Students::create([
            'name'=>$request->name,
            'number'=>$request->number,
            'password'=>Hash::make($request->password),
            'NationalID'=>$request->NationalID,
            'PersonalCode'=>$request->PersonalCode,
            'gender'=>$request->gender,
            'status'=>$request->status
        ]);
        return redirect()->back()->with('success','student added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Students::FindOrFail($id);
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Students::FindOrFail($id);
        $rules = [
            'name'=>'required|string|max:255',
            'number' => [
                'required',
                'regex:/^01[0-2,5]\d{8}$/',
                Rule::unique('students', 'number')->ignore($id),
            ],
            'PersonalCode'=>['required','int',
            Rule::unique('students','PersonalCode')->ignore($id)],
            'password'=>'nullable|confirmed|min:8',
            'gender'=>'required|in:m,f',
            'status'=>'required|in:0,1',
            'NationalID'=>['required','min:15','integer',
            Rule::unique('students','NationalID')->ignore($id)],
        ];
        $request->validate($rules);
        $student->update([
            'name'=>$request->name,
            'number'=>$request->number,
            'NationalID'=>$request->NationalID,
            'PersonalCode'=>$request->PersonalCode,
            'gender'=>$request->gender,
            'status'=>$request->status
        ]);
        if ($request->passwordb != null) {
            $student->update([
                'password'=>Hash::make($request->password),
            ]);
        }
        return redirect()->back()->with('success','student data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Students::FindOrFail($id)->delete();
        return redirect()->back()->with('success','student deleted successfully');
    }
}
