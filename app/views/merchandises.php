<?php
$categories = $data['categories'];
$merchandises = $data['merchandises'];
// 商品生成函數
function generateMerchandiseHTML($merchandises)
{
    $content = '';
    if (empty($merchandises)) {
        return '<div>
            <h2>找不到商品，請重新查詢。</h2></div>
            <div><img src="https://uploads.dailydot.com/2018/10/olli-the-polite-cat.jpg?q=65&auto=format&w=1600&ar=2:1&fit=crop"/><div>';
    }
    foreach ($merchandises as $product) {
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
function generateCategoryHTML($categories, $category_mapping)
{
    // 獲取當前的 category_id，從 URL 的 query 參數中讀取
    $currentCategoryId = $_GET['category_id'] ?? null;

    $content = '';
    foreach ($categories as $item) {
        // 取得類別名稱，若無對應則使用原名稱
        $name = $category_mapping[$item['name']] ?? $item['name'];

        // 若當前類別為點選的類別，添加 active 類別
        $isActive = ((string)$currentCategoryId === (string)$item['id']) ? 'class="category-item active"' : 'class="category-item"';

        // 生成 HTML
        $content .= <<<HTML
            <li $isActive><a href="./?url=show/merchandises&category_id={$item['id']}">{$name} ({$item['item_count']})</a></li>
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
    <?php require APP_ROOT . 'views/components/ShopBar.php'; ?>
    <!-- 搜尋列 -->
    <form action="?url=search" method="post">
        <div class="search-container">
            <div class="search-bar">
                <input type="text" placeholder="Search..." id="searchInput" name="item" />
                <button id="searchButton" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <button id="closeButton" type="button">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </form>

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
                                <div class="widget_categories"> <!-- 動態生成類別 -->
                                    <?= $category_list ?>
                                </div>
                            </div>



                            <div class="shop_widget_thumb">
                                <img src="assets/img/others/shop-sidebar.png" alt="">
                            </div>
                        </div>
                        <div class="shop_right_sidaber">
                            <div class="shop_gallery">
                                <div class="row">
                                    <?= $merchandises ?>
                                </div>
                            </div>

                            <div class="loding_bar">
                                <ul class="d-flex justify-content-center ">
                                    <!---page number-->
                                    <?php require APP_ROOT . 'views/components/pageNumber.php'; ?>
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
    <script src="assets/js/minicart.js"></script>


</body>

</html>