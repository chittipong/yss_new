<?php
	$sql="SELECT * FROM yss_product WHERE hot='Y' AND enable='Y'";
	$rs=mysqli_query($conn,$sql);
	$n=mysqli_num_rows($rs);
	echo $n;
?>


<div class="special_offers">
            	<h2>Hot Products</h2>
                
                <div id="special_offers">
                	<?php
						while($data=mysqli_fetch_assoc($rs)){
							$p_id=$data['product_id'];
							$p_code=$data['code'];
							$p_image=$data['image'];
							

						//CHECK PIC AVARIABLE=============
							$chkPic='images/products/large/'.$p_image;
							if(!file_exists($chkPic)){
								$p_image='no-photo.jpg';
							}
					?>
                        <div class="special_item">
                            <div class="special_image">
                            <a href="product-detail.php?id=<?php echo $p_id ?>"><img src="images/products/large/<?php echo $p_image ?>" alt="" style="height:40px;"></a>
                            </div>
                            <div class="special_text">
                                <h3><a href="product-detail.php?id=<?php echo $p_id ?>"><?php echo $p_code ?></a></h3>
                                <div class="info_row"><span>FIRST REG:</span> FEB 2013</div>
                                <div class="info_row"><span>FUEL CONS:</span> 32,6 MPG</div>
                                <div class="info_row"><span>MILEAGE</span> 170,443</div>
                                <div class="special_price">$32.690</div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a class="prev" id="special_offers_prev" href="#"></a>
            	<a class="next" id="special_offers_next" href="#"></a>
                
                <div class="link_more"><a href="product-list.php">View All</a></div>
            
                <script>	
				jQuery(document).ready(function($) {
					function carSpecicalInit() {
						var car_specical = $('#special_offers');
						car_specical.carouFredSel({
							prev : "#special_offers_prev",
							next : "#special_offers_next",
							infinite: true,
							circular: false,
							auto: false,
							width: '100%',
							direction: "down",						
							scroll: {
								items : 1
							}
						});						
					}
					$(window).load(function() {
						carSpecicalInit();
					}); 
					var resizeTimer;
					$(window).resize(function() {
						clearTimeout(resizeTimer);
						resizeTimer = setTimeout(carSpecicalInit, 100);
					});							          
				});
			    </script> 
            </div>