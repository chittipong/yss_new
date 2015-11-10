<?php
ob_start();
session_start();

include("class/connect_db.php");
include("class/Mymenu.php");
include("class/MyFunction.php");
	
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
	
	$myMenu->__construc($lang,$conn);

//GET PAGE INFO=========================
	$page_title=$myFn->getPageInfo($conn,'title','index',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','index',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','index',$lang);


//GET SHOT WORD==========================
	$txt_qsearch=$myFn->getWord($conn,'quick_search',$lang);
	$txt_advSearch=$myFn->getWord($conn,'advance_search',$lang);
	$txt_select_brand=$myFn->getWord($conn,'select_brand',$lang);
	$txt_select_model=$myFn->getWord($conn,'select_model',$lang);
	$txt_cc=$myFn->getWord($conn,'cc',$lang);
	$txt_category=$myFn->getWord($conn,'category',$lang);
	$txt_search=$myFn->getWord($conn,'search',$lang);
	$txt_newsevent=$myFn->getWord($conn,'news_event',$lang);
	$txt_viewall=$myFn->getWord($conn,'view_all',$lang);
	$txt_ourservice=$myFn->getWord($conn,'our_service',$lang);
	$txt_mostpop=$myFn->getWord($conn,'most_pop_brands',$lang);
	$txt_view_bigermap=$myFn->getWord($conn,'view_biger_map',$lang);
	$txt_vehicle_type=$myFn->getWord($conn,'vehicle_type',$lang);
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
<meta name="author" content="yss">
<meta name="keywords" content="<?php echo $page_keyword ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?php echo $page_title ?></title>
<link href='http://fonts.googleapis.com/css?family=Cabin:400,400italic,500,600,700|PT+Serif+Caption:400,400italic' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="favicon.ico">

<!--Font awesome for icon-->
<link rel="stylesheet" href="font-awesome44/css/font-awesome.min.css">

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
<!-- carousel -->
<script src="js/jquery.carouFredSel.min.js"></script>
<script src="js/jquery.touchSwipe.min.js"></script>
<!-- styled select -->
<link rel="stylesheet" href="css/cusel.css">
<script src="js/cusel-min.js"></script>

<link href="rs-plugin/css/settings.css" media="screen" rel="stylesheet">
<script src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

</head>

<body>
<div class="body_wrap homepage">
	
<!-- header top bar -->    
	<?php include ("common/inc_headertop.php");?>
<!--/ header top bar -->
		
<!-- header -->
	<?php include ("common/inc_slide.php");?>
<!--/ header -->

<!-- middle -->
    <?php include ("common/inc_search_box1.php");?>
	
	<div class="middle_row row_light_gray">
	  <div class="container clearfix">  
	    <!-- week offer -->
            	<?php include("common/inc_week_offers.php"); ?>
            <!--/ week offer -->
            <!-- special offer -->
                 <?php include("common/inc_special_offers.php"); ?>
            <!--/ special offer -->	            	
		</div>	
        </div>
	</div>

    <!-- latest_offers -->
		<?php include("common/inc_news_event.php"); ?>
    <!--/ latest_offers -->
    
    <!-- car types -->
		<?php include("common/inc_cartype.php"); ?>
    <!--/ car types -->
    <!-- testimonials -->
    	<?php //include ("common/inc_testimonials.php");?>
    <!--/ testimonials -->
    
    <!--  Our Award -->
		<?php //include ("common/inc_ouraward_block.php");?>
    <!--/ Our Award -->
    
    <!-- popular brands -->
		<?php include ("common/inc_poppularbrand_block.php");?>
    <!--/ popular brands -->
    
	<!--/ middle -->

	<!-- Footer-->
	<?php include ("common/inc_footer.php");?>
    <!-- /Footer-->

</div>
</body>
</html>
