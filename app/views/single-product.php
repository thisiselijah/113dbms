<?php
   $reviewCount = count($data['reviews']);
   $rankSum = 0;
   $reviewsHTML = "<h2>有 $reviewCount 則評論</h2>"; 
   
   foreach ($data['reviews'] as $review) {
       $rankSum += $review['review_rank']; 
       $starsFilled = str_repeat('<li><a href="#"><i class="ion-star"></i></a></li>', $review['review_rank']);
       $starsEmpty = str_repeat('<li><a href="#"><i class="ion-ios-star-outline"></i></a></li>', 5 - $review['review_rank']);
       $formattedDate = date("Y/m/d", strtotime($review['review_date']));
   
       $reviewsHTML .= <<<HTML
       <div class="reviews_comment_box">
           <div class="comment_thmb">
               <img src="assets/img/blog/comment2.jpg" alt="">
           </div>
           <div class="comment_text">
               <div class="reviews_meta">
                   <div class="star_rating">
                       <ul>
                           $starsFilled
                           $starsEmpty
                       </ul>   
                   </div>
                   <p><strong>{$review['user_name']}</strong> - $formattedDate</p>
                   <span>{$review['review_comment']}</span>
               </div>
           </div>
       </div>
   HTML;
   }
   // 計算平均 rank 並取整數
   $averageRank = $reviewCount > 0 ? round($rankSum / $reviewCount) : 0; // 防止除以 0
   $averageStarsFilled = str_repeat('<li><a href="#"><i class="ion-star"></i></a></li>', $averageRank);
   $averageStarsEmpty = str_repeat('<li><a href="#"><i class="ion-ios-star-outline"></i></a></li>', 5 - $averageRank);
?>
<?php require APP_ROOT . 'views/include/MainHeader.php'; ?>
<body>
<?php require APP_ROOT . 'views/components/ShopBar.php'; ?>
    <!-- product gallery section start -->
    <div class="product_gallery_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_gallery_thumb text-center">
                        <a href="#"><img src="<?= $data['merchandise']['image_path']; ?>" alt=""></a>
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
                                        <?=$averageStarsFilled?>
                                        <?=$averageStarsEmpty?>
                                    </ul>
                                </div>
                                <div class="in_stock">
                                    <span><img src="assets/img/icon/check.png" alt=""> 有存貨</span>
                                </div>
                            </div>
                            <div class="product_details_title">
                                <h3><?= $data['merchandise']['name']; ?></h3>
                            </div>
                            <div class="product_price_box">
                                <span class="current_price">NT <?= $data['merchandise']['price']; ?></span>
                            </div>
                            <div class="product_desc">
                                <p><?= $data['merchandise']['description']; ?></p>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="product_details_right">
                        <div class="product_d_meta">
                            <span>商品數量： <?= $data['merchandise']['stock_quantity']; ?></span>
                        </div>
                        <div class="product_variant_quantity d-flex align-items-center">
                            <div class="pro-qty border">
                                <input id="num" min="1" max="<?= $data['merchandise']['stock_quantity']; ?>" type="submit" value="1" style="background-color: white;">
                            </div>
                            <button class="btn btn-link" type="submit" onclick="addItem()">add to cart</button> 
                            <script>
                                var num = document.getElementById('num');
                                const addItem = () => {
                                    fetch('./?url=cart/add', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            merchandise_id: <?= $data['merchandise']['id']; ?>,
                                            quantity: num.value
                                        })
                                    }).then(response => {
                                        response.json().then(data => {
                                            if (data.status === 'error') {
                                                // alert(data.message);
                                                Swal.fire({
                                                    icon: 'error',
                                                    text: data.message,
                                                    title: '超出購買上限',
                                                    timer: 2000,
                                                    timerProgressBar: true,
                                                });
                                            } else {
                                                Swal.fire({
                                                    icon: 'success',
                                                    text: data.message,
                                                    title: '成功加入購物車',
                                                    timer: 2000,
                                                    timerProgressBar: true,
                                                }).then(() => {
                                                    window.addValue(); 
                                                });
                                                
                                            }
                                        });
                                        
                                    });
                                };
                            </script> 
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">商品介紹</a>
                                </li>
                                <li>
                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">評論 (<?= count($data['reviews']); ?>)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info__flex d-flex">
                                    <div class="product_info_thumb">
                                        <img src="<?= $data['merchandise']['image_path']; ?>" alt="">
                                    </div>
                                    <div class="product_info_content productinfo_text_flex">
                                        <h4><?= $data['merchandise']['name']; ?></h4>
                                        <p><?= $data['merchandise']['description']; ?></p>
                                    </div> 
                                </div>   
                            </div>
                            
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="reviews_wrapper">
                                    <?=$reviewsHTML?>
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
