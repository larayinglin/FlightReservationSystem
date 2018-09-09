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
$nameErr = $passErr = "";
$inputUsername = $inputPassword = $pwd= "";

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
        <header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="home.html"><i class="icon-airplane"></i>G7 Flights</a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li class="active"><a href="home.html">Book Flights</a></li>
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
							<li><a href="flightInfo.html">Flight Information</a></li>
							<li><a href="login.php">Manager Login</a></li>
							<!-- <li><a href="mytrip.html">My Trips</a></li>
							<li><a href="login.php">Log In</a></li> -->
						</ul>
					</nav>
				</div>
			</div>
		</header>
<hr>
<h2 style="text-align: center; font-family: 'Josefin Sans', cursive; color: #FF6600;font-size: 30px;"> Log-In</h2>
<hr>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<!-- HINT: Google for the different types of form methods and decide which one applies here -->
  Name:
  <br>
  <input type="text" name="inputUsername" value="<?php echo $inputUsername;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br>

  Password:
  <br>
  <input type="password" name="inputPassword" value="<?php echo $inputPassword;?>">
  <!--HINT: Google it -->
  <span class="error"> <?php echo $passErr;?></span>
  <br>

  <br>
  <input type="submit" name="submit" value="Submit">
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$inputUsername = $_POST["inputUsername"];   //HINT: Use the values from Form method
	$inputPassword = $_POST["inputPassword"];
	//echo "Your username: ";
	//echo $inputUsername . "<br>";
}

$sql = "Select * from `Login` WHERE username = \"" . $inputUsername . "\"";
// HINT: your SQL Query to get the row with given username
// Is it Select or Insert or Delete or Alter?

$result = $conn->query($sql);

if ($result->num_rows > 0)
{

    // output data of each row -- here we have one or 0 rows because username is primary key
    while($row = $result->fetch_assoc())
    {
    	$pwd = $row["password"];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if($pwd == $inputPassword)
    //HINT: Which variable did you use to store your password obtained from the SQL query
  {
  echo "<script type='text/javascript'>alert('Connection success!');</script>";
  header('Location: manage.html');
  // you can add code to jump to welcome page
  }
  else
  {
    echo "<script type='text/javascript'>alert('Access Denied!');</script>";
    header('Location: login.php');
  }
}
?>

<?php
mysqli_close($conn); // HINT: This statement closes the connection with the database
ob_end_flush();
?>

	</body>
</html>