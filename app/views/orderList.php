<?php require APP_ROOT . 'views/include/CheckOutHeader.php'; ?>
<?php require APP_ROOT . 'views/components/checkOutBar.php'; ?>

<body>
    <!-- Order List Form Section -->
    <div class="checkout-container">
        <h2 class = "head-title">你的訂單</h2>

    <!-- Order Numbers -->
    </section>
    <section class="section section-sm bg-default text-md-left">
      <div class="container">
        <!-- Items List-->
    <div class="table-custom-responsive">
    <table class="table-custom table-cart">
        <thead>
        <tr>
            <th>
            <div class="table-cart-stepper">
                <span>訂單編號</span>
            </div>
            </th>
            <th>
            <div class="table-cart-stepper">
                <span>日期</span>
            </div>
            </th>
            
        </tr>
        </thead>

        <tbody>
        <tr class="cart-item">
            <td>
                <div class="table-cart-stepper " >
                    <a class="table-cart-link " href="order.html">商品訂單 #1</a>    <!--資料庫連接的話改 訂單編號-->
                </div>
            </td>
            <td>                            <!--資料庫連接的話改 data-->
                <div class="table-cart-stepper " >2024-10-15</div>   <!--訂單日期-->
            </td>
        </tr>

        <tr class="cart-item">
            <td>
                <div class="table-cart-stepper " >
                    <a class="table-cart-link " href="order.html">商品訂單 #2</a>    <!--資料庫連接的話改 訂單編號-->
                </div>
            </td>
            <td>                            <!--資料庫連接的話改 data-->
                <div class="table-cart-stepper " >2024-10-27</div>   <!--訂單日期-->
            </td>
        </tr>
        </tbody>
    </table>
    </div>

    </div>

    
    <!-- Js 
    ========================= -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>


    <!-- Main JS -->
    <script src="assets/js/checkout.js"></script>

</body>
</html>
