<?php
date_default_timezone_set('Asia/Taipei'); // 設定時區

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
                    $detailsHTML .= <<<HTML
                    <tr>
                        <td>
                            <img src="{$imagePath}" alt="{$itemName}" style="width: 50px; height: 50px;">
                            {$itemName}
                        </td>
                        <td>NT$ {$itemPrice}</td>
                        <td>{$quantity}</td>
                    </tr>
                    HTML;
                
            }
        }

        // 動態生成每筆訂單的HTML
        $orderListHTML .= <<<HTML
        <tr class="cart-item">
            <td>
                <a class="table-cart-link" href="./?url=user/orders&order_id={$orderId}">
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
<body>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <script src="assets/js/orderList.js"></script>
</body>
