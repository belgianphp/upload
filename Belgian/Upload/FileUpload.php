<?php

/*
 *
 * @package     BelgianPHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        https://github.com/senun/archive-upload 
 * @copyright   2013 - 2017
 * 
 */

namespace Belgian\Upload;

class FileUpload implements IFileUpload
{
    private $path;
    private $file; 
    private $fileName;
    private $validKey = array(
        'name', 'tmp_name', 
        'type', 'error', 'size'
    );









    public function __construct($filesKey, $path)
    {
        $this->path     = $path;
        $this->file     = $filesKey;
        $this->fileName = $this->file['name'];
    }










    public function setFileName($name)
    {

        $ex = pathinfo( self::getFile('name'),
            PATHINFO_EXTENSION
        );

        $this->fileName = $name . '.' . $ex;

        return $this;
    }












    public function getFile($key)
    {
        $key = strtolower($key);

        self::keyException($key);

        if($key !== 'name')
        {
            return $this->file[$key];
        }

        return $this->fileName;
    } 









    public function getPath()
    {
        return $this->path;
    }











    public function moveFile() 
    {

        return (bool)
            (move_uploaded_file(
                self::getFile('tmp_name'), 
                $this->path . self::getFile('name')
            ));
    }





    private function keyException($key)
    {

        $keyInvalid = '' 
            . 'Key "%s" invalid. '
            . 'Use the key: ';

        $str = ''
            . $keyInvalid
            . implode(', ', $this->validKey)
            . PHP_EOL;

        if(!in_array($key, $this->validKey))
        {
            throw new \Exception( 
                sprintf($str, $key) 
            );
        }
    } 




}

