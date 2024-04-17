<?php

namespace App\Observers;

use App\Models\Module;
use Illuminate\Support\Str;

class ModuleObserver
{
    /**
     * Handle the Course "creating" event.
     */
    public function creating(Module $module): void
    {
        $module->uuid = (string) Str::uuid();
    }
}
