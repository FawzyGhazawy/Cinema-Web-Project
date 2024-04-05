<?php
include_once 'conx.php';
session_start();
$uid = $_SESSION['uid'];
$result0 = mysqli_query($con,"SELECT * FROM users WHERE userID='" . $_GET['uid'] . "'");
$row0= mysqli_fetch_array($result0);
$fullname = $row0['fullName'];

if(isset($_POST['genre'])){ $genre=$_POST['genre'];}
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
									<a href="home-page.php?uid=<?php echo $uid ?>" class="header__nav-link">HOME</a>
								</li>

                                <li class="header__nav-item">
									<a href="movies.php?uid=<?php echo $uid ?>" class="header__nav-link--active">MOVIES</a>
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
						<h2 class="section__title"><?php echo $genre ?> Movies</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="home-page.php">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Movies</li>
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
				<div class="col-3">
					
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
$result = mysqli_query($con,"SELECT * FROM movies WHERE category='$genre'");
if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_array($result)){
?>
				<!-- card -->
				<!-- card -->
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card">
						<div class="card__cover">
							<img src="../posters/<?php echo $row['poster'] ?>" alt="" style="height:250px;">
							<a href="movie-details.php?uid=<?php echo $uid ?>&mid=<?php echo $row['movieID'] ?>" class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="movie-details.php?uid=<?php echo $uid ?>&mid=<?php echo $row['movieID'] ?>">
                            <?php echo $row['title'] ?></a></h3>
							<span class="card__category">
								<a href="movie-details.php?uid=<?php echo $uid ?>&mid=<?php echo $row['movieID'] ?>"><?php echo $row['category'] ?></a>
							</span>
							<span class="card__rate"><i class="icon ion-ios-calendar"></i>
                            <?php echo $row['releaseDate'] ?></span>
						</div>
					</div>
				</div>
				<!-- end card -->
                <?php }}
                else{ ?>
                        <span style="color:#d4af37">
								<p>NO MOVIES FOUND!</p>
						</span>
                <?php } ?>
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