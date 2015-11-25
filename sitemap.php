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
	$page_title=$myFn->getPageInfo($conn,'title','site_map',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','site_map',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','site_map',$lang);

//GET SHOT WORD==========================
	$txt_sitemap=$myFn->getWord($conn,'site_map',$lang);
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
    	<h1 class="yssfont01"><span><?php echo $txt_sitemap ?></span></h1>
    </div>
</div>
<!--/Head-->

<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><span class="current">Site Map</span></p>
    </div>
</div>
<!--/ breadcrumbs -->

<!--CONTENT-->
<div id="middle" class="full_width">
	<div class="container clearfix">      
		<!-- content -->
        <div class="content">
          <table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
            <tbody>
              <!-- ROWS 01 -->
              <tr>
                <td valign="top"><table width="235">
                  <tbody>
                    <tr>
                      <td><h2 class="sitemap-header">About Us</h2></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="introduction.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Success / Introduction </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="csr.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> CSR </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="faq.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> F.A.Q </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                  </tbody>
                </table></td>
                <td valign="top"><table width="235">
                  <tbody>
                    <tr>
                      <td><h2 class="sitemap-header">Product</h2></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="product.php?range=racing"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Racing </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="product.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Top Line </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="product.php?range=eco"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> ECO line </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="product.php?range=gas-dtg"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> GAS DTG </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="product.php?range=hightper"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> High Performance </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="product.php?range=steering"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Steering Damper </font> </a></td>
                    </tr>
                  </tbody>
                </table></td>
                <!--// Support //-->
                <td valign="top"><table width="235">
                  <tbody>
                    <tr>
                      <td><a href="#" class="link-style-01">
                        <h2 class="sitemap-header">Support</h2>
                      </a><a href="index.php?lang=EN&amp;menu=index"></a></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="product-code.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Product Code</font> </a></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="spring-code.php"><img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Spring Code</font></a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="setup-install.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Setup / Install </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="warranty.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Warranty </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="download.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Download </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="download.php?r=abemanual"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> ABE Manual </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                  </tbody>
                </table></td>
                <!-- Contact US -->
                <td valign="top"><table width="235">
                  <tbody>
                    <tr>
                      <td><h2 class="sitemap-header">Contact Us</h2></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="contactus.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Y.S.S Contact </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="contactus.php?r=distributors"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Distributors </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="contactus.php?r=asia"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> ASIA </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="contactus.php?r=australia"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> EUROPE </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php?lang=EN&amp;menu=contactus_import&amp;import_id=9"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> AUSTRALIA AND OCEANIA </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="contactus.php?r=northamerica"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> NORTH AMERICA </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="contactus.php?r=southamerica"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> SOUTH AMERICA </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                  </tbody>
                </table></td>
              </tr>
              <tr>
                <td colspan="4" height="30"></td>
              </tr>
              <!-- ROWS 02 -->
              <tr>
                <td valign="top"><table width="235">
                  <tbody>
                    <tr>
                      <td><h2 class="sitemap-header">Infomation</h2>                        <!-- </a> --></td>
                    </tr>
                    <tr>
                      <td align="left"><!-- <a href="index.php?lang=EN&menu="> -->
                        <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> <a href="introduction.php">ABOUT US </a></font>
                        <!-- </a> --></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><!-- <a href="index.php?lang=EN&menu="> -->
                        <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Distributor </font>
                        <!-- </a> --></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><!-- <a href="index.php?lang=EN&menu="> -->
                        <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> <a href="#">Terms &amp; Conditions </a></font>
                        <!-- </a> --></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="sitemap.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Sitemap </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                  </tbody>
                </table></td>
                <td valign="top"><table width="235">
                  <tbody>
                    <tr>
                      <td><h2 class="sitemap-header">Our Product</h2>                        <!-- </a> --></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><!-- <a href="index.php?lang=EN&menu="> -->
                        <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> <a href="product.php?vehicle_type=1">Motorcycle</a></font>
                        <!-- </a> --></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><!-- <a href="index.php?lang=EN&menu="> -->
                        <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> <a href="product.php?vehicle_type=3">Scooter</a></font>
                        <!-- </a> --></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><!-- <a href="index.php?lang=EN&menu="> -->
                        <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> <a href="product-list.php?vehicle_type=2">Quad</a></font>
                        <!-- </a> --></td>
                    </tr>
                    
                    <tr>
                      <td align="left"><!-- <a href="index.php?lang=EN&menu="> -->
                        <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> <a href="product.php?vehicle_type=5">CAR</a></font>
                        <!-- </a> --></td>
                    </tr>
                    
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><!-- <a href="index.php?lang=EN&menu="> -->
                        <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> <a href="product.php?vehicle_type=4">Special Purpose </a></font>
                        <!-- </a> --></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                  </tbody>
                </table></td>
                <td valign="top"><table width="235">
                  <tbody>
                    <tr>
                      <td><a href="#" class="link-style-01">
                        <h2 class="sitemap-header">Customer Service</h2>
                      </a><!-- </a> --></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="product-code.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> Product Code  </a></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="spring-code.php"><img src="images/sitemap_icon.png" border="0" align="absmiddle"> Spring Code </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="warranty.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Warranty </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="contactus.php"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Contact Us </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                    <tr>
                      <td align="left"><a href="contactus.php?r=distributors"> <img src="images/sitemap_icon.png" border="0" align="absmiddle"> <font color="#000000" class="style13"> Distributors </font> </a></td>
                    </tr>
                    <tr>
                      <td background="images/sitemap_line.png" height="2"></td>
                    </tr>
                  </tbody>
                </table></td>
              </tr>
              <tr>
                <td colspan="4" height="30"></td>
              </tr>
              <!-- ROWS 3 -->
              <!--
            <tr>
                <td valign="top">
                    <table width="235">
                        <tr>
                            <td>
                                &nbsp;&nbsp;
                                <a href="index.php?lang=EN&menu=">
                                    <font color="#FFFFFF" class="style13B">
                                        INFORMATION                                    </font>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td align="left">
                                <a href="index.php?lang=EN&menu=index">
                                    <img src="images/sitemap_icon.png" border="0" align="absmiddle" />
                                    <font color="#000000" class="style13">
                                        About Us                                       </font>
                                </a>                            
                            </td>
                        </tr>
                        <tr>
                            <td background="images/sitemap_line.png" height="2"></td>
                        </tr>
                        <tr>
                            <td align="left">
                                <a href="index.php?lang=EN&menu=index">
                                    <img src="images/sitemap_icon.png" border="0" align="absmiddle" />
                                    <font color="#000000" class="style13">
                                        Shipping Information                                    </font>
                                </a>                            
                            </td>
                        </tr>
                        <tr>
                            <td background="images/sitemap_line.png" height="2"></td>
                        </tr>
                        <tr>
                            <td align="left">
                                <a href="index.php?lang=EN&menu=index">
                                    <img src="images/sitemap_icon.png" border="0" align="absmiddle" />
                                    <font color="#000000" class="style13">
                                        Privacy Policy                                    </font>
                                </a>                            
                            </td>
                        </tr>
                        <tr>
                            <td background="images/sitemap_line.png" height="2"></td>
                        </tr>
                        <tr>
                            <td align="left">
                                <a href="index.php?lang=EN&menu=index">
                                    <img src="images/sitemap_icon.png" border="0" align="absmiddle" />
                                    <font color="#000000" class="style13">
                                        Terms & Conditions                                    </font>
                                </a>                            
                            </td>
                        </tr>
                        <tr>
                            <td background="images/sitemap_line.png" height="2"></td>
                        </tr>
                    </table>                
                </td>
                
                <td valign="top">
                    <table width="235">
                        <tr>
                            <td>
                                &nbsp;&nbsp;
                                <a href="index.php?lang=EN&menu=">
                                    <font color="#FFFFFF" class="style13B">
                                        OUR PRODUCTS                                    </font>
                                </a>
                            </td>
                        </tr>
                                                
                        <tr>
                            <td align="left">
                                <a href="#">
                                    <img src="images/sitemap_icon.png" border="0" align="absmiddle" />
                                    <font color="#000000" class="style15">
                                        Scooter                                    </font>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td background="images/sitemap_line.png" height="2"></td>
                        </tr>
                                                
                        <tr>
                            <td align="left">
                                <a href="#">
                                    <img src="images/sitemap_icon.png" border="0" align="absmiddle" />
                                    <font color="#000000" class="style15">
                                        Motorcycle                                    </font>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td background="images/sitemap_line.png" height="2"></td>
                        </tr>
                                                
                        <tr>
                            <td align="left">
                                <a href="#">
                                    <img src="images/sitemap_icon.png" border="0" align="absmiddle" />
                                    <font color="#000000" class="style15">
                                        Bigbike                                    </font>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td background="images/sitemap_line.png" height="2"></td>
                        </tr>
                                                
                        <tr>
                            <td align="left">
                                <a href="#">
                                    <img src="images/sitemap_icon.png" border="0" align="absmiddle" />
                                    <font color="#000000" class="style15">
                                        Trucks                                    </font>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td background="images/sitemap_line.png" height="2"></td>
                        </tr>
                         
                    </table>                
                </td>
                 
                <td valign="top">
                    <table width="235">
                        <tr>
                            <td>
                                &nbsp;&nbsp;
                                <a href="index.php?lang=EN&menu=contactus">
                                    <font color="#FFFFFF" class="style13B">
                                        CUSTOMER SERVICE                                    </font>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td align="left">
                                <a href="index.php?lang=EN&menu=contactus">
                                    <img src="images/sitemap_icon.png" border="0" align="absmiddle" />
                                    <font color="#000000" class="style13">
                                        Contact Us                                    </font>
                                </a>                            
                            </td>
                        </tr>
                        <tr>
                            <td background="images/sitemap_line.png" height="2"></td>
                        </tr>
                        <tr>
                            <td align="left">
                                <a href="index.php?lang=EN&menu=download-usermanual">
                                    <img src="images/sitemap_icon.png" border="0" align="absmiddle" />
                                    <font color="#000000" class="style13">
                                        User Manual                                    </font>
                                </a>                            
                            </td>
                        </tr>
                        <tr>
                            <td background="images/sitemap_line.png" height="2"></td>
                        </tr>
                        <tr>
                            <td align="left">
                                <a href="index.php?lang=EN&menu=sitemap">
                                    <img src="images/sitemap_icon.png" border="0" align="absmiddle" />
                                    <font color="#000000" class="style13">
                                        Site Map                                    </font>
                                </a>                            
                            </td>
                        </tr>
                        <tr>
                            <td background="images/sitemap_line.png" height="2"></td>
                        </tr>                                                
                    </table>                
                </td>                                              
            </tr>
            -->
            </tbody>
          </table>
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
