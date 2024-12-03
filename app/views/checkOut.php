<?php require APP_ROOT . 'views/include/CheckOutHeader.php'; ?>
<?php require APP_ROOT . 'views/components/checkOutBar.php'; ?>

<body>
    <!-- Checkout Form Section -->
    <div class="checkout-container">
        <h2 class = "head-title">商品確認</h2>

    <!-- Cart Items -->
    </section>
    <!-- Shopping Cart-->
    <section class="section section-sm bg-default text-md-left">
      <div class="container">
        <h4 class="text-spacing-50">購物車內容</h4>
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
            <th>
            <div class="table-cart-stepper">
                <span>操作</span>
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
            <div class="table-cart-stepper">      <!--數量修改-->
                <img src="assets/img/icon/minus.png" class="minus" alt=""  />
                <span class="num">1</span>
                <img src="assets/img/icon/add.png" class="add" alt=""  />
            </div>
            </td>
            <td>
                <div class="table-cart-stepper total-price" >$550</div>   <!--總價-->
            </td>
            <td class="table-cart-stepper">
                <img src="assets/img/icon/delete.png" class="remove-item" alt="" />  <!--刪除-->
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
            <div class="table-cart-stepper">
                <img src="assets/img/icon/minus.png" class="minus" alt=""  />
                <span class="num">1</span>
                <img src="assets/img/icon/add.png" class="add" alt=""  />
            </div>
            </td>
            <td>
                <div class="table-cart-stepper total-price">$250</div>
            </td>
            <td class="table-cart-stepper">
                <img src="assets/img/icon/delete.png" class="remove-item" alt=""  />
            </td>
        </tr>
        </tbody>
    </table>
    </div>
    <div class="total-amount">
    總金額: <span id="total-amount">$750</span>
    </div>

        <!-- Checkout Form -->
        <form>
            <!-- Payment Method -->
            <label for="payment">付款方式</label>
            <select id="payment" name="payment" required>
                <option value="" disabled selected>請選擇支付方式</option>
                <option value="cash_on_delivery">貨到付款</option>
            </select>
            
            <button onclick="showAlert()" type="submit">確認下單 </button>
        </form>
    </div>

    
    <!-- Js 
    ========================= -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>


    <!-- Main JS -->
    <script src="assets/js/checkout.js"></script>

</body>
</html>
