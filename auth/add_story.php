<?php

include "./../inc/db.php";

  include "./../inc/header.php";
if(!isset($_SESSION["user"])) {
    
    ?>
    
	    <script type= "text/javascript">
	        window.location="/login.php";
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
          <div class="row">
           <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                  <div class="col-4" style="padding: 10px;">
                    <a href="index.php" class="btn btn-primary">Back</a>
                  </div>
                <div class="card-body" style="padding-bottom: 160px;">
                  <h4 class="card-title">ADD NEW STORY</h4>

                   <form action="" method="post"  enctype="multipart/form-data">
                 
                    <div class="row">
                      <div class="col-6">
                          <div class="form-group mt-4">
                              <label for="" class="control-label">Title</label>
                              <div class="col-md-12">
                                  <input name="title" type="text" class="form-control">
                              </div>
                          </div>
                          <div class="form-group mt-4">
                              <label for="" class="control-label">Category</label>
                              <div class="col-md-12">
                                  <select name="category" type="text" class="form-control">
                                        <option value="adventure">Adventure</option>
                                        <option value="cultural">Cultural</option>
                                        <option value="wildlife">Wildlife</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-5">
                        <div class="form-group mt-3">
                          <input type="file" class="form-control btn btn-success" name="img" style="margin-top: 30px">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                      </div>  
                       <div class="col-11">
                        <div class="form-group mt-4">
                          <label for="" class="control-label col-md-3">Details</label>
                          <div class="col-md-12">
                              <textarea name="details"  class="form-control"></textarea>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-flat mt-4" name="add_banner">Add place</button>
                      </div>   

                    </div>

               
                </form>

                </div>


                 
              </div>
            </div>
        </div>
        </div>
        <!-- content-wrapper ends -->

<?php 
if (isset($_POST['add_banner'])) {
 

  // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["img"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["img"]["tmp_name"])) {
        $response = array(
            "type" => "error",
            "message" => "Choose image file to upload."
        );
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
          echo "<script>alert('Upload valiid images. Only PNG and JPEG are allowed.')</script>";

    }    // Validate image file size
    else if (($_FILES["img"]["size"] > 10000000000)) {
          echo "<script>alert('Image size exceeds 50000kb')</script>";
    } else {

          $imgg = basename($_FILES["img"]["name"]);
        $target = "../images/".$imgg;
      
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target)) {
          $date = (new DateTime())->format('Y-m-d H:i:s');

          $q = mysqli_query($con,"insert into stories (image,title,details,category,post_by,datetime) values ('$imgg','$_POST[title]','$_POST[details]','$_POST[category]','$_SESSION[user]','$date') ");
          if ($q) {

        echo "<script>alert('data has been inserted sucessfully')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
          }else{
          echo mysqli_error($con);
          }
        
        } else {
        echo "<script>alert('an error occured!')</script>";
          // echo mysqli_error($con);

        }
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