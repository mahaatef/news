<?php 
session_start();

  if(isset($_SESSION['name'])){
 
  require("include/header.php");
  
  require("handlers/connect.php");

  $id=$_SESSION['userID'];
//GET USER BY ID
$sql="SELECT * FROM users WHERE userID=$id";
$get=mysqli_query($conn,$sql);
$user=mysqli_fetch_assoc($get);






      // **** GET Number of News ***

      $NewssSOL="SELECT COUNT(*) AS 'News'  FROM news";
      $getNews=mysqli_query($conn,$NewssSOL);
      $PRO=mysqli_fetch_assoc($getNews);
     $News=$PRO['News'] ;







  
  
  ?>



        
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

 <!-- content start -->
        
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Profile</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="handlers/edit/editusers.php?id=<?=$id?>" method="post">
                <div class="form-group">
                        <label>User Name:</label>
                        <label class="fw-light"><?= $user['name'];?></label>
                        <input type="text" name='name' class="form-control" hidden value="<?= $user['name'];?>">
                      </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      

                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name='Fname' class="form-control" value="<?= $user['firstName'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name='Lname' class="form-control" value="<?= $user['lastName'];?>" >
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name='email' class="form-control" value="<?= $user['email'];?>">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name='mobile' class="form-control" value="<?= $user['mobile'];?>" >
                      </div>
                    </div>
                  </div>
                  
                  
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Account Type</label>
                        <input type="text" name='type'class="form-control" value="<?= $user['type'];?>">
                      </div>
                    </div>
                    
                    
                  </div>



                  
                  <div class="row">
                    
                  <div class="">
        <button type="submit" class="btn btn-warning">Submit</button>
      </div>
                    </div>
                    
                    




                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

 

   <!-- content End -->



</div></div></div></div></div>
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section></Div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; .</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php require("include/footer.php");
}else{
  header("Location:login.php");

}

?>