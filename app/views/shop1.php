<?php require APP_ROOT . 'views/include/MainHeader.php'; ?>
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
                <a href="CheckOut.html"><i class="fa fa-sign-in"></i> Checkout</a>
            </div>
        </div>
    </div>
    <!--mini cart end-->

    
    <!--header area end-->

    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content text-center">
    
                        <h2>Shop</h2>
                        <ul class="d-flex justify-content-center">

                            <li><a href="main.html">Home</a></li>
                            <li>></li>
                            <li><a href="shop1.html">shop</a></li>   
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    
    <!-- 搜尋列 -->

    <div class="search-container">
        <div class="search-bar">
          <input type="text" placeholder="Search..." id="searchInput" />
          <button id="searchButton">
            <i class="fa fa-search"></i>
          </button>
        </div>
        <button id="closeButton">
          <i class="fa fa-times"></i>
        </button>
    </div>
      
    <!-- shop page section satrt -->
    <div class="shop_page_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop_page_inner d-flex ">
                        <div class="shop_sidebar_widget">
                            <div class="shop_widget_list categories">
                                <div class="shop_widget_title categories_title">
                                    <h2>目錄</h2>
                                </div>
                                <div class="widget_categories">
                                    <ul>
                                        <li><a href="#">燈具(6)</a></li>
                                        <li><a href="#">桌子(10)</a></li>
                                        <li><a href="#">臥室(8)</a></li>
                                        <li><a href="#">椅子(12)</a></li>
                                        <li><a href="#">裝飾(14)</a></li>
                                    </ul>
                                </div>
                            </div>
                           
                          
                           
                            <div class="shop_widget_thumb">
                                <img src="assets/img/others/shop-sidebar.png" alt="">
                            </div>
                        </div>
                        <div class="shop_right_sidaber">
                            
                            <div class="shop_gallery">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="single-product.html"><img src="assets/img/product/chair/歐式白絨椅.png" alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4><a href="single-product.html">歐式白絨椅</a></h4>
                                                    <div class="price_box"> 
                                                        <span class="old_price">NT 499</span>
                                                        <span class="current_price">279</span>
                                                    </div>
                                                </figcaption>  
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="single-product.html"><img src="assets/img/product/chair/斑馬條紋椅.png" alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_hot">hot</span>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4><a href="single-product.html">斑馬條紋椅</a></h4>
                                                    <div class="price_box"> 
                                                        <span class="old_price">NT 399</span>
                                                        <span class="current_price">299</span>
                                                    </div>
                                                </figcaption>  
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="single-product.html"><img src="assets/img/product/table/歐式圓桌.png" alt=""></a>

                                                </div>
                                                <figcaption class="product_content">
                                                    <h4><a href="single-product.html">歐式圓桌</a></h4>
                                                    <div class="price_box"> 
                                                        <span class="old_price">NT 500</span>
                                                        <span class="current_price">300</span>
                                                    </div>
                                                </figcaption>  
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="single-product.html"><img src="assets/img/product/table/橡木矮圓桌.png" alt=""></a>
    
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4><a href="single-product.html">橡木矮圓桌</a></h4>
                                                    <div class="price_box"> 
                                                        <span class="current_price">NT 600</span>
                                                    </div>
                                                </figcaption>  
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="single-product.html"><img src="assets/img/product/table/俄羅斯疊層桌.png" alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_hot">hot</span>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4><a href="single-product.html">俄羅斯疊層桌</a></h4>
                                                    <div class="price_box"> 
                                                        <span class="current_price">NT 999</span>
                                                    </div>
                                                </figcaption>  
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="single-product.html"><img src="assets/img/product/decoration/陶瓷花盆.png" alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4><a href="single-product.html">陶瓷花盆</a></h4>
                                                    <div class="price_box"> 
                                                        <span class="current_price">NT 600</span>
                                                    </div>
                                                </figcaption>  
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="single-product.html"><img src="assets/img/product/table/高腳桌.png" alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">Sale</span>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4><a href="single-product.html"> 高腳桌</a></h4>
                                                    <div class="price_box"> 
                                                        <span class="current_price">NT 800</span>
                                                    </div>
                                                </figcaption>  
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="single-product.html"><img src="assets/img/product/table/希臘風石桌.png" alt=""></a>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4><a href="single-product.html">希臘風石桌</a></h4>
                                                    <div class="price_box"> 
                                                        <span class="current_price">NT 600</span>
                                                    </div>
                                                </figcaption>  
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="single-product.html"><img src="assets/img/product/table/典雅矮木桌.png" alt=""></a>
            
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4><a href="single-product.html">典雅矮木桌</a></h4>
                                                    <div class="price_box"> 
                                                        <span class="current_price">NT 650</span>
                                                    </div>
                                                </figcaption>  
                                            </figure>
                                        </article>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="loding_bar">
                                <ul class="d-flex justify-content-center">
                                    <li><a href="#">01</a></li>
                                    <li><a href="shop2.html">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">04</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#"><i class="ion-ios-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop page section end -->


   
    

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

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>
</html>
