<?php
session_start();
require('connect.php');

$username=$_POST['uname'];
$password=$_POST['password'];

    
    $alogin="SELECT * FROM users WHERE name='$username' ";
    $aloginResult=mysqli_query($conn,$alogin);
    $acount=mysqli_num_rows($aloginResult);
    $auserData=mysqli_fetch_array($aloginResult);
    
    if($acount >0){
              
                if($auserData['password']==$password){
                            $_SESSION['userID']=$auserData['userID'];
                            $_SESSION['name']=$auserData['name'];
                            $_SESSION['type']=$auserData['type'];
                        

                          

                             if($_SESSION['type']=="admin"){
                               header("Location:../index.php");
                               
                             }
                             
                             if($_SESSION['type']=="user"){
                                header("Location:../users/index.php");

                             }

                             if($_SESSION['type']=="deactive"){
                             ?>
                             <h3>This is an Deactivated Account</h3>
                             <?php

                           }


                             else{echo "INVALID USER TYPE";}



                            
                                                     }else{
                            $_SESSION['error']="Invalid Password";
                            header("Location:../login.php");
                            
    
                                                         }
                   }
       elseif($acount ==0){
                $_SESSION['error']="Invalid Username";
                header("Location:../login.php");
    
    
            }
    
    
   // }