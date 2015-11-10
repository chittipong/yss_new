<?php
class MyFunction{
	//Chenge file name--------------------------------------	
	public function renameFile($prename,$file_name){
			$lastname=strstr($file_name,".");			//ตัดเอานามสกุล
			$ran=rand(111, 999);
			$datepic=date("jnyGis");					//Format: day,month,year,hour,minutes,seconds
				  if ($file_name<>""){
						  $new_file_name="$prename$datepic$ran".$lastname;	
				  }
			return $new_file_name;
	}
	
	//Upload Image--------------------------------
		public function uploadImage($pic,$pic_name,$dir,$width,$newPicName){
				  $ext = strtolower(end(explode('.', $pic_name)));
				  
					  if ($ext=="jpg" or $ext=="jpeg" or $ext=="gif" or $ext=="png"){
						 copy($pic,"$dir/".$newPicName);
					  if($ext =="jpg" or $ext =="jpeg" ){
						 $ori_img=imagecreatefromjpeg ($pic);
					  }
					  else if($ext =="gif"){
						 $ori_img=imagecreatefromgif ($pic);
					  }
					  else if($ext =="png"){
						 $ori_img=imagecreatefrompng ($pic);
					  }
				  
				  $ori_size=getimagesize ($pic);
				  $ori_w=$ori_size[0];
				  $ori_h=$ori_size[1];
				  
				  if ($ori_w>$width){
					  $new_w =$width;
					  $new_h = round (($new_w/$ori_w) * $ori_h);
					  $new_img = imagecreatetruecolor ($new_w, $new_h);
					  imagecopyresized ($new_img,$ori_img,0,0,0,0,
					  $new_w,$new_h,$ori_w,$ori_h);
					  
						  if ($ext =="jpg" or $ext == "jpeg"){
							  imagejpeg($new_img,"$dir/$newPicName");
						  }else if ($ext == "png"){
							  imagepng($new_img,"$dir/$newPicName");
						  }else if ($ext == "gif"){
							  imagegif($new_img,"$dir/$newPicName");
						  }
				  
					  imagedestroy ($ori_img);
					  imagedestroy ($new_img);
					  
					  return "done";
				  }
				  
			  }
	}//End function***
	
	//Upload Image สาามารถลบไฟล์ภาพเดิมได้--------------------------------
		public function uploadImage2($oldPic,$pic,$pic_name,$dir,$width,$newPicName){
				//Delete old images-------
				  if(!empty($oldPic)){
					  unlink($dir.'/'.$oldPic);
				  }
				  
				//Begin upload image-----------------
				  $ext = strtolower(end(explode('.', $pic_name)));
				  
					  if ($ext=="jpg" or $ext=="jpeg" or $ext=="gif" or $ext=="png"){
						 copy($pic,"$dir/".$newPicName);
					  if($ext =="jpg" or $ext =="jpeg" ){
						 $ori_img=imagecreatefromjpeg ($pic);
					  }
					  else if($ext =="gif"){
						 $ori_img=imagecreatefromgif ($pic);
					  }
					  else if($ext =="png"){
						 $ori_img=imagecreatefrompng ($pic);
					  }
				  
				  $ori_size=getimagesize ($pic);
				  $ori_w=$ori_size[0];
				  $ori_h=$ori_size[1];
				  
				  if ($ori_w>$width){
					  $new_w =$width;
					  $new_h = round (($new_w/$ori_w) * $ori_h);
					  $new_img = imagecreatetruecolor ($new_w, $new_h);
					  imagecopyresized ($new_img,$ori_img,0,0,0,0,
					  $new_w,$new_h,$ori_w,$ori_h);
					  
						  if ($ext =="jpg" or $ext == "jpeg"){
							  imagejpeg($new_img,"$dir/$newPicName");
						  }else if ($ext == "png"){
							  imagepng($new_img,"$dir/$newPicName");
						  }else if ($ext == "gif"){
							  imagegif($new_img,"$dir/$newPicName");
						  }
				  
					  imagedestroy ($ori_img);
					  imagedestroy ($new_img);
					  
					  return "done";
				  }
				  
			  }
	}//End function***
	
	//Delete file----------------------------------------
		public function DEL_FILE($file,$dir){
				$rs = unlink($dir.$file); 
				return  $rs;
		}
		
	function getData($conn,$field,$table,$condition){
			$sql="SELECT $field AS result FROM $table $condition";
			$rs=mysqli_query($conn,$sql);
			
			if($rs){
				$data=mysqli_fetch_assoc($rs);
				return $data['result'];
			}else{
				return "Error";
			}
	}//end***
	
	//GET FEATURE=============================
	function getFeatureDetail($conn,$feature,$lang){
		
			if($lang=="TH"){
				$sql="SELECT feature,description_th AS result FROM yss_feature WHERE feature='$feature' LIMIT 1";
			}else if($lang=="EN"){
				$sql="SELECT feature,description_en AS result FROM yss_feature WHERE feature='$feature' LIMIT 1";
			}else{
				return ""; exit();
			}
			
			$rs=mysqli_query($conn,$sql);
			
			if($rs){
				$data=mysqli_fetch_assoc($rs);
				return $data['result'];
			}else{
				return "";
			}
			
	
	}
	
	function getDataList($conn,$field,$table,$condition){
		$sql="SELECT $field FROM $table $condition";
		$rs=mysqli_query($conn,$sql);
		return $rs;
	}
	
	function getPageInfo($conn,$field,$specName,$lang){
			$sql="SELECT $field FROM yss_page_metatag WHERE page_id='$specName' AND lang='$lang' LIMIT 1";
			$rs=mysqli_query($conn,$sql);
			$data=mysqli_fetch_assoc($rs);
			
			return $data["$field"];
	}//end***
	
	function getWord($conn,$specName,$lang){
		$sql="SELECT * FROM yss_word WHERE name='$specName' LIMIT 1";
		$rs=mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($rs);
		
		return $data["$lang"];
	}
	
	//LIST BRAND=========================================
	function getBrandList($conn){
		$brandArray=array();
		$sql="SELECT * FROM yss_brand ORDER BY brand ASC";
		$rs=mysqli_query($conn,$sql);
		
		while($data=mysqli_fetch_assoc($rs)){
			$brandArray['id'][]=$data['brand_id'];
			$brandArray['brand'][]=$data['brand'];
		}//end***
		
		return $brandArray;
	}

//LIST MODEL=========================================
	function getModelList($conn){
		$modelArray=array();
		$sql="SELECT model_id,model FROM yss_model ORDER BY model ASC";
		$rs=mysqli_query($conn,$sql);
		
		while($data=mysqli_fetch_assoc($rs)){
			$modelArray['id'][]=$data['model_id'];
			$modelArray['model'][]=$data['model'];
		}//end***
		
		return $modelArray;
	}

//LIST CC=========================================
	function getCcList($conn){
		$myArray=array();
		$sql="SELECT id,cc FROM yss_cc ORDER BY cc ASC";
		$rs=mysqli_query($conn,$sql);
		
		while($data=mysqli_fetch_assoc($rs)){
			$myArray['id'][]=$data['id'];
			$myArray['cc'][]=$data['cc'];
		}//end***
		
		return $myArray;
	}

	//LIST VEHICLE TYPE=========================================
	function getCatList($conn){
		$myArray=array();
		$sql="SELECT id,name FROM yss_vehicle ORDER BY name ASC";
		$rs=mysqli_query($conn,$sql);
		
		while($data=mysqli_fetch_assoc($rs)){
			$myArray['id'][]=$data['id'];
			$myArray['name'][]=$data['name'];
		}//end***
		
		return $myArray;
	}
	
	//LIST PRODUCT GROUP=========================================
	function getProductGroupList($conn){
		$myArray=array();
		$sql="SELECT 'group',detail FROM yss_product_group ORDER BY 'group' ASC";
		$rs=mysqli_query($conn,$sql);
		
		while($data=mysqli_fetch_assoc($rs)){
			$myArray['group'][]=$data['group'];
			$myArray['detail'][]=$data['detail'];
		}//end***
		
		return $myArray;
	}
	
	//LIST PRODUCT TYPE=========================================
	function getProductTypeList($conn){
		$myArray=array();
		$sql="SELECT type,detail FROM yss_product_type ORDER BY type ASC";
		$rs=mysqli_query($conn,$sql);
		
		while($data=mysqli_fetch_assoc($rs)){
			$myArray['type'][]=$data['type'];
			$myArray['detail'][]=$data['detail'];
		}//end***
		
		return $myArray;
	}
	
	
	//Function Get Mac Address-------------------------
		function getMacAddress(){
			system('ipconfig /all'); 						//Execute external program to display output
			$mycom=ob_get_contents(); 						// Capture the output into a variable
			ob_clean(); 									// Clean (erase) the output buffer
			$findme = "Physical";
			$pmac = strpos($mycom, $findme); 				// Find the position of Physical text
			$macid=substr($mycom,($pmac+36),17);			// Get Physical Addresss
			return $macid;
		}
	
	//Get IP Address----------------------------------
		function getIpAddress(){
			$ip=$_SERVER['REMOTE_ADDR']; 					//get IP Address
			return $ip;
		}	
		
	//Function for random string--------------------------
		public function randomString($length){
			$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
			return $randomString;
		}
		
	//Check Country--------------------------------------
		function visitor_country() {
			$ip = $_SERVER["REMOTE_ADDR"];
			if(filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			if(filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
					$ip = $_SERVER['HTTP_CLIENT_IP'];
			$result = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))
					->geoplugin_countryName;
			return $result <> NULL ? $result : "Unknown";
		}	
	
	//Limit String for Display---------------------------
		public function limitStrDisplay($limit,$str){
			$result=iconv_substr($str,0,$limit,"UTF-8")."...";	// สำหรับภาษาไทย
			return $result;
		}
		
	//Get Preload icon----------------------------------
		public function getPreloadIcon($preload){
			if($preload=="P"){
				$preload_icon='<img src="images/feature/bigicon_P.png" alt="" width="36"/>';
			}else if($preload=="T"){
				$preload_icon='<img src="images/feature/bigicon_t.png" alt="" width="36"/>';
			}else if($preload=="H"){
				$preload_icon='<img src="images/feature/bigicon_H.png" alt="" width="36"/>';
			}else if($preload=="H1"){
				$preload_icon='<img src="images/feature/bigicon_H1.png" alt="" width="36"/>';
			}else{
				$preload_icon="";
			}
			
			return $preload_icon;
		}
		
	//Get Compression icon----------------------------------
		public function getCompressionIcon($compress){
			if($compress=="W"){
				$compress_icon='<img src="images/feature/largeicon_w.png" alt="" width="36"/>';
			}else if($compress=="C"){
				$compress_icon='<img src="images/feature/largeicon_c.png" alt="" width="36"/>';
			}else if($compress=="C(AB)"){
				$compress_icon='<img src="images/feature/largeicon_cab.png" alt="" width="36"/>';
			}else{
				$compress_icon="";
			}
			
			return $compress_icon;
		}
		
	//Get Rebound icon----------------------------------
		public function getReboundIcon($rebound){
			if($rebound=="Y"){
				$rebound_icon='<img src="images/feature/bigicon_r.png" alt="" width="36"/>';
			}else{
				$rebound_icon="";
			}	
			
			return $rebound_icon;
		}
		
	//Get Length Adjustment icon------------------------------
		public function getLengthAdjustIcon($lengthAdjust){
			if($lengthAdjust=="Y"){
				$lengthAdjus_icon='<img src="images/feature/bigicon_l.png" alt="" width="36"/>';
			}else{
				$lengthAdjus_icon="";
			}
			
			return $lengthAdjus_icon;
		}
}
?>