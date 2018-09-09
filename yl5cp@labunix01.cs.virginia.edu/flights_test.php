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


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$input_dept_state = $_POST["input_dept_state"];   //HINT: Use the values from Form method
  $input_dept_state = $_POST["input_dept_state"];
  $input_date = $_POST["input_date"];
  $input_class = $_POST["input_class"];
  $adult_num = $_POST["adult_num"];
  $child_num = $_POST["child_num"];
	//echo "Your username: ";
	//echo $inputUsername . "<br>";
}

// select flightNum, departIATA, arriveIATA, timeDepart, timeArrive, price,  class, WiFi, Power
// from
// (CAtoNY natural join PRICE) natural join fm;

$sql1 = "create view f\"" . $input_dept_state . "\" as
select *
from flight inner join airport
on flight.departIATA=airport.IATA
where airport.state  = \"" . $input_dept_state . "\"";
// $sql = "Select from `Login` WHERE username = \"" . $inputUsername . "\"";
// HINT: your SQL Query to get the row with given username
// Is it Select or Insert or Delete or Alter?

$sql2 = "create view \"" . $input_dept_state . "\"to\"" . $input_arr_state . "\" as
select flightNum, departIATA, arriveIATA, timeDepart, timeArrive
from f\"" . $input_dept_state . "\" as dept
inner join airport
on dept.arriveIATA=airport.IATA
where airport.state= \"" . $input_arr_state . "\"";

$sql3 = "select flightNum, departIATA, arriveIATA, timeDepart, timeArrive, price,  class, WiFi, Power
from
(\"" . $input_dept_state . "\"to\"" . $input_arr_state . "\"  natural join price) natural join fm;";

$step1 = $conn->query($sql1);
$step2 = $conn->query($sql2);
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo "flight: " . $row["flightNum"]. "<br>";
      echo "From: " . $row["departIATA"] . " at " . $row["timeDepart"] . "<br>";
      echo "To: " . $row["arriveIATA"] . " at " . $row["timeArrive"] . "<br>";
      echo "Price:" . $row["price"]. "<br>";
  }
} else {
  echo "0 results";
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