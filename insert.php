<?php
require_once "SQL_queries/db_connection.php";
GLOBAL $connection;
$fileDir="uploads/";
$tmp_name=$_FILES["file"]["tmp_name"];
$fileName=basename($_FILES["file"]["name"]);
$fileExt=pathinfo($fileName,PATHINFO_EXTENSION);
$filePath=$fileDir.$fileName;
$allowedArray=array('jpeg','jpg','png');
if(in_array($fileExt,$allowedArray)){
   $imageUploaded= move_uploaded_file($tmp_name,$filePath);
}
