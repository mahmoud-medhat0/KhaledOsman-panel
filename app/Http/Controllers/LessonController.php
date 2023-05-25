<?php

namespace App\Http\Controllers;

use App\Models\Codes;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use App\Models\Lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        return view('Lesson.add');
    }
    public function store(Request $request){
        $request->validate([
        'title' => 'required|string',
        'file' => 'required|mimetypes:video/mp4',
        ]);
        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('private/uploads', $filename);
        Lessons::create([
            'title'=>$request->title,
            'path'=>$path
        ]);
        // Save the video details to the database
        return response()->json(['success' => 'Video uploaded successfully.']);
    }
    public function show(){
        $lessons = Lessons::all();
        return view('Lesson.index',compact('lessons'));
    }
    public function edit($id){
        $lesson = Lessons::FindOrFail($id);
        return view('Lesson.edit',compact('lesson'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required|string',
            'file' => 'required|mimetypes:video/mp4',
        ]);
        $lesson = Lessons::FindOrFail($id);
        if ($request->file != null) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('private/uploads', $filename);
            $lesson->update([
                'title'=>$request->title,
                'path'=>$path
            ]);
        }
        $lesson->update([
            'title'=>$request->title
        ]);
        return redirect()->back()->with('success','lesson updated successfully');
    }
    public function destroy($id){
        $path = Lessons::FindOrFail($id);
        Codes::where('lesson_id',$id)->delete();
        Storage::delete($path->path);
        $path->delete();
        return redirect()->back()->with('success','lesson deleted successful');
    }
    public function view($id)
    {
        $lesson = Lessons::FindOrFail($id);
        $name0 = explode('/',$lesson->path)[2];
        $name = explode('.',$name0)[0];
        return view('Lesson.view',compact('lesson'))->with('name',$name);
    }
    public function show1($filename)
    {
        $filePath = storage_path('app/private/uploads/' . $filename.'.mp4');
        $mimeType = Storage::mimeType('private/uploads/' . $filename.'.mp4');
        return response()->file($filePath, ['Content-Type' => $mimeType]);
    }
}
