<?php
					$productArray=array();
					$sql="SELECT p.product_id,b.brand,p.model_id,p.product_group,p.product_type,p.code,p.`type`,p.image,p.date_create  FROM yss_product p INNER JOIN yss_brand b ON p.brand_id=b.brand_id";
					$rs=mysqli_query($conn,$sql);
					
					while($data=mysqli_fetch_assoc($rs)){
						$productArray['product_id'][]=$data['product_id'];
						$productArray['product_code'][]=$data['code'];
						$productArray['product_group'][]=$data['product_group'];
						$productArray['product_type'][]=$data['product_type'];
						$productArray['type'][]=$data['type'];
						$productArray['brand'][]=$data['brand'];
						//$productArray['model'][]=$data['model_id'];
						$modelId=$data['model_id'];
						$productArray['pic'][]=$data['image'];
						
						$productArray['model'][]=$myFn->getData($conn,'ID','yss_model_moto',"WHERE ID='$modelId'");
					}
				?>
                
                <?php
					$c=count($productArray['product_id']);
				 	for($i=0;$i<$c;$i++){	
						if(empty($productArray['pic'][$i])){
							$productArray['pic'][$i]='no-photo.jpg';
						}else{
							$productArray['pic'][$i]='no-photo.jpg';
						}
				?>
				<div class="offer_item clearfix">
                	<div class="offer_image"><a href="offers-details.html">
                    <img src="images/products/large/<?php echo $productArray['pic'][$i] ?>" alt="">
                    </a></div>
                    <div class="offer_aside">
                    	<h2><a href="offers-details.html"><?php echo $productArray['product_code'][$i] ?></a></h2>
                        <div><strong> BRAND: </strong> <?php echo $productArray['brand'][$i] ?></div>
                        <div><strong> MODEL: </strong> <?php echo $productArray['model'][$i] ?></div>
                        <div><strong> TYPE: </strong> <?php echo $productArray['type'][$i] ?></div>
                    	<div class="offer_descr">
                        	<p>
                                <strong>Product Group: </strong> <?php echo $productArray['product_group'][$i] ?>
                                <strong>Product Type: </strong><?php echo $productArray['product_type'][$i] ?>
                            </p>
                        </div>
                      <div class="offer_data">
                       	  <div style="text-align:right">
                              <span ><img src="images/feature/bigicon_t.png" alt="" width="36"/></span>
                              <span ><img src="images/feature/bigicon_r.png" alt="" width="36"/></span>
                              <span><img src="images/feature/bigicon_w.png" alt="" width="36"/></span>  
                          </div>                       
                        </div>
                    </div>
                </div>
			<?php } ?>
            
            </div>
            <!--/ offers list -->