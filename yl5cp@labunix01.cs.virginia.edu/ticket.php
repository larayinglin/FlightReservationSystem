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
$nameErr = $dobErr = $emailErr = $phoneErr = "";
$input_first_name = $input_middle_name = $input_last_name = "";
$input_dob = "";
$input_email = "";
$input_phone1 = $input_phone2 = "";
// session read

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
							<!-- <li><a href="mytrip.html">My Trips</a></li>
							<li><a href="login.php">Log In</a></li> -->
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<!-- end:header-top -->




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$flight_number = $_POST["flight_number"];
	$class = $_POST["class"];
	$flight_date = $_POST["flight_date"];
	$custID = $_POST["input_cust_id"];
	$input_first_name = $_POST["input_first_name"];   //HINT: Use the values from Form method
	$input_middle_name = $_POST["input_middle_name"];
	$input_last_name = $_POST["input_last_name"];
	$custName = $input_first_name . " " . $input_middle_name . " " .$input_last_name;
	$input_dob = $_POST["input_dob"];
	$input_email = $_POST["input_email"];
	$input_phone1 = $_POST["input_phone1"];
	$input_phone2 = $_POST["input_phone2"];
	$ticketNum = rand(1000000,9999999);
}

// insert data
$sql1 = "insert into customer values(" . $custID . ",'$custName'," . $input_dob . ", '$input_email')";
$sql2 = "insert into customer_custPhone values(" .$input_phone1 . "," . $custID . ")";
// $sql3 = "insert into customer_custPhone values(" .$input_phone2 . "," . $custID . ")";
$sql4 = "insert into reservation values('$ticketNum', " . $custID . ", " . $flight_number . ", '$class',null," . $flight_date . ")";


$step1 = $conn->query($sql1);//执行sql
$step2 = $conn->query($sql2);
//$step3 = $conn->query($sql3);
$step4 = $conn->query($sql4);

// $sql = "SELECT ticketNum,rfc.flightNum,custName,price,timeDepart, timeArrive, departIATA, arriveIATA, class, model, WiFi, Power
// from (
// SELECT ticketNum,flightNum, customer.custID, custName, timeDepart, timeArrive, departIATA,arriveIATA,model,WiFi,Power
// FROM (
// SELECT * 
// FROM reservation
// NATURAL JOIN fm
// ) AS rf
// INNER JOIN customer ON customer.custID = rf.custID
// WHERE rf.custID =" . $custID . "
// ) AS rfc
// INNER JOIN price ON rfc.flightNum = price.flightNum
// WHERE price.class =  '$class'";

// $sql = "select ticketNum,rfc.flightNum,custName, departIATA, arriveIATA, timeDepart, timeArrive, price,  class, WiFi, Power
// from
// (select ticketNum,flightNum, customer.custID, custName, timeDepart, timeArrive, departIATA,arriveIATA,model,WiFi,Power
// from 
// (select *
// FROM reservation
// NATURAL JOIN fm ) AS rf
// INNER JOIN customer ON customer.custID = rf.custID
// WHERE rf.custID =" . $custID . "
// ) AS rfc
// INNER JOIN price ON rfc.flightNum = price.flightNum
// WHERE price.class =  '$class' ";

// $result = $conn->query($sql);


?>
        

<?php
if ($step1===TRUE && $step2===TRUE && $step4===TRUE) {
  echo "<center><div class=\"row\"><br><br><br><br><h1><b>Successfully Reserved!</b></h1><br><br>";
  echo "<h2>Ticket Number: " .$ticketNum ."</h2></div></center><br><br>"; 
  echo "<h2 style=\"float: left;  margin-left: 3%\">Flight Information Confirmation:</h2><br>";
  echo "<table class=\"table table-striped\"><thead><tr><th></th><th scope=\"row\">Flight Number</th><th scope=\"row\">Class</th><th scope=\"row\">Date</th></tr></thead>";
  echo "<tbody><tr><td></td><td scope=\"row\">".$flight_number."</td>"; 
  echo "<td scope=\"row\"><h3>".$class."</h3></td>";
  echo "<td scope=\"row\"><h3>".$flight_date."</h3></td></tr></tbody></table>";
  echo "<h2 style=\"float: left;  margin-left: 3%\">Passenger Information Confirmation:</h2><br>";
  echo "<table class=\"table table-striped\"><thead><tr><th></th><th scope=\"row\">ID</th><th scope=\"row\">Name</th><th scope=\"row\">Phone Number</th></tr></thead>";
  echo "<tbody><tr><td></td><td scope=\"row\"><h3>".$custID."</h3></td>";
  echo "<td scope=\"row\"><h3>".$custName."</h3></td>";
  echo "<td scope=\"row\"><h3>".$input_phone1."</h3></td></tr></tbody></table>";
	
//   echo "<table class=\"table\">";

//   if ($result->num_rows > 0) {
	//   echo "<table class=\"table table-striped\"><thead><tr><th scope=\"row\">Flight Number</th><th scope=\"row\">Class</th><th scope=\"row\">Date</th><th scope=\"row\">ID</th><th scope=\"row\">Name</th><th scope=\"row\">Phone Number</th></tr></thead>";
	//   echo "<tbody><td scope=\"row\">".$flight_number."</td>"; 
	//   echo "<td scope=\"row\"><h3>".$class."</h3></td>";
	//   echo "<td scope=\"row\"><h3>".$flight_date."</h3></td>";
	//   echo "<td scope=\"row\"><h3>".$custID."</h3></td>";
	//   echo "<td scope=\"row\"><h3>".$custName."</h3></td>";
	//   echo "<td scope=\"row\"><h3>".$input_phone1."</h3></td></tr></table></tbody>";
	//   echo "<td>" . $row["departIATA"] . "</td>";
	//   echo $row["flightNum"];
	//   echo $row["ticketNum"];
	//   echo $row["departIATA"];
	//   echo $row["arriveIATA"];
	// 	echo $row["custName"];
	// 	echo $row["price"];
	// 	echo $row["timeDepart"];
	// 	echo $row["timeArrive"];
	// 	echo $row["class"];
	// 	echo $row["model"];
	// 	echo $row["WiFi"];
	// 	echo $row["Power"];
//   } else {
//   echo "<center><h3>There Is No Flight From " . $input_dept_state . " To " . $input_arr_state . "</h3></center>";
//   }
  // 
  //
  // ATTENTION!!!!!!!!!!
  // NOT SURE ABOUT THE $["flightNum"]
  //
  //
//   echo "<tr><th scope=\"row\">Your Flight: </th><td>" . $row["flightNum"] . "</td></tr>";
//   echo "<tr><th scope=\"row\">Depart: </th><td>" . $row["departIATA"] . "</td></tr>";
//   echo "<tr><th scope=\"row\">Arrive: </th><td>" . $row["arriveIATA"] . "</td></tr>";
  
//   echo "<tr><th scope=\"row\">Name: </th><td>" . $row["custName"] . "</td></tr>";
//   echo "<tr><th scope=\"row\">Date of Birth: </th><td>" . $row["Dob"] . "</td></tr>";
//   echo "<tr><th scope=\"row\">Email Address: </th><td>" . $row["custEmail"] . "</td></tr>";
//   echo "<tr><th scope=\"row\">Phone Number: </th><td>" . $row["custPhone"] . "</td></tr></tbody></table>";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
if (!mysqli_query($con,"INSERT INTO websites (name) VALUES ('-x-x-x-')")){
  print_r(mysqli_error_list($conn)); 
}
$conn->close();
?>

<?php
mysqli_close($conn); // HINT: This statement closes the connection with the database
ob_end_flush();
?>


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