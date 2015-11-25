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
	$page_title=$myFn->getPageInfo($conn,'title','contactus',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','contactus',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','contactus',$lang);

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
<!-- custom input -->
<link href="css/customInput.css" rel="stylesheet">
<script src="js/jquery.customInput.js"></script>
<!-- gMap -->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jquery.gmap.min.js"></script>

<!-- tabs -->
<script src="js/jquery.tools.min.js"></script>

<script type="text/javascript" language="javascript" src="js/custom.js"></script>
</head>

<body>
<div class="body_wrap">
<!-- header top bar -->    
	<?php include ("common/inc_headertop.php");?>
<!--/ header top bar -->

<div class="header header_thin" style="background-image:url(images/contactus/001.png)"></div>

<!-- header -->
<div class="header header_map">
	<div id="header_map"></div>
	<script>
	    $(window).ready(function () {
	        $("#header_map").gMap({
	            markers: [{
	            latitude: 13.595461,
            	longitude: 100.769216,
	            title: "Y.S.S (THAILAND) Company Limited. ",
	            html:"<strong>Y.S.S (THAILAND) Company Limited.</strong><br/>88 / 88 Moo.9 Soi Phikulthong Thepharak Rd.<br/>Bangpla, Bangphli, Samutprakarm 10540",
	            popup: true,
				icon: {
					image: '',
					iconsize: [74, 88],
					iconanchor: [37,88],
					infowindowanchor: [0, 0]
					}
				}],
	            zoom: 17,
				scrollwheel: false
	            });
	        });
	</script>

</div>
<!--/ header -->

<!-- search -->
	<div class="middle_row row_white search_row contact_form">
		<div class="container">
			
            <!-- contact form -->               
            <form action="#" method="post" id="contactForm" class="clearfix ajax_form">
                
                <div class="form_col_1">
                    <div class="row alignleft field_text">
                        <label class="label_title">Name:</label>
                        <input type="text" name="yourname" id="name" value="" class="inputField required">
                    </div>
                                                          
                    <div class="row alignleft field_text omega">
                        <label class="label_title">Email (never published):</label>
                        <input type="text" name="email" id="email" value="" class="inputField required">
                    </div>
                                       
                    <div class="row field_select alignleft">
                        <label class="label_title">Subject:</label>
                        <select class="select_styled" name="subject" id="subject">
                            <option value="Just saying Hi">Just saying Hi</option>
                            <option value="Feedback">Feedback</option>
                            <option value="Question">Question</option>
                            <option value="Problem">Problem Report</option>
                        </select>
                    </div>
                    
                    <div class="row field_text alignleft omega">
                        <label class="label_title">Phone: (optional):</label>
                        <input type="text" name="phone" id="phone" value="" class="inputField">
                    </div>
                </div>
                
                <div class="form_col_2">                
                    <div class="row">
                        <label class="label_title">Message:</label>
                        <textarea cols="30" rows="10" name="message" id="message" class="textareaField required"></textarea>
                    </div>
                </div>
                
                <div class="form_col_3">
                    <a onclick="document.getElementById('contactForm').reset();return false" href="#" class="link-reset">Reset all fields</a>
                    <div class="row rowSubmit clearfix">
                        <input type="submit" value="Send Message" id="send" class="btn btn-submit">
                    </div>
                </div>
            </form>
            <!--/ contact form --> 
		</div>
	</div>
<!--/ search -->

<!-- middle -->   
<div id="middle" class="cols2">
	<div class="container clearfix">  
    	
		<!-- content -->
        <div class="content">      
            <div class="contact_box" style="margin-top:50px;">
            <div class="tabs_framed small_tabs">
                    <ul class="tabs">
                        <li class="current"><a href="#tabs_2_1" hidefocus="true" style="outline: none;">YSS CONTACT</a></li>
                    </ul>
                    
                    <?php 
						$sql="SELECT * FROM yss_contact WHERE specific_name='yss_contact' AND lang='$lang'";
						$rs=mysqli_query($conn,$sql);
						$data=mysqli_fetch_assoc($rs);
						
						$title=$data['title'];
						$address=$data['address'];
						$district=$data['district'];
						$province=$data['province'];
						$zipcode=$data['zipcode'];
						$tel1=$data['phone1'];
						$tel2=$data['phone2'];
						$fax=$data['fax1'];
						$detail=$data['description'];
						$email=$data['default_mail'];
					?>
                        <div id="tabs_2_1" class="tabcontent" style="display: block;">
                            <div class="inner">
                                    <div class="box_content clearfix">                	
                                        <div class="left_side contact-address">
                                            <div class="name"><strong><?php echo $title ?></strong></div>
                                            <div class="address"><?php echo "$address $district $province $zipcode " ?>
                                            </div>
                                            <div class="row phone"><em>Phone 1:</em> <span><?php echo $tel1 ?></span></div>
                                            <div class="row phone"><em>Phone 2:</em> <span><?php echo $tel2 ?></span></div>
                                            <div class="row fax"><em>Fax:</em> <span><?php echo $fax ?></span></div>
                                            <div class="row mail"><em>Email:</em> 
                                            <a href="mailto:<?php echo $email ?>" hidefocus="true" style="outline: none;"><?php echo $email ?></a>
                                            </div>
                                        </div>
                                        <div class="right_side">
                                            <?php echo $detail ?>
                                        </div> 
                                    </div>
                        </div>
                    </div>
                    </div>
                    </div>
                     
                     
            <?php 
				//GET IMPORTERS CATEGORY==============================
					//$sql="SELECT * FROM importers_category WHERE lang='$lang' AND status='enable'";
					$sql="SELECT * FROM importers_category WHERE lang='$lang' AND status='enable'";
					$rs=mysqli_query($conn,$sql);
					
					$catArray=array();
					while($data=mysqli_fetch_assoc($rs)){
						$catArray['id'][]=$data['id'];
						$catArray['title'][]=$data['title'];
					}
					
					$total=count($catArray['id']);
			?>
            <div class="contact_box" style="margin-top:50px;">
            <div class="tabs_framed small_tabs">
                    <ul class="tabs">
                        <li class="current"><a href="#tabs_distributor" hidefocus="true" style="outline: none;">DISTRIBUTORS</a></li>
                        
						<?php for($i=0;$i<$total;$i++){ ?>
                        	<li><a href="#tabs_<?php echo $catArray['id'][$i] ?>" hidefocus="true" style="outline: none;">
							<?php echo $catArray['title'][$i] ?>
                            <?php //echo $catArray['id'][$i] ?>
                            </a></li>
                        <?php } ?>
                        
                    </ul>
                    
                    <div id="tabs_distributor" class="tabcontent" style="display: block;">
                            <div class="inner">
                                <?php include("inc/inc_contact_distributor.php"); ?>
                            </div>
                        </div>
                    
					<?php for($i=0;$i<$total;$i++){ ?>
                        <div id="tabs_<?php echo $catArray['id'][$i] ?>" class="tabcontent" style="display: block;">
                            <div class="inner">
                                <div class="box_content clearfix">
                                       <?php include("inc/inc_importer_bycat.php"); ?>
                                </div>
                            </div>
                        </div>
                    <?php }//end for*** ?>
                </div>
            </div>
        </div>
        <!--/ content -->  
    </div>
</div>
<!--/ middle -->

<!-- Footer-->
<?php include ("common/inc_footer.php");?>
<!-- /Footer-->

</div>
</body>
</html>
