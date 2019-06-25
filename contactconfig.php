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
$firstname = mysqli_real_escape_string($connection, $_REQUEST['firstname']);
$lastname = mysqli_real_escape_string($connection, $_REQUEST['lastname']);
$email= mysqli_real_escape_string($connection, $_REQUEST['email']);
$subject = mysqli_real_escape_string($connection, $_REQUEST['subject']);
$sql = "INSERT INTO service(firstname,lastname,email,subject)
VALUES('$firstname','$lastname','$email','$subject')";
if ($connection->query($sql) === TRUE) {
  echo '<script type="text/javascript">';
  echo 'alert(" thankyou,we will get back to you very soon");';
  echo 'window.location.href = "homepage.php";';
  echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
//}
?>
