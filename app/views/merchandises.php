<?php
    $categories = $data['categories'];
    $merchandises = $data['merchandises'];
    // 商品生成函數
    function generateMerchandiseHTML($merchandises) {
        $content = '';
        foreach ($merchandises as $product) {
            $discounted_price = number_format($product['price'] * 0.8, 2); // 20% 折扣
            $content .= <<<HTML
            <div class="col-lg-4 col-md-4 col-sm-6">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a href="./?url=merchandises/merchandise&id={$product['id']}">
                                <img src="{$product['image_path']}" alt="{$product['name']}">
                            </a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4><a href="single-product.php?id={$product['id']}">{$product['name']}</a></h4>
                            <div class="price_box"> 
                                <span class="current_price">NT {$product['price']}</span>
                            </div>
                        </figcaption>  
                    </figure>
                </article>
            </div>
            HTML;
        }
        return $content;
    }
    
    // 類別生成函數
    function generateCategoryHTML($categories, $category_mapping) {
        $content = '';
        foreach ($categories as $item) {
            $name = $category_mapping[$item['name']] ?? $item['name'];
            $content .= <<<HTML
            <li><a href="./?url=show/merchandises&category_id={$item['id']}">{$name} ({$item['item_count']})</a></li>
            HTML;
        }
        return $content;
    }    
    
    // 類別
    $category_mapping = [
        'chair' => '椅子',
        'table' => '桌子',
        'decoration' => '裝飾',
        'bedding' => '臥室',
        'lamps' => '燈具'
    ];
    $merchandise_content = generateMerchandiseHTML($merchandises);
    $merchandiseCategories = generateCategoryHTML($categories, $category_mapping);
    $merchandises = <<<HTML
    <div class="row">
        $merchandise_content
    </div>
    HTML;
    $category_list = <<<HTML
    <ul>
        $merchandiseCategories
    </ul>
    HTML;
?>
    
<?php require APP_ROOT . 'views/include/MainHeader.php'; ?>
<body>
    <?php require APP_ROOT . 'views/components/publicNavBar.php'; ?>
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
                                        <?=$category_list?>
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
                                    <?= $merchandises?>
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
     <!-- Js ========================= -->
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
