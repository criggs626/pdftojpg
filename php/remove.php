<?php
$files=json_decode($_POST["fileLocation"]);
$file=$_POST['file'];
for($i=0;$i<sizeof($files);$i++){
    unlink(trim($files[$i]));
}
unlink($file)
?>

