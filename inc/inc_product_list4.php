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
				$sql='SELECT p.product_id,p.brand_id,p.model_id,p.vehicle_type,m.model,m.year,m.`start`,m.`end`,p.product_group,
				p.product_type,p.code,p.`type`,p.image,p.length,p.spring,p.piston,
				p.shaft,p.date_create,p.rebound,p.compression,p.length_adjuster,p.preload
		FROM yss_product p,yss_model m WHERE p.model_id=m.model_id';
						
					$command=$sql.$condition;							//include condition***
					
					//echo $command; exit(); 								//Display sql string***
					
					//get object result from database
					$result  = mysqli_query($conn,$command);
					$num=mysqli_num_rows($result);
					
					$queryString = $_SERVER['QUERY_STRING'];					//Get Query string
					//echo $queryString;
					
					//CONFIG PAGER==========================
						$myPager->current=isset($_GET['page'])? $_GET['page']:1;
						$myPager->perpage=10;
						$myPager->totalRecord=$num;
						$myPager->url="product-list.php?$queryString";
						$myPager->setPager();
						
						$start=$myPager->startRecord();
						$end=$myPager->endRecord();
						
		
						$command=$command." LIMIT $start,$end";
						$result=mysqli_query($conn,$command);
						
						echo $command;
					//END CONFIG=============================
        ?>         

		
<p style="margin:0 0 20px 0;">
	<?php $myPager->showPager(); ?>
</p>

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
                    <a href="product-detail.php?id=<?php echo $product_id ?>">
                    <img src="images/products/large/<?php echo $pic ?>" alt="">
                    </a></div>
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

<p style="margin:20px 0 0 0; float:right;">
<?php $myPager->showPager(); ?>
</p>	