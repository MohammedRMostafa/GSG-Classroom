<?php

namespace App\Models;

use App\Models\Scopes\TopicClassroomScope;
use App\Models\Scopes\UserClassroomScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'name', 'classroom_id',
    ];

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    protected static function booted()
    {
        static::addGlobalScope(new TopicClassroomScope);
    }
}
