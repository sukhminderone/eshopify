<?php
require("phpsqlsearch_dbinfo.php");
// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];
// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
// Opens a connection to a mySQL server
//$connection=mysql_connect (localhost, $username, $password);
//if (!$connection) {
  //die("Not connected : " . mysql_error());
//}

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
// Set the active mySQL database
//$db_selected = mysql_select_db($database, $connection);
//if (!$db_selected) {
//  die ("Can\'t use db : " . mysql_error());
//}
// Search the rows in the markers table
$sql = sprintf("SELECT id, name, address, lat, lng, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
  mysqli_real_escape_string($connection,$center_lat),
  //$type = mysqli_real_escape_string($connection, $_REQUEST['type']);
  mysqli_real_escape_string($connection,$center_lng),
  mysqli_real_escape_string($connection,$center_lat),
  mysqli_real_escape_string($connection,$radius));
$result = mysqli_query($connection, $sql);

if (!$result) {
  die("Invalid query: " . mysql_error());
}
header("Content-type: text/xml");
// Iterate through the rows, adding XML nodes for each
while($row = mysqli_fetch_assoc($result)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id", $row['id']);
  $newnode->setAttribute("name", $row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("distance", $row['distance']);
}
echo $dom->saveXML();
?>
