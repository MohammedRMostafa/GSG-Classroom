<?php

namespace App\Listeners;

use App\Events\ClassworkCreated;
use App\Models\Stream;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostInClassroomStream
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassworkCreated $event): void
    {
        $classwork = $event->classwork;
        $content = __(':name posted a new :type: :title', [
            'name' => $classwork->user->name,
            'type' => __($classwork->type),
            'title' => $classwork->title,
        ]);
        Stream::create([
            'content' => $content,
            'link' => route('classrooms.classworks.show', [
                $classwork->classroom_id,
                $classwork->id,
            ]),
            'user_id' => $classwork->user_id,
            'classroom_id' => $classwork->classroom_id,
        ]);
    }
}
