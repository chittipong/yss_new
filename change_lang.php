<?php
ob_start();
session_start();

//redirect===========================
$page=isset($_GET['p']) ? $_GET['p']:'';

$lang=isset($_GET['l']) ? $_GET['l']:'TH';
$queryString=isset($_GET['q']) ? $_GET['q']:null;			//Get queryString

$queryString = $_SERVER['QUERY_STRING'];					//Get Query string


if(!empty($page)){
	$queryString = str_ireplace("p=".$page."&q=", "", $queryString);			//Replace string
}

if(!empty($page)){
	$queryString = str_ireplace("&l=".$lang, "", $queryString);					//Replace string	
}
	
//echo $queryString; exit();


if($page==''){
	header("Location: index.php"); exit();
}

$_SESSION['sess_lang']=$lang;
session_write_close();

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

//Check Query String After redirect
if(!empty($queryString)){
	header("Location: http://$host$page?$queryString");
}else{
	header("Location: http://$host$page");
}
exit();
?>