<?php
ob_start();
session_start();

include("class/connect_db.php");
include("class/Mymenu.php");
include("class/MyFunction.php");
	
//CHECK LANGUAGE=========================
if(isset($_SESSION['sess_lang'])==""){
	$_SESSION['sess_lang']='TH';
}
//GET LANGUAGE==========================
$lang=$_SESSION['sess_lang'];			
echo $_SESSION['sess_lang'];

//CONNECT DATABASE=======================
	$conn=connectDb();
	$myMenu=new Mymenu();
	$myFn=new MyFunction();
	
	$myMenu->__construc($lang,$conn);

//GET PAGE INFO=========================
	$page_title=$myFn->getPageInfo($conn,'title','joinus',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','joinus',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','joinus',$lang);

//GET SHOT WORD==========================
	$txt_headpage=$myFn->getWord($conn,'joinus',$lang);
	
?>

<?php
//echo print_r($conn);
$sql="SELECT * FROM yss_jobs";
$rs=mysqli_query($conn,$sql) or die(mysql_error());
$n=mysqli_num_rows($rs);

echo count($n);

while($data=mysqli_fetch_assoc($rs)){
	$id=$data['id'];
	$title=$data['job_position'];
	
	echo $id."<br/>";
	echo $title;
}
?>