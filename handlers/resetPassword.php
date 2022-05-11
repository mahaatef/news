<?php
session_start();
require('connect.php');

$username=$_POST['uname'];
$password=$_POST['Op'];
$Np=$_POST['Np'];
$Cp=$_POST['Cp'];



    
    $alogin="SELECT * FROM users WHERE name='$username' ";
    $aloginResult=mysqli_query($conn,$alogin);
    $acount=mysqli_num_rows($aloginResult);
    $auserData=mysqli_fetch_array($aloginResult);
    $id=$auserData['userID'];
    if($acount >0){
              
                if($auserData['password']==$password){

                    if($Np==$Cp){

                      //INSER NEW PASSWORD  

                                $sql="UPDATE  users SET password='$Np' WHERE userID='$id'";

                                if(mysqli_query($conn,$sql)){
                                    $_SESSION['Reset']="Password changed successfully! ";
                                header('Location:../login.php');
                                }else{ //IF ERROR WHILE UPDATE SQL
                                    $_SESSION['Reset']="Please try again!";
                                    header("Location:../resetPassword.php");
                                    }

}else{  //IF NEW PASSWORD NOT MATCHED
                        $_SESSION['Reset']="New Password must be match";
                        header("Location:../resetPassword.php");
                        

                    }
                            
                            

                            


                           }else{//IF OLD PASSWORD NOT TRUE
                            $_SESSION['Reset']="Invalid Old Password";
                            header("Location:../resetPassword.php");
                

                           }

                        }else{ //IF INVALID USERNAME
                            $_SESSION['Reset']="Invalid Username";
                            header("Location:../resetPassword.php");
                

                        }



                         
?>