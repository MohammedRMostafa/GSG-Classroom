<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Classwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassworkController extends Controller
{

    public function getType(Request $request)
    {
        $type =  $request->query('type');
        $allowed_type = [Classwork::TYPE_ASSIGNMENT, Classwork::TYPE_MATERIAL, Classwork::TYPE_QUESTION];
        if (!in_array($type, $allowed_type)) {
            $type = Classwork::TYPE_ASSIGNMENT;
        }
        return $type;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Classroom $classroom)
    {
        $classworks = $classroom->classworks()->with('topic')->orderBy('published_at')->lazy();
        $classworks = $classworks->groupBy('topic_id');
        // dd($classworks);
        return view('classworks.index', compact('classroom', 'classworks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Classroom $classroom)
    {
        $type = $this->gettype($request);
        return view('classworks.create', compact('classroom', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Classroom $classroom)
    {
        $type = $this->gettype($request);
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'topic_id' => ['nullable', 'int', 'exists:topics,id'],
        ]);

        $request->merge([
            'user_id' => Auth::id(),
            'type' => $type,
        ]);

        $classroom->classworks()->create($request->all());
        return redirect()->route('classrooms.classworks.index', $classroom->id)
            ->with('Add', 'Added Classwork Successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom, Classwork $classwork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom, Classwork $classwork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom, Classwork $classwork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom, Classwork $classwork)
    {
        //
    }
}
