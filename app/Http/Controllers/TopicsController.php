<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Classroom;
use App\Models\Topic;

class TopicsController extends Controller
{
    public function index(Classroom $classroom)
    {
        $this->authorize('view-any', [Topic::class, $classroom]);
        return view('topics.index', compact('classroom'));
    }

    public function create(Classroom $classroom)
    {
        $this->authorize('create', [Topic::class, $classroom]);
        return view('topics.create', compact('classroom'));
    }

    public function store(TopicRequest $request, Classroom $classroom)
    {
        $this->authorize('create', [Topic::class, $classroom]);
        $validated = $request->validated();
        $validated['classroom_id'] = $classroom->id;
        Topic::create($validated);
        session()->flash('Add', 'Added successfully');
        return redirect()->route('classrooms.topics.index', $classroom);
    }

    public function edit(Classroom $classroom, Topic $topic) //Model Binding
    {
        $this->authorize('update', [Topic::class, $classroom]);
        return view('topics.edit', compact('classroom', 'topic'));
    }

    public function update(TopicRequest $request, Classroom $classroom, Topic $topic) //Model Binding
    {
        $this->authorize('update', [Topic::class, $classroom]);
        $validate = $request->validated();
        $topic->update($validate);
        session()->flash('Edit', 'Modified successfully');
        return redirect()->route('classrooms.topics.index', compact('classroom'));
    }

    public function destroy(Classroom $classroom, Topic $topic)
    {
        $this->authorize('delete', [Topic::class, $classroom]);
        $topic->delete();
        session()->flash('Delete', 'Deleted successfully');
        return redirect()->route('classrooms.topics.index', $classroom);
    }
}
