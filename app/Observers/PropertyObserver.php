<?php

namespace App\Observers;

use App\Models\Property;
use App\Mail\PropertyCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PropertyObserver
{
    /**
     * Handle the Property "created" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function created(Property $property)
    {
        Mail::to("user@example.com")->send(new PropertyCreated($property));
    }

    /**
     * Handle the Property "updated" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function updated(Property $property)
    {
        Log::debug("Property Updated: $property->name");
    }

    /**
     * Handle the Property "deleted" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function deleted(Property $property)
    {
        foreach ($property->images as $image) {
            $image->delete();
        }

        Log::debug("Property Deleted: $property->name");
    }

    /**
     * Handle the Property "restored" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function restored(Property $property)
    {
        Log::debug("Property Restored: $property->name");
    }

    /**
     * Handle the Property "force deleted" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function forceDeleted(Property $property)
    {
        Log::debug("Property Delted: $property->name");
    }
}
