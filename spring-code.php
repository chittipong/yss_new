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
	$page_title=$myFn->getPageInfo($conn,'title','spring_code',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','spring_code',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','spring_code',$lang);

//GET SHOT WORD==========================
	$txt_spcode=$myFn->getWord($conn,'springcode',$lang);
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
    	<h1 class="yssfont01"><span><?php echo $txt_spcode ?></span></h1>
    </div>
</div>

	<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><span class="current"></span></p>
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
    <tr bgcolor="#FFFFFF">
      <td colspan="3" align="center" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="3" align="center" valign="top" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" width="99%">
        <tbody>
          <tr>
            <td align="right" width="200"><span class="yssfont01"><strong>SPRING CODE</strong></span></td>
            <td width="20"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_line_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_line_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_line_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_line_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_line_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
            <td align="center"><img src="images/spring_code/text_x.png" border="0"></td>
          </tr>
          <tr>
            <td align="right" width="200"><font color="red" class="styleDialogboxTitle20 yssfont01"> <strong>DIGI</strong></font></td>
            <td width="20"></td>
            <td align="center" colspan="2"><img src="images/spring_code/number_I.png" border="0"></td>
            <td></td>
            <td align="center" colspan="2"><img src="images/spring_code/number_II.png" border="0"></td>
            <td></td>
            <td align="center" colspan="2"><img src="images/spring_code/number_III.png" border="0"></td>
            <td></td>
            <td align="center" colspan="2"><img src="images/spring_code/number_IIII.png" border="0"></td>
            <td></td>
            <td align="center" colspan="2"><img src="images/spring_code/number_V.png" border="0"></td>
            <td></td>
            <td align="center" colspan="3"><img src="images/spring_code/number_VI.png" border="0"></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="30"></td>
    </tr>
    <tr>
      <td height="616" align="center" bgcolor="#FFFFFF">
        <img src="images/spring_code/spring_code.png" border="0" width="1143" height="616">    
        </td>
    </tr>
    <tr>
      <td colspan="3" align="right" bgcolor="#FFFFFF">
        <table border="0" cellpadding="0" cellspacing="0" width="620"> 
          
          </table><table width="683" border="0" align="right" cellpadding="0" cellspacing="0">
            <tbody><tr>
              <td width="124" align="center" bgcolor="#FFFFFF">
                <a href="index.php?lang=TH&amp;menu=aboutus_vbsc">
                  <img src="images/standard/logo_vbsc.png" border="0" width="124" height="45">
                  </a>
                </td>
              <td width="124" align="center" bgcolor="#FFFFFF">
                <a href="index.php?lang=TH&amp;menu=aboutus_wsc">
                  <img src="images/standard/logo_vvsc.png" border="0" width="124" height="45">
                  </a>
                </td>
              <td width="309" align="center" bgcolor="#FFFFFF">                     
                <img src="images/yss_hotline.png" border="0" width="206" height="52">
                </td>
              <td width="44" align="center">
                <img src="images/logo_abe_footer.png" border="0" width="44" height="45">
                </td>
              <td width="82" align="center">                    
                <img src="images/standard/logo_cert_footer.png" border="0" width="82" height="45"></td>
              </tr>
          </tbody></table></td></tr>
    <tr>
      <td colspan="3" align="right" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    </tbody>
       	  </table>
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
