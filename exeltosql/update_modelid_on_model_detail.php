<?php
	include "dbconfig2.php";
	//$sql="SELECT * FROM yss_model";
	
	$sql="SELECT * FROM yss_model_detail";
	$rs=mysqli_query($con,$sql);
	
	$sqlArray=array();
	$dataArray=array();
	
	while($data=mysqli_fetch_assoc($rs)){
		$dataArray['modelName'][]=$data['model_id'];
	}//end while***
	
	//print_r($dataArray['modelName']); exit();
	
	$c=count($dataArray['modelName']);
	
	for($i=0;$i<$c;$i++){
		$modelName=$dataArray['modelName'][$i];
		$sql="SELECT model_id,model FROM yss_model WHERE model='$modelName'";
		$rs=mysqli_query($con,$sql);
		$data=mysqli_fetch_assoc($rs);
			$newModelId=$data['model_id'];
			
		if(!empty($newModelId)){
			//$sqlArray[]="UPDATE yss_model_detail SET model_id='$newModelId' WHERE model_id='$modelName';";
			echo "UPDATE yss_model_detail SET model_id='$newModelId' WHERE model_id='$modelName';<br/>";
		}
	}
	
	exit();
	print_r($sqlArray); exit();
	
	$n=count($sqlArray);
	for($i=0;$i<$n;$i++){
		$sql=$sqlArray[$i];
		$rs=mysqli_query($con,$sql);
		
		if(!$rs){
			echo "Cannot Update"; exit();	
		}
	}
	
	
	
	echo "##########TRANSFER SUCCESSFULLY################";
?>