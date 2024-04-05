<?php
include_once 'conx.php';
session_start();
$uid = $_SESSION['uid'];
$result0 = mysqli_query($con,"SELECT * FROM users WHERE userID='" . $_GET['uid'] . "'");
$row0= mysqli_fetch_array($result0);
$fullname = $row0['fullName'];

$result1 = mysqli_query($con,"SELECT * FROM shows WHERE showID='" . $_GET['shid'] . "'");
$row1 = mysqli_fetch_array($result1);
$movieID = $row1['movieID'];

$result2 = mysqli_query($con,"SELECT * FROM movies WHERE movieID='$movieID'");
$row2 = mysqli_fetch_array($result2);
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
									<a href="movies.php?uid=<?php echo $uid ?>" class="header__nav-link">MOVIES</a>
								</li>

								<li class="header__nav-item">
									<a href="shows.php?uid=<?php echo $uid ?>" class="header__nav-link">SHOWS</a>
								</li>

                                <li class="header__nav-item">
									<a href="foods.php?uid=<?php echo $uid ?>" class="header__nav-link">BEVERAGES</a>
								</li>

                                <li class="header__nav-item">
									<a href="bookings.php?uid=<?php echo $uid ?>" class="header__nav-link--active">BOOKINGS</a>
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
					<h1 class="details__title">Book to Watch "<?php echo $row2['title'] ?>" </h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="../posters/<?php echo $row2['poster'] ?>" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<ul class="card__meta">
										<li><span>Genre:</span> <a href="#"><?php echo $row2['category'] ?></a></li>
										<li><span>Release Date:</span> <?php echo $row2['releaseDate'] ?></li>
										<li><span>Duration:</span><?php echo $row2['duration'] ?></li>
										<li><span>Language:</span> <a href="#"><?php echo $row2['language'] ?></a> </li>
									</ul>

                                    <ul class="card__meta">
										<li><span>Date of Show:</span> <a href="#"><?php echo $row1['date'] ?></a></li>
										<li><span>Start Time:</span> <a href="#"><?php echo $row1['startTime'] ?></a></li>
										<li><span>Hall:</span> <a href="#"><?php echo $row1['hall'] ?></a></li>										
									</ul>
                                    </div>
                                        <span class="card__rate"><i class="icon ion-ios-dollar"></i>Ticket price: 
                                        <?php echo $row1['ticketPrice'] ?>.00 USD</span>
								</div>
							</div>
							<!-- end card content -->
						
					</div>
				</div>
				<!-- end content -->
                <!-- player -->
                <div class="col-12 col-xl-6">
					<!-- form of add movie -->			
                    <form action="save-booking.php?uid=<?php echo $uid ?>&shid=<?php echo $row1['showID'] ?>" class="sign__form" method="POST">
                    <div class="sign__group">
								<label class="sign__text"> Number of tickets that you want </label>
								<input type="text" class="sign__input" name="numberOfTicket">
							</div>
							<div class="sign__group">
								<label class="sign__text">Choose Your Payment Method</label>
								<select class="sign__input" name="payment" id="payment">
								<option value="Cash">Cash</option>
                                <option value="Credit Card" id="credit">Credit Card</option>
                                </select>
							</div>
							
							<div class="sign__group" id="cardInfo">
								<label class="sign__text">If you chose Credit Card</label><br>
								<label class="sign__text">Enter Your Card Number</label>
								<input type="number" class="sign__input" name="cardNumber">
								<label class="sign__text">Enter Your Card Expiry Date</label>
								<input type="date" class="sign__input" name="cardExpDate">
							</div>
							<br>
							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="student" type="checkbox" value="student">
								<label for="remember">I'm Student</label>
							</div>
							<div class="sign__group">
								<label class="sign__text"> Choose Your School</label>
								<select class="sign__input" name="school">
<?php
include_once 'conx.php';
$result3 = mysqli_query($con,"SELECT * FROM discounts");
if(mysqli_num_rows($result3)>0){
	  while($row3 = mysqli_fetch_array($result3)){
?>
								<option value="<?php echo $row3['schoolName'] ?>"><?php echo $row3['schoolName'] ?></option>
<?php }} ?>    
							</select>
							</div>
							<div class="sign__group">
								<label class="sign__text">Enter Coupon Code </label>
								<input type="text" class="sign__input" name="code">
							</div>
							<button class="sign__btn" type="submit">Send Booking</button>
                        </form>
						<!-- end form of add movie -->
				</div>
				<!-- end player -->
				
                </div>
				</div>
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

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