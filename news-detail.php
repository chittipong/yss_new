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
		$sql="SELECT n.id,n.pic AS main_pic, n.video, n.sort_order,n.`type`,n.date_create,d.title,d.detail,d.pic,d.lang 
		FROM yss_news n,yss_news_detail d WHERE n.id=d.news_id AND n.id='$rid' LIMIT 1";	
	}else{
		echo "Cannot get reference ID"; exit();
	}
	
		$rs=mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($rs);
		
		$id=$data['id'];
		$title=$data['title'];
		$detail=$data['detail'];
		$mainPic=$data['main_pic'];	
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
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><span class="current">News & Detail</span></p>
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
                <div class="post-title">
                    <h1><?php echo $title ?></h1>	                                    
                </div>
                <div class="post-aside clearfix">
                    <div class="post-image"><a href="#" hidefocus="true" style="outline: none;">
                    	<img src="images/news/<?php echo $mainPic ?>" alt="" style="padding:10px; width: 98%;"></a>
                    </div> 
                    <?php 
						//Display Video--------------
						if(!empty($video)){ 
							echo "<h5 align='center'>Video Clip</h5>";  
							echo '<div class="video" align="center">'.$video.'</div>';        
                     	} 
                    ?>                    
                    
                    <div class="post-meta">
                    	<div class="post-share"><span>Share:</span> <a href="#" class="share_google" hidefocus="true" style="outline: none; opacity: 1;">Google +1</a> <a href="#" class="share_facebook" hidefocus="true" style="outline: none; opacity: 1;">Facebook</a> <a href="#" class="share_twitter" hidefocus="true" style="outline: none; opacity: 1;">Twitter</a></div>
                        <div class="info_row"><span>Posted On:</span> <?php echo $dateCreate ?></div>
                        <div class="info_row"><span>Written BY:</span> Max Biaggi</div>
                        <div class="info_row"><span>Comments:</span> <a href="#comments" class="anchor" hidefocus="true" style="outline: none;">3</a></div>
                    </div>     
                    
                    <div class="entry">
                    	<p><?php echo $detail ?></p>
                        <?php
						//GET NEWS DETAIL=======================================
							$detailArray=array();
							$sql="SELECT * FROM yss_news_detail WHERE news_id='$id' AND main!='Y' ORDER BY sort_order ASC";
							$rs=mysqli_query($conn,$sql);
							$num=mysqli_num_rows($rs);
							
							if($num>0){
								while($data=mysqli_fetch_assoc($rs)){
									$detailArray['title'][]=$data['title'];
									$detailArray['detail'][]=$data['detail'];
									$detailArray['pic'][]=$data['pic'];
									$detailArray['video'][]=$data['video'];
								}
						?>
                        <?php
								$c=count($detailArray['title']);
								for($i=0;$i<$c;$i++){
						?>
                            	<img src="images/news/<?php echo $detailArray['pic'][$i] ?>" alt="" style="padding:10px;">
                            	<h2><?php echo $detailArray['title'][$i] ?></h2>
                            	<p><?php echo $detailArray['detail'][$i] ?></p>
									<?php 
									//Display Video--------------
                                        if(!empty($detailArray['video'][$i])){ 
                                            echo "<h5 align='center'>Video Clip</h5>";
										   	echo '<div class="video" align="center">'.$detailArray['video'][$i].'</div>';
                                        } 
                                    ?>   
                        <?php } } ?>
                    </div>    
                </div>               
            </article>
            <div class="divider_space_thin"></div>   
            
            <article>
            	<div><?php include("inc/inc_news_layout1.php") ?></div>
            </article>
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
