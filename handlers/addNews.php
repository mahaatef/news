<?php
require("connect.php"); 
session_start();

$title= $_POST['title'];
$body= $_POST['body'];
$catID=$_POST['catID'];
$userID=$_SESSION['userID'];




    $currentDirectory = getcwd();
    $uploadDirectory = "/upload/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed 

    $fileName = $_FILES['img']['name'];
    $fileSize = $_FILES['img']['size'];
    $fileTmpName  = $_FILES['img']['tmp_name'];
    $fileType = $_FILES['img']['type'];
$tmp=explode('.',$fileName);
    $fileExtension = strtolower(end($tmp));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 


   

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
       echo $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 4000000) {
      echo   $errors[] = "File exceeds maximum size (4MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded";
        } else {
          echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" . "\n";
        }
      }

    

$img= basename($fileName);


$sql="INSERT INTO news (title,body,image,catID,userID)
 VALUES('$title','$body','$img','$catID','$userID')";

if(mysqli_query($conn,$sql)){
header('Location:../News.php');

   
}else{
  echo"not added";
}






?>
























