<?php
include("../class/connect_db.php");
include("../class/MyFunction.php");
	
//CONNECT DATABASE=======================
	$conn=connectDb();
	$myFn=new MyFunction();
	
	$b=$_POST['b'];	

	$sql="SELECT model_id,model FROM yss_model WHERE  brand_id='$b'";
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