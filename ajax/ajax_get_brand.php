<?php
include("../class/connect_db.php");
include("../class/MyFunction.php");
	
//CONNECT DATABASE=======================
	$conn=connectDb();
	$myFn=new MyFunction();
	
	$v=$_POST['v'];
	if($v!=""){
		$sql="SELECT brand_id FROM yss_product WHERE  vehicle_type='$v' GROUP BY brand_id";
	}else{
		$sql="SELECT brand_id FROM yss_product GROUP BY brand_id";
	}
	$rs=mysqli_query($conn,$sql);
	
	$brandArray=array();

	while($data=mysqli_fetch_assoc($rs)){
		$brandId=$data['brand_id'];
		
		$brandName=$myFn->getData($conn,'brand','yss_brand',"WHERE brand_id='$brandId ORDER BY brand'");
		
		$brandArray['brandId'][]=$brandId;
		$brandArray['brandName'][]=$brandName;
	}
	
		echo json_encode($brandArray);
	
?>