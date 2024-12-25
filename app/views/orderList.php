<?php
// 設定時區
date_default_timezone_set('Asia/Taipei');

// 定義狀態對照表
$statusMap = [
    'pending'    => '配送中',
    'completed'  => '已完成',
    'canceled'   => '已取消',
    'confirmed'  => '確認中',
];

// 動態生成訂單列表
$orderListHTML = '';
if (isset($data['orders']) && is_array($data['orders'])) {
    foreach ($data['orders'] as $order) {
        $orderId = htmlspecialchars($order['id'], ENT_QUOTES, 'UTF-8');
        $totalPrice = htmlspecialchars(number_format($order['total_price'], 2), ENT_QUOTES, 'UTF-8');
        $status = htmlspecialchars($statusMap[$order['status']] ?? '未知狀態', ENT_QUOTES, 'UTF-8');
        $address = htmlspecialchars($order['address'], ENT_QUOTES, 'UTF-8');
        $createdAt = htmlspecialchars(date("Y-m-d H:i", strtotime($order['created_at'])), ENT_QUOTES, 'UTF-8');

        // 處理詳細訂單項目
        $detailsHTML = '';
        if (isset($data['order_items']) && is_array($data['order_items'])) {
            foreach ($data['order_items'] as $item) {
                $itemName = htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8');
                $itemPrice = htmlspecialchars(number_format($item['price'], 2), ENT_QUOTES, 'UTF-8');
                $quantity = htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8');
                $imagePath = htmlspecialchars($item['image_path'], ENT_QUOTES, 'UTF-8');
                if (isset($item['review_status']) && $item['review_status'] == 1) {
                    $buttonText = '已完成評論';
                    $buttonDisabled = 'disabled';
                } else {
                    $buttonText = '評論商品';
                    $buttonDisabled = ($order['status'] !== 'completed') ? 'disabled' : '';
                }
                
                $detailsHTML .= <<<HTML
                <tr>
                    <td>
                        <img src="{$imagePath}" alt="{$itemName}" style="width: 50px; height: 50px;">
                        {$itemName}
                    </td>
                    <td>NT$ {$itemPrice}</td>
                    <td>{$quantity}</td>
                    <td>
                        <button 
                            class="btn btn-primary btn-sm review-button" 
                            data-user-id="{$_SESSION['id']}" 
                            data-item-id="{$item['merchandise_id']}" 
                            data-item-name="{$itemName}" 
                            {$buttonDisabled}>
                            {$buttonText}
                        </button>
                    </td>
                </tr>
                HTML;
            }
        }

        // 動態生成每筆訂單的HTML
        $orderListHTML .= <<<HTML
        <tr class="cart-item">
            <td>
                <a class="table-cart-link toggle-details" href="./?url=user/orders&order_id={$orderId}" data-order-id="{$orderId}">
                    商品訂單 #{$orderId}
                </a>
            </td>
            <td>NT$ {$totalPrice}</td>
            <td>{$status}</td>
            <td>{$address}</td>
            <td>{$createdAt}</td>
        </tr>
        <tr class="details-row" id="order-{$orderId}" style="display: none;">
            <td colspan="5">
                <div class="details-container">
                    <h4>訂單詳細資訊</h4>
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th>商品名稱</th>
                                <th>價格</th>
                                <th>數量</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            {$detailsHTML}
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        HTML;
    }
} else {
    $orderListHTML = '<tr><td colspan="5">目前沒有訂單</td></tr>';
}
?>
<?php require APP_ROOT . 'views/include/CheckOutHeader.php'; ?>
<?php require APP_ROOT . 'views/components/checkOutBar.php'; ?>
<div class="checkout-container">
    <h2 class="head-title">你的訂單</h2>
    <table class="table-custom table-cart">
        <thead>
            <tr>
                <th>訂單編號</th>
                <th>總金額</th>
                <th>訂單狀態</th>
                <th>配送地址</th>
                <th>訂單成立日期</th>
            </tr>
        </thead>
        <tbody>
            <?= $orderListHTML ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">評論商品</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="關閉">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="reviewForm" action="./?url=user/submit/reviews" method="POST">
                    <input type="hidden" name="user_id" id="hidden-user-id" value="">
                    <input type="hidden" name="merchandise_id" id="hidden-merchandise-id" value="">
                    <input type="hidden" name="order_id" id="hidden-order-id" value="">
                    <input type="hidden" name="review_status" id="hidden-review-status" value="1">
                    
                    <div class="form-group">
                        <label for="item-name">商品名稱</label>
                        <input type="text" class="form-control" id="item-name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="review-text">評論</label>
                        <textarea class="form-control" id="review-text" name="comment" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rating">評分</label>
                        <select class="form-control" id="rank" name="rank" required>
                            <option value="">-- 請選擇 --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">送出</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/orderList.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // 顯示詳細資訊
        document.querySelectorAll(".toggle-details").forEach(link => {
            link.addEventListener("click", function (event) {
                event.preventDefault();
                const orderId = this.getAttribute("data-order-id");
                document.querySelectorAll(".details-row").forEach(row => row.style.display = "none");
                document.querySelector(`#order-${orderId}`).style.display = "table-row";
            });
        });

        // 處理評論按鈕點擊事件
        document.querySelectorAll(".review-button").forEach(button => {
            button.addEventListener("click", function () {
                if (this.disabled) return; // 禁用按鈕無法操作
                
                const itemName = this.getAttribute("data-item-name");
                const merchandiseId = this.getAttribute("data-item-id");
                const orderId = this.closest(".details-row").getAttribute("id").replace("order-", "");

                // 填入隱藏欄位
                document.querySelector("#hidden-user-id").value = "<?= $_SESSION['id'] ?>";
                document.querySelector("#hidden-merchandise-id").value = merchandiseId;
                document.querySelector("#hidden-order-id").value = orderId;

                // 顯示商品名稱
                document.querySelector("#item-name").value = itemName;

                // 顯示模態框
                $("#reviewModal").modal("show");
            });
        });
    });
</script>