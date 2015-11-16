<?php
		  $dataArray=array();
		  $command="SELECT * FROM yss_videos";		//include condition***
		  
		  //echo $command; exit(); 											//Display sql string***
		  
		  //get object result from database------
		  $result  = mysqli_query($conn,$command);
		  $num=mysqli_num_rows($result);
		  
		  $queryString = $_SERVER['QUERY_STRING'];							//Get Query string
		  //echo $queryString;
		  
		  $p=isset($_GET['page']) ? $_GET['page']:null;						//Get page number
		  
		  //Replace current page---------------
		  if(!empty($p)){
			  $queryString = str_ireplace("&page=$p", "", $queryString);
		  }
		  
		  //Configuration pager----------------
		  $config['url_page'] = "video.php?$queryString&page=";
		  
		  $config['all_recs'] = mysqli_num_rows($result);					// จำนวนแถวทั้งหมดของข้อมูล
		  $config['scr_page'] = 7;											// จำนวนเลขหน้าที่แสดงในหน้านั้น
		  $config['per_page'] = 15;											// จำนวนแถวต่อหน้า
		  $config['cur_page'] = isset($_GET['page']) ? $_GET['page'] : 1;	// หน้าปัจจุบัน
		  $config['act_page'] = 'class="current_page"';						// ใส่ class css ให้หน้าปัจจุบัน
		  $config['css_page'] = 'class="css-pager"';						// ใส่ clss css ให้กับส่วนการแบ่งหน้า
		  $config['first'] = '&laquo; First';								// ข้อความปุมหน้าแรก
		  $config['previous'] = '&lsaquo; Prev';							// ข้อความปุมหน้าก่อนหน้า
		  $config['next']  = 'Next &rsaquo;';								// ข้อความปุมหน้าถัดไป
		  $config['last']  = 'Last &raquo;';								// ข้อความปุมหน้าสุดท้าย
	  
		  //create pager instance
		  $pager = new Pager($config);
		  
		  echo "<p>";
			  try {
				  $pager->createPager();
			  } 
			  catch(Exception $e) { echo $e->getMessage(); } 
		  echo "</p>";
		  echo "<p style='margin-bottom:20px'></p>";
		  
		  //display data-----------
		   $result = mysqli_query($conn,$command." ORDER BY sort_order ASC LIMIT ".$pager->limitStart().",
			".$config['per_page']) or die (mysql_error());
					 
?>

<?php
	//List to array--------------
	while($data=mysqli_fetch_assoc($result)){
			$dataArray['id'][]=$data['id'];
			$dataArray['title'][]=$data['title'];
			$dataArray['detail'][]=$data['detail'];
			$dataArray['pic'][]=$data['pic'];	
			$dataArray['video'][]=$data['video'];
			$dataArray['type'][]=$data['type'];
			$dataArray['date_create'][]=$data['date_create'];
	}
?>

<?php
    $c=count($dataArray['id']);
    for($i=0;$i<$c;$i++){
       $detail = $myFn->limitStrDisplay(200,$dataArray['detail'][$i]); 
?>
	<div class="col col_1_3 alpha" style="border-bottom:1px dotted#D0D0D0; margin-bottom:20px; padding: 5px 0; height:260px;">
          <p class="video-thumb">
              <a href="video-detail.php?id=<?php echo $dataArray['id'][$i] ?>" hidefocus="true" style="outline: none;">
              	<?php //echo $dataArray['video'][$i] ?>
              	<img src="images/video_thumbs/<?php echo $dataArray['pic'][$i] ?>" alt="" class="frame_center">
              </a>
          </p>
          <p><a href="video-detail.php?id=<?php echo $dataArray['id'][$i] ?>" hidefocus="true" style="outline: none;">
          <h3 style="color:#7B7B7B;"><?php  echo $dataArray['title'][$i] ?></h3></a></p>
        </div>
<?php } ?>
<div class="row clearfix"></div>
<p style="margin-top:20px;">
<?php
	//display pager down data
	try {
		$pager->createPager();
	} 
	catch(Exception $e) { echo $e->getMessage(); } 
?>
</p>