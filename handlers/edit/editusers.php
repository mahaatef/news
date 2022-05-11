<?PHP
require("../../handlers/connect.php");

 $id= $_GET['id'];
  $name= $_POST['name'];
 $Fname= $_POST['Fname'];
 $Lname= $_POST['Lname'];

 $email= $_POST['email'];
 $type=$_POST['type'];
 $mobile= $_POST['mobile'];





$sql="UPDATE  users SET 
name='$name',
firstName='$Fname',
lastName='$Lname',

email='$email',
type='$type',
mobile='$mobile'

  WHERE userID='$id'";

if(mysqli_query($conn,$sql)){
header('Location:../../Users.php');

   
}else{
  ?>
  <h1> failed Edit </h1>
  <?php
}
?>


