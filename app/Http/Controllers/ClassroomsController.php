<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ClassroomsController extends Controller
{

    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create', [
            'classroom' => new Classroom(),
        ]);
    }

    public function store(ClassroomRequest $request)
    {
        $validate = $request->validated();
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $path = $file->store('/covers', [
                'disk' => Classroom::$disk,
            ]);
            $validate['cover_image_path'] = $path;
        }
        $validate['code'] = Str::random(8);
        Classroom::create($validate);
        session()->flash('Add', 'Added successfully');
        return redirect()->route('classrooms.index');
    }

    public function show(Classroom $classroom) //Model Binding
    {
        // $classroom = Classroom::find($id);
        return view('classrooms.show', compact('classroom'));
    }

    public function edit(Classroom $classroom) //Model Binding
    {
        // $classroom = Classroom::find($id);
        return view('classrooms.edit', compact('classroom'));
    }

    public function update(ClassroomRequest $request, Classroom $classroom) //Model Binding
    {
        $validate = $request->validated();
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $path = $file->store('/covers', [
                'disk' =>  Classroom::$disk,
            ]);
            $validate['cover_image_path'] = $path;
        }

        $old = $classroom->cover_image_path;
        $classroom->update($validate);

        if ($old && $old != $classroom->cover_image_path) {
            Storage::disk(Classroom::$disk)->delete($old);
        }
        session()->flash('Edit', 'Modified successfully');
        return redirect()->route('classrooms.index');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete(); //delete from db
        if ($classroom->cover_image_path) {
            Storage::disk(Classroom::$disk)->delete($classroom->cover_image_path); //delete from disk
        }
        session()->flash('Delete', 'Deleted successfully');
        return redirect()->route('classrooms.index');
    }
}
