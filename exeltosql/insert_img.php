<?php
include "dbconfig2.php";

//GET PRODUCT CODE TO UPDATE TO FILENAME******
$sql="SELECT * FROM application_list";
$rs=mysqli_query($con,$sql);

$myArray=[];
while($data=mysqli_fetch_assoc($rs)){
	$id=$data['id'];
	$img=$data['product_code'].'.png';
	$myArray['id'][]=$id;
	$myArray['pic'][]=$img;
}


for($i=0;$i<count($myArray['id']);$i++){
	$id=$myArray['id'][$i];
	$pic=$myArray['pic'][$i];
	
	$sql="UPDATE application_list SET pic='$pic' WHERE id='$id'";
	$rs=mysqli_query($con,$sql);
	
	if($rs){
		echo "ID: ".$myArray['id'][$i];
		echo "PIC: ".$myArray['pic'][$i];
		echo "<br/>";
	}else{
		echo "Cannot Update"; exit();
	}
}

echo "##########UPDATE SUCCESSFULLY################";
?>