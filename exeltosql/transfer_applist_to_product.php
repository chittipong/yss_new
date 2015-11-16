<?php
include "dbconfig2.php";

//GET PRODUCT CODE TO UPDATE TO FILENAME******
//$sql="SELECT * FROM application_list WHERE ";

$sql="SELECT * FROM application_list";
$rs=mysqli_query($con,$sql);

$sqlArray=array();

while($data=mysqli_fetch_assoc($rs)){
		$id=$data['id'];
		$brand=$data['brand'];
		$cc=$data['cc'];
		$model=$data['model'];
		$ref_no=$data['ref_no'];
		$vehicle_type=$data['vehicle_type'];
		$abe1=$data['abe1'];
		$year=$data['year'];
		$type=$data['type'];
		$product_code=$data['product_code'];
		$abe_shock=$data['abe_shock'];
		$length=$data['length'];
		$top=$data['top'];
		$bottom=$data['bottom'];
		$spring=$data['spring'];
		$piston=$data['piston'];
		$shaft=$data['shaft'];
		$preload=$data['preload'];
		$rebound=$data['rebound'];
		$compression=$data['compression'];
		$length_adjust=$data['length_adjust'];
		$hydraulic=$data['hydraulic'];
		$emulsion=$data['emulsion'];
		$piggy_back=$data['piggy_back'];
		$on_hose=$data['on_hose'];
		$free_piston=$data['free_piston'];
		$dtg=$data['dtg'];
		$pic=$data['pic'];
		
		$sqlArray[]="INSERT INTO `yss_product` (
			`product_id`,`brand_id`,`model_id`,`product_group`,`product_type`,`vehicle_type`,`code`,`type`,`top`,`bot`, `image`, 
			`spring`, `length`, `piston`, `shaft`, `preload`, `rebound`, `compression`, `length_adjuster`, `hydraulic`, 
			`emulsion`, `piggy_back`, `on_hose`, `free_piston`, `dtg`, `enable`
		) VALUES (
			'$id', '$brand', '', '', '','$vehicle_type', '$product_code', '$type', '$top', '$bottom', '$pic', '$spring', '$length', '$piston', '$shaft', '$preload', '$rebound', '$compression', '$length_adjust', '$hydraulic', '$emulsion', '$piggy_back', '$on_hose', '$free_piston', '$dtg', 'Y')";
			
			
	//$sqlArray[]="INSERT INTO `yss_product` (`product_id`,`brand_id`) VALUES ('$id', '$brand')";
	
	
	//echo $sql."<br/>";
		
		//$rs=mysqli_query($con,$sql);
		
}//end while***

//print_r($sqlArray);

$c=count($sqlArray);

for($i=0;$i<$c;$i++){
	$rs=mysqli_query($con,$sqlArray[$i]);
}


echo "##########TRANSFER SUCCESSFULLY################";
?>