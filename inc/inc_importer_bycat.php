<div class="row clearfix">
  <?php 
	$cid=$catArray['id'][$i];
	$sql="SELECT * FROM importers WHERE import_cat_id='$cid' AND status='enable' ORDER BY sort_order ASC";
	$rs=mysqli_query($conn,$sql);
	while($data=mysqli_fetch_assoc($rs)){
		$title=$data['title'];
		$pic=$data['pic'];
		$detail=$data['detail'];
		
	?>
  <div class="col col_1_2 omega" style="height: 260px; width: 240px; margin:5px 0px 0px 10px;  border-bottom: 1px dotted #CACACA;">
    <div class="widget_popular_posts">
      <ul>
        <li>
          <div class="extras"> <a href="<?php echo $data['id'] ?> " hidefocus="true" style="outline: none;"> <img src="images/distributor/<?php echo $pic ?>" alt="" width="388" height="260" class="thumbnail"></a>
            <h5><strong><em><?php echo $title ?></em></strong></h5>
            <div >
              <p> <?php echo $detail ?> </p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <?php } ?>
</div>
