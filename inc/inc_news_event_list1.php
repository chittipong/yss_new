<h1 class="yssfont01 head-style-01">
	<span style="float:left;"><img src="images/box-header-01.png"/></span>
	<div class="middle">News & Event</div>
	<span><img src="images/box-header-02.png"/></span>
</h1>

<?php
	//GET News===================================
		$sql_slide="SELECT n.id,n.pic,d.title FROM yss_news n,yss_news_detail d WHERE n.id=d.news_id  GROUP BY d.news_id ORDER BY n.sort_order ASC LIMIT 4";
		$rs=mysqli_query($conn,$sql_slide);
?>

<?php 
	while($data=mysqli_fetch_assoc($rs)){
		$news_id=$data['id'];
		$news_pic=$data['pic'];
		$news_title=$data['title'];
		
		//Limit text for display----------------
		$strLength=strlen($data['title']);
		//echo $strLength;
		
		$limit=200;															//Set max length
		if($strLength>$limit){
			$news_title=$myFn->limitStrDisplay($limit,$news_title);			//Limit text for display
		}
?>
        <div class="col col_1_2 omega">
             <p> <a href="news-detail.php?id=<?php echo $news_id ?>" >
                 <img src="images/news/<?php echo $news_pic ?>" alt="" class="frame_left" width="140" style="box-shadow:4px 4px 20px #FFFFFF; height:90px !important;"></a>
                <a href="news-detail.php?id=<?php echo $news_id ?>" class="link-style-1"><?php echo $news_title ?></a>
             </p>
        </div>
 <?php } ?>
 

 