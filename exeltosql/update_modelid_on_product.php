<?php
include "dbconfig2.php";

//$sql="SELECT * FROM yss_model WHERE model_id BETWEEN 17812 AND 18117";

$rs=mysqli_query($con,$sql);

$modelArray=array();

while($data=mysqli_fetch_assoc($rs)){
		$id=$data['model_id'];
		$modelArray[]=$id;
}//end while***

//print_r($sqlArray);

$c=count($modelArray);

for($i=0;$i<$c;$i++){
	$sql="UPDATE yss_product SET model_id='$modelArray[$i]' WHERE product_id='$modelArray[$i]'";
	$rs=mysqli_query($con,$sql);
}


echo "##########TRANSFER SUCCESSFULLY################";
?>