<?php 
	//====================================Protect Direct Access========================
		$pageName=basename($_SERVER['PHP_SELF']);
		if ($pageName=="config_inc.php") {
			header( "location:../index.php"); exit();
		}
	//=====================================End=========================================
	
	if(!isset($_SESSION['lang'])){
		$_SESSION['lang']="th";										//Set default lang (en,th)
	}
	$lang=$_SESSION['lang'];
			
	$path="..";
	$path2="../..";	
	define("ROOT","");
	define("ROOTPATH","..");
	define("LARGE_PICSIZE","400px");							//SET Large Picture product size 
	define("THUMB_PICSIZE","140px");							//SET Large Picture product size 
	define("PRODUCT_PERPAGE",8);								//SET Limit Product product
	define("TOTALBTNNUMBER",10);								//SET Total button limit pagination
	
	define("BASEURL",$_SERVER['HTTP_HOST']);					//	localhost
	define("BASESELF",$_SERVER['PHP_SELF']);					//  /vgv4/admin/home.php
	define("DIRNAME",$_SERVER['REQUEST_URI']);					//  /vgv4/admin
	
	define("ADMINMAIL","null");									//Admin Email 
	define("SALEMAIL","null");									//Sale Email
	define("ORDERMAIL","null");									//Order Email
	

	
	//======================= Function Get Mac Address===================================
		function getMacAddress(){
			system('ipconfig /all'); 						//Execute external program to display output
			$mycom=ob_get_contents(); 						// Capture the output into a variable
			ob_clean(); 									// Clean (erase) the output buffer
			$findme = "Physical";
			$pmac = strpos($mycom, $findme); 				// Find the position of Physical text
			$macid=substr($mycom,($pmac+36),17);			// Get Physical Addresss
			return $macid;
		}
	//======================= Function Get IP Address===================================
		function getIpAddress(){
			$ip=$_SERVER['REMOTE_ADDR']; 					//get IP Address
			return $ip;
		}		
	
	//Endcoding Password===============================================================================
	function EnCodingPw($password){
		unset($pwdtxt);	
		$password = strtoupper($password);
			 for($i=1;$i<=strlen($password);$i++){
			if(($i%5)==0){
			$pwdtxt .= chr(ord($password[$i-1])+5);	
		}else{
			$pwdtxt .= chr(ord($password[$i-1])-5);
		}
			 }
			 return $pwdtxt;	
	}//End
	
	
	//Decoding Password===============================================================================
	function DeCodingPw($password){
		unset($pwdtxt);
		$password = strtoupper($password);    	
			 for($i=1;$i<=strlen($password);$i++){
			if(($i%5)==0){
			$pwdtxt .= chr(ord($password[$i-1])-5);	
		}else{
			$pwdtxt .= chr(ord($password[$i-1])+5);
		}
			 }
			 return $pwdtxt;	
	}//End
	
	
//Function for random string==================================================================================
	function randomString($length){
		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		return $randomString;
	}

?>
