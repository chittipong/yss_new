<?php
$sql="SELECT n.id,n.pic AS main_pic, n.sort_order,n.`type`,n.date_create,d.title,d.detail,d.pic,d.lang 
	FROM yss_news n,yss_news_detail d WHERE n.id=d.news_id GROUP BY d.news_id ORDER BY n.sort_order";
	
	$rs=mysqli_query($conn,$sql);
	$dataArray=array();
		
	while($data=mysqli_fetch_assoc($rs)){
		if($data['type']=='NEWS'){
			$dataArray['id'][]=$data['id'];
			$dataArray['title'][]=$data['title'];
			$dataArray['detail'][]=$data['detail'];
			$dataArray['main_pic'][]=$data['main_pic'];
			$dataArray['pic'][]=$data['pic'];	
			$dataArray['type'][]=$data['type'];
			$dataArray['date_create'][]=$data['date_create'];
		}
	}
?>

<h1 class="yssfont01 head-style-01">
    <span style="float:left;"><img src="images/box-header-01.png"/></span>
    <div class="middle">News</div>
    <span><img src="images/box-header-02.png"/></span>
</h1>
    <?php
        $c=count($dataArray['id']);
        for($i=0;$i<$c;$i++){
            $detail = $myFn->limitStrDisplay(100,$dataArray['detail'][$i]); 
    ?>
  <div class="wp-caption alignleft" style="width:250px">
  		<a href="news-detail.php?id=<?php echo $dataArray['id'][$i] ?>">
        <img src="images/news/<?php echo $dataArray['main_pic'][$i] ?>"/>
        </a>
        <p class="wp-caption-text">
		<a href="news-detail.php?id=<?php echo $dataArray['id'][$i] ?>"><?php echo $dataArray['title'][$i] ?></a></p>
    </div>
 <?php } ?>