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
$item= mysqli_real_escape_string($connection, $_REQUEST['item_name']);
$quant = mysqli_real_escape_string($connection, $_REQUEST['item_quantity']);
$rate = mysqli_real_escape_string($connection, $_REQUEST['item_price']);
$disc = mysqli_real_escape_string($connection, $_REQUEST['discount']);
$finaltotal = mysqli_real_escape_string($connection, $_REQUEST['$grandTotal']);
$sql = "INSERT INTO record(username,product_name,quantity,price,discount,total_price)
VALUES ('$username','$item','$quant',$rate,$disc,$finaltotal)";
if ($connection->query($sql) === TRUE) {
  echo '<script type="text/javascript">';
  echo 'alert("insert operation done Successfully ");';
  echo 'window.location.href = "admin.php";';
  echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
//}
?>
