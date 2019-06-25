<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ecommerce";
session_start();
$user = $_SESSION["username"];
// 1. Create a database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// show an error message if PHP cannot connect to the database
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
// 2. Perform database query
$query = "SELECT * FROM order_history ";
$query .= "WHERE product_owner = '$user'";
$results = mysqli_query($connection, $query);

if ($results == FALSE) {
  echo "Database query failed. <br/>";
  echo "SQL command: " . $query;
  exit();
}

//print_r($results);
echo "<h1> Order History </h1>";
  //  $record= mysqli_fetch_assoc($results);
     while ($record = mysqli_fetch_assoc($results)) {

        // output the results to the screen
        echo "<p><strong> Name: </strong>" . $record["product_name"] . "</p>";
        echo "<p><strong>quantity: </strong>" . $record["product_quantity"] . "</p>";
        echo "<p><strong> price: </strong> $" . $record["product_price"] . "</p>";
        echo "<p><strong> Date: </strong>" . $record["date"] . "</p>";
        echo "<br/>";


      }
?>
