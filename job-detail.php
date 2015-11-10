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
	$page_title=$myFn->getPageInfo($conn,'title','joinus',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','joinus',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','joinus',$lang);

//GET SHOT WORD==========================
	$txt_jobdetail=$myFn->getWord($conn,'job_detail',$lang);
	
	
//GET JOB DETAIL==========================
	$rid=isset($_GET['id']) ? $_GET['id']:null;
	
	if(!empty($rid)){
		$sql="SELECT * FROM yss_jobs WHERE id='$rid'";
		$rs=mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($rs);
			$job_id=$data['id'];
			$job_position=$data['job_position'];
			$job_sex=$data['sex'];
			$job_age=$data['age'];
			$job_qty=$data['qty'];
			$job_exp=$data['exp'];
			$job_desc=$data['job_description'];
			$job_edu=$data['education'];
			$job_salary=$data['salary'];
			
			$contact_name=$data['contact_name'];
			$contact_mail=$data['contact_email'];
			$contact_tel=$data['contact_tel'];
			$date_create=$data['date_create'];
			
			if($job_sex=='both'){
					$job_sex="ชาย-หญิง";
			}
			if($job_sex=='male'){
					$job_sex="ชาย";
			}
			
			if($job_sex=='female'){
					$job_sex="หญิ";
			}
	}else{
		echo "Cannot get reference ID.";
	}
?>

<?php
	  //SET TABLE HEADER CHANGE BY LANGAUGE=======
		  if($lang=="EN"){
			  
			  $txt_position="Position";
			  $txt_qty="Qty.";
			  $txt_sex="Sex";
			  $txt_age="Age";
			  $txt_edu="Education";
			  $txt_salary="Salary";
			  $txt_contact_name="Cantact Name";
			  $txt_contact_tel="Tel";
			  $txt_contact_mail="email";
			  
			  $txt_desc="Description";
			  $txt_exp="Experience";
			  
			  $txt_year="ํำYears";
			  
		  }else{
			  $txt_position="ตำแหน่ง";
			  $txt_qty="จำนวน.";
			  $txt_sex="เพศ";
			  $txt_age="อายุ";
			  $txt_edu="การศึกษา";
			  $txt_salary="เงินเดือน";
			  
			  $txt_year="ปี";
			  
			  $txt_contact_name="ติดต่อที่";
			  $txt_contact_tel="โทร";
			  $txt_contact_mail="อีเมล์";
			  
			  $txt_desc="รายละเอียด";
			  $txt_exp="ประสบการณ์";
		  }
	  //END***=====================================
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
		
<div class="header header_thin" style="background-image:url(images/contents/joinus.jpg)">
	<!--<div class="header_title">
    	<h1 class="yssfont01"><span><?php //echo $txt_headpage ?> </span></h1>
    </div>-->
</div>

	<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index.php" hidefocus="true" style="outline: none;">Home</a>  
        <span class="separator">›</span>
        <a href="joinus.php" hidefocus="true" style="outline: none;">Join Us</a>  
        
        <span class="separator">›</span><span class="current">Detail</span></p>
    </div>
</div>
<!--/ breadcrumbs -->


<!-- middle -->   
<div id="middle" class="full_width">
	<div class="container clearfix">  
        
        <div class="styled_table table_red">
        <h1 class="yssfont01 head-style-01">
            <span style="float:left;"><img src="images/box-header-01.png"></span>
            <div class="middle"><?php echo $txt_jobdetail ?></div>
            <span><img src="images/box-header-02.png"></span>
        </h1>       
          
         
          <div class="tabs_framed small_tabs">
                    <ul class="tabs">
                        <li class="current"><a href="#tabs_2_1" hidefocus="true" style="outline: none;">Position: <?php echo $job_position ?></a></li>
                    </ul>
                    <div id="tabs_2_1" class="tabcontent" style="display: block;">
                   	  <div class="inner">
                       	<p>
                        <table>
                 
                            <tr class="odd">
                                <td width="18%" align="right"><strong><?php echo $txt_position ?></strong></td>
                                <td width="82%"><?php echo $job_position ?></td>
                            </tr>
                            <tr>
                              <td align="right"><strong><?php echo $txt_qty ?></strong></td>
                              <td><?php echo $job_qty ?></td>
                            </tr>
                            <tr class="odd">
                              <td align="right"><strong><?php echo $txt_sex ?></strong></td>
                              <td><?php echo $job_sex ?></td>
                            </tr>
                            <tr>
                                <td width="18%" align="right"><strong><?php echo $txt_age ?></strong></td>
                                <td width="82%"><?php echo $job_age ?> <?php echo $txt_year ?></td>
                            </tr>
							<tr class="odd">
                              <td align="right"><strong><?php echo $txt_edu ?></strong></td>
                              <td><?php echo $job_edu ?></td>
                            </tr>
                            <tr>
                              <td align="right"><strong><?php echo $txt_exp ?></strong></td>
                              <td><?php echo $job_exp ?></td>
                            </tr>
                            <tr class="odd">
                              <td align="right"><strong><?php echo $txt_desc ?></strong></td>
                              <td><?php echo $job_desc ?></td>
                            </tr>
                            <tr>
                              <td align="right"><strong><?php echo $txt_salary ?></strong></td>
                              <td><?php echo $job_salary ?></td>
                            </tr>
                        </table>
                        </p>
                        </div>
                    </div>

                </div>   
                    
          </div>  
          
          <div class="styled_table table_red">
              <div class="tabs_framed small_tabs">
                        <ul class="tabs">
                            <li class="current"><a href="#tabs_2_2" hidefocus="true" style="outline: none;">สนใจติดต่อ<?php //echo $job_position ?></a></li>
                        </ul>
                        <div id="tabs_2_1" class="tabcontent" style="display: block;">
                          <div class="inner">
                          <h4>คุณ <?php echo $contact_name ?> Tel: <?php echo $contact_tel ?> Email: <?php echo $contact_mail ?></h4>
                            
                            </div>
                        </div>
                    </div><!--End tab--> 
                    </div>
          </div>   
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
