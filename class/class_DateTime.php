<?php 
//====================================Protect Direct Access================================
$pageName=basename($_SERVER['PHP_SELF']);

	if ($pageName=="class_DateTime.php") {
		header( "location:../index.php"); exit();
	}
//=====================================End=================================================
?>
<?php 

class DateTimePattern{
	//Example input Timestamp:(2005-08-14 15:31:09)
		 public function dateFormat1($date){
			 return date("j F Y",strtotime($date));//Output sample: 14 August 2005
		 }
		 
		 public function dateFormat2($date){
				return date("j M Y",strtotime($date));//Output sample: 14 Aug 2005
		 }
		 
		 public function dateFormat3($date){
			$newFormat=date("j M Y",strtotime($date));
			$newFormat=str_replace(" ","<br/>", $newFormat);
			return $newFormat;//Output format-----> 14 Aug 2005 show in Vertical
		 }
		
		public function dateformat4($date){
		  return date("d/m/Y",strtotime ("$date"));
		}
		public function dateFormat5($date){
			return date("j-m-Y",strtotime($date));//Output sample: 14 Aug 2005
		 }
		 
		 public function dateFormat6($date){
			return date("H:i",strtotime($date));//Output sample: 
		 }
		
		public function dateFormat_dmy($date){
		  if($date!=NULL){
			return date("d-m-y",strtotime ("$date"));
		  }
		}
		
		public function dateFormat_Ymd($date){
		  if($date!=NULL){
			return date("Y-m-d",strtotime ("$date"));// Out put: 2012-08-14
		  }
		}
		
		
		public function STIMETOTB($date){
		  if(trim($date) != ""){	
		  list($date,$month,$year) = split("/",$date,3);
		   return "$year-$month-$date";
		  }
		}
		
		public function timeformat($time){
		  return substr($time,0,5);
		}
		
		public function datetimeformat($datetime){
		  list($date,$time) = split(" ", $datetime, 2);
		  return dateformat($date) . " " . timeformat($time);
		}
		
		public function dateextract($date){
		  list($date,$month,$year) = split("/",$date,3);
		  return "$year-$month-$date 00:00:00";
		}
		
		public function dateconvert($date){
		  list($year,$month,$date) = split("-",$date,3);
		  return "$date/$month/$year 00:00:00";
		}
		
		public function dayconvert($date){
		  list($year,$month,$date) = split("-",$date,3);
		  return "$date/$month/$year";
		}
		public function dayconvert2($date){
		  list($year,$month,$date) = split("-",$date,3);
		  return "$date-$month-$year";
		}
		public function timeNow1(){
			$dateNow=date('Y-m-d H:i:s');
			$splitDate=explode(" ",$dateNow);
			list($ymd,$timeNow)=$splitDate;
			return $timeNow;//output 15:25:18
		}
		
		public function timeNow2(){
			$dateNow=date('Y-m-d H:i');
			$splitDate=explode(" ",$dateNow);
			list($ymd,$timeNow)=$splitDate;
			return $timeNow;//output 15:25
		}
		public function timeNow3(){
			$dateNow=date('Y-m-d H:i:s');
			return $dateNow;//output 2012-11-23 15:25:18
		}
		public function timeNow4(){
			$dateNow=date('j F Y');
			return $dateNow;//output 14 August 2005
		}
		public function timeNow5(){
			$dateNow=date('Y-m-d');
			return $dateNow;//output 2012-11-23
		}
		public function timeNow6(){
			$dateNow=date('j M Y');
			return $dateNow;//output 14 Aug 2005
		}
		
		public function SWD($format,$style){
			 if($style){
				   if($format=="0000-00-00 00:00:00"){
						return "00-00-0000 00:00:00";
				   }else{
						return date("d M Y H:i:s",strtotime($format));
				   }
			 }else{
						return date("d M Y",strtotime($format));
				   }
			}
}
?>