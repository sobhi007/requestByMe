<?php

namespace App\Listeners;
use App\Events\Edit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EditInc
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
     * @param  object  $event
     * @return void
     */
    public function handle(Edit $event)
    {
       $this->updateEdit($event->offer);
    }


    public function updateEdit($offer)
    {
       $offer->viewers= $offer->viewers+1;
       $offer->save();
    }


}
