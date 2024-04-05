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
									<a href="shows.php" class="header__nav-link--active">SHOWS</a>
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
									<a href="discounts.php" class="header__nav-link">DISCOUNTS</a>
								</li>

								<!-- dropdown -->
								<li class="header__nav-item">
									<a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ADD</a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
										<li><a href="add-movie.php">NEW MOVIE</a></li>
                                        <li><a href="add-show.php">NEW SHOW</a></li>
										<li><a href="add-food.php">NEW FOOD</a></li>
										<li><a href="add-discount.php">NEW DISCOUNT</a></li>
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
						<h2 class="section__title">SHOWS</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="home-page.php">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Shows</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

    	<!-- filter -->
	<div class="filter">
		<div class="container">
			<div class="row">
				<div class="col-12">
					
				</div>
			</div>
		</div>
	</div>
	<!-- end filter -->

    <!-- catalog -->
	<div class="catalog">
		<div class="container">
			<div class="row">
<?php
include_once 'conx.php';
$result = mysqli_query($con,"SELECT * FROM shows");
if(mysqli_num_rows($result)>0){
    $i=0;
      while($row = mysqli_fetch_array($result)){
        $movieID=$row['movieID'];
        $result1 = mysqli_query($con,"SELECT * FROM movies WHERE movieID=$movieID");
        $row1 = mysqli_fetch_array($result1);
?>
				<!-- card -->
				<div class="col-6 col-sm-12 col-lg-6">
					<div class="card card--list">
						<div class="row">
							<div class="col-12 col-sm-4">
								<div class="card__cover">
									<img src="../posters/<?php echo $row1['poster'] ?>">
									<a href="../trailers/<?php echo $row1['trailer'] ?>" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
							</div>

							<div class="col-12 col-sm-8">
								<div class="card__content">
									<h3 class="card__title"><a href="#"><?php echo $row1['title'] ?></a></h3>

									<div class="card__wrap">
										<span class="card__rate"><i class="icon ion-ios-dollar"></i>Ticket price: 
                                        <?php echo $row['ticketPrice'] ?>.00 USD</span>
									</div>
                                    <div class="card__description">
                                            <p>Hall: <?php echo $row['hall'] ?></p>
                                            <p>Date of Show: <?php echo $row['date'] ?></p>
											<p>Start time: <?php echo $row['startTime'] ?></p>
                                    </div>
                                    <br>
										<span class="card__rate" >
                                        <a style="color:#d4af37" href="edit-ticket-price.php?shid=<?php echo $row['showID'] ?>" style="color:#ff55a5">
                                        <i class="icon ion-ios-create"></i>Edit Ticket Price</a></span><br>
										<span class="card__rate" >
										<a style="color:#d4af37" href="delete-show.php?shid=<?php echo $row['showID'] ?>" style="color:#ff55a5">
                                        <i class="icon ion-ios-trash"></i>Delete Show</a></span>
                                </div>
							</div>
						</div>
					</div>
				</div>
				<!-- end card -->
                <?php }} ?>

              

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