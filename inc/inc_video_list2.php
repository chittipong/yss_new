<h1 class="yssfont01 head-style-01">
	<span style="float:left;"><img src="images/box-header-01.png"/></span>
	<div class="middle"><?php echo $txt_video ?></div>
	<span><img src="images/box-header-02.png"/></span>
</h1>

<?php
	//GET VIDEO DATA===================================
		$sql="SELECT * FROM yss_videos ORDER BY sort_order ASC LIMIT 6";
		$rs=mysqli_query($conn,$sql);
?>

<?php 
	while($data=mysqli_fetch_assoc($rs)){
		$id=$data['id'];
		$pic=$data['pic'];
		$title=$data['title'];
		
		//Limit text for display----------------
		$strLength=strlen($data['title']);
		//echo $strLength;
		
		$limit=200;															//Set max length
		if($strLength>$limit){
			$title=$myFn->limitStrDisplay($limit,$title);			//Limit text for display
		}
?>
        <div class="col col_1_3 omega">
             <p> <a href="video-detail.php?id=<?php echo $id ?>" >
                 <img src="images/video_thumbs/<?php echo $pic ?>" alt="" class="frame_left" width="140" style="box-shadow:4px 4px 20px #FFFFFF; height:90px !important;"></a>
                <a href="video-detail.php?id=<?php echo $id ?>" class="link-style-1"><?php echo $title ?></a>
             </p>
        </div>
 <?php } ?>
 

 