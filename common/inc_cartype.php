<?php
	$total_scooter=$myFn->countByVehicle($conn,3);
	$total_motorcy=$myFn->countByVehicle($conn,1);
	$total_quad=$myFn->countByVehicle($conn,2);
	$total_car=$myFn->countByVehicle($conn,5);
	$total_special=$myFn->countByVehicle($conn,4);
?>
<?php
	$txt_pieces=$myFn->getWord($conn,'pieces',$lang);
?>

<div class="middle_row row_gray">
		<div class="container clearfix">  
			
            <div class="car_types_list">
            	<h2><?php echo $txt_ourproduct ?></h2>
                <ul>
	                <li class="type_hover cart_type_1">
						<a href="product-list.php?vehicle_type=3" class="front"><strong><?php echo $txt_scooter ?></strong> <em><?php echo $total_scooter ?>  <?php echo $txt_pieces ?></em></a>
		                <a href="product-list.php?vehicle_type=3" class="back"><strong><?php echo $txt_scooter ?></strong> <em><?php echo $txt_viewall ?></em></a>
                    </li>
                    <li class="type_hover cart_type_2">
                        <a href="product-list.php?vehicle_type=1" class="front"><strong><?php echo $txt_motorcy ?></strong> <em><?php echo $total_motorcy ?>  <?php echo $txt_pieces ?></em></a>
                        <a href="product-list.php?vehicle_type=1" class="back"><strong><?php echo $txt_motorcy ?></strong> <em><?php echo $txt_viewall ?></em></a>
                    </li>
                    <li class="type_hover cart_type_3">
	                    <a href="product-list.php?vehicle_type=2" class="front"><strong><?php echo $txt_quad ?></strong> <em><?php echo $total_quad ?>  <?php echo $txt_pieces ?></em></a>
	                    <a href="product-list.php?vehicle_type=2" class="back"><strong><?php echo $txt_quad ?></strong> <em><?php echo $txt_viewall ?></em></a>
                    </li>
                    <li class="type_hover cart_type_4">
	                    <a href="product-list.php?vehicle_type=5" class="front"><strong><?php echo $txt_car ?></strong> <em><?php echo $total_car ?>  <?php echo $txt_pieces ?></em></a>
	                    <a href="product-list.php?vehicle_type=5" class="back"><strong><?php echo $txt_car ?></strong> <em><?php echo $txt_viewall ?></em></a>
                    </li>
                    <li class="type_hover cart_type_5">
	                    <a href="product-list.php?vehicle_type=4" class="front"><strong><?php echo $txt_special_purpose ?></strong> <em><?php echo $total_special ?> <?php echo $txt_pieces ?></em></a>
	                    <a href="product-list.php?vehicle_type=4" class="back"><strong><?php echo $txt_special_purpose ?></strong> <em><?php echo $txt_viewall ?></em></a>
                    </li>
                </ul>                
            	<!--<a href="#" class="link_more">SEE ALL OUR OFFERS</a>-->
            </div>
            <script>	
			jQuery(document).ready(function($) {		
				$('.type_hover').hover(function(){
					$(this).addClass('flip');
				},function(){
					$(this).removeClass('flip');
				});		          
			});
			</script> 
            
		</div>
	</div>