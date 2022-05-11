<?php 
session_start();

  if(isset($_SESSION['name'])){

   
require("handlers/connect.php");


require("include/header.php");
$id=$_SESSION['userID'];
//GET USER BY ID
$sql="SELECT * FROM users WHERE userID=$id";
$get=mysqli_query($conn,$sql);
$user=mysqli_fetch_assoc($get);

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
<script>
function myFunction(id) {
  let text = "Are you sure ?";
  if (confirm(text) == true) {
    window.location="handlers/delete/users.php?id="+id;
  } 
}
</script>
 
<?php require("include/footer.php");
}else{
  header("Location:login.php");

}
?>