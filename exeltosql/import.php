<?php
include "dbconfig.php";
conndb();

$FILE = fopen( "mydata.csv", "r");// ��������� ��� ���� r ������ҹ�����Ũҡ������ҧ���� 
$data = fgetcsv( $FILE , 1024 );
$i=1;
$no = 1;

$datetime_last_update = date("Y-m-d H:i:s");

do
{
if ($i == 1){
// �Ƿ�� 1 �������ǵ��ҧ ������� ��� Import ŧ���ҧ 
$data = fgetcsv( $FILE , 1024 );
$i++;
}
else{


$product_id = $data[0]; // �����ſ�Ŵ��á �����ش
$product_name = $data[1]; // �����ſ�Ŵ����ͧ �ҡ����


$insertp = "INSERT INTO product_tb (id,product_id,product_name) 
VALUES ('','$product_id', '$product_name')";

$result = mysql_query($insertp);

if($result == 0)
     echo $no." ".mysql_error()."<br>"; // �ó��� Error 㹡�� Insert ����ʴ��͡�ҷҧ˹�Ҩʹ���



$data = fgetcsv( $FILE , 1024 );
$i++;
$no++;
}}while ( !feof( $FILE ) );


?>



<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>����Ң����Ũҡ Excel ŧ�ҹ������ MySQL (Import from Excel (CSV) to MySQL Database)</title>
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

<u><big>����Ң����Ũҡ Excel ŧ�ҹ������ MySQL (Import from Excel (CSV) to MySQL Database)</big></u>

<br><br><br>

<b>����Ң����ŷ����� <font color="red"><? echo $no-1; // �ѡ��ǵ��ҧ� 1 Record ?></font> ��¡��</b>



<br><br>
<hr width="75%">
<center><big>���͸Ժ����������� : <a href="http://www.codetukyang.com" target="_blank">CodeTukYang.Com</a></big></center>
<hr width="75%">

</center>
</body>

</html>