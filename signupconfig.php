<?php
//if($_SERVER['REQUEST_METHOD'] == 'POST') {
///$username = $_POST['username'];
//$password = $_POST['password'];
//$type = $_POST['type'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$username = mysqli_real_escape_string($connection, $_REQUEST['username']);
$password = mysqli_real_escape_string($connection, $_REQUEST['password']);
$repeatpassword= mysqli_real_escape_string($connection, $_REQUEST['repeatpassword']);
$dob = mysqli_real_escape_string($connection, $_REQUEST['dob']);
$address = mysqli_real_escape_string($connection, $_REQUEST['address']);
$gender = mysqli_real_escape_string($connection, $_REQUEST['gender']);
$phone = mysqli_real_escape_string($connection, $_REQUEST['phone']);
$sql = "INSERT INTO signup(username,password,repeatpassword,dob,address,phone,gender,AMOUNT)
VALUES ('$username', '$password', '$repeatpassword','$dob','$address','$phone','$gender','0.0')";
if ($connection->query($sql) === TRUE) {
  echo '<script type="text/javascript">';
  echo 'alert("sign up done Successfully ");';
  echo 'window.location.href = "login.php";';
  echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
//}
?>
