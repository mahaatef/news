<?PHP
require("../../handlers/connect.php");

$id= $_GET['id'];
$name=$_POST['catname'];

$sql="UPDATE category SET name='$name' WHERE catID='$id' ";
if(mysqli_query($conn,$sql)){
header("location:../../cat.php");
}
else{
    echo " falied edit";
}
;

?>