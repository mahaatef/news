<?php 
session_start();

  if(isset($_SESSION['name'])){

   
require("handlers/connect.php");

require("handlers/get/getusers.php");

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
                <h1 class="card-title col-9">Users</h1>

                <div onclick="showDiv()" class='text-primary col-3'>
<p>
              <i class="nav-icon fas fa-plus"></i> add User </p>
           
</div>
                
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                  <div class="col-sm-12 col-md-8">
                    <div class="dt-buttons btn-group flex-wrap">      
                          </div> </div></div>
                               <div class="col-sm-12 col-md-4">
                                 <div id="example1_filter" class="dataTables_filter">
</div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead>
                  <tr>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">User Name</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Name</th>

                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>

                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Mobile</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">type</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"># of News Created</th>


                  
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Edit</th>

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


                    <td class="dtr-control sorting_1" tabindex="0">
                      <?=$get1['firstName']." ".$get1['lastName'];?>
                    </td>

                    
                    <td class="dtr-control sorting_1" tabindex="0">
                      <?=$get1['email'];?>
                    </td>


                    
                    <td class="dtr-control sorting_1" tabindex="0">
                      <?=$get1['mobile'];?>
                    </td>



                    <td class="dtr-control sorting_1   <?php if($get1['type']=='deactive'){echo 'text-danger';}?>" tabindex="0">
                      <?=$get1['type'];?>
                    </td>


                    
                    <td class="dtr-control sorting_1" tabindex="0">

                      <?php
                    $userid=$get1['userID'];
                    $sql2="SELECT count(newsID)  AS 'news' FROM news  WHERE userID=$userid";
                     $count=mysqli_query($conn,$sql2);

                     $newsNum=mysqli_fetch_assoc($count);

                      echo $newsNum['news']; 
                     
                     ?>
                    </td>


               

                    


                    



                    <td>
                       <a href="handlers/edit/users.php?id=<?=$get1['userID']?>">
                      <i class="nav-icon fas fa-pen"></i>
                      </a>

                    </td>
                    
            
                    
</tr>
<?php } ?>







                  </tbody>
                  <tfoot>

                </tfoot>
                </table>   </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


<!-- ADD CATEGORY -->

          <div class="col-md-8 " id='hidden_div'>
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add User </h3>
    </div>
    <!-- /.card-header -->






    <!-- form start -->
    
    <form action="handlers/addusers.php" method="post">

    <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">User Name</label>
          <input type="text" name='name' required class="form-control" id="exampleInputEmail1" placeholder="Enter User Name">
        </div>
      </div>


      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">First Name</label>
          <input type="text" name='Fname' required class="form-control" id="exampleInputEmail1" placeholder="Enter User Name">
        </div>
      </div>

        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Last Name</label>
          <input type="text" name='Lname' required class="form-control" id="exampleInputEmail1" placeholder="Enter User Name">
        </div>
        </div>

        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> Password</label>
          <input type="password" name='password'  class="form-control" id="exampleInputEmail1" placeholder="Enter New Password">
        </div>
        </div>

        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> email</label>
          <input type="text" name='email'  class="form-control" id="exampleInputEmail1" placeholder="Enter User Email">
        </div>
        </div>


        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">mobile</label>
          <input type="number" required name='mobile' class="form-control" id="exampleInputEmail1" placeholder="Enter User Mobile">
        </div>
        </div>

        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">type</label>
          <select  required name='type' class="form-control" >
                      <option value="user">User</option>
                      <option value="admin">Admin</option>


          </select>

        </div>
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
    window.location="handlers/delete/users.php?id="+id;
  } 
}
</script>
 
<?php require("include/footer.php");
}else{
  header("Location:login.php");

}
?>