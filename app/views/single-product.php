<?php require APP_ROOT . 'views/include/header.php'; ?>
<?php require APP_ROOT . 'views/components/publicNavBar.php'; ?>
<body>
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

    <!-- product gallery section start -->
    <div class="product_gallery_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <div class="product_gallery_thumb">
                        <a href="#"><img src="assets/img/product/chair/歐式白絨椅.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product gallery section end -->

    <!-- product details css here -->
    <div class="product_details_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="product_details_left">
                        <form action="#">
                            <div class="product_ratting_stock d-flex">
                                <div class=" product_ratting">
                                    <ul class="d-flex">
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="in_stock">
                                    <span><img src="assets/img/icon/check.png" alt=""> 有存貨</span>
                                </div>
                            </div>
                            <div class="product_details_title">
                                <h3>歐式白絨椅</h3>
                            </div>
                            <div class="product_price_box">
                                <span class="current_price">NT 279</span>
                            </div>
                            <div class="product_desc">
                                <p>這款歐式白絨椅將奢華與舒適完美融合，是居家或商業空間的典雅之選。椅身採用優質柔軟的白色絨面材質，觸感細膩，帶來絕佳的舒適體驗 </p>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product_details_right">
                        <div class="product_d_meta">
                            <span>
                            Product ID: 1</span>
                        </div>
                        <div class="product_variant_quantity d-flex align-items-center">
                            <div class="pro-qty border">
                                <input min="1" max="100" type="tex" value="1">
                            </div>
                            <button class="btn btn-link" type="submit">add to cart</button>  
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details css end -->

     <!--product info start-->
     <div class="product_d_info">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">   
                        <div class="product_info_button">    
                            <ul class="nav" role="tablist" id="nav-tab">
                                <li >
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">商品介紹</a>
                                </li>
                                <li>
                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">評論 (3)</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info__flex d-flex ">
                                    <div class="product_info_thumb">
                                        <img src="assets/img/others/product-info-thumb.png" alt="">
                                    </div>
                                    <div class="product_info_content productinfo_text_flex">
                                        <h4>歐式白絨椅</h4>
                                        <p>這款歐式白絨椅將奢華與舒適完美融合，是居家或商業空間的典雅之選。椅身採用優質柔軟的白色絨面材質，觸感細膩，帶來絕佳的舒適體驗</p>
                                        <p>搭配流線型設計與精緻雕花細節，彰顯歐式經典之美。不僅是功能性座椅，更是提升空間品味的藝術品。</p>
                                    </div> 
                                </div>   
                            </div>
                            

                            <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                <div class="reviews_wrapper">
                                    <h2>有 1 則評論</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                            <img src="assets/img/blog/comment2.jpg" alt="">
                                        </div>
                                        <div class="comment_text">
                                            <div class="reviews_meta">
                                                <div class="star_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                                    </ul>   
                                                </div>
                                                <p><strong>使用者1 </strong>- 2024/9/20</p>
                                                <span>很棒</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>     
                            </div>
                            
                        </div>
                    </div>     
                </div>
            </div>
        </div>    
    </div>  
    <!--product info end-->

    <!-- product section start -->
    <section class="related_product_section">
       
    </section>
    <!-- product section end -->



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
</html>
