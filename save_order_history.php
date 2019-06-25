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

session_start();
if(!empty($_SESSION["shopping_cart"]))
{
  $user = $_SESSION["username"];

  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
$item_name =  $values["item_name"];
$item_quantity = $values["item_quantity"];
 $item_price =  $values["item_price"];
 $date = date("l jS \of F Y ");

 $sql = "INSERT INTO order_history (product_owner,product_id, product_name, product_quantity, product_price, date)
 VALUES ('$user','NULL', '$item_name', '$item_quantity', ' $item_price', '$date')";
// $sql = "INSERT INTO order_history(product_name,product_quantity,product_price,date)
// VALUES (' $values["item_name"]', '  $values["item_quantity"]', '$values["item_price"]','22/10/2018')";
if ($connection->query($sql) === TRUE) {

//   echo '<script type="text/javascript">';
//   echo 'alert("sign up done Successfully ");';
//   echo 'window.location.href = "login.php";';
//   echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
}
}
$connection->close();
echo "<script> location.href='homepage.php'; </script>";
     exit;

?>
