
<?php include "./inc/db.php"; ?>

        <?php include "./inc/header.php"; ?>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-pic border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder text-white">Welcome to our Story Telling website</h1>
                    <p class="lead mb-0  text-white">There are a lot of interesting stories for your enjoyment.</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <div class="row">

<?php 
              
              $q = mysqli_query($con, "SELECT * FROM stories ORDER BY id DESC ");
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
