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
	$page_title=$myFn->getPageInfo($conn,'title','joinus',$lang);
	$page_keyword=$myFn->getPageInfo($conn,'keyword','joinus',$lang);
	$page_desc=$myFn->getPageInfo($conn,'description','joinus',$lang);

//GET SHOT WORD==========================
	$txt_headpage=$myFn->getWord($conn,'joinus',$lang);
	$txt_jobvacancies=$myFn->getWord($conn,'job_vacancies',$lang);
	
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
    	<h1 class="yssfont01"><span><?php echo $txt_headpage ?> </span></h1>
    </div>-->
</div>

	<!-- breadcrumbs -->
<div class="middle_row row_white breadcrumbs">
    <div class="container">
        <p><a href="index.php">Home</a>  <span class="separator">&rsaquo;</span><span class="current">Join Us</span></p>
    </div>
</div>
<!--/ breadcrumbs -->


<!--=========================START GET AND DISPLAY CONTENT=================================-->
<?php
//GET CONTENT BY LANGUAGE================
	if($lang=='TH'){
		$sql="SELECT *  FROM yss_content WHERE lang='TH' AND page='22' ORDER BY sort_order ASC";
	}
	if($lang=='EN'){
		$sql="SELECT *  FROM yss_content WHERE lang='EN' AND page='22' ORDER BY sort_order ASC";
	}else{
		$sql="SELECT *  FROM yss_content WHERE lang='TH' AND page='22' ORDER BY sort_order ASC";
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
		  </div>                
        </div>
        <!--/ content -->
        
        <div class="styled_table table_red">
        
        <h1 class="yssfont01 head-style-01">
            <span style="float:left;"><img src="images/box-header-01.png"></span>
            <div class="middle"><?php echo $txt_jobvacancies ?></div>
            <span><img src="images/box-header-02.png"></span>
        </h1>

        <?php
			//SET TABLE HEADER CHANGE BY LANGAUGE=======
				if($lang=="EN"){
					$txt_posion="Position";
					$txt_qty="Qty.";
					$txt_sex="Sex";
					$txt_age="Age";
					$txt_edu="Education";
					$txt_salary="Salary";
				}else{
					$txt_posion="ตำแหน่ง";
					$txt_qty="จำนวน.";
					$txt_sex="เพศ";
					$txt_age="อายุ";
					$txt_edu="การศึกษา";
					$txt_salary="เงินเดือน";
				}
			//END***=====================================
		?>
                    <table>
                        <thead>
                            <tr>
                            	<th style="width:10%">No.</th>
                                <th style="width:20%"><?php echo $txt_posion ?></th>
                                <th style="width:10%"><?php echo $txt_qty ?></th>
                                <th style="width:15%"><?php echo $txt_sex ?></th>
                                <th style="width:15%"><?php echo $txt_age ?></th>
                                <th style="width:25%"><?php echo $txt_edu ?></th>
                                <th style="width:10%"><?php echo $txt_salary ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
							$sql="SELECT * FROM yss_jobs WHERE enable='Y' AND lang='$lang' ORDER BY sort_order";
							
							//$sql2="SELECT * FROM jobs";
							$rs2=mysqli_query($conn,$sql)or die(mysqli_error());
							
							$n=mysqli_num_rows($rs2);
							//echo $n;
							
							if($n>0){
							$no=1;
								while($data2=mysqli_fetch_assoc($rs2)){
									$job_id=$data2['id'];
									$job_position=$data2['job_position'];
									$job_qty=$data2['qty'];
									$job_sex=$data2['sex'];
									$job_age=$data2['age'];
									$job_edu=$data2['education'];
									$job_salary=$data2['salary'];
									
									
									if($job_sex=='both'){
										if($lang=="EN"){
											$job_sex="Both";
										}else{
											$job_sex="ชาย-หญิง";
										}
									}
									if($job_sex=='male'){
										if($lang=="EN"){
											$job_sex="Male";
										}else{
											$job_sex="ชาย";
										}	
									}
									
									if($job_sex=='female'){
										if($lang=="EN"){
											$job_sex="Female";
										}else{
											$job_sex="หญิง";
										}
									}
									
						?>
                            <tr>
                            	<td><?php echo $no ?></td>
                                <td><?php echo "<a href='job-detail.php?id=$job_id'>$job_position</a>" ?></td>
                           		<td><?php echo $job_qty ?></td>
                                <td><?php echo $job_sex ?></td>
                                <td><?php echo $job_age ?></td>
                                <td><?php echo $job_edu ?></td>
                                <td><?php echo $job_salary ?></td>
                            </tr>
                        <?php $no++; } }//end if***?> 
                        </tbody>
                    </table>
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
