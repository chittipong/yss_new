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
	$page_title=$myFn->getPageInfo($conn,'title','demo',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','demo',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','demo',$lang);

//GET SHOT WORD==========================
	$txt_warranty=$myFn->getWord($conn,'warranty',$lang);
	
//GET CONTENT============================
	switch ($lang) {
    case 'TH':
        $sql="SELECT *  FROM yss_content WHERE lang='TH' AND page='10' AND position='section1' LIMIT 1";
        break;
    case 'EN':
        $sql="SELECT *  FROM yss_content WHERE lang='EN' AND page='10' AND position='section1' LIMIT 1";
        break;
    default:
        $sql="SELECT *  FROM yss_content WHERE lang='TH' AND page='10' AND position='section1' LIMIT 1";
	}
		
		$rs=mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($rs);
		
			$title1=$data['title'];
			$detail1=$data['detail'];
			$pic1=$data['pic'];
			$pic_title1=$data['pic_title'];	
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
    	<h1 class="yssfont01"><span><?php echo $txt_warranty ?></span></h1>
    </div>
</div>
<!--/Head-->

<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><span class="current">Warranty</span></p>
    </div>
</div>
<!--/ breadcrumbs -->

<!--CONTENT-->
<div id="middle" class="full_width">
	<div class="container clearfix">      
		<!-- content -->
        <div class="content">            
          	
          <div class="entry">
	            
                <h2><?php echo $title1 ?></h2>
                
                <div class="wp-caption alignright" style="width:350px">
	            <img src="images/contents/<?php echo $pic1 ?>" width="350" height="215" alt="">
	            <p class="wp-caption-text"><?php echo $pic_title1 ?></p>
	            </div>
                
                <?php echo $detail1 ?>
                
            <div class="divider_space_thin"></div>
                
                <h2>Suspendisse Dictum Feugiat Nisl Ut Dapibus. Mauris</h2>
                
                <div class="wp-caption alignleft" style="width:350px">
	            <img src="images/temp/service_3.jpg" width="350" height="210" alt="">
	            <p class="wp-caption-text">Image subtitle or Service description</p>
	            </div>
                
                <p>Duis aliquet egestas purus in blandit. Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed. Molestie augue sit amet leo consequat posuere.</p>
                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin vel ante a orci tempus eleifend ut et magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla.</p>

				<p>Fringilla, orci ac euismod semper, magna diam porttitor mauris, quis sollicitudin sapien justo in libero. Vestibulum mollis mauris enim. Morbi euismod magna ac lorem rutrum elementum</p>
                
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
