<?php

namespace App\Models;

use App\Models\Scopes\UserClassroomScope;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Classroom extends Model
{
    use HasFactory, SoftDeletes;

    public static $disk = 'public';

    protected $fillable = [
        'name', 'section', 'subject', 'room', 'code', 'theme', 'cover_image_path', 'user_id'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new UserClassroomScope);
    }

    public function scopeActive(Builder $query)
    {
        $query->where('status', 'active');
    }

    public function join($user_id, $role = 'student')
    {
        DB::table('classroom_user')->insert([
            'classroom_id' => $this->id,
            'user_id' => $user_id,
            'role' => $role,
            'created_at' => now(),
        ]);
    }

    public function get_students()
    {
        return DB::table('users')
            ->join('classroom_user', 'users.id', 'classroom_user.user_id')
            ->where('classroom_id', $this->id)
            ->where('role', 'student')
            ->select('users.name')
            ->get();
    }
    public function get_teachers()
    {
        return DB::table('users')
            ->join('classroom_user', 'users.id', 'classroom_user.user_id')
            ->where('classroom_id', $this->id)
            ->where('role', 'teacher')
            ->select('users.name')
            ->get();
    }
}
