<?php

include "./../inc/db.php";

  include "./../inc/header.php";
if(!isset($_SESSION["user"])) {
    
    ?>
    
	    <script type= "text/javascript">
	        window.location="/auth/login.php";
	    </script>
    
    <?php
    
}else{

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <!-- base:css -->
  <link rel="stylesheet" href="./../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./../assets/css/styles.css">
  <!-- endinject -->
</head>

<body>
  <div class="container-scroller d-flex">

    <div class="container page-body-wrapper mt-4">
   
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">

          <?php 
            $stat_t = mysqli_query($con, "SELECT COUNT(*) as story_count FROM stories");

        $t = mysqli_fetch_assoc($stat_t);

        $stat_u = mysqli_query($con, "SELECT COUNT(*) as user_count FROM users");

    $u = mysqli_fetch_assoc($stat_u);
          ?>

          <div class="col-3">
          <div class="card-body bg-success text-white">
            <h1><?=$t['story_count']?></h1>
                  <h5 class="card-title">No of Stories</h5>
          </div>
          </div>
          <div class="col-3">
          <div class="card-body bg-primary text-white">
            <h1><?=$u['user_count']?></h1>
                  <h5 class="card-title">No of StoryTellers</h5>
          </div>
          </div>
          </div>
          <div class="row">
           
                  <div class="col-4" style="padding: 10px;">
                    <a href="/auth/add_story.php" class="btn btn-primary">ADD</a>
                  </div>
                <div class="card-body">
                  <h4 class="card-title">LIST OF STORIES</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            id
                          </th>
                          <th>
                            image
                          </th>
                          <th>
                            title
                          </th>
                          <th>
                            details
                          </th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        
                          <?php 
                          
                          $q = mysqli_query($con, "SELECT * FROM stories ORDER BY id DESC ");
                          while($r = mysqli_fetch_assoc($q)){ ?>
                            <tr>
                                <td><?=$r['id'] ?></td>
                                <td><img src="../images/<?=$r['image'] ?>" alt="" width="200"></td>
                                <td><?=$r['title'] ?></td>
                                <td><?=$r['details'] ?></td>
                                <td><a href="?delete=<?=$r['id'] ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                         <?php }
                          
                          ?>
                          
                      </tbody>
                    </table>
                  </div>
                </div>
             
        </div>
        </div>
        <!-- content-wrapper ends -->

        <?php 

        if(isset($_GET['delete'])){
         $id = $_GET['delete'];
        
          $data = mysqli_query($con, "DELETE FROM stories WHERE id = $id ");

          if($data == true){
            echo "<script>window.open('index.php','_self')</script>";

          }

        }
         ?>


      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="./../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="./../assets/js/off-canvas.js"></script>
  <script src="./../assets/js/hoverable-collapse.js"></script>
  <script src="./../assets/js/template.js"></script>
  <!-- endinject -->
  <!-- End custom js for this page-->
</body>

</html>

<?php }?>