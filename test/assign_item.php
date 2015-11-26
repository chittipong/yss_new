<?php
ob_start();
session_start();

include("../class/connect_db.php");
include("../class/Mymenu.php");
include("../class/MyFunction.php");
	
//CHECK LANGUAGE=========================
if(isset($_SESSION['sess_lang'])==""){
	$_SESSION['sess_lang']='TH';
}
//GET LANGUAGE==========================
$lang=$_SESSION['sess_lang'];			
////echo $_SESSION['sess_lang'];

//CONNECT DATABASE=======================
	$conn=connectDb();
	$myMenu=new Mymenu();
	$myFn=new MyFunction();
	
?>

<?php
//echo print_r($conn);
$sql="SELECT * FROM auth_item";
$rs=mysqli_query($conn,$sql) or die(mysql_error());
$n=mysqli_num_rows($rs);

$sqlArray=array();

while($data=mysqli_fetch_assoc($rs)){
	$name=$data['name'];
	
	echo "INSERT auth_item_child VALUES('supper-admin','$name');<br/>";
	
	//echo "<br/>";
	///echo $name;
}
?>