
<?php include "./inc/db.php"; ?>

        <?php include "./inc/header.php"; ?>

        <!-- Page content-->
        <div class="container mt-5">

<?php 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $q = mysqli_query($con, "SELECT * FROM stories WHERE id = $id ");
        $r = mysqli_fetch_assoc($q);


                      ?>


        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="/">Home</a></li>
		    <li class="breadcrumb-item"><a href="stories.php">Stories</a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?=ucwords($r['title']) ?></li>
		  </ol>
		</nav>

            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?=$r['title'] ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted by <?=$r['post_by'] ?> on <?=(new DateTime($r['datetime']))->format('M d, Y') ?></div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="stories.php?cat=<?=$r['category'] ?>"><?= ucwords($r['category']) ?></a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="./images/<?=$r['image'] ?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5 text-justify">
						<?=$r['details'] ?>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <h3>Comments</h3>
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                            </div>
                        </div>
                    </section>
                
		    <?php } ?>
                </div>
                <?php include "./inc/side_widget.php"; ?>
            </div>
        </div>
        <?php include "./inc/footer.php"; ?>