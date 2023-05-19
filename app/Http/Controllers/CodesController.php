<?php

namespace App\Http\Controllers;

use App\Models\Codes;
use App\Models\Lessons;
use App\Models\Students;
use Illuminate\Http\Request;
use App\traits\GenUniqueCode;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CodeStoreRequest;

class CodesController extends Controller
{
    use GenUniqueCode;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $codes = Codes::with(['lesson','students','admins'])->get();
        return view('codes.index',compact('codes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Students::all();
        $lessons = Lessons::all();
        return view('codes.add')->with('students',$students)->with('lessons',$lessons);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CodeStoreRequest $request)
    {
        $code = $this->GenUniqueCode();
        $studentname = Students::find($request->student_id)->name;
        if (DB::table('codes')->where('student_id',$request->student_id)->where('lesson_id',$request->lesson_id)->exists()) {
            return redirect()->back()->with('error','code already exist');
        }
        Codes::create([
            'code'=>$code,
            'admin_id'=>auth()->user()->id,
            'student_id'=>$request->student_id,
            'lesson_id'=>$request->lesson_id
        ]);
        return redirect()->back()->with('success','code generated '.$code.' successfully For Student '.$studentname);
    }

    /**
     * Display the specified resource.
     */
    public function show(Codes $codes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Codes $codes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Codes $codes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Codes $codes)
    {
        //
    }
}
