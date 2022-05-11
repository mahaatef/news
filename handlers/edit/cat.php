<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<a href='../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'></a>

<?PHP
require("../../handlers/connect.php");
$id= $_GET['id'];

$sql="SELECT * FROM category WHERE catID='$id'";
$get1=mysqli_query($conn,$sql);
$get2=mysqli_fetch_assoc($get1);
?>



<div class="col-md-8 " id='hidden_div'>
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Category </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="editcat.php?id=<?=$id?>" method="post">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Category Name</label>
          <input type="text" name='catname' class="form-control" id="exampleInputEmail1" value="<?= $get2['name'];?>">
        </div>


      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>