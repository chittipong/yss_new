<html>
<head>
<title>:: ติดตั้งระบบ ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<style>
BODY {
    FONT-FAMILY: Arial, Helvetica, sans-serif
}
</style>
</head>
<body>
<?php

include "dbconfig.php";
conndb();


$sql1 = "CREATE TABLE `product_tb` (
  `id` int(5) NOT NULL auto_increment primary key,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(200) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=tis620
" ;


$result = mysql_query($sql1) ;


if($result) {
echo "<center>
<table border=\"1\" style=\"border-style:dotted; border-collapse: collapse; padding-left:4; padding-right:4; padding-top:1; padding-bottom:1\" bordercolor=\"#111111\" width=\"400\" id=\"AutoNumber1\" height=\"138\">
  <tr>
    <td height=\"136\" bgcolor=\"#FFCCFF\">
    <center>
    <font size=\"5\" color=\"#000080\">การสร้างตารางลงฐานข้อมูลเสร็จสมบูรณ์ !!</font><br><br>
    <font size=\"4\"><a href=\"javascript:window.close()\">[ ตกลง ]</a></font>
    </center>    
    </td>
  </tr>
</table>
</center>";
}
else {
echo "<center>
<table border=\"1\" style=\"border-style:dotted; border-collapse: collapse; padding-left:4; padding-right:4; padding-top:1; padding-bottom:1\" bordercolor=\"#111111\" width=\"400\" id=\"AutoNumber1\" height=\"270\">
  <tr>
    <td height=\"136\" bgcolor=\"#FFCCFF\">
    <center>
    <font size=\"5\" color=\"#000080\">การสร้างตารางลงฐานข้อมูลล้มเหลว !!</font><br><br>
<p align=\"left\">&nbsp;&nbsp;&nbsp;&nbsp;<font color=\"red\"><small>อาจเกิดจากสาเหตุดังต่อไปนี้ ....</font><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. มีการสร้างตารางชื่อซ้ำกันอยู่แล้ว<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. กำหนดค่าในไฟล์ dbconfig.php ผิดพลาด<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. ยังไม่ได้สร้างฐานข้อมูล<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. ยังไม่ได้สร้าง Username , Password สำหรับ ฐานข้อมูล<br>
</small></p>
    <font size=\"4\"><a href=\"javascript:location.reload(true);\">[ ลองใหม่ ]</a></font>
    </center>    
    </td>
  </tr>
</table>
</center>";
}

?>
</body>
</html>