<?php 

require 'vendor/autoload.php';



if( isset($_POST['submit']) )
{
    $file   = $_FILES['file'];
    $path   = dirname(__FILE__) . '/upload/';

    $upload = new Belgian\Upload\FileUpload($file, $path);

    $upload->moveFile();
}




?><form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="submit" name="submit" value="ok"/>
</form>



