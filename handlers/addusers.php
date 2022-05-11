<?php
require("connect.php"); 
$name= $_POST['name'];
$Lname= $_POST['Lname'];
$Fname= $_POST['Fname'];

$email= $_POST['email'];
$password=$_POST['password'];
$type= $_POST['type'];
$mobile= $_POST['mobile'];


//CHECK FOR DOUBLE USERNAME
$sql1="SELECT * FROM users";
$get=mysqli_query($conn,$sql1);
while($user=mysqli_fetch_assoc($get)){
 // echo $user['name'];
  if($user['name']==$name){
    echo"This username is used before , Try again with a new one !";
    ?>
    <a href="../Users.php">go back..</a>
    <?php
    die();
  }
}



$sql="INSERT INTO users (name,lastName,firstName,email,password,type,mobile)
 VALUES('$name','$Lname','$Fname','$email','$password','$type', '$mobile')";

if(mysqli_query($conn,$sql)){
header('Location:../Users.php');

   
}else{
  ?>
  <h1> failed Adding </h1>
  <?php
}
?>