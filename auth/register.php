<?php


include "./../inc/db.php";


session_start();
if(isset($_SESSION["user"])) {
    
    ?>
    
	    <script type= "text/javascript">
	        window.location="/admin/add_sites.php";
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
  <title>Register</title>
  <!-- base:css -->
  <link rel="stylesheet" href="./../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h5>StoryTeller</h5>
              </div>
              <!-- <h4>Hello! let's get started</h4> -->
              <h6 class="font-weight-light">Register as storyteller.</h6>

              <?php 

$message = '';

if (isset($_POST["submit"])) {
  
    $uid = mysqli_real_escape_string($con,$_POST['email']);
    $pwd = mysqli_real_escape_string($con,$_POST['password']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    
    //Error Handlers
    if (empty($uid) || empty($pwd) || empty($name)) {
        
      $message ='<div class="alert alert-danger"> <i class="ti-user"></i> fields cannot be empty
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          </div>';  
    } else {
        
        $sql = "SELECT * FROM users WHERE email ='$uid' ";
        $result = mysqli_query($con, $sql);
        
        $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck > 0) {
            
      $message = '<div class="alert alert-danger"> <i class="ti-user"></i>User exists
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          </div>';          
        } else {

          $pwdhash = password_hash($pwd, PASSWORD_DEFAULT);

          $q = mysqli_query($con,"insert into users (name,password,email) values ('$name','$pwdhash','$uid') ");
          var_dump($q);
          if ($q) {

        echo "<script>alert('data has been inserted sucessfully')</script>";
                    
                    //login the admin here
                     $_SESSION["user"]=$name;
                    ?>
                    <script type="text/javascript">
                        window.location="/index.php";
                    </script>
                    <?php
                
            }
        }
    }
   
} 

?>


              <form  method="POST" action="">
                <div class="form-group">
                  <input type="text" placeholder="Name" name="name" class="form-control form-control-lg" >
                </div>
                <div class="form-group">
                  <input type="email" placeholder="Email" name="email" class="form-control form-control-lg" >
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" placeholder="Password" name="password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-dark btn-lg font-weight-medium " type="submit" name="submit">Register</button>
                </div>
              
               
              </form>


        <?php echo $message; ?>


            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="./../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="./../assets/js/off-canvas.js"></script>
  <script src="./../assets/js/hoverable-collapse.js"></script>
  <script src="./../assets/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
<?php }?>