<?php
include("../class/connect_db.php");
include("../class/MyFunction.php");
	
//CONNECT DATABASE=======================
	$conn=connectDb();
	$myFn=new MyFunction();
	
	$b=$_POST['b'];	
	
	if($b!=""){
		$sql="SELECT model_id,model FROM yss_model WHERE  brand_id='$b' ORDER BY model ASC";
	}else{
		$sql="SELECT model_id,model FROM yss_model ORDER BY model ASC";
	}
	
	$rs=mysqli_query($conn,$sql);
	
	$modelArray=array();

	while($data=mysqli_fetch_assoc($rs)){
		$modelId=$data['model_id'];
		
		$modelName=$data['model'];
		
		$modelArray['modelId'][]=$modelId;
		$modelArray['modelName'][]=$modelName;
	}
	
		echo json_encode($modelArray);
	
?>