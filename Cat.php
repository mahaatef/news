<?php 
session_start();

  if(isset($_SESSION['name']) &&  $_SESSION['type']=="admin"){

  require("handlers/connect.php");

require("handlers/get/getcat.php");

require("include/header.php");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

 <!-- content start -->
        




            


               



            <div class="col-12">

            <div class="card">
              <div class="card-header row">
                
                <h1 class="card-title col-9">  Categories </h1>
                <div onclick="showDiv()" class='text-primary col-3'>
<p>
              <i class="nav-icon fas fa-plus"></i> add Category  </p>
           
</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                  <div class="col-sm-12 col-md-8">
                   
                         </div> </div></div>
                               <div class="col-sm-12 col-md-4">
                                 <div id="example1_filter" class="dataTables_filter">
</div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead>
                  <tr>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Category name</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Edit</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Delete</th>
                  </tr>
                  </thead>
                  <tbody>
           
                  
                  
                  <?php
                  while($get1=mysqli_fetch_assoc($get)){
                     
                     ?>
                  <tr class="odd">
                    <td class="dtr-control sorting_1" tabindex="0">
                      <?=$get1['name'];?>
                    </td>

                    <td>
                       <a href="handlers/edit/cat.php?id=<?=$get1['catID']?>">
                      <i class="nav-icon fas fa-pen"></i>
                      </a>

                    </td>
                    <td> <a onclick="myFunction(<?=$get1['catID']?>)" >
                      <i class="nav-icon fas fa-trash-alt"></i>
                      <p id="demo"></p>
                      </a></td>
                    
</tr>
<?php } ?>


                  </tbody>
                  <tfoot>

                </tfoot>
                </table>  </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


<!-- ADD CATEGORY -->

          <div class="col-md-8 " id='hidden_div'>
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Category </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="handlers/addcat.php" method="post">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Category Name</label>
          <input type="text" name='catname' class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
        </div>


      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.card -->

  </div>
  <!-- /.card -->

   <!-- content End -->



</div></div></div></div></div>
<script>
function myFunction(id) {
  let text = "Are you sure ?";
  if (confirm(text) == true) {
    window.location="handlers/delete/cat.php?id="+id;
  } else {
    text = "You canceled!";
  }
  document.getElementById("demo").innerHTML = text;
}
</script>
<?php require("include/footer.php");
}else{
  header("Location:login.php");

}
?>