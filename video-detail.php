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
	$page_title=$myFn->getPageInfo($conn,'title','news',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','news',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','news',$lang);
	
//GET QUERY STRING=======================
	$queryString = $_SERVER['QUERY_STRING'];					//Get Query string
	
	echo $queryString;

//GET SHOT WORD==========================
	$txt_qsearch=$myFn->getWord($conn,'quick_search',$lang);
?>
<?php
//GETDETAIL==============================
	$rid=isset($_GET['id'])? $_GET['id']:null;
	
	if(!empty($rid)){
		$sql="SELECT * FROM yss_videos WHERE id='$rid' LIMIT 1";	
	}else{
		echo "Cannot get reference ID"; exit();
	}
	
		$rs=mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($rs);
		
		$id=$data['id'];
		$title=$data['title'];
		$detail=$data['detail'];
		$video=$data['video'];
		$type=$data['type'];
		$dateCreate=$data['date_create'];
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
	<!--<div class="header_title">
    	<h1 class="yssfont01"><span>NEWS</span> & <span>DETAIL</span></h1>
    </div>-->
</div>
<!--/Head-->

<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><a href="video.php">Videos</a> <span class="separator">&rsaquo;</span> <span class="current">Detail</span></p>
    </div>
</div>
<!--/ breadcrumbs -->

<!--CONTENT-->
<div id="middle" class="full_width">
	<div class="container clearfix">      
		<!-- content -->
        <div class="content">
        
            <!-- post details -->
            <article class="post-item post-detail">
                <div class="post-aside clearfix" style="padding:20px 0 0 0">
                    <?php 
						//Display Video--------------
						if(!empty($video)){ 
							echo '<div class="video" align="center">'.$video.'</div>';        
                     	} 
						
						echo "<h1 style='margin:20px;' align='center'>$title</h1>";
						
						if(!empty($detail)){
							echo "<p style='margin:20px'>$detail</p>";	
						}
                    ?>       
                    	             
                    
                    <div class="post-meta">
                    	<div class="post-share"><span>Share:</span> <a href="#" class="share_google" hidefocus="true" style="outline: none; opacity: 1;">Google +1</a> <a href="#" class="share_facebook" hidefocus="true" style="outline: none; opacity: 1;">Facebook</a> <a href="#" class="share_twitter" hidefocus="true" style="outline: none; opacity: 1;">Twitter</a></div>
                        <div class="info_row"><span>Posted On:</span> <?php echo $dateCreate ?></div>
                        <div class="info_row"><span>Written BY:</span> Max Biaggi</div>
                        <div class="info_row"><span>Comments:</span> <a href="#comments" class="anchor" hidefocus="true" style="outline: none;">3</a></div>
                    </div>         
                </div>               
            </article>
            <div class="divider_space_thin"></div>   
            <!--/ post details -->
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
