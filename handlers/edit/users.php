<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<a href='../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'></a>

<?PHP
require("../../handlers/connect.php");
$id= $_GET['id'];

$sql="SELECT * FROM users WHERE userID='$id'";
$get1=mysqli_query($conn,$sql);
$get2=mysqli_fetch_assoc($get1);
?>



<div class="col-md-8 " id='hidden_div'>
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit User </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="editusers.php?id=<?=$id?>" method="post">
    <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> User Name</label>
          <input type="text" name='name' required class="form-control" id="exampleInputEmail1" value="<?=$get2['name']?>">
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">First  Name</label>
          <input type="text" name='Fname' required class="form-control" id="exampleInputEmail1" value="<?=$get2['name']?>">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Last Name</label>
          <input type="text" name='Lname' required class="form-control" id="exampleInputEmail1" value="<?=$get2['name']?>">
        </div>
  

        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> email</label>
          <input type="mail" name='email'  class="form-control" id="exampleInputEmail1" value="<?=$get2['email']?>">
        </div>



        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Mobile</label>
          <input type="number"   name='mobile' class="form-control" id="exampleInputEmail1" value="<?=$get2['mobile']?>">
        </div>



        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> Type</label>
          <select  required name='type' class="form-control" >
                      <option value="user"  <?php if($get2['type']=='user'){echo"selected";}?>>User</option>
                      <option value="admin"  <?php if($get2['type']=='admin'){echo"selected";}?>>Admin</option>
                      <option value="deactive"  <?php if($get2['type']=='deactive'){echo"selected";}?>>Deactivate</option>


          </select>
        
        </div>


        



        


     
     
     
        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>