<h1 class="yssfont01 head-style-01">
	<span style="float:left;"><img src="images/box-header-01.png"/></span>
	<div class="middle">New Products</div>
	<span><img src="images/box-header-02.png"/></span>
</h1>

<?php
//GET NEW PRODUCT============================
	$sql="SELECT * FROM yss_product WHERE new='Y' AND enable='Y' LIMIT 4";
	$rs=mysqli_query($conn,$sql);
	$n=mysqli_num_rows($rs);
	//echo "Total: $n";
?>

<?php
	while($data=mysqli_fetch_assoc($rs)){
		$p_id=$data['product_id'];
		$p_code=$data['code'];
		$p_image=$data['image'];
		
		//Get title-------------
		$p_title=$myFn->getData($conn,'title','yss_product_detail',"WHERE product_id='$p_id'");
		

	//CHECK PIC AVARIABLE=============
		$chkPic='images/products/large/'.$p_image;
		if(!file_exists($chkPic)){
			$p_image='no-photo.jpg';
		}
?>
    <div class="col col_1_4 alpha" style="width:190px;">
         <p>
         	<a href="product-detail.php?id=<?php echo $p_id ?>">
            	<img src="images/products/large/<?php echo $p_image ?>" alt="" class="frame_center">
            	<h4><?php echo $p_code ?></h4> 
            </a>
            <?php echo $p_title ?>
         </p>
    </div>
<?php } ?>
 