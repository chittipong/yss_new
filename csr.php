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
	$page_title=$myFn->getPageInfo($conn,'title','csr',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','csr',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','csr',$lang);

//GET SHOT WORD==========================
	$txt_headpage=$myFn->getWord($conn,'csr',$lang);
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
		
<div class="header header_thin" style="background-image:url(images/rnd/B189.jpg)">
	<div class="header_title">
    	<h1 class="yssfont01"><span><?php echo $txt_headpage ?></span></h1>
    </div>
</div>

	<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><span class="current">CSR</span></p>
    </div>
</div>
<!--/ breadcrumbs -->


<!--=========================START GET AND DISPLAY CONTENT=================================-->
<?php
//GET CONTENT BY LANGUAGE================
	if($lang=='TH'){
		$sql="SELECT *  FROM yss_content WHERE lang='TH' AND page='7' ORDER BY sort_order ASC";
	}
	if($lang=='EN'){
		$sql="SELECT *  FROM yss_content WHERE lang='EN' AND page='7' ORDER BY sort_order ASC";
	}else{
		$sql="SELECT *  FROM yss_content WHERE lang='TH' AND page='7' ORDER BY sort_order ASC";
	}
		
		$rs=mysqli_query($conn,$sql);
		$dataArray=array();
		
		while($data=mysqli_fetch_assoc($rs)){
			$dataArray['id'][]=$data['id'];
			$dataArray['title'][]=$data['title'];
			$dataArray['detail'][]=$data['detail'];
			$dataArray['pic'][]=$data['pic'];
			$dataArray['pic_title'][]=$data['pic_title'];	
			$dataArray['layout'][]=$data['layout'];
		}
?>

<!-- middle -->   
<div id="middle" class="full_width">
	<div class="container clearfix">  
		<!-- content -->
        <div class="content">   
        <div class="divider_space_thin"></div>         
            <div class="entry">
            <?php
				//LOOP DISPLAY CONTENT================================
				$c=count($dataArray['id']);
				for($i=0;$i<$c;$i++){
					if($dataArray['layout'][$i]=='LEFT_PIC'){
						include('content_layout/inc_left_pic.php');
					}
					
					if($dataArray['layout'][$i]=='RIGHT_PIC'){
						include('content_layout/inc_right_pic.php');
					}
					
					if($dataArray['layout'][$i]=='TOP_PIC'){
						include('content_layout/inc_top_pic.php');
					}
					
					if($dataArray['layout'][$i]=='ONLY_TEXT'){
						include('content_layout/inc_only_text.php');
					}
				}
				//END LOOP DISPLAY CONTENT=============================
			?>
              <div class="divider_space_thin"></div>
		  </div>                
        </div>
        <!--/ content -->
        
    </div>
</div>
<!--/ middle -->
<!--============================END CONTENT===================================-->


<!-- Footer-->
<?php include ("common/inc_footer.php");?>
<!-- /Footer-->

</div>
</body>
</html>
