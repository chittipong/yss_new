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
//echo $_SESSION['sess_lang'];

//CONNECT DATABASE=======================
	$conn=connectDb();
	$myMenu=new Mymenu();
	$myFn=new MyFunction();
	$myDate=new DateTimePattern();
	
	$myMenu->__construc($lang,$conn);

	$ccArray=$myFn->getCcList($conn);
//GET PAGE INFO=========================
	$page_title=$myFn->getPageInfo($conn,'title','product',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','product',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','product',$lang);


//GET SHOT WORD==========================
	$txt_select_brand=$myFn->getWord($conn,'select_brand',$lang);
	$txt_select_model=$myFn->getWord($conn,'select_model',$lang);
	$txt_cc=$myFn->getWord($conn,'cc',$lang);
	$txt_category=$myFn->getWord($conn,'category',$lang);
	$txt_search=$myFn->getWord($conn,'search',$lang);
	$txt_vehicle_type=$myFn->getWord($conn,'vehicle_type',$lang);
	$txt_year=$myFn->getWord($conn,'year',$lang);
	$txt_adjust_search=$myFn->getWord($conn,'adjust_search',$lang);
	$txt_price_range=$myFn->getWord($conn,'price_range',$lang);
	
	$txt_product=$myFn->getWord($conn,'product',$lang);
	$txt_mostpop=$myFn->getWord($conn,'most_pop_brands',$lang);
	$txt_viewall=$myFn->getWord($conn,'view_all',$lang);
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

<link href="css/style.css" media="screen" rel="stylesheet">
<link href="screen.css" media="screen" rel="stylesheet">
<!-- custom CSS -->
<link href="css/custom.css" media="screen" rel="stylesheet">

<!-- Pagination CSS -->
<link href="css/pagination.css" rel="stylesheet" type="text/css" media="screen">

<!-- Font-awesome CSS -->
<link rel="stylesheet" type="text/css" href="font-awesome44/css/font-awesome.css">

<!-- custom CSS -->
<link href="css/pager_style.css" media="screen" rel="stylesheet">
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

<!-- custom input -->
<script src="js/jquery.customInput.js"></script>

<!-- range slider -->
<link href="css/jslider.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.slider.bundle.js"></script>

<!-- myCustom Javascript -->
<script src="js/mycustom.js"></script>

</head>

<body>
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
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><span class="current">Product</span></p>
    </div>
</div>
<!--/ breadcrumbs -->

<!-- middle -->   
<div id="middle" class="cols2 sidebar_left">
	<div class="container clearfix">  
		<!-- content -->
        <div class="content">
      
            <!-- Product list -->
            <div id="productList-cn">
				<?php include("inc/inc_product_list3.php") ?>
            </div>
            <!--/ Product list -->
            
            <!-- pagination -->
            <!--<div class="tf_pagination">
	            <div class="inner">
	            	<a class="page_prev" href="#"><span></span>PREV</a> 
                	<a class="page_next" href="#"><span></span>NEXT</a>
                
                	<span class="page-numbers page_current">1</span> <a href="#" class="page-numbers">2</a>  <a href="#" class="page-numbers">3</a> <a href="#" class="page-numbers">4</a> <a href="#" class="page-numbers">5</a> <a href="#" class="page-numbers">6</a> <a href="#" class="page-numbers">7</a> &hellip;  <a href="#" class="page-numbers">18</a>     
                      
	            </div>
            </div>-->
            <!--/ pagination -->
            
        </div>
        <!--/ content -->
        
        <!-- sidebar -->
        <?php include("common/inc_sidebar1.php"); ?>
        <!--/ sidebar -->  
              
    </div>
    <!-- popular brands -->
	<?php include ("common/inc_poppularbrand_block.php");?>
    <!--/ popular brands -->
    
    
    <!-- Footer-->
    <?php include ("common/inc_footer.php");?>
    <!-- /Footer-->
</div>
</body>
</html>

<script>
$(function(){
	var total=0;
	//==========AJAX GET BRAND BY VEHICLE TYPE TO DROPDOWN LIST=================
	$("#search-vehicle_type").change(function(){
		var vehicle=$("#search-vehicle_type").val();
		$("#search-brand").empty();
		total+=1;
		
		$.post("ajax/ajax_get_brand.php",{v: vehicle},function(data, status){
			//alert("Data: " + data + "\nStatus: " + status);
			console.log(data);
			
			var brandArr=JSON.parse(data);
			
			//alert(brandArr.brandId[0]);
			//alert(brandArr.brandId.length);
			
			var brandIdArr=brandArr.brandId;
			var brandNameArr=brandArr.brandName;
			
			//alert(brandNameArr);
			
			//Loop and set Dropdown Option------------------
			$("#search-brand").append("<option value=''>- All -</option>");
			$(brandIdArr).each(function(i){
				//$("#cusel-scroll-search-brand").append("<span value='"+brandIdArr[i]+"'>"+brandNameArr[i]+"</span>");
				$("#search-brand").append("<option value='"+brandIdArr[i]+"'>"+brandNameArr[i]+"</option>");
			});  
			
		});
	});//end***
	
	//==========AJAX GET MODEL BY BRAND TO DROPDOWN LIST=================
	$("#search-brand").change(function(){
		var brand=$("#search-brand").val();
		$("#search-model").empty();							//Clear Dropdown
		total+=1;
			
		$.post("ajax/ajax_get_model.php",{b: brand},function(data, status){
			//alert("Data: " + data + "\nStatus: " + status);
			console.log(data);
			
			var modelArr=JSON.parse(data);
			
			//alert(modelArr.modelId[0]);
			//alert(modelArr.modelId.length);
			
			var modelIdArr=modelArr.modelId;
			var modelNameArr=modelArr.modelName;
			
			//alert(brandNameArr);
			
			//Loop and set Dropdown Option------------------
			$("#search-model").append("<option value=''>- All -</option>");
			$(modelIdArr).each(function(i){
				$("#search-model").append("<option value='"+modelIdArr[i]+"'>"+modelNameArr[i]+"</option>");
			});  
		});
	});//end***
	
	
	//==========AJAX GET YEAR BY MODEL TO DROPDOWN LIST=================
	$("#search-model").change(function(){
		var model=$("#search-model").val();
		$("#search-year").empty();							//Clear Dropdown
		total+=1;
		
		$.post("ajax/ajax_get_year.php",{m: model},function(data, status){
			//alert("Data: " + data + "\nStatus: " + status);
			console.log(data);
			
			var yearArr=JSON.parse(data);
			
			//alert(yearArr.modelId[0]);
			//alert(yearArr.modelId.length);
			
			var yearArr=yearArr.year;
			
			//alert(brandNameArr);
			
			//Loop and set Dropdown Option------------------
			$("#search-year").append("<option value=''>- All -</option>");
			$(yearArr).each(function(i){
				$("#search-year").append("<option value='"+yearArr[i]+"'>"+yearArr[i]+"</option>");
				
			});  
		});
	});//end***
	
	//CHECK TOTAL COUNT AND HIDE CC DROUPDOWN LIST------------------------
	$("#search-year").change(function(){
		//alert(total);
		if(total==3){
			$("#cc_container").slideUp();			//Hide CC Dropdown List
		}
		
		total=0;									//Reset
	});
	
});
</script>
