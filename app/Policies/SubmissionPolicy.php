<?php

namespace App\Policies;

use App\Models\Classwork;
use App\Models\Submission;
use App\Models\User;

class SubmissionPolicy
{

    public function viewAny(User $user, Classwork $classwork): bool
    {
        $isAssignment = $classwork->type == 'assignment';
        $isTeacher = $user->classrooms()->wherePivot('classroom_id', $classwork->classroom_id)->wherePivot('role', 'teacher')->exists();
        return ($isTeacher && $isAssignment);
    }

    public function create(User $user, Classwork $classwork): bool
    {
        $assigned = $user->classworks()->wherePivot('classwork_id', $classwork->id)->exists();
        return $assigned;
    }

    public function file(User $user, Submission $submission): bool
    {
        $isTeacher = $submission->classwork->classroom->teachers()->where('user_id', $user->id)->exists();
        $isOwner = $submission->user_id == $user->id;
        return ($isTeacher || $isOwner);
    }
}
