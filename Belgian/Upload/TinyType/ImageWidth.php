<?php 

namespace Belgian\Upload\TinyType;


class ImageWidth
{


    private $width;
    private $imageWidth;



    public function __construct($width)
    {
        if(!is_integer($width))
        {
            $str = 'Image Width: Requires integer value';
            throw new \Exception($str . PHP_EOL);
        }

        $this->imageWidth = $width;
    }


    public function get()
    {
        return $this->imageWidth;
    } 



}    


