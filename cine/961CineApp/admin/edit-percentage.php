<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="../css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="../css/nouislider.min.css">
	<link rel="stylesheet" href="../css/ionicons.min.css">
	<link rel="stylesheet" href="../css/plyr.css">
	<link rel="stylesheet" href="../css/photoswipe.css">
	<link rel="stylesheet" href="../css/default-skin.css">
	<link rel="stylesheet" href="../css/style.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="../img/logo.jpg" sizes="32x32">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>961CineApp – Admin Area</title>

</head>
<body class="body">
	
	<!-- header -->
	<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<!-- header logo -->
							<a href="home-page.php" class="header__logo">
								<img src="../img/logo.jpg" alt="" style="width:70px;height:70px">
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
                                <li class="header__nav-item">
									<a href="home-page.php" class="header__nav-link">HOME</a>
								</li>

                                <li class="header__nav-item">
									<a href="movies.php" class="header__nav-link">MOVIES</a>
								</li>
                                <li class="header__nav-item">
									<a href="shows.php" class="header__nav-link">SHOWS</a>
								</li>
                                <li class="header__nav-item">
									<a href="foods.php" class="header__nav-link">BEVERAGES</a>
								</li>

                                <li class="header__nav-item">
									<a href="bookings.php" class="header__nav-link">BOOKINGS</a>
								</li>

								<li class="header__nav-item">
									<a href="statistics.php" class="header__nav-link">STATISTICS</a>
								</li>
								
                                <li class="header__nav-item">
									<a href="discounts.php" class="header__nav-link--active">DISCOUNTS</a>
								</li>

								<!-- dropdown -->
								<li class="header__nav-item">
									<a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ADD</a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
										<li><a href="add-movie.php">NEW MOVIE</a></li>
                                        <li><a href="add-show.php">NEW SHOW</a></li>
										<li><a href="add-food.php">NEW FOOD</a></li>
										<li><a href="add-discount.php">NEWDISCOUNT</a></li>
									</ul>
								</li>
								<!-- end dropdown -->
							</ul>
							<!-- end header nav -->

							<!-- header auth -->
							<div class="header__auth">
								<a href="logout.php" class="header__sign-in">
									<span>Logout</span>
								</a>
							</div>
							<!-- end header auth -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- end header -->

		<!-- page title -->
		<section class="section section--first section--bg" data-bg="../img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">EDIT DISCOUNTS</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="home-page.php">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Edit Discount Percentage</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<div class="section">
		<div class="container">
			<div class="row">
						<!-- card -->
						<div class="col-12 col-sm-12 col-lg-12">
							<div class="card card--list">
								<div class="row">
									<div class="col-12 col-sm-12">
<?php
include_once 'conx.php';
$result = mysqli_query($con,"SELECT * FROM discounts where discountID='" . $_GET["did"] . "'");
$row = mysqli_fetch_array($result);
       
?>
						<!-- form of add movie -->			
						<form action="save-new-prercentage.php?did=<?php echo $row['discountID'] ?>" class="sign__form" method="POST" enctype="multipart/form-data">
							 <div class="sign__group">
                             <label class="sign__text">School: <?php echo $row['schoolName'] ?></label><br>
							<label class="sign__text">Old Percentage: <?php echo $row['percentage'] ?>%</label>
								<input type="number" class="sign__input" style="width:1000px" 
                                placeholder="Enter New Percentage" name="newPercent">
							</div>
							<button class="sign__btn" type="submit">SAVE NEW PERCENTAGE</button>
                        </form>
						<!-- end form of add movie -->
									</div>
								</div>
							</div>
						</div>
						<!-- end card -->
					</div>
				</div>
	</div>




<!-- footer -->
<footer class="footer">
		<div class="container">
			<div class="row">
				<!-- footer copyright -->
				<div class="col-12">
					<div class="footer__copyright">
						<small><a href="#" style="color:#d4af37">961CineApp,</a> All Rights Reserved</small>

						<ul>
							<li><a href="#">Senior Project</a></li>
							<li><a href="#">Spring-2023</a></li>
						</ul>
					</div>
				</div>
				<!-- end footer copyright -->
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- JS -->
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery.mousewheel.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.min.js"></script>
	<script src="../js/wNumb.js"></script>
	<script src="../js/nouislider.min.js"></script>
	<script src="../js/plyr.min.js"></script>
	<script src="../js/jquery.morelines.min.js"></script>
	<script src="../js/photoswipe.min.js"></script>
	<script src="../js/photoswipe-ui-default.min.js"></script>
	<script src="../js/main.js"></script>
</body>

</html>