<?php
namespace App\Traits;


use Illuminate\Support\Facades\Input;

Trait userTraits
{
    /**
     * @param $photo
     * @param $folder
     * @return string
     */
    protected function saveImage($photo , $folder)
    {
        $file_extension = $photo->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo->move( $path,$file_name);

        return $file_name;
    }
}
