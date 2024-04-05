<?php
include_once 'conx.php';
session_start();
$uid = $_SESSION['uid'];
$result0 = mysqli_query($con,"SELECT * FROM users WHERE userID='$uid'");
$row0= mysqli_fetch_array($result0);
$fullname = $row0['fullName'];
        ?>


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
	<title>961CineApp – User Area</title>

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
									<a href="home-page.php?uid=<?php echo $uid ?>" class="header__nav-link--active">HOME</a>
								</li>

                                <li class="header__nav-item">
									<a href="movies.php?uid=<?php echo $uid ?>" class="header__nav-link">MOVIES</a>
								</li>

								<li class="header__nav-item">
									<a href="shows.php?uid=<?php echo $uid ?>" class="header__nav-link">SHOWS</a>
								</li>

                                <li class="header__nav-item">
									<a href="foods.php?uid=<?php echo $uid ?>" class="header__nav-link">BEVERAGES</a>
								</li>

                                <li class="header__nav-item">
									<a href="bookings.php?uid=<?php echo $uid ?>" class="header__nav-link">BOOKINGS</a>
								</li>
								<li class="header__nav-item">
									<a href="discounts.php?uid=<?php echo $uid ?>" class="header__nav-link">DISCOUNTS</a>
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

	<!-- home -->
	<section class="home">
		<!-- home bg -->
		<div class="owl-carousel home__bg">
			<div class="item home__cover" data-bg="../img/home/home__bg.jpg"></div>
			<div class="item home__cover" data-bg="../img/home/home__bg2.jpg"></div>
			<div class="item home__cover" data-bg="../img/home/home__bg3.jpg"></div>
			<div class="item home__cover" data-bg="../img/home/home__bg4.jpg"></div>
		</div>
		<!-- end home bg -->

		<div class="container">
			<div class="row">
				<div class="col-12">
				<h3 style="color:#d4af37"><b>Welcome</b> <?php echo $fullname ?>: 
				 <span ><a style="color:#fff" href="profile.php?uid=<?php echo $uid ?>"></span>Visit Your Profile</a></h3>
				
					<h1 class="home__title"><b>NEW MOVIES</b> OF THIS SEASON</h1>

					<button class="home__nav home__nav--prev" type="button">
						<i class="icon ion-ios-arrow-round-back"></i>
					</button>
					<button class="home__nav home__nav--next" type="button">
						<i class="icon ion-ios-arrow-round-forward"></i>
					</button>
				</div>

				<div class="col-12">
					<div class="owl-carousel home__carousel">
						
<?php
include_once 'conx.php';
$result = mysqli_query($con,"SELECT * FROM movies");
if(mysqli_num_rows($result)>0){
    $i=0;
      while($row = mysqli_fetch_array($result)){
?>						<div class="item">
							<!-- card -->
							<div class="card card--big">
								<div class="card__cover">
									<img src="../posters/<?php echo $row['poster'] ?>">
									<a href="movie-details.php?uid=<?php echo $uid ?>&mid=<?php echo $row['movieID'] ?>" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#"><?php echo $row['title'] ?></a></h3>
									<span class="card__category">
										<a href="#"><?php echo $row['category'] ?></a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-calendar"></i>
									<?php echo $row['releaseDate'] ?></span>
								</div>
							</div>
						</div>
							<!-- end card -->
							<?php }} ?>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end home -->


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