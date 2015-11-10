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
	$page_title=$myFn->getPageInfo($conn,'title','download',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','download',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','download',$lang);


//GET SHOT WORD==========================
	$txt_download=$myFn->getWord($conn,'download',$lang);
	$txt_filename=$myFn->getWord($conn,'filename',$lang);
	$txt_desc=$myFn->getWord($conn,'description',$lang);
	$txt_filesize=$myFn->getWord($conn,'filesize',$lang);
	
//GET DOWNLOAD CATEGORY===========================
	$catArray=array();
    $sql="SELECT *  FROM download_category ORDER BY sort_order ASC";
		
		$rs=mysqli_query($conn,$sql);
		while($data=mysqli_fetch_assoc($rs)){
			$catArray['id'][]=$data['id'];
			$catArray['name'][]=$data['name'];
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

<!--Bootstrap335-->
<link href="bootstrap335/css/bootstrap.css" media="screen" rel="stylesheet">
<link href="bootstrap335/css/bootstrap-theme.css" media="screen" rel="stylesheet">
<script src="bootstrap335/js/bootstrap.js"></script>

<!--Font awesome-->
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

<!-- tabs -->
<script src="js/jquery.tools.min.js"></script>

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
    	<h1 class="yssfont01"><span><i class="fa fa-download"></i> <?php echo $txt_download ?></span></h1>
    </div>
</div>
<!--/Head-->

<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><span class="current">Download</span></p>
    </div>
</div>
<!--/ breadcrumbs -->

<!--CONTENT-->
<div id="middle" class="full_width">
	<div class="container clearfix">      
		<!-- content -->
        <div class="content">   
			 <div class="contact_box" style="margin-top:50px;">
            <div class="tabs_framed">
                    <ul class="tabs">
                        <li class="current"><a href="#tabs_2_1" hidefocus="true" style="outline: none;"><i class="fa fa-download"></i> <?php echo $txt_download ?></a></li>
                    </ul>

                    <div id="tabs_2_1" class="tabcontent" style="display: block;">
                    	<div class="inner">
                        <?php
							$total=count($catArray['id']);
							//echo $total;
							
							for($i=0;$i<$total;$i++){
								$cid=$catArray['id'][$i];
								$sql="SELECT * FROM download WHERE download_cat_id='$cid' AND status='enable'";
								$rs=mysqli_query($conn,$sql);
								$numRows=mysqli_num_rows($rs);
								
								if($numRows<1){
									continue;			//ถ้าไม่มีไฟล์ไม่ต้องแสดง------
								}
								
						?>
								<h2 class="yss-red-01 yssfont01"> <?php echo $catArray['name'][$i] ?></h2>
                                
                                <div class="styled_table table_dark">
                                    <table>
                                       <thead>
                                            <tr>
                                                <th style="width:25%"><?php echo $txt_filename ?></th>
                                                <th style="width:25%"><?php echo $txt_desc ?></th>
                                                <th style="width:25%"><?php echo $txt_filesize ?></th>
                                                <th style="width:25%"><i class='fa fa-download'></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											while($data=mysqli_fetch_assoc($rs)){
												$fileName=$data['file_name'];
												$title=$data['title'];
												$detail=$data['detail'];
												$fileSize=$data['file_size'];
												$status=$data['status'];
										?>
                                            <tr>
                                                <td><?php echo $title ?></td>
                                                <td><?php echo $detail ?></td>
                                                <td><?php echo $fileSize ?></td>
                                                <td><a href="downloads/<?php echo $fileName ?>" target="_blank"><i class='fa fa-download'></i></a></td>
                                            </tr>
                                         <?php } ?>
                                        </tbody>
                                    </table>
                                    </div>
                        <?php }//end for*** ?>
                        
                        <?php //include ("inc/inc_abe_manual.php");?>
                        <?php //include ("inc/inc_installation.php");?>
                        <?php //include ("inc/inc_manual.php");?>
                        <?php //include ("inc/inc_warning.php");?>
                        <?php //include ("inc/inc_application_list.php");?>
                        <?php //include ("inc/inc_instruction.php");?>
                        <?php //include ("inc/inc_spring_code.php");?>
                        <?php //include ("inc/inc_product_code.php");?>
                        </div>
                    </div>
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
