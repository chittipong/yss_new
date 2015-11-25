<h1 class="yssfont01 head-style-01">
	<span style="float:left;"><img src="images/box-header-01.png"/></span>
	<div class="middle"><?php echo $txt_news ?></div>
	<span><img src="images/box-header-02.png"/></span>
</h1>

<?php
	//GET News===================================
		$sql_slide="SELECT n.id,n.pic,d.title FROM yss_news n,yss_news_detail d WHERE n.id=d.news_id AND type='NEWS' GROUP BY d.news_id ORDER BY n.date_create ASC";
		$rs=mysqli_query($conn,$sql_slide);
?>

<?php 
	while($data=mysqli_fetch_assoc($rs)){
		$news_id=$data['id'];
		$news_pic=$data['pic'];
		$news_title=$data['title'];
?>
    <div class="col col_1_1 omega">
         <p> <a href="news-detail.php?id=<?php echo $news_id ?>" >
 				<img src="images/news/<?php echo $news_pic ?>" alt="" class="frame_left" width="100">
             </a>
            <a href="news-detail.php?id=<?php echo $news_id ?>" class="link-style-2"><?php echo $news_title ?></a>
         </p>
    </div>
 <?php } ?>
 
 <p align="right" style="clear:right; margin:20px 0;"><a href="news.php"><img src="images/viewall_btn.png"/></a></p>

 