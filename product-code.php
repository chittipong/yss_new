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
	$page_title=$myFn->getPageInfo($conn,'title','product_code',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','product_code',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','product_code',$lang);

//GET SHOT WORD==========================
	$txt_pdcode=$myFn->getWord($conn,'product_code',$lang);
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
    	<h1 class="yssfont01"><span><?php echo $txt_pdcode ?></span></h1>
    </div>
</div>

	<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><span class="current">Product Code</span></p>
    </div>
</div>
<!--/ breadcrumbs -->


<!--CONTENT-->
<!-- middle -->   
<div id="middle" class="full_width">
	<div class="container clearfix">  
    
		<!-- content -->
        <div class="content">
        	<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr>
        <td height="5"></td>
    </tr>
    <tr>
        <td align="center" colspan="3" valign="top">&nbsp;</td>
    </tr>
    <tr>
        <td height="5"></td>
    </tr>    
    <tr>
        <td align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="99%">
                <tbody><tr>
                    <td align="right" width="200">
                        <font color="#000000" class="styleDialogboxTitle20">
                            <span class="yssfont01"><strong>PRODUCT CODE</strong></span>                        </font>                    
                    </td>
                    <td width="20"></td>
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center" width="30"></td>
                                    
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>                                        
                    <td align="center">
                        <img src="images/product_code/text_line_x.png" border="0">
                    </td>
                    
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center" width="30"></td>
                                        
                                 
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/text_line_x.png" border="0">
                    </td>                    
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>          
                    <td align="center">
                        <img src="images/product_code/text_x.png" border="0">
                    </td>                                                                                                                                                                                                                                              
                </tr>
                
                <tr>
                    <td align="right" width="200">
                        <span class="yssfont01" style="color:red;">DIGIT</span>        
                    </td>
                    <td width="20"></td>
                    <td align="center">
                        <img src="images/product_code/1.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/2.png" border="0">
                    </td>
                    <td align="center" width="30"></td>
                                    
                    <td align="center">
                        <img src="images/product_code/3.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/4.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/5.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/6.png" border="0">
                    </td>                                        
                    <td align="center">
                        <img src="images/product_code/7.png" border="0">
                    </td>
                    
                    <td align="center">
                        <img src="images/product_code/8.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/9.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/10.png" border="0">
                    </td>
                    <td align="center" width="30"></td>
                                        
                                 
                    <td align="center">
                        <img src="images/product_code/11.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/12.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/13.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/14.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/15.png" border="0">
                    </td>                    
                    <td align="center">
                        <img src="images/product_code/16.png" border="0">
                    </td>
                    <td align="center">
                        <img src="images/product_code/17.png" border="0">
                    </td>          
                    <td align="center">
                        <img src="images/product_code/18.png" border="0">
                    </td>                                                                                                                                                                                                                                              
                </tr>                
            </tbody></table>
        </td>       
    </tr>
    <tr>
        <td height="30"></td>
    </tr>
    <tr>
        <td align="center">
        <table border="0" cellpadding="0" cellspacing="0" width="99%">
            <tbody><tr>
                <td width="790" align="center">
                    <img src="images/product_code/support_productcode_12.png" border="0" width="770" height="739">    
                </td>
                <td bgcolor="red" width="151" valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody><tr>
                            <td align="center">
                                <font color="#FFFFFF" class="styleDialogboxTitle30">
                                EXAMPLES
                                </font>
                            </td>
                        </tr>
                                        
                         
                        
                        <!--        
                        <tr>
                            <td align="center">
                                <img src="images/product_code/product_code_01.png" border="0" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <img src="images/product_code/product_code_02.png" border="0" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <img src="images/product_code/product_code_03.png" border="0" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <img src="images/product_code/product_code_04.png" border="0" />
                            </td>
                        </tr>
                        -->
                        
                        <tr>
                            <td bgcolor="red" height="20"></td>
                        </tr>                                               
                    </tbody></table>
                </td>
                
            </tr>
        </tbody></table>
        </td>
    </tr>
    <tr>
        <td height="20" bgcolor="#FFFFFF"></td>
    </tr>
    <tr>
        <td align="center" colspan="3" bgcolor="#FFFFFF">
            <table border="0" cellpadding="0" cellspacing="0" width="99%"> 
                <tbody><tr>
                    <td width="50"></td>
                    <td align="left" valign="top">
                        <a href="document/support/" target="_blank">
                            <font color="red" class="style17B">
                                Click Download File PDF
                            </font>
                        </a>
                    </td>
                    <td align="right">
                        <table border="0" cellpadding="0" cellspacing="0"> 
                            
        </table><table width="540" border="0" align="right" cellpadding="0" cellspacing="0">
            <tbody><tr>
                <td align="center">
                    <a href="index.php?lang=EN&amp;menu=aboutus_vbsc">
                        <img src="images/standard/logo_vbsc.png" border="0" width="124" height="45">
                    </a>
                </td>
                <td align="center">
                    <a href="index.php?lang=EN&amp;menu=aboutus_wsc">
                        <img src="images/standard/logo_vvsc.png" border="0" width="124" height="45">
                    </a>
                </td>
                <td align="center">                     
                    <img src="images/yss_hotline.png" border="0" width="166" height="45">
                </td>
                <td align="center">
                    <img src="images/logo_abe_footer.png" border="0" width="44" height="45">
                </td>
                <td align="center">                    
                    <img src="images/standard/logo_cert_footer.png" border="0" width="82" height="45"></td>
            </tr>
        </tbody></table>                        
                        </td></tr></tbody></table>
                    </td>
            </tr>
            </tbody></table>
            </div>
        <!--/ content -->
    </div>
</div>
<!--/ middle -->
<!--END CONTENT-->

<!-- Footer-->
<?php include ("common/inc_footer.php");?>
<!-- /Footer-->

</div>
</body>
</html>
