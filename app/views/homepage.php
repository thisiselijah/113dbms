<?php require APP_ROOT . 'views/include/header.php'; ?>
<body>
    <?php require APP_ROOT . 'views/components/publicNavBar.php'; ?>
    <!--mini cart-->
    <div class="mini_cart">
        <div class="cart_gallery">
            <div class="cart_close">
                <div class="cart_text">
                    <h3>cart</h3>
                </div>
                <div class="mini_cart_close">
                    <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                </div>
            </div>
            <div class="cart_item">
                <div class="cart_img">
                    <a href="#"><img src="assets/img/product/small-product1.png" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="#">Primis In Faucibus</a>
                    <p>1 x <span> $65.00 </span></p>
                </div>
                <div class="cart_remove">
                    <a href="#"><i class="icon-close icons"></i></a>
                </div>
            </div>
            <div class="cart_item">
                <div class="cart_img">
                    <a href="#"><img src="assets/img/product/small-product2.png" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="#">Letraset Sheets</a>
                    <p>1 x <span> $60.00 </span></p>
                </div>
                <div class="cart_remove">
                    <a href="#"><i class="icon-close icons"></i></a>
                </div>
            </div>
        </div>
        <div class="mini_cart_table">
            <div class="cart_table_border">
                <div class="cart_total">
                    <span>Sub total:</span>
                    <span class="price">$125.00</span>
                </div>
                <div class="cart_total mt-10">
                    <span>total:</span>
                    <span class="price">$125.00</span>
                </div>
            </div>
        </div>
        <div class="mini_cart_footer">
            <div class="cart_button">
                <a href="#"><i class="fa fa-shopping-cart"></i> View cart</a>
            </div>
            <div class="cart_button">
                <a href="#"><i class="fa fa-sign-in"></i> Checkout</a>
            </div>
        </div>
    </div>
    <!--mini cart end-->





    <!--header area end-->
    <!-- slider section start -->
    <section class="slider_section mb-170">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="slider_swiper swiper-container">
                        <div class="swiper-wrapper">
                            <div class="single_slider swiper-slide d-flex align-items-center">
                                <div class="slider_text">
                                    <h2>打造你的 <br> 專屬環境</h2>
                                    <div class="slider_text_shape">
                                        <img src="assets/img/slider/slider-text-shape.png" alt="">
                                        <div class="slider_btn">
                                            <a class="btn btn-link" href="./?url=show/merchandises">SHOP NOW</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="slider_thumb">
                                    <img src="assets/img/others/armchair2.png" style="position:relative;left:200px" width="700" height=" 600" alt="">
                                </div>
                            </div>
                            <div class="single_slider swiper-slide d-flex align-items-center">
                                <div class="slider_text">
                                    <h2>立即購買 <br> 享有低調奢華</h2>
                                    <div class="slider_text_shape">
                                        <img src="assets/img/slider/slider-text-shape.png" alt="">
                                        <div class="slider_btn">
                                            <a class="btn btn-link" href="./?url=show/merchandises">SHOP NOW</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="slider_thumb">
                                    <img src="assets/img/slider/slider-shape1.png" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider section end -->

    <!-- choice section start -->
    <section class="choice_section mb-175">
        <div class="container">
            <div class="section_title text-center mb-105">
                <h2>給你最好的環境</h2>
            </div>
            <div class="choice_container">
                <div class="row choice_slick slick_slider_activation" data-slick='{
                    "slidesToShow": 3,
                    "slidesToScroll": 1,
                    "arrows": true,
                    "dots": false,
                    "autoplay": false,
                    "speed": 300,
                    "infinite": true,
                    "responsive":[
                        {"breakpoint":992, "settings": { "slidesToShow": 2 } },  
                        {"breakpoint":768, "settings": { "slidesToShow": 2 } },  
                        {"breakpoint":480, "settings": { "slidesToShow": 1 } }  
                    ]                                                         
                }'>
                    <div class="col-lg-4">
                        <div class="single_choice wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                            <div class="choice_thumb">
                                <img src="assets/img/others/choice1.png" alt="">
                            </div>
                            <div class="choice_text">
                                <h4><a href="#">客廳</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single_choice wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            <div class="choice_thumb">
                                <img src="assets/img/others/choice2.png" alt="">
                            </div>
                            <div class="choice_text">
                                <h4><a href="#">戶外 & 花園</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single_choice wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                            <div class="choice_thumb">
                                <img src="assets/img/others/choice3.png" alt="">
                            </div>
                            <div class="choice_text">
                                <h4><a href="#">臥室</a></h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- choice section end -->
    <!-- shipping area start -->
    <section class="shipping_section mb-105">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shipping_inner d-flex justify-content-between">
                        <div class="single_shipping">
                            <div class="shipping_title d-flex align-items-center wow fadeInUp" data-wow-delay="0.1s"
                                data-wow-duration="1.1s">
                                <img src="assets/img/others/shipping1.png" alt="">
                                <h3>多種的選擇</h3>
                            </div>
                            <div class="shipping_desc wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                <p>多款人氣擺設 <br> 豐富你房間的色彩</p>
                            </div>
                        </div>
                        <div class="single_shipping">
                            <div class="shipping_title d-flex align-items-center wow fadeInUp" data-wow-delay="0.1s"
                                data-wow-duration="1.1s">
                                <img src="assets/img/others/shipping2.png" alt="">
                                <h3>良好的品質</h3>
                            </div>
                            <div class="shipping_desc wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                <p>歐洲大廠認證 <br> 堅固、耐用 </p>
                            </div>
                        </div>
                        <div class="single_shipping">
                            <div class="shipping_title d-flex align-items-center wow fadeInUp" data-wow-delay="0.1s"
                                data-wow-duration="1.1s">
                                <img src="assets/img/others/shipping3.png" alt="">
                                <h3>實惠的價格</h3>
                            </div>
                            <div class="shipping_desc wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                <p>經濟實惠的價格 <br> 佛心促銷活動</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shipping area end -->

    <!-- featured section start-->
    <section class="featured_banner_section">
        <div class="container">
            <div class="section_title text-center mb-105">
                <h2>特色裝潢</h2>
            </div>
            <div class="featured_banner_inner">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="featured_thumb wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                            <a><img src="assets/img/bg/bg1.png" alt=""></a>
                            <div class="featured_text">
                                <h3>歐式風格</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="featured_banner_sidebar">
                            <div class="featured_thumb mb-30 wow fadeInUp" data-wow-delay="0.2s"
                                data-wow-duration="1.2s">
                                <a><img src="assets/img/bg/bg2.png" alt=""></a>
                                <div class="featured_text">
                                    <h3>現代風格</h3>
                                </div>
                            </div>
                            <div class="featured_thumb wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                                <a><img src="assets/img/bg/bg3.png" alt=""></a>
                                <div class="featured_text">
                                    <h3>典雅小物</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured section end-->



    <!-- banner advice section start -->
    <section class="banner_advice_section mb-100">
        <div class="container">
            <div class="banner_advice_inner">
                <div class="row">
                    <div class="col-lg-5 offset-lg-7 col-md-5 offset-md-7">
                        <div class="banner_advice_text">
                            <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">New armchair <br> &
                                pillow</h3>
                            <a class="btn btn-link wow fadeInUp" href="shop1.html" data-wow-delay="0.2s"
                                data-wow-duration="1.2s">SHOP NOW</a>
                        </div>
                    </div>
                </div>
                <div class="banner_position_img">
                    <img src="assets/img/others/armchair.png" alt="">
                </div>
            </div>
        </div>
        <div class="banner_position_text">
            <h2>New armchair <br> & pillow</h2>
        </div>
    </section>
    <!-- banner advice section end -->




    <!-- Js 
    ========================= -->
    <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="assets/js/vendor/popper.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.scrollup.min.js"></script>
    <script src="assets/js/images-loaded.min.js"></script>
    <script src="assets/js/jquery.nice-select.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/mailchimp-ajax.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/jquery-waypoints.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/ajax-mail.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>