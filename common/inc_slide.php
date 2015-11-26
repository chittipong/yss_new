<?php
//GET SLIDE===================================
	$sql_slide="SELECT * FROM yss_slide WHERE slide_name='main' ORDER BY sort_order ASC";
	$rs=mysqli_query($conn,$sql_slide);
?>
<div class="header" style="background:#000">
 		<?php include ("common/inc_socialmedia.php");?>   
    <!-- header slider -->
    <div class="fullwidthbanner-container"> 
		<div class="fullwidthbanner">
        	<ul>
            <?php 
				while($data=mysqli_fetch_assoc($rs)){
					$slide_pic=$data['pic'];
					$slide_header=$data['header'];
					$slide_title=$data['title'];
					$slide_link=$data['link'];
			?>
				<li data-transition="fade" data-slotamount="7" data-masterspeed="500">
					<img src="images/slides/<?php echo $slide_pic ?>" data-fullwidthcentering="on">
                    
                    <div class="caption sft text_line" data-x="10" data-y="190" data-speed="900" data-start="800" data-easing="easeOutExpo"></div>
                    <div class="caption sfb text_line" data-x="10" data-y="300" data-speed="900" data-start="800" data-easing="easeOutExpo"></div>
					<div class="caption sfl white_text big_title" data-x="10" data-y="220" data-speed="900" data-start="500" data-easing="easeOutExpo">
                         <a href="<?php echo $slide_link ?>"><strong class="yssfont01"><?php echo $slide_header ?></strong></a>
                    </div>
                    <div class="caption sfr white_text subtitle" data-x="10" data-y="257" data-speed="900" data-start="700" data-easing="easeOutExpo">
                         <span  class="yssfont01"><?php echo $slide_title ?></span>
                    </div>
				</li>
             <?php } ?>
            </ul>
        </div>          
	</div>
    
    <script>


		jQuery(document).ready(function($) {

			if ($.fn.cssOriginal!=undefined)
				$.fn.css = $.fn.cssOriginal;

			$('.fullwidthbanner').revolution({
					delay:5000,
					startwidth:950,
					startheight:617,

					onHoverStop:"off",						// Stop Banner Timet at Hover on Slide on/off
					hideThumbs:0,
					navigationType:"bullet",				// bullet, thumb, none
					navigationArrows:"none",				// nexttobullets, solo (old name verticalcentered), none

					navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom
					
					navigationHAlign:"center",				// Vertical Align top,center,bottom
					navigationVAlign:"bottom",				// Horizontal Align left,center,right
					navigationHOffset:0,
					navigationVOffset:23,

					touchenabled:"on",						// Enable Swipe Function : on/off

					stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
					stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

					hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
					hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
					hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value

					fullWidth:"on",
					shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

				});
			});
	</script>
    <!--/ header slider -->

</div>