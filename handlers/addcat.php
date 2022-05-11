<?php
session_start();

require("connect.php"); 

$name= $_POST['catname'];



$sql="INSERT INTO category (name) VALUES('$name')";

if(mysqli_query($conn,$sql)){
   // $_SESSION['task']='task Added Succsesfully!';
header('Location:../Cat.php');

   
}


?>