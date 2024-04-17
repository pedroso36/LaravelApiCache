<?php

namespace App\Observers;
use Illuminate\Support\Str;

class LessonObserver
{
    public function creating($lesson)
    {
        $lesson->uuid = Str::uuid();
    }
}
