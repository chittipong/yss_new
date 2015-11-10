<?php
//GET SLIDE===================================
	$sql_slide="SELECT n.id,n.pic,d.title FROM yss_news n,yss_news_detail d WHERE n.id=d.news_id GROUP BY d.news_id ORDER BY n.date_create ASC";
	$rs=mysqli_query($conn,$sql_slide);
?>

<div class="middle_row latest_offers">
		<div class="container clearfix">         			
        	<h2><?php echo $txt_newsevent ?></h2>
                     
            <a href="news.php" class="link_more"><?php echo $txt_viewall ?></a>
		</div>
            
        <div id="latest_offers">
        	<?php 
				while($data=mysqli_fetch_assoc($rs)){
					$news_id=$data['id'];
					$news_pic=$data['pic'];
					$news_title=$data['title'];
			?>
            <div class="latest_item">
            <a href="news-detail.php?id=<?php echo $news_id ?>"><img src="images/news/<?php echo $news_pic ?>" alt=""></a>
            <a href="news-detail.php?id=<?php echo $news_id ?>"><?php echo $news_title ?></a>
            </div>
            <?php } ?>
            
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