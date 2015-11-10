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
<script src="js/jquery.customInput.js"></script>

</head>

<body>
<div class="body_wrap">
	<!-- header top bar -->    
		<?php include ("common/inc_headertop.php");?>
    <!--/ header top bar -->
            

<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index1.html">Home</a>  <span class="separator">&rsaquo;</span>  <a href="#">Our Cars</a>  <span class="separator">&rsaquo;</span>  <span class="current">Car Makers</span></p>
        <a href="offers-search.html" class="link_search">Start a New Search</a>
    </div>
</div>
<!--/ breadcrumbs -->

<!-- middle -->   
<div id="middle" class="full_width">
	<div class="container clearfix">  
    
		<!-- content -->
        <div class="content">
            <div class="brand_list2">
            	<ul>
	            	<li><a href="#" class="brand_logo"><img src="images/temp/brand_logo_1.png" alt=""></a> <a href="offer-list.html">Honda - 76 offers</a></li>
                    
	            </ul>
            </div>
            
        </div>
        <!--/ content -->
              
    </div>
</div>
<!--/ middle -->

<!-- latest_offers -->
	<div class="middle_row latest_offers">
		<div class="container clearfix">         			
        	<h2>LATEST CARS IN SHOWROOM</h2>
                     
            <a href="#" class="link_more">View All Latest Added</a>
		</div>
            
        <div id="latest_offers">
            <div class="latest_item">
            <a href="offers-details.html"><img src="images/temp/prod_img_01.jpg" alt=""></a>
            <a href="offers-details.html">Mercedes-Benz ML 350</a>
            </div>
            <div class="latest_item">
            <a href="offers-details.html"><img src="images/temp/prod_img_02.jpg" alt=""></a>
            <a href="offers-details.html">Porsche CAYENNE S</a>
            </div>
            <div class="latest_item">
            <a href="offers-details.html"><img src="images/temp/prod_img_03.jpg" alt=""></a>
            <a href="offers-details.html">Infiniti FX 37 S Premium</a>
            </div>
            <div class="latest_item">
            <a href="offers-details.html"><img src="images/temp/prod_img_04.jpg" alt=""></a>
            <a href="offers-details.html">Volvo XC60 D5 RE-Design</a>
            </div>
            <div class="latest_item">
            <a href="offers-details.html"><img src="images/temp/prod_img_05.jpg" alt=""></a>
            <a href="offers-details.html">BMW X5 Adaptive Drive Display</a>
            </div>
            <div class="latest_item">
            <a href="offers-details.html"><img src="images/temp/prod_img_06.jpg" alt=""></a>
            <a href="offers-details.html">Land Rover Sport SDV6 HSE</a>
            </div>
            <div class="latest_item">
            <a href="offers-details.html"><img src="images/temp/prod_img_07.jpg" alt=""></a>
            <a href="offers-details.html">Audi Q7 S-LINE PANORAMA</a>
            </div>
            <div class="latest_item">
            <a href="offers-details.html"><img src="images/temp/prod_img_08.jpg" alt=""></a>
            <a href="offers-details.html">Volkswagen Touareg R-Line</a>
            </div>
            <div class="latest_item">
            <a href="offers-details.html"><img src="images/temp/prod_img_09.jpg" alt=""></a>
            <a href="offers-details.html">Alfa Romeo Brera JTDm 2008</a>
            </div>
        </div>
        
        <a class="prev" id="latest_offers_prev" href="#"></a>
        <a class="next" id="latest_offers_next" href="#"></a>
                    
        <script>	
        jQuery(document).ready(function($) {	
			var screenRes = $(window).width();
			
            $('#latest_offers').carouFredSel({
                prev : "#latest_offers_prev",
                next : "#latest_offers_next", 
                infinite: false,
                circular: true,
                auto: false,
                width: '100%',				
                scroll: {
                    items : 1,
					onBefore: function (data) {
						if (screenRes > 900) {
						data.items.visible.eq(0).animate({opacity: 0.15},300);
						data.items.old.eq(-1).animate({opacity: 1},300);
						data.items.visible.eq(-1).animate({opacity: 0.15},300);		               
						}
		            },
					onAfter: function (data) {
						if (screenRes > 900) {
						data.items.old.eq(0).animate({opacity: 1},300);	
						}
		            }
                }
            });			
			if (screenRes > 900) {
				var vis_items = $("#latest_offers").triggerHandler("currentVisible");
				vis_items.eq(-1).animate({opacity: 0.15},100);
				vis_items.eq(0).animate({opacity: 0.15},100);
			}
        });
        </script>             
	</div>
    <!--/ latest_offers -->
    
    <!-- car types -->
	<div class="middle_row row_gray">
		<div class="container clearfix">  
			
            <div class="car_types_list">
            	<h2>Choose from a wide variety of vehicles</h2>
                <ul>
	                <li class="type_hover cart_type_1">
						<a href="#" class="front"><strong>SCOOTERS & BIKES</strong> <em>76 OFFERS</em></a>
		                <a href="#" class="back"><strong>SCOOTERS & BIKES</strong> <em>View more</em></a>
                    </li>
                    <li class="type_hover cart_type_2">
                        <a href="#" class="front"><strong>SEDANS & ESTATES</strong> <em>1354 OFFERS</em></a>
                        <a href="#" class="back"><strong>SEDANS & ESTATES</strong> <em>View more</em></a>
                    </li>
                    <li class="type_hover cart_type_3">
                    <a href="#" class="front"><strong>SPORTS CARS</strong> <em>68 OFFERS</em></a>
                    <a href="#" class="back"><strong>SPORTS CARS</strong> <em>View more</em></a>
                    </li>
                    <li class="type_hover cart_type_4">
                    <a href="#" class="front"><strong>SUVS & PICKUPS</strong> <em>512 OFFERS</em></a>
                    <a href="#" class="back"><strong>SUVS & PICKUPS</strong> <em>View more</em></a>
                    </li>
                    <li class="type_hover cart_type_5">
                    <a href="#" class="front"><strong>VANS & TRUCKS</strong> <em>255 OFFERS</em></a>
                    <a href="#" class="back"><strong>VANS & TRUCKS</strong> <em>View more</em></a>
                    </li>
                </ul>                
            	<a href="#" class="link_more">SEE ALL OUR OFFERS</a>
            </div>
            <script>	
			jQuery(document).ready(function($) {		
				$('.type_hover').hover(function(){
					$(this).addClass('flip');
				},function(){
					$(this).removeClass('flip');
				});		          
			});
			</script> 
            
		</div>
	</div>
    <!--/ car types -->

<div class="footer">
	<div class="container clearfix">
    
		<div class="f_col f_col_1">  
            <h3>Vehicles:</h3>
            <ul>
                <li><a href="#"><span>Motorbikes</span></a></li> 
                <li><a href="#"><span>Compacts</span></a></li>
                <li><a href="#"><span>Sedans</span></a></li>
                <li><a href="#"><span>4x4 SUVs</span></a></li>
                <li><a href="#"><span>Pickups</span></a></li>
                <li><a href="#"><span>Vans & Trucks</span></a></li>                                
            </ul>
        </div>
        <!--/ footer col 1 -->
        
        <div class="f_col f_col_2">        	
			<h3>Services:</h3>
            <ul>
                <li><a href="#"><span>Buy a car</span></a></li> 
                <li><a href="#"><span>Sell your Car</span></a></li>
                <li><a href="#"><span>Buy Back</span></a></li>
                <li><a href="#"><span>Repair Shop </span></a></li>
            </ul>
        </div>
        <!--/ footer col 2 -->
        
        <div class="f_col f_col_3">        	
            <h3>Privacy:</h3>
            <ul>
                <li><a href="#"><span>Terms & Conditions</span></a></li> 
                <li><a href="#"><span>Privacy Statement</span></a></li>
                <li><a href="#"><span>F.A.Q.</span></a></li>
                <li><a href="#"><span>Support</span></a></li>
                <li><a href="#"><span>Confidentiality</span></a></li>
            </ul>
        </div>        
        <!--/ footer col 3 -->
        
        <div class="f_col f_col_4">   
           	<h3>OUR SHOWROOM</h3>
            <div class="footer_address">
                <div class="address">
	                21 Sunset Blvd, Los Angeles<br>
	                California, 90453
                </div>
                <div class="hours">
                	Mon - Fri: 9AM - 7 PM<br>
					Sat - Sun: 9AM - 2 PM
				</div>
                <a href="contact.html" class="notice">View Bigger Map</a>
            </div>
            <div class="footer_map" style="background:url(images/temp/footer_map.jpg);"><a href="contact.html" class="amap"></a></div>
      	</div>
        <!--/ footer col 4 -->
        
        <div class="clear"></div>
        
        <div class="footer_social">
        	<div class="social_inner">
			    <a href="#" class="social-google"><span>Google +1</span></a>
			    <a href="#" class="social-fb"><span>Facebook</span></a>
			    <a href="#" class="social-twitter"><span>Twitter</span></a>
			    <a href="#" class="social-dribble"><span>Dribble</span></a>
			    <a href="#" class="social-linkedin"><span>LinkedIn</span></a>
			    <a href="#" class="social-vimeo"><span>Vimeo</span></a>
			    <a href="#" class="social-flickr"><span>Flickr</span></a>
			    <a href="#" class="social-da"><span>Devianart</span></a>
            </div>
		</div>
        
        <div class="footer_contacts">
        	<span class="phone">555-39.84.35</span>
            <span class="email">hello@autotrader.com</span>
        </div>
        
        <div class="copyright">
        AutoTrader Wordpress theme by <a href="http://themefuse.com">Themefuse</a>  &nbsp;|&nbsp;  <a href="http://themefuse.com" class="link_white">Premium WordPress themes</a>
        </div>
        	        
    </div> 
</div>

</div>
</body>
</html>
