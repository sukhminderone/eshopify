<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

  //print_r($_POST);

  // Handle form values sent by addEmployee.php
  $first = $_POST['username'];
  $last = $_POST['password'];


  // do the SQL
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "ecommerce";

  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
$sql = "SELECT * FROM signup WHERE username = '$first' AND password = '$last'";

  $result = mysqli_query($connection, $sql);
  $numrows=mysqli_num_rows($result);

 if($numrows != 0)
 {
   while($row = mysqli_fetch_assoc($result))
   {
     $dbusername = $row['username'];
     $dbpassword = $row['password'];


   }
   if($first == $dbusername && $last == $dbpassword )
   {
        session_start();
        $_SESSION["username"] = $first;
        $_SESSION["usertype"] = "existing";
     header("Location: homepage.php");
   }

else if($first == $dbusername && $last == $dbpassword){
  echo '<script type="text/javascript">';
echo 'alert("you do not have acess to this area ");';
echo 'window.location.href = "login.php";';
echo '</script>';
//header("location:db.php");
}

}
 else
 {
   echo '<script type="text/javascript">';
echo 'alert("you are not registered user");';
echo 'window.location.href = "login.php";';
echo '</script>';
}}
?>
