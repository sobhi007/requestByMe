<?php 

namespace App\Traits;

Trait OfferTrait {

     function saveImage($photo,$path)
    {
        $file_extension = $photo->getClientOriginalExtension() ;
        $file_name = rand(0,999).time().rand(0,99).'.'.$file_extension;
        $path = 'images/'.$path;
        $photo->move($path,$file_name);

        return $file_name;
    }

}




