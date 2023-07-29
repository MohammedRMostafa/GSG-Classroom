<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Scopes\TopicClassroomScope;
use App\Models\Topic;

class TopicsController extends Controller
{
    public function index($classroom)
    {
        $topics = Topic::get();
        return view('topics.index', compact('topics', 'classroom'));
    }

    public function create($classroom)
    {
        return view('topics.create', compact('classroom'));
    }

    public function store(TopicRequest $request, $classroom)
    {
        $validated = $request->validated();
        $validated['classroom_id'] = $classroom;
        Topic::create($validated);
        session()->flash('Add', 'Added successfully');
        return redirect()->route('classroom.topics.index', $classroom);
    }

    // public function show(Topic $topic) //Model Binding
    // {
    //     // $topic = Topic::find($id);
    //     return view('topics.show', compact('topic'));
    // }

    public function edit($topic, $classroom) //Model Binding
    {
        $topic = Topic::findOrFail($topic);
        return view('topics.edit', compact('topic', 'classroom'));
    }

    public function update(TopicRequest $request, $topic, $classroom) //Model Binding
    {
        $topic = Topic::findOrFail($topic);
        $validate = $request->validated();
        $topic->update($validate);
        session()->flash('Edit', 'Modified successfully');
        return redirect()->route('classroom.topics.index', compact('classroom'));
    }

    public function destroy($id, $classroom)
    {
        Topic::findOrFail($id)->delete();
        session()->flash('Delete', 'Deleted successfully');
        return redirect()->route('classroom.topics.index', $classroom);
    }

    public function trashed($classroom)
    {
        $topics = Topic::onlyTrashed()->latest('deleted_at')->get();
        return view('topics.trashed', compact('topics', 'classroom'));
    }

    public function restore($id, $classroom)
    {
        $topic = Topic::onlyTrashed()->findOrFail($id);
        $topic->restore();
        return redirect()
            ->route('classroom.topics.index', compact('classroom'))
            ->with('Restore', "Topic ({$topic->name}) restored");
    }

    public function forceDelete($id, $classroom)
    {
        $topic = Topic::withTrashed()->findOrFail($id);
        $topic->forceDelete();
        return redirect()
            ->route('classroom.topics.index', compact('classroom'))
            ->with('Delete', "Topic ({$topic->name}) deleted forever!");
    }
}
