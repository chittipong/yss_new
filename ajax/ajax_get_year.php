<?php
include("../class/connect_db.php");
include("../class/MyFunction.php");
	
//CONNECT DATABASE=======================
	$conn=connectDb();
	$myFn=new MyFunction();
	
	$m=$_POST['m'];	

	if($m!=""){
		$sql="SELECT p.product_id,p.code,p.year,m.model_id,m.model FROM yss_product p LEFT JOIN  yss_model m ON p.model_id=m.model_id  WHERE m.model_id='$m' GROUP BY p.year ORDER BY p.year DESC";
	}else{
		$sql="SELECT p.product_id,p.code,p.year,m.model_id,m.model FROM yss_product p LEFT JOIN  yss_model m ON p.model_id=m.model_id  GROUP BY p.year ORDER BY p.year DESC";
	}
	
	//echo $sql; exit();
	$rs=mysqli_query($conn,$sql);
	
	$yearArray=array();

	while($data=mysqli_fetch_assoc($rs)){
		$year=$data['year'];
		$yearArray['year'][]=$year;
	}
	
		echo json_encode($yearArray);
	
?>