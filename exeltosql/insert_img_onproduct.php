<?php
include "dbconfig2.php";

//GET PRODUCT CODE TO UPDATE TO FILENAME******
$sql="SELECT * FROM yss_product";
$rs=mysqli_query($con,$sql);

$myArray=[];
while($data=mysqli_fetch_assoc($rs)){
	$id=$data['product_id'];
	$img=$data['code'].'.png';
	$myArray['id'][]=$id;
	$myArray['image'][]=$img;
}


for($i=0;$i<count($myArray['id']);$i++){
	$id=$myArray['id'][$i];
	$pic=$myArray['image'][$i];
	
	$sql="UPDATE yss_product SET image='$pic' WHERE product_id='$id'";
	$rs=mysqli_query($con,$sql);
	
	if($rs){
		echo "ID: ".$myArray['id'][$i];
		echo "PIC: ".$myArray['image'][$i];
		echo "<br/>";
	}else{
		echo "Cannot Update"; exit();
	}
}

echo "##########UPDATE SUCCESSFULLY################";
?>