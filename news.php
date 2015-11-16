<?php
ob_start();
session_start();

include("class/connect_db.php");
include("class/Mymenu.php");
include("class/MyFunction.php");
include("class/class_DateTime.php");
	
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
	$page_title=$myFn->getPageInfo($conn,'title','news',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','news',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','news',$lang);

//GET SHOT WORD==========================
	$txt_newsevent=$myFn->getWord($conn,'news_event',$lang);
	
//GET DATA BY LANGUAGE===============================
	/*if(!empty($lang)){
		$sql="SELECT n.id,n.pic AS main_pic, n.sort_order,n.`type`,n.date_create,d.title,d.detail,d.pic,d.lang 
	FROM yss_news n,yss_news_detail d WHERE n.id=d.news_id AND lang='$lang' ORDER BY n.sort_order";
	}else{
		$sql="SELECT n.id,n.pic AS main_pic, n.sort_order,n.`type`,n.date_create,d.title,d.detail,d.pic,d.lang 
	FROM yss_news n,yss_news_detail d WHERE n.id=d.news_id ORDER BY n.sort_order";
	}*/
	
	$sql="SELECT n.id,n.pic AS main_pic, n.sort_order,n.`type`,n.date_create,d.title,d.detail,d.pic,d.lang 
	FROM yss_news n,yss_news_detail d WHERE n.id=d.news_id GROUP BY d.news_id ORDER BY n.date_create,n.sort_order";
	
	$rs=mysqli_query($conn,$sql);
	$dataArray=array();
	$eventArray=array();
		
	while($data=mysqli_fetch_assoc($rs)){
		if($data['type']=='NEWS'){
			$dataArray['id'][]=$data['id'];
			$dataArray['title'][]=$data['title'];
			$dataArray['detail'][]=$data['detail'];
			$dataArray['main_pic'][]=$data['main_pic'];
			$dataArray['pic'][]=$data['pic'];	
			$dataArray['type'][]=$data['type'];
			$dataArray['date_create'][]=$data['date_create'];
		}
		
		if($data['type']=='EVENT'){
			$eventArray['id'][]=$data['id'];
			$eventArray['title'][]=$data['title'];
			$eventArray['detail'][]=$data['detail'];
			$eventArray['main_pic'][]=$data['main_pic'];
			$eventArray['pic'][]=$data['pic'];	
			$eventArray['type'][]=$data['type'];
			$eventArray['date_create'][]=$data['date_create'];
		}
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

<!-- tabs -->
<script src="js/jquery.tools.min.js"></script>

<!-- styled font-awesome -->
<link rel="stylesheet" type="text/css" href="font-awesome44/css/font-awesome.min.css">

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
<div class="header header_thin" style="background-image:url(images/contents/news_activity.jpg)">
	<div class="header_title">
    	<h1 class="yssfont01"><span><?php echo $txt_newsevent ?></span></h1>
    </div>
</div>
<!--/Head-->

<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><span class="current">News & Event</span></p>
    </div>
</div>
<!--/ breadcrumbs -->

<!--CONTENT-->
<div id="middle" class="full_width">
	<div class="container clearfix">      
		<!-- content -->
        <div class="content">   
        <div class="row clearfix">
        <h1 class="yssfont01 head-style-01">
            <span style="float:left;"><img src="images/box-header-01.png"/></span>
            <div class="middle">News</div>
            <span><img src="images/box-header-02.png"/></span>
        </h1>      
        			
         <div class="row clearfix">
			  <?php
                  $c=count($dataArray['id']);
                  for($i=0;$i<$c;$i++){
                      $detail = $myFn->limitStrDisplay(200,$dataArray['detail'][$i]); 
              ?>
				<div class="col col_1_2 alpha" style="border-bottom:1px dotted#D0D0D0; margin-bottom:20px; padding: 5px 0;">
                        <p>
                        	<a href="news-detail.php?id=<?php echo $dataArray['id'][$i] ?>" hidefocus="true" style="outline: none;">
                        		<img src="images/news/<?php echo $dataArray['main_pic'][$i] ?>" alt="" class="frame_left" width="200">
                        	</a>
                            <h3><?php echo $dataArray['title'][$i] ?></h3>
                        	<?php echo $detail ?>
                        </p>
                </div>
                
               <?php } ?>
                
			</div> 	                    
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
