<?php
// the message
$msg = "your order will be arive in 40 minutes";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("sukhminderone@gmail.com","order confirmation",$msg);
?>
