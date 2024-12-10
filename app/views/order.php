<?php require APP_ROOT . 'views/include/CheckOutHeader.php'; ?>
<?php require APP_ROOT . 'views/components/checkOutBar.php'; ?>

<body>
    <!-- Order Form Section -->
    <div class="checkout-container">
        <h2 class = "head-title">訂單編號 #1</h2>

    <!-- Cart Items -->
    </section>
    <!-- Shopping Cart-->
    <section class="section section-sm bg-default text-md-left">
      <div class="container">
        <h4 class="text-spacing-50">訂單內容</h4>
        <!-- shopping-cart-->
    <div class="table-custom-responsive">
    <table class="table-custom table-cart">
        <thead>
        <tr>
            <th>
            <div class="table-cart-stepper">
                <span>商品名稱</span>
            </div>
            </th>
            <th>
            <div class="table-cart-stepper">
                <span>價格</span>
            </div>
            </th>
            <th>
            <div class="table-cart-stepper">
                <span>數量</span>
            </div>
            </th>
            <th>
            <div class="table-cart-stepper">
                <span>總額</span>
            </div>
            </th>
        </tr>
        </thead>

        <tbody>
        <tr class="cart-item">
            <td>
            <a class="table-cart-figure" href="single-product.html">
                <img src="assets/img/product/decoration/LED 永生花束裝飾玻璃盅.jpg" alt="" class = "product-image"/>
            </a>
            <a class="table-cart-link" href="single-product.html">LED 永生花束裝飾玻璃盅</a>
            </td>
            <td>                            <!--資料庫連接的話改 data-price-->
                <div class="table-cart-stepper product-price" data-price = "550">$550</div>   <!--單價 data-price是賦予商品價格-->
            </td>
            <td>
            <div class="table-cart-stepper">      <!--數量-->
                <span class="num">1</span>
            </div>
            </td>
            <td>
                <div class="table-cart-stepper total-price" >$550</div>   <!--總價-->
            </td>
           
        </tr>
        <tr class="cart-item">
            <td>
            <a class="table-cart-figure" href="single-product.html">
                <img src="assets/img/product/chair/DAVI 單人布沙發-白.jpg" alt="" class = "product-image" />
            </a>
            <a class="table-cart-link" href="single-product.html">DAVI 單人布沙發-白</a>
            </td>
            <td>
                <div class="table-cart-stepper product-price" data-price = "250">$250</div>
            </td>
            <td>
            <div class="table-cart-stepper">      <!--數量-->
                <span class="num">1</span>
            </div>
            </td>
            <td>
                <div class="table-cart-stepper total-price">$250</div>
            </td>
        </tr>
        </tbody>
    </table>
    </div>
    
    <div class="total-amount">
    總金額: <span id="total-amount">$750</span>
    </div>
    </div>

    
    <!-- Js 
    ========================= -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>


    <!-- Main JS -->
    <script src="assets/js/checkout.js"></script>

</body>
</html>
