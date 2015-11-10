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
	$page_title=$myFn->getPageInfo($conn,'title','award',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','award',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','award',$lang);

//GET SHOT WORD==========================
	$txt_award=$myFn->getWord($conn,'award',$lang);
?>

<?php
//GET AWARD BY LANGUAGE============================
		if($lang=='TH'){
			$sql="SELECT title_th AS title,detail_th AS detail,pic FROM yss_award";
		}
		if($lang=='EN'){
			$sql="SELECT title_en AS title,detail_en AS detail,pic  FROM yss_award";
		}else{
			$sql="SELECT title_th AS title,detail_th AS detail,pic  FROM yss_award";
		}
		
		$rs=mysqli_query($conn,$sql);
		$awardArray=array();
		
		while($data=mysqli_fetch_assoc($rs)){
			$awardArray['title'][]=$data['title'];
			$awardArray['detail'][]=$data['detail'];
			$awardArray['pic'][]=$data['pic'];
		}
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

<!--Head-->
<div class="header header_thin" style="background-image:url(images/rnd/B189.jpg)">
	<div class="header_title">
    	<h1 class="yssfont01"> <i class="fa fa-trophy"></i> <span><?php echo $txt_award ?></span></h1>
    </div>
</div>
<!--/Head-->

<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><span class="current" width="100">Award</span></p>
    </div>
</div>
<!--/ breadcrumbs -->

<!--CONTENT-->
<div id="middle" class="full_width">
	<div class="container clearfix">      
		<!-- content -->
        <div class="content">   
        <?php
			$n=1;
			$c=count($awardArray['title']);
			for($i=0;$i<$c;$i++){
				$award_title=$awardArray['title'][$i];
				$award_detail=$awardArray['detail'][$i];
				$award_pic=$awardArray['pic'][$i];
				
				if($n==1){
					echo '<div class="row clearfix marginTop20">';
				}
				
		?>
				<div class="col col_1_2 alpha borderBottom1">
       	          <h3 class="yssfont01 yss-red-01 shadow1"><?php echo $award_title ?></h3>
                    <p><img src="images/awards/<?php echo $award_pic ?>" alt="" class="frame_left" width="100">
                        <?php echo $award_detail ?>
				  </p>
                </div>
            <?php 
				if($n==2){
					echo "</div>";
					$n=0;
				}
				$n++;
			} ?>
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
