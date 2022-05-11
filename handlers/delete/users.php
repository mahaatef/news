<?php
//session_start();

require("../connect.php"); 

$id= $_GET['id'];
$sql="DELETE FROM users WHERE userID=$id";






if(mysqli_query($conn,$sql)){
  //  $_SESSION['success']='User Added Succsesfully!';
header('Location:../../Users.php');

  
}
 

?>