<?php 
    session_start();
?>

<?php

//-----DB Connection code------
$servername = "localhost";
$serverUsername = "hl5uq";                         //computing id
$serverPassword = "LHDJ8PVC";                   //---- your password
$database = "hl5uq";              // computing id

// Create connection
$conn = new mysqli($servername, $serverUsername, $serverPassword, $database);
// Check connection
if ($conn->connect_error)
{
	die ("Connection failed: ". $conn->connect_error);
}

// ---- VARIABLE DECLARATIONS ----
$_SESSION['input_flightNum'] = $_POST["select_flight"][0];
$_SESSION['class'] = $_POST["select_flight"][1];
$_SESSION['input_date'] = $_POST["select_flight"][2];
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Travel &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	

  

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<!-- CS Select -->
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">
	
	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>

	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="home.html"><i class="icon-airplane"></i>G7 Flights</a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li><a href="home.html">Book Flights</a></li>
							<!-- <li>
								<a href="vacation.html" class="fh5co-sub-ddown">Vacations</a>
								<ul class="fh5co-sub-menu">
									<li><a href="#">Family</a></li>
									<li><a href="#">CSS3 &amp; HTML5</a></li>
									<li><a href="#">Angular JS</a></li>
									<li><a href="#">Node JS</a></li>
									<li><a href="#">Django &amp; Python</a></li>
								</ul>
							</li> -->
							<li class="active"><a href="flightInfo.html">Flight Information</a></li>
							<li><a href="mytrip.html">My Trips</a></li>
							<li><a href="login.php">Log In</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<!-- end:header-top -->

		<!-- reservation form here -->
		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Passenger Information</h3>
						<p>Please enter your name as you appear on the government-issued photo identification.</p>
					</div>
				</div>
				<form method="POST" action="ticket.php">
					<div class="row animate-box">
						<div class="col-md-4">
							<div class="form-group">
								<label for="first-name">Your First Name:<sup style="color:  rgba(255, 10, 30, 0.7)"> *</sup></label>
								<input type="text" class="form-control" id="first-name" name="input_first_name" placeholder="First Name" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="middle-name">Your Middle Name:</label>
								<input type="text" class="form-control" id="middle-name" name="input_middle_name" placeholder="Middle Name">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="last-name">Your Last Name:<sup style="color:  rgba(255, 10, 30, 0.7)"> *</sup></label>
								<input type="text" class="form-control" id="last-name" name="input_last_name" placeholder="Last Name" required>
							</div>
						</div>
						<div class="col-xxs-12 col-xs-6 mt alternate">
							<div class="input-field">
								<label for="date-of-birth">Date of Birth: <sup style="color:  rgba(255, 10, 30, 0.7)"> *</sup></label>
								<input type="text" class="form-control" id="date-of-birth" name="input_dob" placeholder="mm/dd/yyyy"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email Address: <sup style="color:  rgba(255, 10, 30, 0.7)"> *</sup></label>
								<input type="email" class="form-control" id="email" name="input_email" placeholder="Email">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone1">Primary Phone Number: <sup style="color:  rgba(255, 10, 30, 0.7)"> *</sup></label>
								<input type="text" class="form-control" id="phone1" name="input_phone1" placeholder="xxx-xxx-xxxx">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone2">Supportive Phone Number: </label>
								<input type="text" class="form-control" id="phone2" name="input_phone2" placeholder="xxx-xxx-xxxx">
							</div>
						</div>
						<div style="float: right; margin-right: 3%">
							<div class="form-group">
								<input type="submit" value="Submit" class="btn btn-primary">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- footer here -->
		<footer>
			<div id="footer">
				<div class="container">
					<div class="row row-bottom-padded-md">
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>About G7 Flights</h3>
							<p>This is the course project for CS6750-S18:<br> Database System. <br> We are Group 7.</p>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Top Destinations</h3>
							<ul>
								<li><a href="#">San Francisco</a></li>
								<li><a href="#">New York City</a></li>
								<li><a href="#">Los Angeles</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Other Options</h3>
							<ul>
								<li><a href="#">A</a></li>
								<li><a href="#">B</a></li>
								<li><a href="#">C</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Other Options</h3>
							<ul>
								<li><a href="#">A</a></li>
								<li><a href="#">B</a></li>
								<li><a href="#">C</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Best Places</h3>
							<ul>
								<li><a href="#">Boracay Beach</a></li>
								<li><a href="#">Dubai</a></li>
								<li><a href="#">Singapore</a></li>
								<li><a href="#">Hongkong</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Affordable</h3>
							<ul>
								<li><a href="#">Food &amp; Drink</a></li>
								<li><a href="#">Fare Flights</a></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							<p>Copyright 2016 Free Html5 <a href="#">Module</a>. All Rights Reserved. <br>Made By <a href="http://www.cssmoban.com/" target="_blank" title="G7 Flights">G7 Flights</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>

	

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	<!-- CS Select -->
	<script src="js/classie.js"></script>
	<script src="js/selectFx.js"></script>
	
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>