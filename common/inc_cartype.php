<div class="middle_row row_gray">
		<div class="container clearfix">  
			
            <div class="car_types_list">
            	<h2><?php echo $txt_ourservice ?></h2>
                <ul>
	                <li class="type_hover cart_type_1">
						<a href="#" class="front"><strong>SCOOTERS</strong> <em>76 OFFERS</em></a>
		                <a href="#" class="back"><strong>SCOOTERS</strong> <em>View more</em></a>
                    </li>
                    <li class="type_hover cart_type_2">
                        <a href="#" class="front"><strong>MOTORCYCLE</strong> <em>1354 OFFERS</em></a>
                        <a href="#" class="back"><strong>MOTORCYCLE</strong> <em>View more</em></a>
                    </li>
                    <li class="type_hover cart_type_3">
	                    <a href="#" class="front"><strong>QUAD</strong> <em>68 OFFERS</em></a>
	                    <a href="#" class="back"><strong>QUAD</strong> <em>View more</em></a>
                    </li>
                    <li class="type_hover cart_type_4">
	                    <a href="#" class="front"><strong>CAR</strong> <em>512 OFFERS</em></a>
	                    <a href="#" class="back"><strong>CAR</strong> <em>View more</em></a>
                    </li>
                    <li class="type_hover cart_type_5">
	                    <a href="#" class="front"><strong>SPECIAL</strong> <em>255 OFFERS</em></a>
	                    <a href="#" class="back"><strong>SPECIAL</strong> <em>View more</em></a>
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