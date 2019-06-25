<!DOCTYPE html>
<html>
	<head>

		<title>Shoppers Stop |View Cart</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


		<script type="text/javascript" src="https://cdn.emailjs.com/sdk/2.2.4/email.min.js"></script>
<script type="text/javascript">
	 (function(){
			emailjs.init("user_jtzFoyXYM9YAhRTDfHUTb");
	 })();
</script>

	</head>
	<body>

<?php
$str = '';
$amount = 0.0;
$discount = 0.0;
$grandTotal = 0.0;
$newbalance = 0.0;
session_start();
$user = $_SESSION["username"];
$usertype = $_SESSION["usertype"];


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
$sql = "SELECT AMOUNT,address FROM signup WHERE username = '$user' ";

$result = mysqli_query($connection, $sql);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {

    $amount = $row["AMOUNT"];
		$address = $row["address"];
  }
}
 ?>
 <form action="homepage.php" method="get">

  <button name="subject" type="submit" value="HTML">back</button>

</form>
<h3>Order Details</h3>

<div class="table-responsive">
  <table class="table table-bordered">
    <tr class="active">
			<th width="40%">product</th>
      <th width="40%">Item Name</th>
      <th width="10%">Quantity</th>
      <th width="20%">Price</th>
      <th width="15%">Total</th>
      <th width="5%">Action</th>
    </tr>
    <?php
    //session_start();
    if(!empty($_SESSION["shopping_cart"]))
    {
      $total = 0;
      foreach($_SESSION["shopping_cart"] as $keys => $values)
      {
    ?>
    <tr><td><img src="images/<?php echo $values["image_show"];?>"></td>
      <td><?php echo $values["item_name"]; ?></td>
      <td><?php echo $values["item_quantity"]; ?></td>
      <td>$ <?php echo $values["item_price"]; ?></td>
      <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
      <td><a href="homepage.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
    </tr>
    <?php
  //  session_start();
        $total = $total + ($values["item_quantity"] * $values["item_price"]) ;

				if($usertype == "existing"){
        if($amount > 0){
          $discountLimit = $total * 0.15;
          $discount = $amount * 0.01;
          if($discount> $discountLimit){
            $discount = $discountLimit;

          }

						$grandTotal = $total - $discount;
        }
        else {
            $grandTotal = $total ;
        }
        $newbalance = $grandTotal + $amount;
        $_SESSION["newBalance"] = $newbalance;

			}

			else {
				$amount = 0.0;
				$_SESSION["newBalance"] = 0.0;
			}
		}
    ?>
    <tr>
      <td colspan="3" align="right">sub Total</td>
      <td align="right">$ <?php echo number_format($total, 2); ?></td>
      <td></td>
    </tr>

    <tr>
      <td colspan="3" align="right">previously order amount</td>
      <td align="right">$ <?php echo number_format($amount, 2); ?></td>
      <td></td>
    </tr>
    <tr>
      <td colspan="3" align="right">Discount</td>
      <td align="right"> - $ <?php echo number_format($discount, 2); ?></td>
      <td></td>
    </tr>

    <tr>
      <td colspan="3" align="right">Grand Total</td>
      <td align="right">$ <?php echo number_format($grandTotal, 2); ?></td>
      <td></td>
    </tr>

    <?php
    }
    ?>

  </table>
</div>

 <a onclick="sendEmail();" href="checkout.php" > Place order </a>

	  <script type="text/javascript">

		function sendEmail(){
			var user =  "<?php echo $user ?>";
var total =  "<?php echo $grandTotal ?>";
var address=  "<?php echo $address ?>";
			var template_params = {
   "user_email": user,

   "user_address": address,


   "total": total
}

var service_id = "gmail";
var template_id = "template_ONaDaesK";
emailjs.send(service_id,template_id,template_params);
alert("email has been sent");
		}

		</script>

</body>
</html>
