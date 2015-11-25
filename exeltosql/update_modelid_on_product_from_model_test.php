<?php
include "dbconfig2.php";

//$sql="SELECT p.product_id,p.model_id,p.code,m.model_id,m.model FROM yss_product p, yss_model m WHERE p.model_id=m.model_id";

$rs=mysqli_query($con,$sql);

$sqlArray=array();


while($data=mysqli_fetch_assoc($rs)){
	$productId=$data['product_id'];
	$modelId=$data['model_id'];
	$modelName=$data['model'];
	
	$sql2="SELECT * FROM model_test WHERE model='$modelName'";
	//echo $sql; exit();
	$rs2=mysqli_query($con,$sql2);
	$data2=mysqli_fetch_assoc($rs2);
	$new_modelId=$data2['model_id'];
	
	$sqlArray[]="UPDATE yss_product SET model_id='$new_modelId' WHERE product_id='$productId'";
	
}//end while***

//print_r($sqlArray);

$c=count($sqlArray);

//Loop update yss_product--------------
for($i=0;$i<$c;$i++){
	$sql=$sqlArray[$i];
	$rs=mysqli_query($con,$sql);
	
	if(!$rs){
		echo "Update fail"; exit();	
	}
}//end while***


echo "##########UPDATE SUCCESSFULLY################";
?>