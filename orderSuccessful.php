<?php
session_start();
 $balance = $_SESSION["newBalance"];
 $user = $_SESSION["username"];
 $usertype = $_SESSION["usertype"];
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ecommerce";
if($usertype == "existing"){
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$stmt = "UPDATE signup SET AMOUNT = '$balance' WHERE username = '$user'";
if ($connection->query($stmt) === TRUE) {
  // echo '<script>alert("payment success,order placed")</script>';
  // echo '<script>window.location="homepage.php"</script>';
  echo "<script> location.href='save_order_history.php'; </script>";
       exit;

}
else{
    echo 'alert("db query failed ");';
}
}
else{
  echo "order placed for guest user";
}
?>
