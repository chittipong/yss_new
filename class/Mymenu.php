<?php
class Mymenu{
	private $lang;
	private $conn;
	
		function __construc($lang,$conn){
			$this->lang=$lang;
			$this->conn=$conn;
		}
		
		//METHOD GET MENU-------------------
		function getMenu($menuName){
			$sql="SELECT * FROM yss_menu WHERE specific_name='$menuName' LIMIT 1";
			$rs=mysqli_query($this->conn,$sql);
			$data=mysqli_fetch_assoc($rs);
			
			if($this->lang=='EN'){
				return $data['EN'];
			}
			
			if($this->lang=='TH'){
				return $data['TH'];
			}else{
				return $data['TH'];
			}
		}//end***
}
?>