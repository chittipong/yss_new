<?php
$sql="SELECT n.id,n.pic AS main_pic, n.sort_order,n.`type`,n.date_create,d.title,d.detail,d.pic,d.lang 
	FROM yss_news n,yss_news_detail d WHERE n.id=d.news_id ORDER BY n.sort_order";
	
	$rs=mysqli_query($conn,$sql);
	$dataArray=array();
	$eventArray=array();
		
	while($data=mysqli_fetch_assoc($rs)){
		if($data['type']=='EVENT'){
			$eventArray['id'][]=$data['id'];
			$eventArray['title'][]=$data['title'];
			$eventArray['detail'][]=$data['detail'];
			$eventArray['main_pic'][]=$data['main_pic'];
			$eventArray['pic'][]=$data['pic'];	
			$eventArray['type'][]=$data['type'];
			$eventArray['date_create'][]=$data['date_create'];
		}
	}
?>
<!--GET EVENT DATA-->
<div class="col col_1_3">
  <h1 class="yssfont01 head-style-01">
      <span style="float:left;"><img src="images/box-header-01.png"/></span>
      <div class="middle">Event</div>
      <span><img src="images/box-header-02.png"/></span>
  </h1>
  <?php
      $c=count($eventArray['id']);
      for($i=0;$i<$c;$i++){
          $detail = $myFn->limitStrDisplay(100,$eventArray['detail'][$i]); 
          $dateCreate=$myDate->dateFormat2($eventArray['date_create'][$i]);
  ?>
  <div class="col col_1_1 event-box1">
     <h4 style="font-size: 12px; color:#969696; font-style: italic; text-align: right;">
          <i class="fa fa-clock-o"></i> <?php echo $dateCreate ?>
     </h4>
     <p>
          <img src="images/news/<?php echo $eventArray['main_pic'][$i] ?>" class="frame_left" width="100"/>
          <?php echo $eventArray['title'][$i] ?>
     </p>
  </div>
  <?php } ?>

</div>