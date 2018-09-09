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

<?php


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
?>