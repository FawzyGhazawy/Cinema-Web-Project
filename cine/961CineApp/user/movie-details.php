<?php
include_once 'conx.php';
session_start();
$uid = $_SESSION['uid'];
$result0 = mysqli_query($con,"SELECT * FROM users WHERE userID='" . $_GET['uid'] . "'");
$row0= mysqli_fetch_array($result0);
$fullname = $row0['fullName'];

$result = mysqli_query($con,"SELECT * FROM movies WHERE movieID='" . $_GET['mid'] . "'");
$row = mysqli_fetch_array($result);
$trailer = $row['trailer'];
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
 <!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="../img/home/home__bg.jpg"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title"><?php echo $row['title'] ?></h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="../posters/<?php echo $row['poster'] ?>" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<ul class="card__meta">
										<li><span>Genre:</span> <a href="#"><?php echo $row['category'] ?></a></li>
										<li><span>Release Date:</span> <?php echo $row['releaseDate'] ?></li>
										<li><span>Duration:</span><?php echo $row['duration'] ?></li>
										<li><span>Language:</span> <a href="#"><?php echo $row['language'] ?></a> </li>
									</ul>

									<div class="card__description card__description--details">
<?php
$totRate=0;
$result = mysqli_query($con,"SELECT * FROM movies WHERE movieID='" . $_GET['mid'] . "'");
while($row = mysqli_fetch_array($result)){
$rate = $row['rate'];
$totRate += $rate;
if($totRate==0){ ?> 

	<span class="card__rate"><i class="icon ion-ios-star-outline"></i></span>
	<span class="card__rate"><i class="icon ion-ios-star-outline"></i></span>
	<span class="card__rate"><i class="icon ion-ios-star-outline"></i></span>
	<span class="card__rate"><i class="icon ion-ios-star-outline"></i></span>

<?php } else if($totRate>0 && $totRate<=25){ ?> 

<span class="card__rate"><i class="icon ion-ios-star"></i></span>
<span class="card__rate"><i class="icon ion-ios-star-outline"></i></span>
<span class="card__rate"><i class="icon ion-ios-star-outline"></i></span>
<span class="card__rate"><i class="icon ion-ios-star-outline"></i></span>

<?php } else if($totRate > 25 && $totRate <= 50){ ?> 

<span class="card__rate"><i class="icon ion-ios-star"></i></span>
<span class="card__rate"><i class="icon ion-ios-star"></i></span>
<span class="card__rate"><i class="icon ion-ios-star-outline"></i></span>
<span class="card__rate"><i class="icon ion-ios-star-outline"></i></span>

<?php } else if($totRate > 50 && $totRate <= 75){ ?> 

<span class="card__rate"><i class="icon ion-ios-star"></i></span>
<span class="card__rate"><i class="icon ion-ios-star"></i></span>
<span class="card__rate"><i class="icon ion-ios-star"></i></span>
<span class="card__rate"><i class="icon ion-ios-star-outline"></i></span>

<?php } else if($totRate > 75 && $totRate <= 100){ ?> 

<span class="card__rate"><i class="icon ion-ios-star"></i></span>
<span class="card__rate"><i class="icon ion-ios-star"></i></span>
<span class="card__rate"><i class="icon ion-ios-star"></i></span>
<span class="card__rate"><i class="icon ion-ios-star"></i></span>

<?php } }?>
                                </div>
								<a style="color:#d4af37" 
								href="ranking.php?uid=<?php echo $uid ?>&mid=<?php echo $_GET['mid'] ?>">Rate Movie! </a>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
					<video controls crossorigin playsinline poster="../../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
						<!-- Video files -->
						<source src="../trailers/<?php echo $trailer ?>" type="video/mp4" size="1440">

						<!-- Caption files -->
						<track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
						    default>
						<track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

						<!-- Fallback for browsers that don't support the <video> element -->
						<a href="../trailers/<?php echo $row['trailer'] ?>" download>Download</a>
					</video>
				</div>
				<!-- end player -->
                </div>
				</div>
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

<!-- how it works -->
<section class="section section--dark">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title section__title--no-margin">Days of Show for this Movie</h2>
				</div>
				<!-- end section title -->

				
<?php 
$result1 = mysqli_query($con,"SELECT * FROM shows WHERE movieID='" . $_GET['mid'] . "'");
if(mysqli_num_rows($result1)>0){
	while($row1 = mysqli_fetch_array($result1)){
 ?>                      
						<!-- how box -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="how">
						<span class="how__number"><?php echo $row1['date'] ?></span>
						<h3 class="how__title">Start Time: <?php echo $row1['startTime'] ?></h3>
						<p class="how__text">Ticket Price: USD <?php echo $row1['ticketPrice'] ?>.00</p><br>
						<a class="filter__btn" href="book.php?uid=<?php echo $uid ?>&shid=<?php echo $row1['showID'] ?>">
                                        <i class="icon ion-ios-arrow"></i> BOOK NOW</a>
					</div>
				</div>
				<!-- ebd how box -->
				<?php }}
				else{
				?>
				<p style="color:#d4af37">No Shows Available Now!</p>
				<?php }?>
                </div>
		</div>
	</section>
	<!-- end how it works -->

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