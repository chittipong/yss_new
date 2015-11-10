<?php
include "dbconfig2.php";

	$FILE = fopen( "brand.csv", "r");// ใส่ชื่อไฟล์ และ โหมด r เพื่ออ่านข้อมูลจากไฟล์อย่างเดียว 
	$data = fgetcsv( $FILE , 1024 );
	$i=1;
	$no = 1;
	
	$datetime_last_update = date("Y-m-d H:i:s");
	
	do{
	if ($i == 1){
		// แถวที่ 1 ที่เป็นหัวตาราง ให้ข้ามไป ไม่ Import ลงตาราง 
		$data = fgetcsv( $FILE , 1024 );
		$i++;
	}
else{
//List data for insert-------------
	$title=$data[0];
	$brand=$data[1];
	$type=$data[2];
	$usPrice=$data[3];
	$euroPrice=$data[4];
	$color=$data[5];
	$fileImg=$data[6];

$sql="INSERT INTO `fabric_brand` (
	`title`,
	`brand`, 
	`type`, 
	`us_price`, 
	`euro_price`, 
	`color`, 
	`file`
) 
VALUES (
	'$title',
	'$brand', 
	'$type', 
	$usPrice, 
	$euroPrice, 
	'$color', 
	'$fileImg'
)";

$result = mysqli_query($sql);

if($result == 0)
     echo $no." ".mysqli_error()."<br>"; // กรณีมี Error ในการ Insert ให้แสดงออกมาทางหน้าจอด้วย


$data = fgetcsv( $FILE , 1024 );
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