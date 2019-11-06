           <!-- Footer -->
           <footer class="youplay-footer youplay-footer-parallax">
    
            <div class="image" data-speed="0.4" data-img-position="50% 0%">
                <img src="{{asset('application/public')}}/{{getSettings()->footer_image}}" alt="" class="jarallax-img">
            </div>
        
    
        <div class="wrapper">
    
            
    
            
                <!-- Social Buttons -->
                <div class="social">
                    <div class="container">
                        <h3>{{getSettings()->footer_title}} <strong>{{Str::title(getSettings()->game_name)}}</strong></h3>
    
                        <div class="social-icons">
                            <div class="social-icon">
                                <a href="{{getSettings()->footer_facebook}}">
                                    <i class="fab fa-facebook"></i>
                                    <span>Share on Facebook</span>
                                </a>
                            </div>
                            <div class="social-icon">
                                <a href="{{getSettings()->footer_google}}">
                                    <i class="fab fa-google"></i>
                                    <span>Share on Google</span>
                                </a>
                            </div>
                            <div class="social-icon">
                                <a href="{{getSettings()->footer_youtube}}">
                                    <i class="fab fa-youtube"></i>
                                    <span>Watch on Youtube</span>
                                </a>
                            </div>
                            <div class="social-icon">
                                <a href="{{getSettings()->footer_twiter}}">
                                    <i class="fab fa-twitter-square"></i>
                                    <span>Follow on Twitter</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Social Buttons -->
            
    
            
                <!-- Copyright -->
                <div class="copyright">
                    <div class="container">
                        <p>{{date('Y')}} &copy; <strong>{{Str::title(getSettings()->company_name)}}</strong>. All rights reserved</p>
                    </div>
                </div>
                <!-- /Copyright -->
            
        </div>
    </footer>
    <!-- /Footer -->