<?php

//-----DB Connection code------
$servername = "localhost";
$serverUsername = "hl5uq";                         //computing id
$serverPassword = "LHDJ8PVC";                   //---- your password
// UnixPassword: PPKEdR7K
$database = "hl5uq";              // computing id

// Create connection
$conn = new mysqli($servername, $serverUsername, $serverPassword, $database);
// Check connection
if ($conn->connect_error)
{
	die ("Connection failed: ". $conn->connect_error);
}
echo "Connection success! <br>";

// ---- VARIABLE DECLARATIONS ----
$nameErr = $passErr = "";
$inputUsername = $inputPassword = $pwd= "";

?>

<!DOCTYPE HTML>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <style>
  .error {color: #FF0000;}
  </style>
</head>
<body style="position: relative;
	width: 50%;
	margin: 0 auto;
	padding: 10px;
	background-image: url(bg.jpg);
	background-size: 100% 620px;
	background-repeat: repeat;">
<h2 style="text-align: center;
  font-family: 'Josefin Sans', cursive;
  display: block;
	color: #000066;
	font-size: 58px;
	font-weight: bold;"> Database Project G7 Airline</h2>
<hr>
<h2 style="text-align: center; font-family: 'Josefin Sans', cursive; color: #FF6600;font-size: 30px;"> Log-In</h2>
<hr>

<form method="post" action="result.php">
<!-- HINT: Google for the different types of form methods and decide which one applies here -->
  Custo:
  <br>
  <input type="text" name="dept_state" value="<?php echo $dept_state;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br>

  Password:
  <br>
  <input type="password" name="inputPassword" value="<?php echo $inputPassword;?>">
  <!--HINT: Google it
  <span class="error"> <?php echo $passErr;?></span>
  <br> -->

  <br>
  <input type="submit" name="submit" value="Submit">
</form>


<!-- <?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$inputUsername = $_POST["inputUsername"];   //HINT: Use the values from Form method
	$inputPassword = $_POST["inputPassword"];
	//echo "Your username: ";
	//echo $inputUsername . "<br>";
}

$sql = "Select custName from `customer`";
// HINT: your SQL Query to get the row with given username
// Is it Select or Insert or Delete or Alter?


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "name: " . $row["custName"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>

<?php
mysqli_close($conn); // HINT: This statement closes the connection with the database
ob_end_flush();
?> -->