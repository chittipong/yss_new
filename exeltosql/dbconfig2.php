<?php 
//Connect to Database=========================================
			//==========for localhost host================
			/*  $host = "localhost";
			  $dbname = "db_yss_new";
			  $user= "root";
			  $pw= "root"; 
		  
			// Create connection
			$con = new mysqli($host,$user,$pw,$dbname);
			// Check connection
			if ($con->connect_error) {
				die("Connection failed: " . $con->connect_error);
			} */
?>

<?php
$con = mysqli_connect("localhost","root","root","yss_new_db");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>