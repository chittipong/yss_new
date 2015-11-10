<?php if(!empty($dataArray['title'][$i])){  ?>
<h1 class="yssfont01 head-style-01">
	<span style="float:left;"><img src="images/box-header-01.png"/></span>
	<div class="middle"><?php echo $dataArray['title'][$i] ?></div>
	<span><img src="images/box-header-02.png"/></span>
</h1>
<?php } ?>

<div class="wp-caption layout-pic-top">
    <img src="images/contents/<?php echo $dataArray['pic'][$i] ?>" width="850" height="567" alt="">
    <p class="wp-caption-text"><?php echo $dataArray['pic_title'][$i] ?></p>
</div>
<?php echo $dataArray['detail'][$i] ?>
<div class="divider_space_thin"></div>