<?php
ob_start();
session_start();

include("class/connect_db.php");
include("class/Mymenu.php");
include("class/MyFunction.php");
include("class/class_DateTime.php");
include("class/class_pager.php");
	
//CHECK LANGUAGE=========================
if(isset($_SESSION['sess_lang'])==""){
	$_SESSION['sess_lang']='TH';
}
//GET LANGUAGE==========================
$lang=$_SESSION['sess_lang'];			
echo $_SESSION['sess_lang'];

//CONNECT DATABASE=======================
	$conn=connectDb();
	$myMenu=new Mymenu();
	$myFn=new MyFunction();
	$myDate=new DateTimePattern();
	
	$myMenu->__construc($lang,$conn);

//GET PAGE INFO=========================
	$page_title=$myFn->getPageInfo($conn,'title','product',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','product',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','product',$lang);


//GET SHOT WORD==========================
	$txt_product=$myFn->getWord($conn,'product',$lang);
	$txt_mostpop=$myFn->getWord($conn,'most_pop_brands',$lang);
	$txt_viewall=$myFn->getWord($conn,'view_all',$lang);

?>

<?php
//GET PRODUCT DETAIL===================================
		$id=isset($_GET['id']) ? $_GET['id']:null;
		
		/*$sql="SELECT p.product_id,p.brand_id,b.brand,p.model_id,p.product_group,p.product_type,
			p.code,p.`type`,p.image,p.piston,p.shaft,p.bot,p.top,p.spring,p.length,
			p.preload,p.rebound,p.compression,p.length_adjuster,p.hydraulic,p.emulsion,
			p.on_hose,p.piggy_back,p.free_piston,p.dtg,p.date_create  
		FROM yss_product p INNER JOIN yss_brand b ON p.brand_id=b.brand_id 
		WHERE p.product_id='$id'";*/
		
		$sql="SELECT product_id,brand_id,model_id,product_group,product_type,
			code,`type`,image,piston,shaft,bot,top,spring,length,
			preload,rebound,compression,length_adjuster,hydraulic,emulsion,
			on_hose,piggy_back,free_piston,dtg,date_create  
		FROM yss_product
		WHERE product_id='$id'";
			
		$rs=mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($rs);
		
		$product_id=$data['product_id'];
		$product_code=$data['code'];
		$product_group=$data['product_group'];
		$product_type=$data['product_type'];
		$type=$data['type'];
		$brandId=$data['brand_id'];
		$model=$data['model_id'];
		$bottom=$data['bot'];
		$top=$data['top'];
		$length=$data['length'];
		$spring=$data['spring'];
		$piston=$data['piston'];
		$shaft=$data['shaft'];
		$preload=$data['preload'];
		$compress=$data['compression'];
		$rebound=$data['rebound'];
		$lengthAdjust=$data['length_adjuster'];
		$hydraulic=$data['hydraulic']; 
		$emulsion=$data['emulsion'];
		$on_hose=$data['on_hose'];
		$piggy_back=$data['piggy_back'];
		$free_piston=$data['free_piston'];
		$dtg=$data['dtg'];
		$main_pic=$data['image'];
		$date_create=$data['date_create'];
		
		//echo "Feature : $compress,$preload,$rebound ";
		
		//GET FEATURE DETAIL===================
			if(!empty($compress)){
				$compress_title=$myFn->getData($conn,'title','yss_feature',"WHERE feature='$compress'");
				$compress_detail=$myFn->getFeatureDetail($conn,$compress,$lang);
			}
			
			if(!empty($preload)){
				$preload_title=$myFn->getData($conn,'title','yss_feature',"WHERE feature='$preload'");
				$preload_detail=$myFn->getFeatureDetail($conn,$preload,$lang);
			}
			
			if($rebound=="Y"){
				$rebound_title=$myFn->getData($conn,'title','yss_feature',"WHERE feature='R'");
				$rebound_detail=$myFn->getFeatureDetail($conn,'R',$lang);
			}
			
			if($lengthAdjust=="Y"){
				$lengthAdjust_title=$myFn->getData($conn,'title','yss_feature',"WHERE feature='L'");
				$lengthAdjust_detail=$myFn->getFeatureDetail($conn,'L',$lang);
			}
			
			
			
		
		//CHECK IMAGE AVARIABLE================
			$chkPic='images/products/large/'.$main_pic;	
			if(!file_exists($chkPic)){
				$main_pic='no-photo3.jpg';
			}	
			
			
		//GET BRAND NAME=========================
		$brandName=$myFn->getData($conn,'brand','yss_brand',"WHERE brand_id='$brandId'");
		
		//GET MODEL NAME=========================
		$modelName=$myFn->getData($conn,'model','yss_model',"WHERE model_id='$model'");
		
		
		//GET FEATURE & OPTION ICON FOR DISPLAY=================
			$preload_icon=$myFn->getPreloadIcon($preload);
			
		//SET COMPRESSION ICON FOR DISPLAY======================
			$compress_icon=$myFn->getCompressionIcon($compress);
			
		//SET REBOUND ICON FOR DISPLAY==========================
			$rebound_icon=$myFn->getReboundIcon($rebound);

		//SET LENGTH AJUSTER ICON FOR DISPLAY===================
			$lengthAdjus_icon=$myFn->getLengthAdjustIcon($lengthAdjust);
			
?>


<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="author" content="ThemeFuse">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?php echo $product_code ?></title>
<link href='http://fonts.googleapis.com/css?family=Cabin:400,400italic,500,600,700|PT+Serif+Caption:400,400italic' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="favicon.ico">

<link href="css/style.css" media="screen" rel="stylesheet">
<link href="screen.css" media="screen" rel="stylesheet">
<!-- custom CSS -->
<link href="css/custom.css" media="screen" rel="stylesheet">

<!-- main JS libs  -->
<script src="js/libs/modernizr.min.js"></script>
<script src="js/libs/respond.min.js"></script>					 
<script src="js/libs/jquery.min.js"></script>

<!-- scripts  -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/general.js"></script>
<script src="js/hoverIntent.js"></script>

<script src="js/jquery.tools.min.js"></script>
<!-- carousel -->
<script src="js/jquery.carouFredSel.min.js"></script>
<script src="js/jquery.touchSwipe.min.js"></script>
<!-- styled select -->
<link rel="stylesheet" href="css/cusel.css">
<script src="js/cusel-min.js"></script>
<!-- custom input -->
<script src="js/jquery.customInput.js"></script>

<link href="css/prettyPhoto.css" rel="stylesheet">
<script src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" language="javascript" src="js/custom.js"></script>
</head>

<body>'
<div class="body_wrap">
	
<!-- header top bar -->    
	<?php include ("common/inc_headertop.php");?>
<!--/ header top bar -->

<!--Head-->
<div class="header header_thin" style="background-image:url(images/rnd/B189.jpg)">
	<!--<div class="header_title">
    	<h1 class="yssfont01"><span><?php echo $txt_product ?></span></h1>
    </div>-->
</div>
<!--/Head-->


<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index1.html">Home</a>  <span class="separator">&rsaquo;</span>  <a href="product.php">Product</a><span class="separator">&rsaquo;</span>  <span class="current"><?php echo $product_code ?></span></p>
        <a href="product.php" class="link_back">Back to Previous Page</a>
    </div>
</div>
<!--/ breadcrumbs -->

<!-- middle -->   
<div id="middle" class="full_width">
	<div class="container clearfix">  
    
		<!-- content -->
        <div class="content">
        	
            <div class="offer_details clearfix">
            	<!-- offer left -->
					<div class="productPic">
                         <img src="images/products/large/<?php echo $main_pic ?>" alt="">
                         <a href="images/products/large/<?php echo $main_pic ?>" data-rel="prettyPhoto[gal]">
                         <span><em class="ico_large"></em></span></a>
                   </div>
                <!--/ offer left -->
                <!-- offer right -->
                <div class="offer_aside">
                	<div class="offer_price">
                    	<strong><?php echo $product_code ?></strong><br>
						<em><?php //echo $modelName ?></em>
                    </div>
                    
                    <div class="offer_data">
                    	<ul>
                    		<li><?php echo $brandName ?></li>
                            <li><?php echo $modelName ?></li>
                    		<li>
                            <div class="product-feature">
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
                            </li>
                    	</ul>
                    </div>
                    
                    <div class="offer_descr">
                        <p>
                        	Description....
                        </p>
                    </div>
                    
                    <div class="offer_specification">
                    	<ul>
                    		<li><span class="spec_name">PRODUCT CODE:</span> <strong class="spec_value"><?php echo $product_code ?></strong></li>
                            <!--<li><span class="spec_name">BRAND:</span> <strong class="spec_value"><?php echo $brandName ?></strong></li>
                            <li><span class="spec_name">MODEL:</span> <strong class="spec_value"><?php echo $modelName ?></strong></li>-->
                            <li><span class="spec_name">TYPE:</span> <strong class="spec_value"><?php echo $type ?></strong></li>
                            <li><span class="spec_name">LENGTH:</span> <strong class="spec_value"><?php echo $length ?></strong> (MM.)</li>
                            <li><span class="spec_name">TOP:</span> <strong class="spec_value"><?php echo $top ?></strong> (MM.)</li>
                            <li><span class="spec_name">BOTTOM:</span> <strong class="spec_value"><?php echo $bottom ?></strong> (MM.)</li>
                            <li><span class="spec_name">SPRING:</span> <strong class="spec_value"><?php echo $spring ?></strong> (MM.)</li>
                            <li><span class="spec_name">PISTON SIZE:</span> <strong class="spec_value"><?php echo $piston ?></strong> (MM.)</li>
                            <li><span class="spec_name">SHAFT SIZE:</span> <strong class="spec_value"><?php echo $shaft ?></strong> (MM.)</li>
                    	</ul>
                    </div>
                    
                </div>
                <!--/ offer right -->
            </div>
            
            <!-- details tabs -->
            <div class="details_tabs">
	            <ul class="tabs linked">
                	<li><a href="#t_description"><span>DESCRIPTION</span></a></li>
	                <li><a href="#t_contacts"><span>CONTACT US</span></a></li>
	                <li><a href="#t_send"><span>SEND TO A FRIEND</span></a></li>
	            </ul>
	            <div id="t_description" class="tabcontent clearfix">
                
                	<?php 
							//===================SHOW COMPRESSION DETAIL===================
							echo "Compression: ".$compress;
								if($compress=="C"){
									$compressImg="cccccc.jpg";
								}
								if($compress=="W"){
									$compressImg="compress_w.jpg";
								}
									
							if(!empty($compress) && $compress!="-"){
					?>
                            <div class="col col_1_2  omega">
                                <div class="inner">
                                    <h2><?php echo $compress_title ?></h2>
                                       <p>
                                           <img src='images/feature/<?php echo $compressImg ?>'  class='alignleft'/>
                                           <?php echo $compress_detail ?>
                                       </p>
    
                                         <div class="divider_space_thin"></div>;
                                </div>
                            </div>
                     <?php }//end*** ?>
                    
                    
                    <?php 
							//===================SHOW PRELOAD DETAIL===================
								echo "Preload: ".$preload;
									if($preload=="P"){
										$preloadImg="pppppp.jpg";
									}
									if($preload=="T"){
										$preloadImg="preload_t.jpg";
									}
									if($preload=="H"){
										$preloadImg="hhhhhhh.jpg";
									}
									if($preload=="H1"){
										$preloadImg="hhhh1.jpg";
									}
								
								if($preload=="T"){
									
					?>
                        <div class="col col_1_2  omega">
                            <div class="inner">
                                <h2><?php echo $preload_title ?></h2>
                                    <p>
                                        <img src='images/feature/<?php echo $preloadImg ?>'  class='alignleft'/>
                                        <?php echo $preload_detail ?>
                                </p>
                            </div>
                        </div>
                    <?php }//end*** ?>
                    
                    
                    <?php 
					//===================SHOW REBOUND DETAIL===================
						echo "Rebound: ".$rebound;
						if($rebound=="Y"){
					?>
                        <div class="col col_1_2  omega">
                            <div class="inner">
                                <h2><?php echo $rebound_title ?></h2>
                                    <p>
                                        <img src='images/feature/rebound_adjuster.jpg'  class='alignleft'/>
                                         <?php echo $rebound_detail ?>
                                    </p>
                                    <div class="divider_space_thin"></div>';
                            </div>
                        </div>
                      <?php }//end*** ?>
                    
                    <?php 
						//=========SHOW PRELOAD DETAIL===================
						echo "Length Adjust: ".$lengthAdjust;
						if($lengthAdjust=="Y"){
					?>
                    <div class="col col_1_2  omega">
	                    <div class="inner">
                        	<h2><?php echo $lengthAdjust_title ?></h2>
                        	<p>
								  <img src='images/feature/length_adjuster.jpg'  class='alignleft'/>
								  <?php echo $lengthAdjust_detail ?>
							</p>
                        </div>
					</div>
                    <?php }//end*** ?>
                    
                    
	            </div>
	            
                <div id="t_contacts" class="tabcontent clearfix">
	            	<form action="#" class="details_form ajax_form" id="offer_contact">
                    	<div class="form_col_1">
                        	<div class="row input_styled inlinelist">
                            	<label class="label_title">Form of Address:</label>
                                <input type="radio" name="title" value="mrs" id="mrs" checked> <label for="mrs">Mrs.</label>
		                        <input type="radio" name="title" value="mr" id="mr"> <label for="mr">Mr.</label>
		                        <input type="radio" name="title" value="company" id="company"> <label for="company">Company</label>
                            </div>
                            <div class="row">
		                    	<label class="label_title">Your Full Name:</label>
		                        <input type="text" name="yourname" id="name" class="inputField required" value="">
		                    </div>
                            <div class="row">
		                    	<label class="label_title">Your Email Address:</label>
		                        <input type="text" name="email" id="email" class="inputField required" value="">
		                    </div>                            
                        </div>
                        <!--/ form col 1 -->
                        <div class="form_col_2">
                        	<div class="row">
		                    	<label class="label_title">Message:</label>
		                        <textarea rows="4" cols="5" name="message" id="message" class="textareaField required"></textarea>
		                    </div>
                            <div class="row rowSubmit">
                            	<a href="#" class="link_reset" onclick="document.getElementById('offer_contact').reset();return false">Reset All Contact Form Fields</a>
                            	<input type="submit" value="SEND MESSAGE" id="send" class="btn_send">
                            </div>
                        </div>
                        <!--/ form col 2 -->
                        
                    </form>                    
	            </div>
	            
                <div id="t_send" class="tabcontent clearfix feedback_ajax_form">
	            	<form action="#" class="details_form" id="offer_send_friend">
                    	<div class="form_col_1">                            
                            <div class="row">
		                    	<label class="label_title">Your Email Address:</label>
		                        <input type="text" name="email_from" id="email_from" class="inputField required" value="">
		                    </div>   
                            <div class="row">
		                    	<label class="label_title">Your Friend’s Email Address:</label>
		                        <input type="text" name="email" id="email_f" class="inputField required" value="">
		                    </div>                         
                        </div>
                        <!--/ form col 1 -->
                        <div class="form_col_2 col_thin">
                        	<div class="row">
		                    	<label class="label_title">Message:</label>
                                <textarea rows="4" name="message" id="message_f" class="textareaField required"></textarea>
		                    </div>
                            <div class="row rowSubmit">
                            	<a href="#" class="link_reset" onclick="document.getElementById('offer_send_friend').reset();return false">Reset All Form Fields</a>
                            	<input type="submit" value="SEND MESSAGE" id="send_f" class="btn_send">
                            </div>
                        </div>
                        <!--/ form col 2 -->
                        <div class="form_col_3">
                        	<div class="row">
		                    	<label class="label_title">Share on:</label>
                            	<a href="#" class="btn_share"><img src="images/btn_share_tweet.png" alt=""></a>
                                <a href="#" class="btn_share"><img src="images/btn_share_like.png" alt=""></a>
                                <a href="#" class="btn_share"><img src="images/btn_share_g1.png" alt=""></a>
                            </div>
                        </div>
                        <!--/ form col 3 -->
                        
                    </form>
	            </div>
            </div>
            <!--/ details tabs -->
            
            <div class="text_box">
            	<p>
                <a href="#" class="btn btn_big btn_white"><span>CALL US AT: <strong>1 800 956 756</strong></span></a>
                <a href="#" class="btn btn_big btn_orange"><span>EMAIL US ABOUT THIS CAR</span></a>
                </p>
            	<p><em>Prices are subject to change. Please see our <a href="#">Privacy Policy</a> for more info</em></p>
            </div>
            
        </div>
        <!--/ content -->
    </div>
</div>
<!--/ middle -->
    
	<!-- popular brands -->
		<?php include ("common/inc_poppularbrand_block.php");?>
    <!--/ popular brands -->

<!-- Footer-->
    <?php include ("common/inc_footer.php");?>
<!-- /Footer-->

</div>
</body>
</html>
