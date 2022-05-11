 <?php              
 $page= basename($_SERVER['PHP_SELF']);
?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="
            <?php if($_SESSION['type']=='admin'){
              echo " index.php";
            }else{
              echo " users/index.php";
            }?>
           " class="nav-link  <?php  if($page=='index.php'){echo "active";} ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              
              </p>
            </a>
           
          </li>


          <?php   if( $_SESSION['type']=="admin"){?>

            


            
          <li class="nav-item">
            <a href="users/index.php" class="nav-link ">
              <i class="nav-icon fas fa-plus"></i>
              <p>
               View website
            </p>
            </a>
          </li>



          

          <li class="nav-item">
            <a href="Users.php" class="nav-link <?php  if($page=='Users.php'){echo "active";} ?>">
              <i class="nav-icon fas fa-plus"></i>
              <p>
               Users
            </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="Cat.php" class="nav-link <?php  if($page=='Cat.php'){echo "active";} ?>">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Categories
            </p>
            </a>
          </li>




          <li class="nav-item">
            <a href="News.php" class="nav-link <?php  if($page=='News.php'){echo "active";} ?>">
              <i class="nav-icon fas fa-plus"></i>
              <p>
               News
            </p>
            </a>
          </li>


<?php }?>

