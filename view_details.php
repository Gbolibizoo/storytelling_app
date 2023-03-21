<?php include "./inc/db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="container mt-4">
		<div class="row">

			<?php 

			if(isset($_GET['id'])){
				$id = $_GET['id'];
                          
                $q = mysqli_query($con, "SELECT * FROM stories WHERE id = $id ");
                $r = mysqli_fetch_assoc($q);


                          	?>
			
			<h3 class="pb-4"><?=$r['title'] ?></h3>
		
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
		    <li class="breadcrumb-item"><a href="places.php">favourite places</a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?=$r['title'] ?></li>
		  </ol>
		</nav>


		</div>

		<div class="row" style="padding: 20px;">

			
					<div class="col-6 offset-md-3">
						<img src="./images/<?=$r['image'] ?>" alt="" style="width: 100%;">
					</div>
				</div>


				<div class="col-12">
					<div class="text-justify">
						<?=$r['details'] ?>
					</div>
				</div>

				
		<?php } ?>
	</div>


	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>