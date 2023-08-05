<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classwork extends Model
{
    use HasFactory;

    const TYPE_ASSIGNMENT = 'assignment';
    const TYPE_MATERIAL = 'material';
    const TYPE_QUESTION = 'question';
    const TYPE_PUBLISHED = 'published';
    const TYPE_DRAFT = 'draft';

    protected $fillable = [
        'classroom_id', 'user_id', 'topic_id', 'title',
        'description', 'type', 'status', 'options', 'published_at',
    ];

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
}