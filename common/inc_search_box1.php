<?php
//LIST DATA ----------------
	$brandArray=$myFn->getBrandList($conn);						//Get Brand
	$modelArray=$myFn->getModelList($conn);						//Get Model
	$ccArray=$myFn->getCcList($conn);							//Get CC
	$catArray=$myFn->getCatList($conn);							//Get Category
	$pdGroupArray=$myFn->getProductGroupList($conn);			//Get Product Group
	$pdTypeArray=$myFn->getProductTypeList($conn);				//Get Product Type
?>

<div class="middle_row row_white search_row" style="background:url(images/bg/bg_001.jpg)">
		<div class="container">
        <h1 style="color:#F25720;"><i class="fa fa-search"></i><?php echo $txt_qsearch ?> </h1>
			<form action="product-list.php" class="search_form advsearch_hide clearfix">
            	<div class="row field_select">
                    <label class="label_title"><?php echo $txt_vehicle_type ?>:</label>
                    <select class="select_styled" name="vehicle_type">
                    	<option value="">All</option>
                    	<?php 
							$c=count($catArray['id']);
							for($i=0;$i<$c;$i++){
						?>
                        <option value="<?php echo $catArray['id'][$i] ?>"><?php echo $catArray['name'][$i] ?></option>
                        <?php } ?>
                    </select>
                </div>
                
            	<div class="row field_select">
                    <label class="label_title"><?php echo $txt_select_brand ?>:</label>
                    <select class="select_styled" name="brand">
                    	<option value="">All</option>
                    	<?php 
							$c=count($brandArray['id']);
							for($i=0;$i<$c;$i++){
						?>
                        <option value="<?php echo $brandArray['id'][$i] ?>"><?php echo $brandArray['brand'][$i] ?></option>           
                        <?php } ?>    
                    </select>
                </div>
                
                <div class="row field_select">
                    <label class="label_title"><?php echo $txt_select_model ?></label>
                    <select class="select_styled" name="model">
                    	<option value="">All</option>
                        <?php 
							$c=count($modelArray['id']);
							for($i=0;$i<$c;$i++){
						?>
                        <option value="<?php echo $modelArray['id'][$i] ?>"><?php echo $modelArray['model'][$i] ?></option>           
                        <?php } ?>                                
                    </select>
                </div>
                
                <div class="row field_select">
                    <label class="label_title"><?php echo $txt_cc ?>:</label>
                    <select class="select_styled" name="cc">
                    	<option value="">All</option>
                        <?php 
							$c=count($ccArray['id']);
							for($i=0;$i<$c;$i++){
						?>
                        <option value="<?php echo $ccArray['id'][$i] ?>"><?php echo $ccArray['cc'][$i] ?></option>           
                        <?php } ?>
                    </select>
                </div>
                
                <div class="adv_search_hidden clearfix">
					<div class="row field_select">
						<label class="label_title">Year:</label>
						<select class="select_styled" name="year">
							<option value="">All</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
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
						</select>
					</div>
					
					<div class="row field_select">
						<label class="label_title">Product Group:</label>
						<select class="select_styled" name="productGroup">
							<option value="">All</option>
							<?php 
                                $c=count($pdGroupArray['group']);
                                for($i=0;$i<$c;$i++){
                            ?>
                            <option value="<?php echo $pdGroupArray['group'][$i] ?>"><?php echo $pdGroupArray['detail'][$i] ?></option>
                            <?php } ?>                                        
						</select>
					</div>
					
					<div class="row field_select">
						<label class="label_title">Product Type:</label>
						<select class="select_styled" name="productType">
							<option value="">All</option>
							<?php 
                                $c=count($pdTypeArray['type']);
                                for($i=0;$i<$c;$i++){
                            ?>
                            <option value="<?php echo $pdTypeArray['type'][$i] ?>"><?php echo $pdTypeArray['detail'][$i] ?></option>           
                            <?php } ?>                                                
						</select>
					</div>
					
					<div class="row field_select">
						<label class="label_title">Product Range:</label>
						<select class="select_styled" name="car_location">
                        	<option value="">All</option>
							<option value="1">Racing Line</option>
                            <option value="2">Top Line</option>
							<option value="3">Eco Line</option>
							<option value="4">Gas DTG</option>
							<option value="5">Hydraulic Shock Absorber</option>
                            <option value="6">Front Fork</option>
                            <option value="7">Steering Damper</option>
                            <option value="8">Accessories</option>
						</select>
					</div>
                </div>
                
                <div class="row rowSubmit">
                	<label class="label_title" id="adv_search_open"><?php echo $txt_advSearch ?></label>
                    <span class="btn btn_search"><input type="submit" value="<?php echo $txt_search ?>"></span>
                </div>
            </form>
            <script type="text/javascript">
			jQuery(document).ready(function($) {					
				// Show/Hide Advanced Search
				$(".adv_search_hidden").hide();
				$("#adv_search_open").click(function(){								
					if ($(this).closest(".search_form").hasClass("advsearch_hide")) {
						$(".adv_search_hidden").stop().slideDown();
						$(this).html("Close <?php echo $txt_advSearch ?>");
					} else {
						$(".adv_search_hidden").stop().slideUp();
						$(this).html("<?php echo $txt_advSearch ?>");
					}
					$(this).closest(".search_form").toggleClass("advsearch_hide");					
				});				
			});				
			</script>
		</div>
	</div>