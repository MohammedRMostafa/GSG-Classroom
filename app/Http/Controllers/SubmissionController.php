<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classwork;
use App\Models\ClassworkUser;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class SubmissionController extends Controller
{

    public function index(Classwork $classwork)
    {
        $this->authorize('view-any', [Submission::class, $classwork]);
        $submissions = Submission::with('user')->where('classwork_id', $classwork->id)->lazy();
        $submissions = $submissions->groupBy('user_id');

        return view('classworks.submissions', compact('classwork', 'submissions'));
    }


    public function store(Request $request, Classwork $classwork)
    {
        $this->authorize('create', [Submission::class, $classwork]);
        $request->validate([
            'files.*' => 'file|mimetypes:text/plain,application/pdf,image/*',
            'files' => 'required|array',
        ]);
        $assigned = $classwork->users()->where('id', Auth::id())->exists();
        if (!$assigned) {
            abort(403);
        }
        $data = [];
        foreach ($request->file('files') as $file) {
            $data[] = [
                'classwork_id' => $classwork->id,
                'content' => $file->store("submissions/{$classwork->id}"),
                'type' => 'file',
            ];
        }
        $user = Auth::user();
        DB::beginTransaction();
        try {
            $user->submissions()->createMany($data);
            ClassworkUser::where([
                'user_id' => $user->id,
                'classwork_id' => $classwork->id,
            ])->update([
                'status' => 'submitted',
                'submitted_at' => now(),
            ]);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
        return back()->with('Add', 'Works Submitted Successfuly');
    }

    public function file(Submission $submission)
    {
        $this->authorize('file', $submission);
        return response()->file(storage_path('app/' . $submission->content));
    }
}
