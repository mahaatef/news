<?php 
session_start();

  if(isset($_SESSION['name']) &&  $_SESSION['type']=="admin"){

  require("handlers/connect.php");

require("handlers/get/getNews.php");

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
                
                <h1 class="card-title col-9">  News </h1>
                <div onclick="showDiv()" class='text-primary col-3'>
<p>
              <i class="nav-icon fas fa-plus"></i> add News  </p>
           
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
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Title</th>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Image</th>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Body</th>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">category</th>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">added By</th>

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
                      <?=$get1['title'];?>
                    </td>


                    <td class="dtr-control sorting_1" tabindex="0">
                    <img src="handlers/upload/<?=$get1['image'];?>" alt="News Image" class="brand-image img-thumbnail elevation-3 bg-light" style="opacity: .8 ">
                      
                    </td>



                   
                    <td class="dtr-control sorting_1" tabindex="0">
                      <?=$get1['body'];?>
                    </td>

                    
                   
                    
                    <td class="dtr-control sorting_1" tabindex="0">
                      <?=$get1['cat'];?>
                    </td>

                    
                    <td class="dtr-control sorting_1" tabindex="0">
                      <?=$get1['user'];?>
                    </td>


<?php  $id1=$get1['newsID'];?>
                    <td>
                       <a href="handlers/edit/News.php?id=<?= $id1 ?>">
                      <i class="nav-icon fas fa-pen"></i>
                      </a>

                    </td> 

                    <td> <a onclick="myFunction(<?= $id1 ?>)" >
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


<!-- ADD News -->

          <div class="col-md-8 " id='hidden_div'>
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add News </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="handlers/addNews.php" method="post" enctype="multipart/form-data" >
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" name='title' class="form-control" id="exampleInputEmail1" placeholder="Enter News Name">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">body</label>
          <input type="text" name='body' class="form-control" id="exampleInputEmail1" placeholder="Enter News Name">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">image</label>
          <input type="file" name='img' class="form-control" id="exampleInputEmail1" placeholder="Enter News Name">
        </div>

        
        
       
        <div class="form-group">
        <label>Category</label>
        <select required name='catID' class="form-control" > 
                      <?php
                    $sql="SELECT * FROM category "; $getCat=mysqli_query($conn,$sql);

                     while($cat=mysqli_fetch_assoc($getCat)){?>

                      <option value='<?= $cat['catID']; ?>' >
                      <?= $cat['name']; ?> 
                      </option>
                    <?php
                     }
                     ?>
                    </td>
 </select>
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
    window.location="handlers/delete/News.php?id="+id;
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