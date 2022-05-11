<?php 
require("handlers/connect.php");

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>News | Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="plugins/style.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">

News
</div>


        
      

         <!-- Login form-->
         <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-info" id="loginFormLabel">Login</h5>
                    </div>
                    <div class="modal-body border-0 p-4">
                      
                        <form id="contactForm" method="post" action='handlers/login.php' data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control"  name='uname' type="text" required  />
                                <label for="name">Username</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name='password' required type="password"  />
                                <label for="email">Password</label>
                               
                            </div>


                        
                           



                            <div class="form-floating mb-3">
                                <?php   if(isset($_SESSION['error'])){ ?>
                  <div class="alert alert-danger alert-dismissible">
                  <h5><i class="icon fas fa-times"></i><?=$_SESSION['error']?></h5> 
                  </div>


               <?php
              unset($_SESSION['error']) ;
            }?>


<?php   if(isset($_SESSION['Reset'])){ ?>
                  <div class="alert alert-success alert-dismissible">
                  <h5><i class="icon fas fa-check"></i><?=$_SESSION['Reset']?></h5> 
                  </div>


               <?php
              unset($_SESSION['Reset']) ;
            }?>



                            </div>

                            <a href='resetPassword.php'>Reset Password</a>
                           
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                           <!-- Submit Button-->
                            <div class="d-grid mt-2"><button class="btn btn-primary rounded-pill btn-lg " id="submitButton" type="submit">Login</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



 
<?php require("include/footer.php");?>