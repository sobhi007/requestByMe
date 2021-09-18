<?php

namespace App\Listeners;
use App\Models\Video;
use App\Events\PageVists;

class PageVistsInc
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
    public function handle(PageVists $event)
    {
       
        //kda aru7 andah 3ala method el update ely 3mltaha
        //el parameter el gwaha feha kymt el event ely 3mltaha f sf7t el event whya
        //Public $offer;
        $this->updateViews($event -> video);
    }

// $offer deh b2a el htstlm feha el $event->offer msh 7aga y3ny
     function updateViews($video)
    {
        //kda ana b2olo enu hyzwdly 3ala 3dd el viewers el 3ndi 1 kol m7d yd5ul
        $video->views = $video->views+ 6;
        // b3d kda h2olo save
        $video->save();
    }
}
