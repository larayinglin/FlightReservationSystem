<?php
session_start();

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
$input_dept_state = "";   //HINT: Use the values from Form method
$depart = "";
$input_arr_state = "";
$arrive = "";
$input_date = "";
$class = "";
$adult_num = $child_num = 0;
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

	<style>

	</style>

	</head>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$input_dept_state = $_POST["input_dept_state"];   //HINT: Use the values from Form method
	$depart = $_POST["depart"];
	$input_arr_state = $_POST["input_arr_state"];
	$arrive = $_POST["arrive"];
  	$input_date = $_POST["input_date"];
	$class = $_POST["class"];
	if($class==""){
		echo "no class input.";
	}
	// if ($class == "Economy"){
	// 	$class = "ECONOMIC";
	// }  else if ($class == "Extra Economy"){
	// 	$class = "ECNOMICEXTRA";
	// } else if ($class == "Premium"){
	// 	$class = "PREMIUM";
	// } else if ($class = "Business"){
	// 	$class = "Business";
	// } else {
	// 	echo "Invalid Input Class.";
	// }
	//echo $input_dept_state. " ---> " .$input_arr_state;
	//echo $class;
  	$adult_num = $_POST["adult_num"];
	$child_num = $_POST["child_num"];
}



// select flightNum, departIATA, arriveIATA, timeDepart, timeArrive, price,  class, WiFi, Power
// from
// (CAtoNY natural join PRICE) natural join fm;

// $sql1 = "create view f\"" . $input_dept_state . "\" as
// select *
// from flight inner join airport
// on flight.departIATA=airport.IATA
// where airport.state  = \"" . $input_dept_state . "\"";
// // $sql = "Select from `Login` WHERE username = \"" . $inputUsername . "\"";
// // HINT: your SQL Query to get the row with given username
// // Is it Select or Insert or Delete or Alter?

// $sql2 = "create view \"" . $input_dept_state . "\"to\"" . $input_arr_state . "\" as
// select flightNum, departIATA, arriveIATA, timeDepart, timeArrive
// from f\"" . $input_dept_state . "\" as dept
// inner join airport
// on dept.arriveIATA=airport.IATA
// where airport.state= \"" . $input_arr_state . "\"";

// $sql3 = "select flightNum, departIATA, arriveIATA, timeDepart, timeArrive, price,  class, WiFi, Power
// from
// (\"" . $input_dept_state . "\"to\"" . $input_arr_state . "\"  natural join price) natural join fm;";


$sql = "select flightNum, departIATA, arriveIATA, timeDepart, timeArrive, price,  class, WiFi, Power
from
((select flightNum, departIATA, arriveIATA, timeDepart, timeArrive
from 
(select *
from `flight` inner join `airport` 
on flight.departIATA=airport.IATA 
where airport." .$depart . "= '$input_dept_state') as dept
inner join airport
on dept.arriveIATA=airport.IATA 
where airport." . $arrive . "= '$input_arr_state') as CAtoNY
natural join price) natural join fm
where class='$class'";

// $step1 = $conn->query($sql1);
// $step2 = $conn->query($sql2);
$result = $conn->query($sql);
?>

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
							<li><a href="login.html">My Trips</a></li> -->
						</ul>
					</nav>
				</div>
			</div>
    </header>
    <!-- end:header-top -->

    <div class="container">
	<br><br><br><br>
	
        

<?php
if ($result->num_rows > 0) {
	echo "<h2><center>". $input_dept_state. " to " . $input_arr_state . "</center></h2>";
	echo "<form><table class=\"table table-hover\"><thead><tr><th scope=\"col\">Flight</th><th scope=\"col\" colspan=\"2\">Depart</th><th scope=\"col\" colspan=\"2\">Arrive</th><th>Class</th><th>Price</th><th>WiFi</th><th>Power</th></tr></thead>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  if ($row["WiFi"]==0){$wifi="N";} else {$wifi="Y";}
	  if ($row["Power"]==0){$power="N";} else {$power="Y";}
	  echo "<tbody>";
      echo "<tr><th scope=\"row\">" . $row["flightNum"]. "</th>";
      echo "<td>" . $row["departIATA"] . "</td>";
      echo "<td>" . $row["timeDepart"] . "</td>";
      echo "<td>" . $row["arriveIATA"] . "</td>";
	  echo "<td>" . $row["timeArrive"] . "</td>";
	  echo "<td>" . $row["class"] . "</td>";
	  echo "<td>$" . $row["price"] . "</td>";
	  echo "<td>" . $wifi . "</td>";
	  echo "<td>" . $power . "</td>";
	  echo "<td><input type=\"radio\" name=\"select_flight\"  value=\"" . $row["flightNum"] ."\" /></td></tr>";
	//   $resInfo = array($row["flightNum"],$row["class"],$input_date);
	//   echo $resInfo[0];
	//   echo "<td><input type=\"radio\" name=\"select_flight\"  value=\"" . $resInfo ."\" /></td></tr>";
  }
  echo "</tbody></table><input type=\"submit\" class=\"\" formaction=\"reservation.php\">Select</input></form>";
} else {
  echo "<center><h3>There Is No Flight From " . $input_dept_state . " To " . $input_arr_state . "</h3></center>";
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


    </div>
	<footer>
	<div id="footer">
		<div class="container">
			<div class="row row-bottom-padded-md">
				<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
					<h3>About G7 Flights</h3>
					<p>This is the course project for CS6750-S18:<br> Database System. <br> We are Group 7.</p>
				</div>
				<!-- <div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
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
				</div> -->
				
				<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
					<h3>Best Places</h3>
					<ul>
						<li><a href="#">UVA</a></li>
						<li><a href="#">Greate Fall</a></li>
						<li><a href="#">Miami Beach</a></li>
						<li><a href="#">Disneyland</a></li>
					</ul>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
					<h3>Affordable</h3>
					<ul>
						<li><a href="#">Food &amp; Drink</a></li>
						<li><a href="#">WiFi</a></li>
						<li><a href="#">Power</a></li>
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