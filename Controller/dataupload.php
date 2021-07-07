<?php

include "../Model/function.php";
include "../Model/koneksi.php";

$type=$_POST["type"];
$action=new AllFunction();
$a=0;
if(isset($_FILES["file"]['tmp_name']))
    {
        // Number of uploaded files
        $num_files = count($_FILES["file"]['tmp_name']);
        //echo $num_files;
        $filename=$_FILES["file"]["tmp_name"];

        /** loop through the array of files ***/
        	for($i=0; $i < $num_files;$i++)
        	{
        	$fname=$filename[$i];	//echo $i.'File(s) <br>';
        	//echo $fname;
        	$upload=$action->uploadMasterData($type,$fname);

        	}
    }



echo $upload;
if($upload=='true'){
header('location:../View/upload.php?i=berhasil');
}
else{
header('location:../View/upload.php?i=gagal');
}
?>