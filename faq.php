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
//echo $_SESSION['sess_lang'];

//CONNECT DATABASE=======================
	$conn=connectDb();
	$myMenu=new Mymenu();
	$myFn=new MyFunction();
	
	$myMenu->__construc($lang,$conn);

//GET PAGE INFO=========================
	$page_title=$myFn->getPageInfo($conn,'title','download',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','download',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','download',$lang);


//GET SHOT WORD==========================
	$txt_qsearch=$myFn->getWord($conn,'quick_search',$lang);
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

<!--Head-->
<div class="header header_thin" style="background-image:url(images/rnd/B189.jpg)">
	<div class="header_title">
    	<h1 class="yssfont01"><span>FAQ</span></h1>
    </div>
</div>
<!--/Head-->

<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><span class="current">FAQ</span></p>
    </div>
</div>
<!--/ breadcrumbs -->

<!--CONTENT-->
<div id="middle" class="full_width">
	<div class="container clearfix">      
		<!-- content -->
        <div class="content">   
			 <div class="content">            
                      
            <!-- faq list -->
				<div class="faqlist">
                <div class="row clearfix">
				  <div class="col col_3_4">                    	
                      <h2><span>Q:</span> Front forks shock when braking and on uneven road surfaces dips rapidly when braking </h2>
                        <p><strong>CAUSE: </strong> compression too soft or oil level to low</p>
                        <p><strong>SOLUTION: </strong> increase compression oil level increase</p>
                    </div>
                </div>
                
                <div class="divider_space_thin"></div>
                
                <div class="row clearfix">
				  <div class="col col_3_4">                    	
                      <h2><span>Q:</span> Front forks sluggish/nearly immobile shocks in steering when accelerating front wheel bounce when braking hard</h2>
                        <p><strong>CAUSE : </strong>Compression too hard or tyre pressure to hard</p>
                        <P><strong>SOLUTION : </strong>reduce compression use thinner oil reduce tyre pressure</P>
                    </div>
                </div>
                
                <div class="divider_space_thin"></div>
                
                <div class="row clearfix">
				  <div class="col col_3_4">                    	
                      <h2><span>Q:</span>Dips too deep too much negative suspension travel tendency to shock when braking front fork shudder when braking and traveling downhill</h2>
                        <p><strong>CAUSE : </strong>not enough spring preload spring too soft</p>
                        <P><strong>SOLUTION : </strong>increase spring preload fit progressive front fork springs with harder initial strength</P>
                    </div>
                </div>
                
                <div class="divider_space_thin"></div>
                
                <div class="row clearfix">
				  <div class="col col_3_4">                    	
                      <h2><span>Q:</span> Front forks sluggish/nearly immobile front forks shock the steering when accelerating and in ruts uncomfortable front wheel bounce on poor surface</h2>
                        <p><strong>CAUSE : </strong>Too much spring preload or spring too hard or rebound to soft or tyre pressure to hard </p>
                        <P><strong>SOLUTION : </strong>Reduce spring preload fit progressive front fork springs with softer initial strengt reduce tyre pressure chance oil with thicker</P>
                    </div>
                </div>
			</div>
				<!--/ faq list -->
            
        </div>
    	</div>
  	</div>
</div>
<!--END CONTENT-->

<!-- Footer-->
<?php include ("common/inc_footer.php");?>
<!-- /Footer-->

</div>
</body>
</html>
