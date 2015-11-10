<?php
//============================= SET SEARCH CONDITION======================================
	$condition="";
	
	//GET SEARCH BY POPULAR BRAND-----
		$search_brand=isset($_GET['brand']) ? $_GET['brand']:null;
			if(!empty($search_brand)){
				$condition="WHERE p.brand_id LIKE '$search_brand'";
			}
			
	//GET SEARCH DATA FROM SEARCH FORM------
		if(!empty($_GET)){
			$search_brand=isset($_REQUEST['brand']) ? $_REQUEST['brand']:null;
			$search_model=isset($_REQUEST['model']) ? $_REQUEST['model']:null;
			$search_year=isset($_REQUEST['year']) ? $_REQUEST['year']:null;
			$search_vehicle=isset($_REQUEST['vehicle_type']) ? $_REQUEST['vehicle_type']:null;
			
			//Get from search box-----
			$search_cc=isset($_REQUEST['cc']) ? $_REQUEST['cc']:null;
			$search_pGroup=isset($_REQUEST['productGroup']) ? $_REQUEST['productGroup']:null;
			$search_pType=isset($_REQUEST['productType']) ? $_REQUEST['productType']:null;
			
			//print_r($search_vehicle);
			//echo "BRAND: $search_brand MODEL: $search_model YEAR: $search_year";
			
			$searchArray=array();
			
				if(!empty($search_brand)){
					$searchArray[]="p.brand_id='$search_brand'";
				}
				if(!empty($search_model)){
					$searchArray[]="m.model_id='$search_model'";
				}
				if(!empty($search_year)){
					$searchArray[]="m.year='$search_year'";
				}
				if(!empty($search_cc)){
					$searchArray[]="m.cc='$search_cc'";
				}
				if(!empty($search_pGroup)){
					$searchArray[]="p.product_group='$search_pGroup'";
				}
				if(!empty($search_pType)){
					$searchArray[]="p.product_type='$search_pType'";
				}
				
				
				
				//SET VEHICLE------------------------
				//echo "total Vehicle=".count($search_vehicle); 
				//print_r($search_vehicle); exit();
				
				if(!empty($search_vehicle)){
					$n=count($search_vehicle);
					$txt="";
					
						for($i=0;$i<$n;$i++){
							if($i<($n-1)){
								$txt.=" p.vehicle_type='$search_vehicle[$i]' OR ";
							}else{
								$txt.=" p.vehicle_type='$search_vehicle[$i]' ";
							}
						}
					
					$searchArray[]=$txt;		//Set to array***
				}//end set vehicle***
			
			//SET STRING CONDITION--------------------
				$c=count($searchArray);
				if($c>0){
					$condition=" AND ";	
					for($i=0;$i<$c;$i++){
						if($i<($c-1)){
							$condition.=$searchArray[$i]." AND ";
						}else{
							$condition.=$searchArray[$i];
						}
					}//end for***
				}
			
			//echo $condition; exit();		//Display all condition list	
		}//end***
//=============================END SET SEARCH CONDITION======================================
?>

<?php	
		$sql='SELECT p.product_id,p.brand_id,p.model_id,p.vehicle_type,
				m.model,m.year,m.`start`,m.`end`,m.cc,p.product_group,
				p.product_type,p.code,p.`type`,p.image,p.length,p.spring,p.piston,
				p.shaft,p.date_create,p.rebound,p.compression,p.length_adjuster,p.preload,
				p.new,p.hot
		FROM yss_product p,yss_model m WHERE p.model_id=m.model_id';
						
					$command=$sql.$condition;							//include condition***
					
					//echo $command; exit(); 										//Display sql string***
					
					//get object result from database
					$result  = mysqli_query($conn,$command);
					$num=mysqli_num_rows($result);
					
					$queryString = $_SERVER['QUERY_STRING'];						//Get Query string
					//echo $queryString;
					
					$p=isset($_GET['page']) ? $_GET['page']:null;					//Get page number
					
					//Replace current page-------------
					if(!empty($p)){
						$queryString = str_ireplace("&page=$p", "", $queryString);
					}
					
					//echo $queryString;											//Show Query String after replace***
					
					//Configuration pager
					$config['url_page'] = "product-list.php?$queryString&page=";
					
					$config['all_recs'] = mysqli_num_rows($result);				// จำนวนแถวทั้งหมดของข้อมูล
					$config['scr_page'] = 7;									// จำนวนเลขหน้าที่แสดงในหน้านั้น
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
					
					echo "<p>";
						try {
							$pager->createPager();
						} 
						catch(Exception $e) { echo $e->getMessage(); } 
					echo "</p>";
					
					//display data
					 $result = mysqli_query($conn,$command." ORDER BY product_id ASC LIMIT ".$pager->limitStart().", ".$config['per_page']) or die (mysql_error());
        ?>      
        
<?php 
	if($num>0){
?> 
<p style="margin:0 0 20px 0; text-align:right; color:#8F8F8F;">
	<i class="fa fa-search fa-1x"></i> Total Result: <?php echo $num ?> Record
</p>
<?php }else{ ?>
    <div class="frame_quote">               
        <blockquote style="text-align:center;"><i class="fa fa-search fa-2x"></i>   No records found </blockquote>  
     </div>
<?php } ?>

<div class="offer_list clearfix">
		<?php
            while($data=mysqli_fetch_assoc($result)){
                $product_id=$data['product_id'];
                $product_code=$data['code'];
                $productGroup=$data['product_group'];
                $productType=$data['product_type'];
                $type=$data['type'];
                $brandId=$data['brand_id'];
				$piston=$data['piston'];
				$shaft=$data['shaft'];
				$spring=$data['spring'];
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
				
				if($new=="Y"){
					$special='<span class="sale">New</span>';
				}
				
				if($hot=="Y"){
					$special='<span class="sale">Hot</span>';
				}
				  
				//CHECK PIC AVARIABLE=============
					$chkPic='images/products/large/'.$pic;
					if(!file_exists($chkPic)){
						$pic='no-photo.jpg';
					}
					
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
                    	<h2><a href="product-detail.php?id=<?php echo $product_id ?>"><?php echo $product_code ?></a> <?php $brandName ?></h2>
                        
                        
                        <div class="special_text" style="width:200px;">
                            <div class="info_row"><span>BRAND:</span> <?php echo $brandName ?></div>
                            <div class="info_row"><span>MODEL:</span> <?php echo $modelName ?></div>
                            <div class="info_row"><span>TYPE:</span> <?php echo $type ?></div>
                            <div class="info_row"><span>LENGTH:</span> <?php echo $length ?></div>
                            <div class="info_row"><span>PISTON:</span> <?php echo $piston ?></div>
                            <div class="info_row"><span>SHAFT:</span> <?php echo $shaft ?></div>
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
                          	<h5>Feature</h5>
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

<p style="margin:20px 0; float:right;">
<?php
	//display pager down data
	try {
		$pager->createPager();
	} 
	catch(Exception $e) { echo $e->getMessage(); } 
?>
</p>	