<?php

namespace App\Policies;

use App\Models\Classroom;
use App\Models\User;

class ClassroomPolicy
{

    public function viewAny(User $user): bool
    {
        // anyone in this classroom (By GlobalScope)
    }

    public function view(User $user, Classroom $classroom): bool
    {
        // anyone in this classroom
        return $user->classrooms()->wherePivot('classroom_id', $classroom->id)->exists();
    }

    public function create(User $user, Classroom $classroom): bool
    {
        // anyone
    }

    public function update(User $user, Classroom $classroom): bool
    {
        // just owner
        return ($user->id == $classroom->user_id);
    }

    public function delete(User $user, Classroom $classroom): bool
    {
        // just owner
        return ($user->id == $classroom->user_id);
    }

    public function restore(User $user, Classroom $classroom): bool
    {
        // just owner
        return ($user->id == $classroom->user_id);
    }

    public function forceDelete(User $user, Classroom $classroom): bool
    {
        // just owner
        return ($user->id == $classroom->user_id);
    }
}
