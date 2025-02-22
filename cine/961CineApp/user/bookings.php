<?php
include_once 'conx.php';
session_start();
$uid = $_SESSION['uid'];
$result0 = mysqli_query($con,"SELECT * FROM users WHERE userID='" . $_GET['uid'] . "'");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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

		<!-- page title -->
		<section class="section section--first section--bg" data-bg="../img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">BOOKINGS</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="home-page.php?uid=<?php echo $uid ?>">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Bookings</li>
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
				<div class="col-6">
						
				</div>
			</div>
		</div>
	</div>
	<!-- end filter -->
    <!-- catalog -->
	<div class="catalog">
		<div class="container">
			<div class="row">
				<!-- card -->
				<div class="col-12 col-sm-12 col-lg-12">
						<div class="row">
						<table class="table" style="color:#fff">
  							<thead>
    							<tr>
      							<th scope="col">Movie Showed</th>
      							<th scope="col">Show Details</th>
								<th scope="col">Booking Details</th>
								<th scope="col">Download Tickets</th>
								<th scope="col">Cancel Booking</th>
    							</tr>
  							</thead>
  							<tbody>
<?php
include_once 'conx.php';
$result = mysqli_query($con,"SELECT * FROM booking WHERE userID='$uid'");
if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_array($result)){
		$showID=$row['showID'];
		$uid=$row['userID'];
		$totalAmount = $row['discountedPrice'] * $row['numberOfTickets'];

		$result1 = mysqli_query($con,"SELECT * FROM shows WHERE showID='$showID'");
		$row1=mysqli_fetch_array($result1);
		$movieID = $row1['movieID'];

		$result2 = mysqli_query($con,"SELECT * FROM movies WHERE movieID='$movieID'");
		$row2=mysqli_fetch_array($result2);

		$result3 = mysqli_query($con,"SELECT * FROM users WHERE userID='$uid'");
		$row3=mysqli_fetch_array($result3);
?>
    							<tr>
      							<td><?php echo $row2['title'] ?></td>
      							<td>- Date: <?php echo $row1['date'] ?><br>
								  - Start Time: <?php echo $row1['startTime'] ?><br>
								  - Hall: <?php echo $row1['hall'] ?>
								</td>
								<td>- Total Price: $<?php echo $totalAmount ?><br>
                                    - Number of Tickets: <?php echo $row['numberOfTickets'] ?><br>
								    - Payment: <?php echo $row['payment'] ?><br>
                                    - Booked on: <?php echo $row['createdDate'] ?></td>
								
								<td><a style="font-style:italic;color:#d4af37" 
								href="../img/Ticket.png?uid=<?php echo $uid ?>" 
								download="<?php echo $row2['title'] ?> - Ticket">
                                <i class="icon ion-ios-pen"></i>Click Here to Download Ticket</a></td>
                                
								<td><a style="font-style:italic;color:#d4af37" 
								href="cancel-booking.php?uid=<?php echo $uid ?>&bid=<?php echo $row['bookingID'] ?>">
								<i class="icon ion-ios-close-circle"></i></td>
								</tr>
								<?php }} ?>
  							</tbody>
						</table>
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