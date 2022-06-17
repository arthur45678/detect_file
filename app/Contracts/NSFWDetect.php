<?php

namespace App\Contracts;

interface NSFWDetect
{
    /**
     * @param $url
     * @return mixed
     */
    public function parseImageByUrl( $url );


    /**
     * @param video $file
     * @return mixed
     */
    public function parseVideoByFile( $file );

}
