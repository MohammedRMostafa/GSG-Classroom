<?php

namespace App\Policies;

use App\Models\Classroom;
use App\Models\Classwork;
use App\Models\User;

class ClassworkPolicy
{

    public function viewAny(User $user): bool
    {
        // just teachers in classroom and assigned students in classwork
        // return $this->view($user, $classwork);
        //تعريفها غير مفيد في مثالنا حيث يتم عمل اللازم في الكنترولر
    }

    public function view(User $user, Classwork $classwork): bool
    {
        // just teachers in classroom and assigned students in classwork
        $teacher = $user->classrooms()->wherePivot('classroom_id', $classwork->classroom_id)->wherePivot('role', 'teacher')->exists();
        $assigned = $user->classworks()->wherePivot('classwork_id', $classwork->id)->exists();
        return ($teacher || $assigned);
    }

    public function create(User $user, Classroom $classroom): bool
    {
        // any teacher in this classroom
        return $user->classrooms()->wherePivot('classroom_id', $classroom->id)->wherePivot('role', 'teacher')->exists();
    }

    public function update(User $user, Classwork $classwork): bool
    {
        // just classwork owner
        return $classwork->user_id == $user->id;
    }

    public function delete(User $user, Classwork $classwork): bool
    {
        // just classwork owner
        return $classwork->user_id == $user->id;
    }
}
