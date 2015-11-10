<?php
$conn;

$server = "localhost"; 
$user = "root"; // Username 
$pass = "webdev"; // Password
$dbname = "db_yss_new";

function conndb() {
  global $conn;
  global $server;
  global $user;
  global $pass;
  global $dbname;
  $conn = mysql_connect($server,$user,$pass);
mysql_select_db($dbname) ;
mysql_query("SET NAMES tis620");
  if (!$conn)
    die("ไม่สามารถติดต่อกับ MySQL ได้");

  mysql_select_db($dbname,$conn)
    or die("Cannot connect Database");
}

function closedb() {
  global $conn;
  mysql_close($conn);
}

?>
