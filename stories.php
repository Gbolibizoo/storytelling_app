
<?php include "./inc/db.php"; ?>

        <?php include "./inc/header.php"; ?>
        <!-- Page content-->
        <div class="container mt-4">

<?php 

    if(isset($_GET['cat'])){
        $cat = $_GET['cat'];
    } else {
        $cat = "Stories";
    }


                      ?>

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="/">Home</a></li>
		    <li class="breadcrumb-item active"><?=ucwords($cat)?></li>
		  </ol>
		</nav>

            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <div class="row">

<?php 

if(isset($_GET['cat'])){
    $cat = $_GET['cat'];
    
              $q = mysqli_query($con, "SELECT * FROM stories WHERE category = '" . $cat . "' ORDER BY id DESC");
  }  else {

              $q = mysqli_query($con, "SELECT * FROM stories ORDER BY id DESC ");
            }
                        while($r = mysqli_fetch_assoc($q)){ 

                            ?>

                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="./images/<?=$r['image'] ?>" height="250" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?=(new DateTime($r['datetime']))->format('M d, Y') ?></div>
                                    <h2 class="card-title h4"><?=$r['title'] ?></h2>
                                    <p class="card-text"><?=substr($r['details'] , 0, 160)?>...</p>
                                    <a class="btn btn-primary" href="story.php?id=<?=$r['id'] ?>">Read more →</a>
                                </div>
                            </div>
                        </div>


                        <?php } ?>

                    </div>
                </div>
                <?php include "./inc/side_widget.php"; ?>
            </div>
        </div>
        <?php include "./inc/footer.php"; ?>
