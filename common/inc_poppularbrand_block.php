<div class="middle_row row_light_gray brand_list">
		<div class="container">
	            <h2><?php echo $txt_mostpop ?>:</h2>
	            <ul id="logo-brandCn">
                	<?php
						//GET BRAND=============================
						$sql="SELECT brand_id,logo FROM yss_brand WHERE brand_list='Y' LIMIT 6";
						$rs=mysqli_query($conn,$sql);
						while($data=mysqli_fetch_assoc($rs)){
							$brand_id=$data['brand_id'];
							$brand_logo=$data['logo'];
					?>
	            	<li><a href="product-list.php?brand=<?php echo $brand_id ?>"><img src="images/brand_logo/<?php echo $brand_logo ?>" alt=""></a></li>
                    <?php } ?>
	            </ul>
	            
	            <a href="poppular-brand.php" class="link_more"><?php echo $txt_viewall ?></a>
        </div>
	</div>