<?php
//GET MENU FOR NAVMENU AND FOOTER LINK=============================
	$menu_index=$myMenu->getMenu('index');
	$menu_aboutus=$myMenu->getMenu('aboutus');
	$menu_contact=$myMenu->getMenu('contactus');
	$menu_introduct=$myMenu->getMenu('introduction');
	$menu_service=$myMenu->getMenu('service');
	$menu_custservice=$myMenu->getMenu('cust_service');
	$menu_csr=$myMenu->getMenu('csr');
	$menu_rnd=$myMenu->getMenu('rnd');
	$menu_quality=$myMenu->getMenu('quality');
	$menu_award=$myMenu->getMenu('award');
	$menu_setup=$myMenu->getMenu('setupinstall');
	$menu_warranty=$myMenu->getMenu('warranty');
	$menu_news=$myMenu->getMenu('newsevent');
	$menu_download=$myMenu->getMenu('download');
	$menu_support=$myMenu->getMenu('support');
	$menu_pdCode=$myMenu->getMenu('productcode');
	$menu_spCode=$myMenu->getMenu('springcode');
	$menu_policy=$myMenu->getMenu('policy');
	$menu_faq=$myMenu->getMenu('faq');
	$menu_sitemap=$myMenu->getMenu('sitemap');
	$menu_product=$myMenu->getMenu('product');
	$menu_joinus=$myMenu->getMenu('joinus');
	$menu_video=$myMenu->getMenu('video');
	$menu_technology=$myMenu->getMenu('technology');
	$ccArray=$myFn->getCcList($conn);							//Get CC
//END===============================================================
?>
<?php
	$txt_viewall=$myFn->getWord($conn,'view_all',$lang);
	$txt_vehicle=$myFn->getWord($conn,'vehicles',$lang);
	$txt_product_range=$myFn->getWord($conn,'product_range',$lang);
	
	$txt_motorcy=$myFn->getWord($conn,'motorcycle',$lang);
	$txt_scooter=$myFn->getWord($conn,'scooter',$lang);
	$txt_quad=$myFn->getWord($conn,'quad',$lang);
	$txt_car=$myFn->getWord($conn,'car',$lang);
	$txt_special_purpose=$myFn->getWord($conn,'special_purpose',$lang);
?>
<?php
//GET SERVICE WELLCOME TEXT=========================
$sql="SELECT * FROM yss_content WHERE specific_name='service_wellcome_txt' AND lang='$lang'";
	$rs=mysqli_query($conn,$sql);
	$data=mysqli_fetch_assoc($rs);
	$svTitle=$data['title'];
	$svDetail=$data['detail'];
?>
<?php
	$queryString = $_SERVER['QUERY_STRING'];					//Get Query string
?>
<nav id="topmenu" class="clearfix">  
            <div id="lang-cn">
                	<a href="change_lang.php?p=<?php echo $_SERVER['PHP_SELF'] ?>&q=<?php echo $queryString ?>&l=TH"><img src="images/flag/th.png"></a>
                    <a href="change_lang.php?p=<?php echo $_SERVER['PHP_SELF'] ?>&q=<?php echo $queryString ?>&l=EN"><img src="images/flag/en.png"></a>
              </div>          
				<ul class="dropdown">    
                	<li class="menu-level-0 current-menu-ancestor"><a href="index.php"><span><?php echo $menu_index ?></span></a>
                    	<ul class="submenu-1">
	                    	<li class="menu-level-1"><a href="sitemap.php"><span><?php echo $menu_sitemap ?></span></a></li>
						</ul>
					</li>                                                                            
					<li class="menu-level-0"><a href="#"><span><?php echo $menu_aboutus ?></span></a>
                    	<ul class="submenu-1">
	                    	<li class="menu-level-1"><a href="introduction.php"><span><?php echo $menu_introduct ?></span></a></li>
                            <li class="menu-level-1"><a href="rnd.php"><span><?php echo $menu_rnd ?></span></a></li>
                            <li class="menu-level-1"><a href="quality.php"><span><?php echo $menu_quality ?></span></a></li>
                            <li class="menu-level-1"><a href="csr.php"><span><?php echo $menu_csr ?></span></a></li>
                            <li class="menu-level-1"><a href="award.php"><span><?php echo $menu_award ?></span></a></li>
						</ul>
                    </li>
                    <li class="menu-level-0 mega-nav"><a href="services.php"><span><?php echo $menu_product ?></span></a>
	                	<ul class="submenu-1">                      	                                                                                                  
	                        <li class="menu-level-1 mega-nav-widget">                            	
	                            <!-- widget text -->
	                            <div class="widget-container widget_text"> 
	                                <h3 class="widget-title"><?php echo $svTitle ?></h3>
	                                <div class="textwidget">
	                                    <p><?php echo $svDetail ?></p>
	                                </div>
	                            </div>
	                            <!--/ widget text -->
	                        </li>	                        
                            <li class="menu-level-1"><a href="#"><span><?php echo $txt_vehicle ?></span></a>
	                            <ul class="submenu-2">                                
	                                <li class="menu-level-2"><a href="product-list.php?vehicle_type=1"><span><?php echo $txt_motorcy ?></span></a></li>
	                                <li class="menu-level-2"><a href="product-list.php?vehicle_type=3"><span><?php echo $txt_scooter ?></span></a></li>
	                                <li class="menu-level-2"><a href="product-list.php?vehicle_type=2"><span><?php echo $txt_quad ?></span></a></li>
	                                <li class="menu-level-2"><a href="product-list.php?vehicle_type=5"><span><?php echo $txt_car ?></span></a></li>
                                    <li class="menu-level-2"><a href="product-list.php?vehicle_type=4"><span><?php echo $txt_special_purpose ?></span></a></li>
	                                <li class="menu-level-2 more-nav"><a href="product-list.php"><span><?php echo $txt_viewall ?></span></a></li>
	                            </ul>
							</li>
	                        <li class="menu-level-1"><a href="#"><span><?php echo $txt_product_range ?></span></a>
	                            <ul class="submenu-2">                                
	                                <li class="menu-level-2"><a href="product-list.php"><span>Racing Product</span></a></li>
	                                <li class="menu-level-2"><a href="product-list.php"><span>Top Line Product</span></a></li>
	                                <li class="menu-level-2"><a href="product-list.php"><span>Eco Line Product</span></a></li>
	                                <li class="menu-level-2"><a href="product-list.php"><span>GAS DTG</span></a></li>
                                    <li class="menu-level-2"><a href="product-list.php"><span>Hydraulic Shock Absorber</span></a></li>
	                            </ul>
							</li>    
                            <li class="menu-level-1"><a href="#"><span></span></a>
	                            <ul class="submenu-2">                                
	                                <li class="menu-level-2"><a href="product-list.php"><span>Front Fork</span></a></li>
	                                <li class="menu-level-2"><a href="product-list.php"><span>Steering Damper</span></a></li>
	                                <li class="menu-level-2"><a href="product-list.php"><span>Accessories</span></a></li>
	                                <li class="menu-level-2 more-nav"><a href="product-list.php"><span><?php echo $txt_viewall ?></span></a></li>
	                            </ul>
							</li>                   	                                                                    
	                    </ul>
	                </li>       
                    
	                <li class="menu-level-0 mega-nav"><a href="#"><span><?php echo $menu_service ?></span></a>
	                	<ul class="submenu-1">                      	                                                                                                  
	                        <li class="menu-level-1 mega-nav-widget">                            	
	                            <!-- widget text -->
	                            <div class="widget-container widget_text"> 
	                                <h3 class="widget-title"><?php echo $svTitle ?></h3>
	                                <div class="textwidget">
	                                    <p><?php echo $svDetail ?></p>
	                                </div>
	                            </div>
	                            <!--/ widget text -->
	                        </li>	                        
                            <li class="menu-level-1"><!--<a href="#"><span>Vehicles</span></a>-->
	                            <ul class="submenu-2">                                
	                                <li class="menu-level-2"><a href="news.php"><span><?php echo $menu_news ?></span></a></li>
	                                <li class="menu-level-2"><a href="product-code.php"><span><?php echo $menu_pdCode ?></span></a></li>
	                                <li class="menu-level-2"><a href="spring-code.php"><span><?php echo $menu_spCode ?></span></a></li>
	                                <li class="menu-level-2"><a href="setup-install.php"><span><?php echo $menu_setup ?></span></a></li>
	                                <li class="menu-level-2"><a href="warranty.php"><span><?php echo $menu_warranty ?></span></a></li>
                                    <li class="menu-level-2"><a href="download.php"><span><?php echo $menu_download ?></span></a></li>
                                    <li class="menu-level-2"><a href="faq.php"><span><?php echo $menu_faq ?></span></a></li>
                                    <li class="menu-level-2"><a href="support.php"><span><?php echo $menu_support ?></span></a></li>
	                                <!--<li class="menu-level-2 more-nav"><a href="product-list.php"><span>view all</span></a></li>-->
	                            </ul>
							</li>                                      
	                    </ul>
	                </li>
                    <!--<li class="menu-level-0"><a href="#"><span>Pages</span></a>
						<ul class="submenu-1">
                        	<li class="menu-level-1"><a href="blog.html"><span>Blog</span></a></li>							
							<li class="menu-level-1"><a href="page-about.html"><span>About Page</span></a></li>
							<li class="menu-level-1"><a href="page-faq.html"><span>FAQ</span></a></li>
                            <li class="menu-level-1"><a href="page-pricing.html"><span>Pricing Page</span></a></li>
                            <li class="menu-level-1"><a href="#"><span>Shortcodes</span></a>
								<ul class="submenu-2">                        		
									<li class="menu-level-2"><a href="shortcodes-buttons.html"><span>Buttons & Lists</span></a></li> 
									<li class="menu-level-2"><a href="shortcodes-text.html"><span>Text & Images</span></a></li>
									<li class="menu-level-2"><a href="shortcodes-charts.html"><span>Charts</span></a></li>  
									<li class="menu-level-2"><a href="shortcodes-columns.html"><span>Columns</span></a></li>
									<li class="menu-level-2"><a href="shortcodes-columns-full.html"><span>Columns full width</span></a></li>
									<li class="menu-level-2"><a href="shortcodes-lightbox.html"><span>Lightbox</span></a></li>
									<li class="menu-level-2"><a href="shortcodes-media.html"><span>Videos & Galleries</span></a></li>
									<li class="menu-level-2"><a href="shortcodes-maps.html"><span>Google Maps</span></a></li>
									<li class="menu-level-2"><a href="shortcodes-tabs.html"><span>Tabs & Toggles</span></a></li>
									<li class="menu-level-2"><a href="shortcodes-tables.html"><span>Boxes & Tables</span></a></li>                            
									<li class="menu-level-2"><a href="shortcodes-typography.html"><span>Typography</span></a></li>
									<li class="menu-level-2"><a href="shortcodes-widgets.html"><span>Custom Widgets</span></a></li>
								</ul>   
							</li>
							<li class="menu-level-1"><a href="blog-sidebar-left.html"><span>Sidebar Left</span></a></li>
							<li class="menu-level-1"><a href="page-404.html"><span>Page 404</span></a></li>
						</ul>
					</li>--> 
                    <li class="menu-level-0"><a href="joinus.php"><span><?php echo $menu_joinus ?></span></a>
					<li class="menu-level-0"><a href="contactus.php"><span><?php echo $menu_contact ?></span></a></li>                                
				</ul>   
			</nav>