<?php 

session_start();

if(isset($_SESSION['name'])){
  require("../handlers/connect.php");

 require("include/header.php");
 $id=$_GET['id'];
require("handlers/getnewsByCat.php");



$sql="SELECT * FROM category WHERE catID=$id";

$cat1=mysqli_query($conn,$sql);
$cat=mysqli_fetch_assoc($cat1);


  ?>   





        <div class="content-wrapper">
          <div class="container">
            <div class="col-sm-12">
              <div class="card" data-aos="fade-up">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <h1 class="font-weight-600 mb-4">
                        <?= $cat['name'];?>
                      </h1>
                    </div>
                  </div>



                  
                  <div class="row">
                    <div class="col-lg-12">




<?php while($new=mysqli_fetch_assoc($news)){?>

                      <div class="row">
                        <div class="col-sm-4 grid-margin">
                          <div class="rotate-img">
                            <img
                              src="../handlers/upload/<?=$new['image']?>  "
                              alt="banner"
                              class="img-fluid"
                            />
                          </div>
                        </div>
                        <div class="col-sm-8 grid-margin">
                          <h2 class="font-weight-600 mb-2">
<?=$new['title']?>                          </h2>
                          
                          <p class="fs-15">
                          <?=$new['body']?>  
                          </p>
                        </div>
                      </div>
                    

<?php }?>







                    </div>
                   


                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <?php
  require("include/footer.php");

}
else{
  header("Location:../login.php");
} ?>