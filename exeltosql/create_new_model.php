<?php
include "dbconfig2.php";

//$sql="SELECT * FROM yss_model WHERE model!='' GROUP BY model ORDER BY brand_id,model_id";

$rs=mysqli_query($con,$sql);

$dataArray=array();

while($data=mysqli_fetch_assoc($rs)){
	$brand_id=$data['brand_id'];
	$model=$data['model'];
	
	$dataArray['brand'][]=$brand_id;
	$dataArray['model'][]=$model;
}//end while***


$c=count($dataArray['model']);

for($i=0;$i<$c;$i++){
	$brand=$dataArray['brand'][$i];
	$model=$dataArray['model'][$i];
	$sql="INSERT INTO model_test (brand_id,model) VALUES('$brand','$model')";
	$rs=mysqli_query($con,$sql);
}


echo "##########TRANSFER SUCCESSFULLY################";
?>