<div class="row clearfix">
  <?php 
	$dist_sql="SELECT * FROM importers WHERE status='enable' ORDER BY sort_order ASC";
	$dist_rs=mysqli_query($conn,$dist_sql);
	while($dist_data=mysqli_fetch_assoc($dist_rs)){
		$dist_title=$dist_data['title'];
		$dist_pic=$dist_data['pic'];
		$dist_detail=$dist_data['detail'];
		
	?>
  <div class="col col_1_2 omega" style="height: 260px; width: 250px; margin:5px 0px 0px 10px;  border-bottom: 1px dotted #CACACA;">
    <div class="widget_popular_posts">
      <ul>
        <li>
          <div class="extras"> <a href="#" hidefocus="true" style="outline: none;"> 
          <img src="images/distributor/<?php echo $dist_pic ?>" alt="" width="388" height="260" class="thumbnail"></a>
            <h5><strong><em><?php echo $dist_title ?></em></strong></h5>
            <div >
              <p> <?php echo $dist_detail ?> </p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <?php } ?>
</div>
