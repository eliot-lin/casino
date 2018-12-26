<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>醫療資訊網</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">


		<!-- {{ asset('css/entry/.css') }} -->
		<!-- {{ asset('js/entry/.js') }} -->

        <link rel="stylesheet" href="{{ asset('css/entry/bootstrap.min.css') }}">
		<!-- {{ asset('css/entry/bootstrap.min.css') }} -->
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->
        <!--For Plugins external css-->
        <link rel="stylesheet" href="{{ asset('css/entry/plugins.css') }}" />
		<!-- {{ asset('css/entry/plugins.css') }} -->
		<link rel="stylesheet" href="{{ asset('css/entry/magnific-popup.css') }}">
		<!-- {{ asset('css/entry/magnific-popup.css') }} -->

        <!--Theme custom css -->
        <link rel="stylesheet" href="{{ asset('css/entry/style.css') }}">
		<!-- {{ asset('css/entry/style.css') }} -->

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="{{ asset('css/entry/responsive.css') }} " />
		<!-- {{ asset('css/entry/responsive.css') }} -->

        <script src="{{ asset('js/entry/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
		<!-- {{ asset('js/entry/modernizr-2.8.3-respond-1.4.2.min.js') }} -->
    </head>
    <body>
		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
		 <nav id="main-nav">
            <ul>
                <li><a href="#home"><span>首頁</span></a></li>
                <li><a href="#about"><span>關於我們</span></a></li>
                <li><a href="#features"><span>Features</span></a></li>
                <!-- <li><a href="#team"><span>Our Team</span></a></li> -->
                <li><a href="#testimonial"><span>Testimonial</span></a></li>
                <li><a href="#news"><span>最新文章</span></a></li>
                <li><a href="#contact"><span>聯絡我們</span></a></li>
            </ul>
            <a href="#0" class="cd-close-menu">Close<span></span></a>
        </nav>
		<!-- <body id="bg" background="{{ asset('images/entry/entry.jpg') }}" style="background-size:cover;background-repeat:no-repeat;height:auto;width:100%;"> -->

        <!--Home page style-->
        <header id="home" class="home home-main-content">
			
			<div class="container">
				<div class="row">
				
					<div class="div-menu">
						<header class="cd-header">
							<div id="cd-logo">
								<!-- <a href=""><img src="{{ asset('images/entry/logo.png') }}" alt="Logo"></a> -->
							</div>
							<a class="cd-menu-trigger" href="#main-nav"><span></span></a>
						</header>
					</div>
				
					<div class="home-wrapper">
						<div class="col-sm-6 col-xs-12">
							<div class="home-content">
								<h1><strong>醫療資訊網</strong></h1>
								<p>加入醫療資訊網享受最貼心的照顧</p>
								<div class="more">
									<a href="#">立即加入</a>
								</div>
							</div>
						</div>

							
						<div class="col-sm-6 col-xs-12" >
							<div class="home-photo">
								<!-- <img src="{{ asset('images/entry/new.png') }}" alt="Women" /> -->
							</div>
						</div>
							
					</div>
				</div>
			</div>
			
        </header>

        <!-- Sections -->
        <section id="about" class="about sections">
            <div class="container">
                <!-- Example row of columns -->
				<div class="heading-content text-center">
					<h3>關於我們</h3>
					<img src="{{ asset('images/entry/separator.png') }}" alt="Separator" />
				</div>
                <div class="row">
                    <div class="about-wrapper">
					
                    	<div class="col-sm-4 col-xs-12">
                    		<div class="features-icon">
								<!-- <i class="fa fa-pencil"></i> -->
							</div>
                    		<div class="about-content">
                    			<h5>代掛號<span><i class="fa fa-long-arrow-right"></i></span></h5>
                    			<p>生活忙碌找不到時間到複雜的醫院網站掛號，又不知道自己該掛哪一科。您的健康交給醫療資訊網為您把關！</p>
                    		</div>
                    	</div>
						
						<div class="col-sm-4 col-xs-12">
							<div class="features-icon">
								<!-- <i class="fa fa-pencil"></i> -->
							</div>
                    		<div class="about-content">
                    			<h5>線上諮詢<span><i class="fa fa-long-arrow-right"></i></span></h5>
                    			<p>您有一些健康問題困擾者你，但又不想花時間到醫院一趟看病。那就叫給我們最專業的醫師團隊為您解答。</p>
                    		</div>
                    	</div>
						
						<div class="col-sm-4 col-xs-12">
							<div class="features-icon">
								<!-- <i class="fa fa-pencil"></i> -->
							</div>
                    		<div class="about-content">
                    			<h5>陪診<span><i class="fa fa-long-arrow-right"></i></span></h5>
                    			<p>家中的長輩、小孩，專業的陪診團隊，給您的家人最細膩的照顧。</p>
                    		</div>
                    	</div>
						
                    </div>
                </div>
            </div> <!-- /container -->       
        </section>
		
		<!-- Sections -->
        <section id="features" class="features sections">
            <div class="container">
				<div class="heading-content text-center">
					<h3>選擇我們</h3>
					<img src="{{ asset('images/entry/separator.png') }}" alt="separator" />
				</div>
                <!-- Example row of columns -->
                <div class="row">
                    <div class="features-wrapper">
                    	
							<div class="col-sm-8 col-sm-offset-2 col-xs-12">
							
								<div class="main-features">
									<div class="col-sm-3 col-xs-12">
										<div class="features-icon">
											<i class="fa fa-pencil"></i>
										</div>
									</div>
									<div class="col-sm-9 col-xs-12">	
										<div class="features-details">
											<h5>最快的處理速度</h5>
											<h6>We define the trends. Enough Said!</h6>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
										</div>
									</div>	
								</div>
								
								<div class="main-features">
									<div class="col-sm-3 col-xs-12">
										<div class="features-icon">
											<i class="fa fa-cog"></i>
										</div>
									</div>
									<div class="col-sm-9 col-xs-12">	
										<div class="features-details">
											<h5>最即時</h5>
											<h6>We define the trends. Enough Said!</h6>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
										</div>
									</div>	
								</div>
								
							</div>
						
                    </div>
                </div>
            </div> <!-- /container -->       
        </section>
		
		
        <!-- <section id="achivement" class="achivement">
			<div class="overlay sections">
				<div class="container">
					
					<div class="row">
						<div class="achivement-wrapper">
							<div class="col-sm-8 col-xs-12">
								<div class="achivement-details">
									<h2>益友網 App</h2>
									<p>馬上到App Store 下載</p>
									<div class="more"><a href="#">more</a></div>
								</div>
	
							</div>
							<div class="col-sm-4 col-xs-12">
								<div class="achivement-gallery">
									<img src="{{ asset('images/entry/iphone.png') }}" alt="Gallery Image" />
								</div>
							</div>
						</div>

					</div>
					
					
				</div> 
			</div>		
        </section> -->
		
		<!-- <section id="counterup" class="counterup lightbg sections">
			<div class="container">
				<div class="row">
						<div class="counterup-wrapper">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="counterup">
									<div class="counterup-photo">
										<img src="{{ asset('images/entry/counterup/1.png') }}" alt="counterup" />
									</div>
									<div class="counterup-content">
										<h5 class="count-number">138</h5>
										<h6>醫師</h6>
									</div>
								</div>
							</div>
							
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="counterup">
									<div class="counterup-photo">
										<img src="{{ asset('images/entry/counterup/2.png') }}" alt="counterup" />
									</div>
									<div class="counterup-content">
										<h5 class="count-number">548</h5>
										<h6>專科護理師</h6>
									</div>
								</div>
							</div>
							
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="counterup">
									<div class="counterup-photo">
										<img src="{{ asset('images/entry/counterup/3.png') }}" alt="counterup" />
									</div>
									<div class="counterup-content">
										<h5 class="count-number">254</h5>
										<h6>諮詢次數</h6>
									</div>
								</div>
							</div>
							
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="counterup">
									<div class="counterup-photo">
										<img src="{{ asset('images/entry/counterup/4.png') }}" alt="counterup" />
									</div>
									<div class="counterup-content">
										<h5 class="count-number">435</h5>
										<h6>Drunk coffee</h6>
									</div>
								</div>
							</div>
							
						</div>
					</div>
			</div>
		</section>
		 -->
		
		<!-- Sections -->
       <!--  <section id="team" class="team sections">
            <div class="container">
			
				<div class="heading-content text-center">
					<h3>我們團隊</h3>
					<img src="assets/images/separator.png" alt="separator" />
					<p>orem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
				</div>
				
               
                <div class="row">
					<div class="team-wrapper text-center">
						<div class="col-sm-3 col-xs-12">
							<div class="team-member">
								<div class="team-photo">
									<img src="assets/images/team/1.png" alt="Team Photo" />
								</div>
								
								<div class="team-info">
									<h5>john Doe</h5>
									<h6>Senior Designer</h6>
								</div>
							</div>
						</div>
						
						<div class="col-sm-3 col-xs-12">
							<div class="team-member">
								<div class="team-photo">
									<img src="assets/images/team/2.png" alt="Team Photo" />
								</div>
								
								<div class="team-info">
									<h5>john Doe</h5>
									<h6>Senior Designer</h6>
								</div>
							</div>
						</div>
						
						<div class="col-sm-3 col-xs-12">
							<div class="team-member">
								<div class="team-photo">
									<img src="assets/images/team/3.png" alt="Team Photo" />
								</div>
								
								<div class="team-info">
									<h5>john Doe</h5>
									<h6>Senior Designer</h6>
								</div>
							</div>
						</div>
						
						<div class="col-sm-3 col-xs-12">
							<div class="team-member">
								<div class="team-photo">
									<img src="assets/images/team/4.png" alt="Team Photo" />
								</div>
								
								<div class="team-info">
									<h5>john Doe</h5>
									<h6>Senior Designer</h6>
								</div>
							</div>
						</div>
						
					</div>
                </div>
            </div>  
        </section> -->
		
	<!-- 
        <section id="video" class="video">
            <div class="overlay2 sections">
                <div class="container text-center">
                  
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                            <div class="video-content">

                                <a href="http://www.youtube.com/embed/ee1_2gA8UZY?autoplay=1&amp;.)wmode=opaque&amp;.)fs=1" class="youtube-media"><i class="fa fa-play"></i></a>

                            </div>
                        </div>
                    </div>
                </div> 
            </div>		
        </section> -->
		
		<!-- 合作廠商 -->
		<!-- <section id="brand" class="brand">
			<div class="container-fluid">
				<div class="row">
					<div class="brand-wrapper">
						<div class="col-md-2 col-sm-6 col-xs-12 no-padding">
							<div class="brand-logo"><img src="assets/images/brand-logo/1.png" alt="Brand Logo" /></div>
						</div>
						
						<div class="col-md-2 col-sm-6 col-xs-12 no-padding">
							<div class="brand-logo"><img src="assets/images/brand-logo/2.png" alt="Brand Logo" /></div>
						</div>
						
						<div class="col-md-2 col-sm-6 col-xs-12 no-padding">
							<div class="brand-logo"><img src="assets/images/brand-logo/3.png" alt="Brand Logo" /></div>
						</div>
						
						<div class="col-md-2 col-sm-6 col-xs-12 no-padding">
							<div class="brand-logo"><img src="assets/images/brand-logo/4.png" alt="Brand Logo" /></div>
						</div>
						
						<div class="col-md-2 col-sm-6 col-xs-12 no-padding">
							<div class="brand-logo"><img src="assets/images/brand-logo/5.png" alt="Brand Logo" /></div>
						</div>
						
						<div class="col-md-2 col-sm-6 col-xs-12 no-padding">
							<div class="brand-logo"><img src="assets/images/brand-logo/6.png" alt="Brand Logo" /></div>
						</div>
						
					</div>
				</div>
			</div>
		</section> -->
		
		<!-- Sections -->
        <section id="testimonial" class="testimonial">
            <div class="container text-center">
                <!-- Example row of columns -->
                <div class="row">

                    <div class="col-sm-12 col-xs-12">

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">

                                <div class="item active">

                                    <div class="col-sm-5 col-xs-12">
                                        <div class="testimonial-photo">
                                            <img src="{{ asset('images/entry/women.png') }}" alt="testimonial" />
                                        </div>
                                    </div>

                                    <div class="col-sm-7 col-xs-12">
                                        <div class="testimonial-content">
											<div class="testimonial-quote">
												<i class="fa fa-quote-left"></i> 
											</div>
											<div class="testimonial-details">
												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
												<h5>Johnna Doe</h5>
												<h6>Senior Designer, Manager</h6>
											</div>
                                        </div>
                                    </div>

                                </div>

                                <div class="item">

                                    <div class="col-sm-5 col-xs-12">
                                        <div class="testimonial-photo">
                                            <img src="{{ asset('images/entry/women.png') }}" alt="testimonial" />
                                        </div>
                                    </div>

                                    <div class="col-sm-7 col-xs-12">
                                        <div class="testimonial-content">
											<div class="testimonial-quote">
												<i class="fa fa-quote-left"></i> 
											</div>
											<div class="testimonial-details">
												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
												<h5>Johnna Doe</h5>
												<h6>Senior Designer, Manager</h6>
											</div>
                                        </div>
                                    </div>

                                </div>

                                <div class="item">

                                    <div class="col-sm-5 col-xs-12">
                                        <div class="testimonial-photo">
                                            <img src="{{ asset('images/entry/women.png') }}" alt="testimonial" />
                                        </div>
                                    </div>

                                    <div class="col-sm-7 col-xs-12">
                                        <div class="testimonial-content">
											<div class="testimonial-quote">
												<i class="fa fa-quote-left"></i> 
											</div>
											<div class="testimonial-details">
												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
												<h5>Johnna Doe</h5>
												<h6>Senior Designer, Manager</h6>
											</div>
                                        </div>
                                    </div>

                                </div>


                            </div>


                        </div>


                    </div>

                </div>	


            </div> <!-- /container -->       
        </section>
		
		<!-- Sections -->
        <!-- <section id="news" class="news sections">
            <div class="container">
				<div class="heading-content text-center">
					<h3>知識分享</h3>
					<img src="assets/images/separator.png" alt="separator" />
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
				</div>
                
                <div class="row">
				<div class="col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="news-wrapper">
                    	<div class="col-md-6 col-sm-6 col-xs-12">
                    		<div class="news-photo">
								<img src="assets/images/news/1.jpeg" alt="News Image" />
							</div>
                    	</div>
						
						<div class="col-md-6 col-sm-6 col-xs-12">
                    		<div class="news-content">
								<h5>PERFECT LAYOUT</h5>
								<a href="#">11 august 2014</a>
								<div class="separator2"></div>
								<p>Hi, my name is Sergey Nefortunov, I'm 25 and I'm a web & UI designer based in Kiev, Ukraine. I started designing long ago with the basic pencil and paper drawings, sketching, painting and product design. Hi, my name is Sergey Nefortunov, I'm 25 and I'm a web & UI designer based in Kiev, Ukraine.</p>
								
								<div class="news-tags">
									<a href="#">Graphic Design</a>
									<a href="#">Web Development</a>
									<a href="#">Computer</a>
								</div>
								
							</div>
                    	</div>
						
                    </div>
				</div>	
					
					<div class="col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="news-wrapper">
                    	<div class="col-md-6 col-sm-6 col-xs-12">
                    		<div class="news-photo">
								<img src="assets/images/news/2.jpg" alt="News Image" />
							</div>
                    	</div>
						
						<div class="col-md-6 col-sm-6 col-xs-12">
                    		<div class="news-content">
								<h5>PERFECT LAYOUT</h5>
								<a href="#">11 august 2014</a>
								<div class="separator2"></div>
								<p>Hi, my name is Sergey Nefortunov, I'm 25 and I'm a web & UI designer based in Kiev, Ukraine. I started designing long ago with the basic pencil and paper drawings, sketching, painting and product design. Hi, my name is Sergey Nefortunov, I'm 25 and I'm a web & UI designer based in Kiev, Ukraine.</p>
								
								<div class="news-tags">
									<a href="#">Web Design</a>
									<a href="#">User Interface</a>
									<a href="#">Graphic Design</a>
									
								</div>
								
							</div>
                    	</div>
						
                    </div>
				</div>
					
                </div>
				
				<div class="more text-center">
					<a href="#">more</a>
				</div>
				
            </div>
        </section> -->
		
		<!-- Sections -->
        <section id="contact" class="contact sections">
		
			<div class="heading-content text-center">
				<h3>聯絡我們</h3>
				<img src="{{ asset('images/entry/separator.png') }}" alt="separator" />
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
			</div>
			
            <div class="container">
			
                <!-- Example row of columns -->
                <!-- <div class="row">
					<div class="col-sm-10 col-sm-offset-1 col-xs-12">
						<div class="contact-wrapper text-center">
							<div class="col-sm-4 col-xs-12">
								<div class="contact-details"> -->
									<!-- <i class="fa fa-paper-plane"></i> -->
									<!-- <p>cindy@oriact.com.tw</p>
								</div>
							</div>
							
							<div class="col-sm-4 col-xs-12">
								<div class="contact-details"> -->
									<!-- <i class="fa fa-map-marker"></i> -->
									<!-- <p>103大同區民權西路106號</p>
								</div>
							</div>
							
							<div class="col-sm-4 col-xs-12">
								<div class="contact-details"> -->
									<!-- <i class="fa fa-phone"></i> -->
									<!-- <p>02-2552-8787</p>
								</div>
							</div>
							
						</div>
					</div>	
                </div> -->
            </div> <!-- /container -->       
        </section>
		
		<div class="scroll-top">

            <div class="scrollup">
                <i class="fa fa-angle-double-up"></i>
            </div>

        </div>
	
        <!--Footer-->
        <footer id="footer" class="footer">
            <div class="container">
            	<div class="row">
            		<div class="wrapper">
            			<div class="col-sm-6 col-sm-offset-3 col-xs-12">
            				<div class="footer-item text-center">
								<i class="fa fa-bicycle"></i>
								<div class="logo">
									<img src="{{ asset('images/entry/logo.png') }}" alt="Logo" />
								</div>
								
								<div class="social">
									<a href="#"><i class="fa fa-facebook"></i></a>
								</div>
							</div>
            			</div>
            		</div>
            	</div>
            </div>
        </footer>


        <script src="{{ asset('js/entry/vendor/jquery-1.11.2.min.js') }}"></script>
        <script src="{{ asset('js/entry/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/entry/plugins.js') }}"></script>
        <script src="{{ asset('js/entry/jquery.mixitup.min.js') }}"></script>
		<script src=" {{ asset('js/entry/jquery.easypiechart.min.js') }} "></script>
		<script src="{{ asset('js/entry/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('js/entry/modernizr.js') }}"></script>
        <script src="{{ asset('js/entry/main.js') }}"></script>
			<!-- {{ asset('js/entry/jquery-1.11.2.min.js.js') }} -->
	<!-- {{ asset('js/entry/bootstrap.min.js.js') }} -->
			<!-- {{ asset('js/entry/plugins.js') }} -->
			<!-- {{ asset('js/entry/jquery.mixitup.min.js') }} -->
			<!-- {{ asset('js/entry/jquery.easypiechart.min.js') }} -->
			<!-- {{ asset('js/entry/jquery.magnific-popup.js') }} -->
			<!-- {{ asset('js/entry/modernizr.js') }} -->
			<!-- {{ asset('js/entry/main.js') }} -->
    </body>
</html>
