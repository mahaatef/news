<?php
//session_start();

require("../connect.php"); 

$id= $_GET['id'];
echo $id;
$sql="DELETE FROM category WHERE catID=$id";






if(mysqli_query($conn,$sql)){
  //  $_SESSION['success']='User Added Succsesfully!';
header('Location:../../Cat.php');

  
}
 

?>