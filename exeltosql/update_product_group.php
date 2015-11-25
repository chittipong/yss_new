<?php
include "dbconfig2.php";

//$sql="SELECT product_id,code FROM yss_product WHERE product_id BETWEEN 17812 AND 18117";

$rs=mysqli_query($con,$sql);

$dataArray=array();

while($data=mysqli_fetch_assoc($rs)){
	$id=$data['product_id'];
	$code=$data['code'];
	$dataArray['id'][]=$id;
	$dataArray['code'][]=$code;
	
	
}//end while***


$c=count($dataArray['id']);

for($i=0;$i<$c;$i++){
	$rid=$dataArray['id'][$i];
	$x=split('-',$dataArray['code'][$i]);
	$y=str_split($x[0]);
	
	$pGroup=$y[0];
	$pType=$y[1];
	
	
	$sql="UPDATE yss_product SET product_group='$pGroup',product_type='$pType' WHERE product_id='$rid'";
	$rs=mysqli_query($con,$sql);
}


echo "##########TRANSFER SUCCESSFULLY################";
?>