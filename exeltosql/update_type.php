<?php
include "dbconfig2.php";

//$sql="SELECT id,`type` FROM application_list WHERE id BETWEEN 17812 AND 18117";
$rs=mysqli_query($con,$sql);

$sqlArray=array();
while($data=mysqli_fetch_assoc($rs)){
	$id=$data['id'];
	$type=$data['type'];

	$sqlArray[]="UPDATE yss_product SET `type`='$type' WHERE product_id='$id'";
}

//print_r($sqlArray);
$c=count($sqlArray);

for($i=0;$i<$c;$i++){
	$sql=$sqlArray[$i];
	$rs=mysqli_query($con,$sql);
	
	if(!$rs){
		echo "Cannot update"; exit();	
	}
}

echo "##########TRANSFER SUCCESSFULLY################";
?>