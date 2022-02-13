<?php

namespace App\Listeners;

use App\Events\ProjectSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizeProjectImage implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectSaved  $event
     * @return void
     */
    public function handle(ProjectSaved $event)
    {
        // optimización
        $image = Image::make(Storage::get($event->project->image))
            ->widen(800)
            ->limitColors(255)
            ->encode();

        Storage::put($event->project->image, (string)$image);
    }
}
