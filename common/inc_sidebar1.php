<?php
//LIST DATA ----------------
	$brandArray=$myFn->getBrandList($conn);						//Get Brand
	$modelArray=$myFn->getModelList($conn);						//Get Model
	$ccArray=$myFn->getCcList($conn);							//Get CC
	$catArray=$myFn->getCatList($conn);							//Get Category
	$pdGroupArray=$myFn->getProductGroupList($conn);			//Get Product Group
	$pdTypeArray=$myFn->getProductTypeList($conn);				//Get Product Type
?>
<div class="sidebar">
        	<div class="box">
            
            <!-- filter -->
	        <div class="widget-container widget_adv_filter">
				<h3 class="widget-title"><?php echo $txt_adjust_search ?></h3>
					
                <form action="product-list.php" method="GET" class="side_form">
                
                    <div class="row field_select" style="z-index:10">
                        <label class="label_title"><?php echo $txt_select_brand ?>:</label>
                        <select class="select_styled white_select" name="brand">
                        	<option value="" class="default">- SELECT -</option>
							<?php 
                                $c=count($brandArray['id']);
                                for($i=0;$i<$c;$i++){
                            ?>
                            <option value="<?php echo $brandArray['id'][$i] ?>"><?php echo $brandArray['brand'][$i] ?></option>           
                            <?php } ?>                        
	                    </select>
                    </div>
                    
                    <div class="row field_select" style="z-index:9">
                        <label class="label_title"><?php echo $txt_select_model ?>:</label>
                        <select class="select_styled white_select" name="model">
                        	<option value="" class="default">- SELECT -</option>
	                         <?php 
								$c=count($modelArray['id']);
								for($i=0;$i<$c;$i++){
							?>
							<option value="<?php echo $modelArray['id'][$i] ?>"><?php echo $modelArray['model'][$i] ?></option>
							<?php } ?>                
	                    </select>
                    </div>

                    
                    <div class="row field_select" style="z-index:8">
	                    <label class="label_title"><?php echo $txt_year ?>:</label>
	                    <select class="select_styled white_select" name="year">
                        	<option value="" class="default">- SELECT -</option>
                        	<option value="2013">2016</option>
                        	<option value="2013">2015</option>
                        	<option value="2013">2014</option>
                        	<option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>  
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="">Other</option>
	                    </select>
                    </div>
                    
                    <div class="row field_select" style="z-index:7">
                        <label class="label_title"><?php echo $txt_cc ?>:</label>
                        <select class="select_styled white_select" name="cc">
                        	<option value="" class="default">- SELECT -</option>
	                         <?php 
								$c=count($ccArray['id']);
								for($i=0;$i<$c;$i++){
							?>
							<option value="<?php echo $ccArray['cc'][$i] ?>"><?php echo $ccArray['cc'][$i] ?></option>
							<?php } ?>                
	                    </select>
                    </div>
                    
                    <div class="row input_styled checklist" style="z-index:6">
                        <label class="label_title2"><?php echo $txt_vehicle_type ?>:</label><br> 
                        <?php 
							$c=count($catArray['id']);
							for($i=0;$i<$c;$i++){
						?>
                      <input type="checkbox" name="vehicle_type[]" id="vehicle_type_<?php echo $catArray['id'][$i] ?>" value="<?php echo $catArray['id'][$i] ?>"> <label for="vehicle_type_<?php echo $catArray['id'][$i] ?>"><?php echo $catArray['name'][$i] ?></span></label>
                        <?php } ?>
                        
                      
                    </div>
                    
                    <div class="row rangeField">
                        <label class="label_title2"><?php echo $txt_price_range ?>:</label>
                        <div class="range-slider">
                            <input id="price_range" type="text" name="price_range" value="5000;60000">
                        </div>                   
                        <div class="clear"></div>
                    </div>
                    
                    <!--<div class="row rangeField">
                        <label class="label_title2">Kilometers:</label>
                        <div class="range-slider">
                            <input id="miliage" type="text" name="miliage" value="50000;400000">
                        </div>                   
                        <div class="clear"></div>
                    </div>-->
                    
                    <!--<div class="row input_styled checklist">
                        <label class="label_title2">Fuel Type:</label><br>                            
                        <input type="checkbox" name="fuel_type_1" id="fuel_type_1" value="1"> <label for="fuel_type_1">Petrol  <span>(32)</span></label>
                        <input type="checkbox" name="fuel_type_2" id="fuel_type_2" value="2" checked> <label for="fuel_type_2">Diesel <span>(49)</span></label>
                        <input type="checkbox" name="fuel_type_3" id="fuel_type_3" value="3"> <label for="fuel_type_3">Natural Gas <span>(56)</span></label>
                        <input type="checkbox" name="fuel_type_4" id="fuel_type_4" value="4"> <label for="fuel_type_4">LPG <span>(31)</span></label>
                        <input type="checkbox" name="fuel_type_5" id="fuel_type_5" value="5"> <label for="fuel_type_5">Electric <span>(23)</span></label>
                        <input type="checkbox" name="fuel_type_6" id="fuel_type_6" value="6" checked> <label for="fuel_type_6">Hybrid <span>(46)</span></label>
                    </div>-->
                    
                    <!--<div class="row input_styled checklist">
                        <label class="label_title2">Engine Size:</label><br>                            
                        <input type="checkbox" name="engine_power_1" id="engine_power_1" value="1" checked> <label for="engine_power_1">1.1 - 1.5  <span>(32)</span></label>
                        <input type="checkbox" name="engine_power_2" id="engine_power_2" value="2" checked> <label for="engine_power_2">1.6 - 2.0  <span>(49)</span></label>
                        <input type="checkbox" name="engine_power_3" id="engine_power_3" value="3"> <label for="engine_power_3">2.1 - 3.0  <span>(56)</span></label>
                        <input type="checkbox" name="engine_power_4" id="engine_power_4" value="4"> <label for="engine_power_4">3.1 - 4.0 <span>(31)</span></label>
                        <input type="checkbox" name="engine_power_5" id="engine_power_5" value="5"> <label for="engine_power_5">4.1 +   <span>(23)</span></label>
                    </div>-->
                    
                    <!--<div class="row input_styled checklist">
                        <label class="label_title2">Car Colour:</label><br>                            
                        <input type="checkbox" name="car_color_all" id="car_color_all" value="0" checked> <label for="car_color_all">All Colours <span>(332)</span></label>
                        <input type="checkbox" name="car_color_1" id="car_color_1" value="1"> <label for="car_color_1">Silver <span>(49)</span></label>
                        <input type="checkbox" name="car_color_2" id="car_color_2" value="2"> <label for="car_color_2">Black <span>(56)</span></label>
                        <input type="checkbox" name="car_color_3" id="car_color_3" value="3"> <label for="car_color_3">Brown <span>(31)</span></label>
                        <input type="checkbox" name="car_color_4" id="car_color_4" value="4"> <label for="car_color_4">White <span>(23)</span></label>
                        <input type="checkbox" name="car_color_5" id="car_color_5" value="5"> <label for="car_color_5">Red <span>(46)</span></label>
                        <input type="checkbox" name="car_color_6" id="car_color_6" value="5"> <label for="car_color_6">Green <span>(46)</span></label>
                        <input type="checkbox" name="car_color_other" id="car_color_other" value="7"> <label for="car_color_other">Other <span>(115)</span></label>
                    </div>-->
                    
                    <div class="row rowSubmit">
                        <span class="btn btn_search"><input type="submit" value="<?php echo $txt_search ?>"></span>
                    </div>
                    
                </form>    
                
                <script type="text/javascript" >
                        jQuery(document).ready(function($) {						
                            // Price Range Input
                            $("#price_range").slider({ 
                                from: 100,
                                to: 100000,
                                limits: false, 
                                scale: ['$100', '$100k'],
                                heterogeneity: ['50/50000'],
                                step: 100,
                                smooth: true,
                                dimension: '$',
                                skin: "round_blue"
                            });
							$("#miliage").slider({ 
                                from: 0,
                                to: 500000,
                                limits: false, 
                                scale: ['0', '500k'],
                                heterogeneity: ['50/250000'],
                                step: 5000,
                                smooth: true,
                                skin: "round_blue"
                            });
                        });
                </script>           
			</div>
	        <!--/ filter -->
            
            <div class="box_bot"></div>
            </div>
        </div>