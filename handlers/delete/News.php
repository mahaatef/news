<?php
//session_start();

require("../connect.php"); 

$id= $_GET['id'];
$sql="DELETE FROM news WHERE newsID=$id";






if(mysqli_query($conn,$sql)){
 
header('Location:../../News.php');

  
}
 

?>