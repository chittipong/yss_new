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

<!--/ header -->

<!-- middle -->   
<div id="middle" class="cols2">
	<div class="container clearfix">  
    	
		<!-- content -->
        <div class="content">   
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

<script>
// The following example creates complex markers to indicate beaches near
// Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
// to the base of the flagpole.

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 3,
    center: {lat: 37.14, lng: 4.97}
  });

  setMarkers(map);
}

// Data for the markers consisting of a name, a LatLng and a zIndex for the
// order in which these markers should display on top of each other.
var beaches = [
  ['Thailand', 13.0108223,96.9929662,0],
  ['England', 52.7599637,-6.8102785,0],
  ['Germany', 51.0851254,5.9679745,0],
  ['Spain', 40.1301072, -8.2031357, 0],
  ['Italy', 41.2135432,8.0838556,0]
];

function setMarkers(map) {
  // Adds markers to the map.

  // Marker sizes are expressed as a Size of X,Y where the origin of the image
  // (0,0) is located in the top left of the image.

  // Origins, anchor positions and coordinates of the marker increase in the X
  // direction to the right and in the Y direction down.
  var image = {
    url: '../images/yss_marker_icon3.png',
    // This marker is 20 pixels wide by 32 pixels high.
    size: new google.maps.Size(83, 50),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0),
    // The anchor for this image is the base of the flagpole at (0, 32).
    anchor: new google.maps.Point(0, 32)
  };
  // Shapes define the clickable region of the icon. The type defines an HTML
  // <area> element 'poly' which traces out a polygon as a series of X,Y points.
  // The final coordinate closes the poly by connecting to the first coordinate.
  var shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: 'poly'
  };
  for (var i = 0; i < beaches.length; i++) {
    var beach = beaches[i];
    var marker = new google.maps.Marker({
      position: {lat: beach[1], lng: beach[2]},
      map: map,
      icon: image,
      shape: shape,
      title: beach[0],
      zIndex: beach[3]
    });
  }
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCs1B8Yloku0HD6YUqcEygNBUHSTORvrq0&signed_in=true&callback=initMap"></script>