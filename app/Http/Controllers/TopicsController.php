<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Classroom;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function index()
    {
        $topics = Topic::all();
        // dd($topics);
        return view('topics.index', compact('topics'));
    }

    public function create()
    {
        $classrooms = Classroom::all();
        return view('topics.create', compact('classrooms'));
    }

    public function store(TopicRequest $request)
    {
        $validate = $request->validated();
        Topic::create($validate);
        session()->flash('Add', 'Added successfully');
        return redirect()->route('topics.index');
    }

    // public function show(Topic $topic) //Model Binding
    // {
    //     // $topic = Topic::find($id);
    //     return view('topics.show', compact('topic'));
    // }

    public function edit(Topic $topic) //Model Binding
    {
        $classrooms = Classroom::all();
        // $topic = Topic::find($id);
        return view('topics.edit', compact('topic', 'classrooms'));
    }

    public function update(TopicRequest $request, Topic $topic) //Model Binding
    {
        $validate = $request->validated();
        $topic->update($validate);
        session()->flash('Edit', 'Modified successfully');
        return redirect()->route('topics.index');
    }

    public function destroy(int $id)
    {
        Topic::destroy($id);
        session()->flash('Delete', 'Deleted successfully');
        return redirect()->route('topics.index');
    }
}
