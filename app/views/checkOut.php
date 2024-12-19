<?php
$userId = $_SESSION['id'] ?? null; // 假設SESSION中有登入使用者的ID

// 動態生成購物車項目和隱藏欄位
$cartItemsHTML = '';
$hiddenInputsHTML = ''; // 用於表單的隱藏欄位
$totalAmount = 0;
if (isset($data) && is_array($data)) {
    foreach ($data as $item) {
        $itemTotal = $item['price'] * $item['quantity'];
        $totalAmount += $itemTotal; // 計算總金額

        $cartItemsHTML .= <<<HTML
        <tr class="cart-item">
            <td>
                <a class="table-cart-figure" href="single-product.html">
                    <img src="{$item['image_path']}" alt="{$item['name']}" class="product-image"/>
                </a>
                <a class="table-cart-link" href="single-product.html">{$item['name']}</a>
            </td>
            <td>
                <div class="table-cart-stepper product-price" data-price="{$item['price']}">NT$ {$item['price']}</div>
            </td>
            <td>
                <div class="table-cart-stepper">
                    <span class="num">{$item['quantity']}</span>
                </div>
            </td>
            <td>
                <div class="table-cart-stepper total-price">NT$ {$itemTotal}</div>
            </td>
        </tr>
        HTML;

        // 添加商品資料到隱藏欄位
        $hiddenInputsHTML .= <<<HTML
        <input type="hidden" name="items[{$item['id']}][id]" value="{$item['id']}">
        <input type="hidden" name="items[{$item['id']}][quantity]" value="{$item['quantity']}">
        <input type="hidden" name="items[{$item['id']}][price]" value="{$item['price']}">
        HTML;
    }
} else {
    $cartItemsHTML = '<tr><td colspan="4">購物車為空</td></tr>';
}

$totalAmountFormatted = number_format($totalAmount, 2);
?>

<?php require APP_ROOT . 'views/include/CheckOutHeader.php'; ?>
<?php require APP_ROOT . 'views/components/checkOutBar.php'; ?>

<body>
    <div class="checkout-container">
        <h2 class="head-title">商品確認</h2>

        <!-- Cart Items -->
        <section class="section section-sm bg-default text-md-left">
            <div class="container">
                <h4 class="text-spacing-50">購物車內容</h4>
                <div class="table-custom-responsive">
                    <table class="table-custom table-cart">
                        <thead>
                            <tr>
                                <th>商品名稱</th>
                                <th>價格</th>
                                <th>數量</th>
                                <th>總額</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?=$cartItemsHTML?>
                        </tbody>
                    </table>
                </div>
                <div class="total-amount">
                    總金額: <span id="total-amount">NT$ <?=$totalAmountFormatted?></span>
                </div>
            </div>
        </section>

        <!-- Checkout Form -->
        <section class="section section-sm bg-default text-md-left">
            <div class="container">
                <h4 class="text-spacing-50">訂單資訊</h4>
                <form action="./?url=submit/order" method="POST">
                    <!-- Hidden inputs for cart data -->
                    <?=$hiddenInputsHTML?>
                    <input type="hidden" name="user_id" value="<?=$userId?>">
                    <input type="hidden" name="total_price" value="<?=$totalAmount?>">

                    <!-- Payment Method -->
                    <div class="form-group">
                        <label for="payment">付款方式</label>
                        <select id="payment" name="payment" required>
                            <option value="" disabled selected>請選擇支付方式</option>
                            <option value="cash_on_delivery">貨到付款</option>
                        </select>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="address">送貨地址</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="請輸入送貨地址" required>
                    </div>

                    <!-- Submit Button -->
                    <button onclick="showAlert()" type="submit" class="btn btn-primary">確認下單</button>
                </form>
            </div>
        </section>
    </div>

    <!-- Js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <script src="assets/js/checkout.js"></script>
</body>
</html>
