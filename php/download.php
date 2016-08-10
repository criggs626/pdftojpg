<?php
$file_url=$_POST["extension"];
if(strpos($file_url, ',')!==FALSE){
    $files=explode(",",$file_url);

    # create new zip opbject
    $zip = new ZipArchive();

    # create a temp file & open it
    $tmp_file = tempnam('.','');
    $zip->open($tmp_file, ZipArchive::CREATE);

    # loop through each file
    foreach($files as $file){
        if (file_exists(trim($file))){
            $download_file = file_get_contents(trim($file));
            $zip->addFromString(basename($file),$download_file);
            unlink(trim($file));
        }
        

    }

    # close zip
    $zip->close();

    # send the file to the browser as a download
    header('Content-disposition: attachment; filename=convertedFiles.zip');
    header('Content-type: application/zip');
    readfile($tmp_file);
    unlink($tmp_file);

}
else{
    if(file_exists($file_url)){
    
        $fileSize=filesize($file_url);
        header("Content-Type: image/".pathinfo($target_url,PATHINFO_EXTENSION));
        header("Content-Length: ".$fileSize);
        header("Content-Disposition: attachment; filename=".basename($file_url));
        readfile($file_url,false);
    }
    else{
        echo'Failed to download click back and try again';
    }
    unlink($file_url);
    exit;

}

