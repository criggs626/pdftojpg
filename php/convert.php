<?php
$files=json_decode($_POST["fileLocation"]);
$type=$_POST['type'];
$list=array();

for($i=0;$i<sizeof($files);$i++){
    $target_file=  trim($files[$i]);
    $convertedFile=  str_replace('.'.pathinfo($target_file,PATHINFO_EXTENSION), '.'.$type, $target_file);
   
    if(!file_exists($target_file)){
        $list[]='Failed';
        echo json_encode(array_unique($list));
        exit;
    }
    else if($convertedFile==$target_file){
        if(sizeof($files)==1){
            $list[]='Exists';
            echo json_encode(array_unique($list));
            exit;
        }
        else{
            $newName=str_replace('.'.pathinfo($target_file,PATHINFO_EXTENSION), '1.'.$type, $target_file);
            rename($convertedFile, $newName);
            $list[]=$newName;
        }
    }
    else{                
        $numPages=  exec('identify -format %n '.$target_file);
        if($numPages>1){
            for($j=0;$j<$numPages;$j++){
                $imgPageName=str_replace('.'.pathinfo($target_file,PATHINFO_EXTENSION), '-page'.($j+1).'.'.$type, $target_file);
                $list[]=$imgPageName;
                exec('convert -density 300 '.$target_file.'['.$j.'] '.$imgPageName);
                
            }
            unlink($target_file);
        }
        else{
            exec('convert -density 300 '.$target_file.' '.$convertedFile);
            unlink($target_file);
            $list[]=$convertedFile; 
        }    
}
}
echo json_encode(array_unique($list));
