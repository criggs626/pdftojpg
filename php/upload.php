<?php
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = 'uploads/';     
    $targetFile =  $targetPath. str_replace(' ','',basename($_FILES['file']['name']));  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
   
    
}
echo $targetFile;