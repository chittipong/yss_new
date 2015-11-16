<?php
include "dbconfig2.php";

	//$FILE = fopen( "app_list_motorcy_final10.csv", "r");// ใส่ชื่อไฟล์ และ โหมด r เพื่ออ่านข้อมูลจากไฟล์อย่างเดียว 
	$data = fgetcsv( $FILE , 5000 );
	$i=1;
	$no = 1;
	
	$datetime_last_update = date("Y-m-d H:i:s");
	
	do{
	if ($i == 1){
		// แถวที่ 1 ที่เป็นหัวตาราง ให้ข้ามไป ไม่ Import ลงตาราง 
		$data = fgetcsv( $FILE , 5000 );
		$i++;
	}
else{
//List data for insert-------------
	$brand=$data[0];
	$cc=$data[1];
	$model=$data[2];
	$ref_no=$data[3];
	$vehicle_type=1;
	$abe1=$data[5];	
	$year=$data[6];
	$type=$data[7];
	$product_code=$data[8];
	$abe_shock=$data[9];
	$length=$data[10];
	$top=$data[11];
	$bottom=$data[12];
	$spring=$data[13];
	$piston=$data[14];
	$shaft=$data[15];
	$preload=$data[16];
	$rebound=$data[17];
	$compression=$data[18];
	$length_adjust=$data[19];
	$hydraulic=$data[20];
	$emulsion=$data[21];
	$piggy_back=$data[22];
	$on_hose=$data[23];
	$free_piston=$data[24];
	$dtg=$data[25];

$sql="
INSERT INTO application_list  (
	`brand`,
	`cc`,  
	`model`,  
	`ref_no`,  
	`vehicle_type`,
	`abe1`,  
	`year`,  
	`type`,  
	`product_code`,  
	`abe_shock`,  
	`length`,  
	`top`,  
	`bottom`,  
	`spring`,  
	`piston`,  
	`shaft`,  
	`preload`,  
	`rebound`,  
	`compression`,  
	`length_adjust`,  
	`hydraulic`,  
	`emulsion`,  
	`piggy_back`,  
	`on_hose`,  
	`free_piston`,  
	`dtg`
) VALUES(
	'$brand',
	'$cc',
	'$model',
	'$ref_no',
	'$vehicle_type',
	'$abe1',
	'$year',
	'$type',
	'$product_code',
	'$abe_shock',
	'$length',
	'$top',
	'$bottom',
	'$spring',
	'$piston',
	'$shaft',
	'$preload',
	'$rebound',
	'$compression',
	'$length_adjust',
	'$hydraulic',
	'$emulsion',
	'$piggy_back',
	'$on_hose',
	'$free_piston',
	'$dtg'
)
";

$result = mysqli_query($con,$sql);

if($result == 0)
     echo $no." ".mysqli_error()."<br>"; // กรณีมี Error ในการ Insert ให้แสดงออกมาทางหน้าจอด้วย


$data = fgetcsv( $FILE , 5000 );
	$i++;
	$no++;
}}while ( !feof( $FILE ) );


?>



<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>นำเข้าข้อมูลจาก Excel ลงฐานข้อมูล MySQL (Import from Excel (CSV) to MySQL Database)</title>
<STYLE type=text/css>
  A:link { color: #0000cc; text-decoration:none}
  A:visited {color: #0000cc; text-decoration: none}
  A:hover {color: red; text-decoration: none}
 </STYLE>
<style type="text/css">
<!--
small { font-family: Arial, Helvetica, sans-serif; font-size: 8pt; } 
input, textarea { font-family: Arial, Helvetica, sans-serif; font-size: 9pt; } 
b { font-family: Arial, Helvetica, sans-serif; font-size: 14pt; } 
big { font-family: Arial, Helvetica, sans-serif; font-size: 18pt; } 
strong { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; font-weight : extra-bold; } 
font, td { font-family: Arial, Helvetica, sans-serif; font-size: 14pt; } 
BODY { font-size: 9pt; font-family: Arial, Helvetica, sans-serif; } 
-->
</style>

</head>

<body bgcolor="#C4F5F5">
<center>

<u><big>นำเข้าข้อมูลจาก Excel ลงฐานข้อมูล MySQL (Import from Excel (CSV) to MySQL Database)</big></u>

<br><br><br>

<b>นำเข้าข้อมูลทั้งสิ้น <font color="red"><? echo $no-1; // หักหัวตารางไป 1 Record ?></font> รายการ</b>



<br><br>
<hr width="75%">
<center><big>แก้ไขอธิบายเพิ่มเติมโดย : <a href="http://www.codetukyang.com" target="_blank">CodeTukYang.Com</a></big></center>
<hr width="75%">

</center>
</body>

</html>