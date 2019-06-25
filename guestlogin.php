<?php
session_start();
$_SESSION["usertype"] = "guest";
$_SESSION["username"] = "guest";
 header("Location: homepage.php");
 ?>
