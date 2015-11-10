<?php
//GET SHOT WORD==========================
	$txt_view_bigermap=$myFn->getWord($conn,'view_biger_map',$lang);
	$txt_aboutus=$myFn->getWord($conn,'aboutus',$lang);
	$txt_services=$myFn->getWord($conn,'services',$lang);
	$txt_headoffice=$myFn->getWord($conn,'headoffice',$lang);
?>
<?php
//GET DATA=========================
$sql="SELECT * FROM yss_config WHERE id='1' LIMIT 1";
	$rs=mysqli_query($conn,$sql);
	$data=mysqli_fetch_assoc($rs);
	
	if($lang=='TH'){
		$yss_address=$data['address_th'];
		$yss_district=$data['district_th'];
		$yss_province=$data['province_th'];
		$yss_zipcode=$data['zipcode'];
		$yss_work_hour=$data['work_hour_th'];
	}
	if($lang=='EN'){
		$yss_address=$data['address_en'];
		$yss_district=$data['district_en'];
		$yss_province=$data['province_en'];
		$yss_zipcode=$data['zipcode'];
		$yss_work_hour=$data['work_hour_en'];
	}
	
		$yss_tel1=$data['tel1'];
		$yss_tel2=$data['tel2'];
		$yss_fax1=$data['fax1'];
		$yss_sale_mail=$data['sale_mail'];
?>

<div class="footer">
	<div class="container clearfix">
    
		<div class="f_col f_col_1">  
            <h3><?php echo $txt_aboutus ?>:</h3>
            <ul>
                <li><a href="introduction.php"><span><?php echo $menu_introduct ?></span></a></li> 
                <li><a href="rnd.php"><span><?php echo $menu_rnd ?></span></a></li>
                <li><a href="quality.php"><span><?php echo $menu_quality ?></span></a></li>
                <li><a href="csr.php"><span><?php echo $menu_csr ?></span></a></li>
                <li><a href="award.php"><span><?php echo $menu_award ?></span></a></li>                               
            </ul>
        </div>
        <!--/ footer col 1 -->
        
        <div class="f_col f_col_2">        	
			<h3><?php echo $txt_services ?>:</h3>
            <ul>
                <li><a href="product.php"><span><?php echo $menu_product ?></span></a></li>
                <li><a href="news.php"><span><?php echo $menu_news ?></span></a></li>
                <li><a href="services.php"><span><?php echo $menu_custservice ?></span></a></li> 
                <li><a href="setup-install.php"><span><?php echo $menu_setup ?></span></a></li>
                <li><a href="warranty.php"><span><?php echo $menu_warranty ?></span></a></li>
                <li><a href="download.php"><span><?php echo $menu_download ?></span></a></li>
            </ul>
        </div>
        <!--/ footer col 2 -->
        
        <div class="f_col f_col_3">        	
            <h3></h3>
            <ul>
            	<li><a href="support.php"><span><?php echo $menu_support ?></span></a></li>
                <li><a href="product-code.php"><span><?php echo $menu_pdCode ?></span></a></li>
                <li><a href="spring-code.php"><span><?php echo $menu_spCode ?></span></a></li>
                <li><a href="#"><span><?php echo $menu_policy ?></span></a></li> 
                <li><a href="faq.php"><span><?php echo $menu_faq ?></span></a></li>
                <li><a href="sitemap.php"><span><?php echo $menu_sitemap ?></span></a></li>
            </ul>
        </div>        
        <!--/ footer col 3 -->
        
        <div class="f_col f_col_4">   
           	<h3><?php echo $txt_headoffice ?></h3>
            <div class="footer_address">
                <div class="address">
	                <?php echo $yss_address ?>
					<?php echo $yss_district ?>
                    <?php echo $yss_province ?>
                    <?php echo $yss_zipcode ?>
                </div>
                <div class="hours">
                	<?php echo $yss_work_hour ?>
				</div>
                <a href="contactus.php" class="notice"><?php echo $txt_view_bigermap ?></a>
            </div>
            <div class="footer_map" style="background:url(images/temp/footer_map.jpg);"><a href="contactus.php" class="amap"></a></div>
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
        	<span class="phone"><?php echo $yss_tel1 ?>, <?php echo $yss_tel2 ?> </span>
            <span class="email"><?php echo $yss_sale_mail ?></span>
        </div>
        
        <div class="copyright">
        	Y.S.S (THAILAND) Company Limited.  &nbsp;|&nbsp;  THAILAND
        </div>
        	        
    </div> 
</div>