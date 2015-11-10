<div class="middle_row row_white testimonials">
		<div class="container">
        	
            <div class="slider_container clearfix" id="testimonials">                      	 
                <div class="slider-item">
                    <div class="quote-text">
                    <p><a href="#">AutoTrader</a> team is very proffessional and has found for me the perfect car for my needs. I'll be sure to give them a call whenever I'll be needing a new set of wheels! Highly recommended!</p>
                    </div>
                    <div class="quote-author"><span>BRENT JARVIS</span>, Customer</div>                 
                </div>
                <div class="slider-item">
                    <div class="quote-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div class="quote-author"><span>James Backer</span>, Buyer</div>
                </div>
                <div class="slider-item">
                    <div class="quote-text">
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. We have to say it has made us delighted we chose Medica.</p>
                    </div>
                    <div class="quote-author"><span>Mr. Smith</span>, Partner</div>
                </div>	                        
            </div>
            <a class="prev" id="testimonials_prev" href="#"></a>
            <a class="next" id="testimonials_next" href="#"></a>
            <script>
			jQuery(document).ready(function($) {
				$('#testimonials').carouFredSel({
					next : "#testimonials_next",
					prev : "#testimonials_prev",
					infinite: false,
					items: 1,
					auto: false,
					scroll: {
						items : 1,
						fx: "crossfade",
						easing: "linear",
						duration: 300
					}
				});
			});
            </script>    
            
        </div>
	</div>