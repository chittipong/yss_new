<?php
include "dbconfig2.php";


$sql="SELECT * FROM yss_product";
$rs=mysqli_query($con,$sql);

while($data=mysqli_fetch_assoc($rs)){
	echo "Product: ";
	echo $data['product_id'];
	echo " Product Code: ";
	echo $data['code'];
	echo "<hr/>";	
}
?>