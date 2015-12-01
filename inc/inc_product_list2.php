<?php
					require_once('class/class_pager.php');
					
					//string query-----------------
					/*$command = 'SELECT p.product_id,b.brand,p.model_id,p.product_group,
							p.product_type,p.code,p.`type`,p.image,p.length,p.spring,p.piston,
							p.shaft,p.date_create,p.rebound,p.compression,p.length_adjuster,p.preload
						FROM yss_product p 
						INNER JOIN yss_brand b ON p.brand_id=b.brand_id';*/
						
					$command = '
							SELECT product_id,brand_id,model_id,product_group,new,hot,year,abe_shock,
								product_type,code,`type`,image,length,spring,piston,
								shaft,date_create,rebound,compression,length_adjuster,preload
							FROM yss_product
						';
					
					//get object result from database
					$result  = mysqli_query($conn,$command);
					$num=mysqli_num_rows($result);
					
					//Configuration pager
					$config['url_page'] = 'product.php?page=';
					$config['all_recs'] = mysqli_num_rows($result);				// จำนวนแถวทั้งหมดของข้อมูล
					$config['scr_page'] = 10;									// จำนวนเลขหน้าที่แสดงในหน้านั้น
					$config['per_page'] = 10;									// จำนวนแถวต่อหน้า
					$config['cur_page'] = isset($_GET['page']) ? $_GET['page'] : 1;	// หน้าปัจจุบัน
					$config['act_page'] = 'class="current_page"';				// ใส่ class css ให้หน้าปัจจุบัน
					$config['css_page'] = 'class="css-pager"';					// ใส่ clss css ให้กับส่วนการแบ่งหน้า
					$config['first'] = '&laquo; First';								// ข้อความปุมหน้าแรก
					$config['previous'] = '&lsaquo; Prev';						// ข้อความปุมหน้าก่อนหน้า
					$config['next']  = 'Next &rsaquo;';							// ข้อความปุมหน้าถัดไป
					$config['last']  = 'Last &raquo;';							// ข้อความปุมหน้าสุดท้าย
				
					//create pager instance
					$pager = new Pager($config);
					 
					//display pager up data
					echo "<p style='float:right'>";
					try {
						$pager->createPager();
					} 
					catch(Exception $e) { echo $e->getMessage(); } 
					echo "</p>";
					
					//display data
					 $result = mysqli_query($conn,$command." ORDER BY product_id ASC LIMIT ".$pager->limitStart().", ".$config['per_page']) or die (mysql_error());
        ?>

<p style="margin:0 0 20px 0;"></p>

<div class="offer_list clearfix">
		<?php
            while($data=mysqli_fetch_assoc($result)){
                $product_id=$data['product_id'];
                $product_code=$data['code'];
                $productGroup=$data['product_group'];
                $productType=$data['product_type'];
                $type=$data['type'];
				$year=$data['year'];
				$abe_shock=$data['abe_shock'];
                $brandId=$data['brand_id'];
				$piston=$data['piston'];
				$shaft=$data['shaft'];
				//$spring=$data['spring'];
				$length=$data['length'];
				$pic=$data['image'];
                $modelId=$data['model_id'];
				
				$preload=$data['preload'];
				$compress=$data['compression'];
				$lengthAdjust=$data['length_adjuster'];
				$rebound=$data['rebound'];
				
				$new=$data['new'];
				$hot=$data['hot'];
				$special="";
				
				$year=$myFn->getData($conn,'year','yss_model_detail',"WHERE model_id='$modelId'");
				
				if(!empty($year)){
					$yearTxt="<span style='color:#5A5A5A; float:right;'> Year:  $year</span>";
				}else{
					$yearTxt="";	
				}
				
				
				if($new=="Y"){
					$special='<span class="sale">New</span>';
				}
				
				if($hot=="Y"){
					$special='<span class="sale">Hot</span>';
				}
				  
				//CHECK PIC AVARIABLE=============
					$chkPic='images/products/large/'.$pic;
					if(!file_exists($chkPic) OR $pic==""){
						//$pic='no-photo.jpg';
						$pic='t_detail_270px.jpg';
					}
					
				//GET PRODUCT GROUP NAME=========================
					$groupName=$myFn->getData($conn,'detail','yss_product_group',"WHERE `group`='$productGroup'");
					
				//GET PRODUCT TYPE NAME=========================
					$typeName=$myFn->getData($conn,'detail','yss_product_type',"WHERE `type`='$productType'");

					//echo "Product Group: ".$groupName." Product Type: ".$typeName."<br/>";
					
				//GET BRAND NAME=========================
					$brandName=$myFn->getData($conn,'brand','yss_brand',"WHERE brand_id='$brandId'");
				
				//GET MODEL ID====================
                	$modelName=$myFn->getData($conn,'model','yss_model',"WHERE model_id='$modelId'");
					
				//GET FEATURE & OPTION ICON FOR DISPLAY=================
					$preload_icon=$myFn->getPreloadIcon($preload);
					
				//SET COMPRESSION ICON FOR DISPLAY======================
					$compress_icon=$myFn->getCompressionIcon($compress);
					
				//SET REBOUND ICON FOR DISPLAY==========================
					$rebound_icon=$myFn->getReboundIcon($rebound);
		
				//SET LENGTH AJUSTER ICON FOR DISPLAY===================
					$lengthAdjus_icon=$myFn->getLengthAdjustIcon($lengthAdjust);

        ?>
      		<div class="offer_item clearfix">
            	<div class="offer_image">
                	<a href="product-detail.php?id=<?php echo $product_id ?>" hidefocus="true" style="outline: none;">
                     <img src="images/products/large/<?php echo $pic ?>" alt="">
                    </a>
                    <?php echo $special ?>
            </div>
            
                    <div class="offer_aside">
                    	<h2 class="yssfont01"><a href="product-detail.php?id=<?php echo $product_id ?>">
						<?php echo $product_code ?> <?php if($abe_shock=="Y"){ echo "(ABE)"; } ?></a></h2>
                        <h5 class="yssfont01 yss-red-01">
                        	<span style="color:#393939"><?php echo $brandName ?> - </span>
                             <?php echo $modelName ?><?php echo $yearTxt ?>
                        </h5>
                        
                        <div class="special_text_product" style="width:200px;">
                        <div class="info_row"><span>SHOCK TYPE:</span> <?php echo $type ?></div>
                        <div class="info_row"><span>GROUP:</span><?php echo $groupName ?></div>
                        <div class="info_row"><span>TYPE:</span><?php echo $typeName ?></div>
<!--                       <div class="info_row"><span>LENGTH:</span> <?php echo $length ?></div>
                          <div class="info_row"><span>PISTON:</span> <?php  echo $piston ?></div>
                            <div class="info_row"><span>SHAFT:</span> <?php echo $shaft ?></div>-->
                           <!--<div class="special_price">$44.690</div>-->
                        </div>
                        
                    	<!--<div class="offer_descr">
                        	<p>
                                <strong>Product Group: </strong> <?php //echo $productGroup ?>
                                <strong>Product Type: </strong><?php // echo $productType ?>
                            </p>
                        </div>-->
                        
                      <div class="offer_data">
                       	  <div style="text-align:right">
                       	    <h6 class="yssfont01 yss-red-01" style="font-size:12px;">Feature</h6>
                              <div class="product-feature2">
								<?php
									//DISPLAY FEATURE & OPTION ICON ###################
                                    //PRELOAD ICON=================
                                        echo $preload_icon; 
                                    //COMPRESSION ICON=============
                                        echo $compress_icon;
                                    //REBOUND ICON=================
                                        echo $rebound_icon;
                                    //LENGTH ADJUSTER ICON=========
                                        echo $lengthAdjus_icon;
                                ?>
                                </div>
                          </div>                       
                        </div>
                    </div>
                </div>
  <?php } ?>   
</div>

<p style="margin:20px 0 0 0; float:right;">
<?php
	//display pager down data
	try {
		$pager->createPager();
	} 
	catch(Exception $e) { echo $e->getMessage(); } 
?>
</p>	