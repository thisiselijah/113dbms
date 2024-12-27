<?php
// 設定時區
date_default_timezone_set('Asia/Taipei');

// 定義狀態對照表
$statusMap = [
    'processing' => '處理中',
    'pending'    => '配送中',
    'confirmed'  => '已確認',
    'completed'  => '已完成',
    'canceled'   => '已取消',
];

// 獲取 GET 參數中的 order_id
$activeOrderId = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

// 動態生成訂單列表
$orderListHTML = '';
if (isset($data['orders']) && is_array($data['orders'])) {
    foreach ($data['orders'] as $order) {
        $orderId = htmlspecialchars($order['id'], ENT_QUOTES, 'UTF-8');
        $totalPrice = htmlspecialchars(number_format($order['total_price'], 2), ENT_QUOTES, 'UTF-8');
        $status = htmlspecialchars($statusMap[$order['status']] ?? '未知狀態', ENT_QUOTES, 'UTF-8');
        $address = htmlspecialchars($order['address'], ENT_QUOTES, 'UTF-8');
        $createdAt = htmlspecialchars(date("Y-m-d H:i", strtotime($order['created_at'])), ENT_QUOTES, 'UTF-8');
        $orderedBy = htmlspecialchars($order['name'] ?? '未知', ENT_QUOTES, 'UTF-8'); // 假設有 name 欄位

        // 根據訂單狀態決定是否顯示操作按鈕
        $actionButtons = '';
        if ($order['status'] === 'confirmed') {
            // 使用 <a> 標籤並添加 disabled 屬性
            $actionButtons = <<<HTML
                <a href="#" class="btn btn-success btn-sm confirm-button disabled" aria-disabled="true" tabindex="-1" data-order-id="{$orderId}">已確認</a>
                <a href="#" class="btn btn-danger btn-sm cancel-button" data-order-id="{$orderId}">取消訂單</a>
            HTML;
        } elseif ($order['status'] === 'processing') {
            $actionButtons = <<<HTML
                <a href="#" class="btn btn-primary btn-sm confirm-button" data-order-id="{$orderId}">確認訂單</a>
                <a href="#" class="btn btn-danger btn-sm cancel-button" data-order-id="{$orderId}">取消訂單</a>
            HTML;
        } elseif ($order['status'] === 'completed' || $order['status'] === 'canceled') {
            // 不顯示操作按鈕
            $actionButtons = '-';
        }

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
        } else {
            $detailsHTML = '<tr><td colspan="3">無商品項目</td></tr>';
        }

        // 確定詳細資訊是否要顯示
        $displayStyle = ($activeOrderId === intval($orderId)) ? 'table-row' : 'none';

        // 動態生成每筆訂單的HTML，確保連結為 ?url=admin/orders&order_id={$orderId}
        $orderListHTML .= <<<HTML
        <tr class="cart-item">
            <td>
                <a class="table-cart-link toggle-details" href="./?url=admin/orders&order_id={$orderId}" data-order-id="{$orderId}">
                    商品訂單 #{$orderId}
                </a>
            </td>
            <td>NT$ {$totalPrice}</td>
            <td>{$status}</td>
            <td>{$address}</td>
            <td>{$orderedBy}</td>
            <td>{$createdAt}</td>
            <td>{$actionButtons}</td>
        </tr>
        <tr class="details-row" id="order-{$orderId}" style="display: {$displayStyle};">
            <td colspan="7">
                <div class="details-container">
                    <h4>訂單詳細資訊</h4>
                    <table class="table table-bordered">
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
    $orderListHTML = '<tr><td colspan="7">目前沒有訂單</td></tr>';
}
?>
<?php require APP_ROOT . 'views/include/CheckOutHeader.php'; ?>
<?php require APP_ROOT . 'views/components/checkOutBar.php'; ?>
<div class="container mt-4">
    <h2 class="mb-4">管理訂單</h2>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>訂單編號</th>
                <th>總金額</th>
                <th>訂單狀態</th>
                <th>配送地址</th>
                <th>買家</th>
                <th>訂單成立日期</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?= $orderListHTML ?>
        </tbody>
    </table>
</div>

<!-- 確認操作模態框 -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"> 
        <h5 class="modal-title" id="confirmationModalLabel">確認操作</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="關閉">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="modalBodyText">您確定要執行此操作嗎？</p>
      </div>
      <div class="modal-footer">
        <a href="#" id="modalConfirmButton" class="btn btn-primary">確認</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery 和 Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // 處理確認訂單按鈕點擊事件
        document.querySelectorAll(".confirm-button").forEach(button => {
            // 只有非禁用的按鈕才需要添加事件監聽器
            if (!button.classList.contains('disabled') && !button.hasAttribute('aria-disabled')) {
                button.addEventListener("click", function (event) {
                    event.preventDefault(); // 防止默認行為
                    const orderId = this.getAttribute("data-order-id");
                    if (!orderId) {
                        alert("無法獲取訂單 ID。");
                        return;
                    }
                    // 設定模態框的內容
                    document.getElementById("confirmationModalLabel").innerText = "確認訂單";
                    document.getElementById("modalBodyText").innerText = `確定要確認訂單 #${orderId} 嗎？`;
                    // 設定確認按鈕的連結
                    document.getElementById("modalConfirmButton").href = `./?url=admin/orders/operations&order_id=${orderId}&operation=confirmed`;
                    // 顯示模態框
                    $('#confirmationModal').modal('show');
                });
            }
        });

        // 處理取消訂單按鈕點擊事件
        document.querySelectorAll(".cancel-button").forEach(button => {
            button.addEventListener("click", function (event) {
                event.preventDefault(); // 防止默認行為
                const orderId = this.getAttribute("data-order-id");
                if (!orderId) {
                    alert("無法獲取訂單 ID。");
                    return;
                }
                // 設定模態框的內容
                document.getElementById("confirmationModalLabel").innerText = "取消訂單";
                document.getElementById("modalBodyText").innerText = `確定要取消訂單 #${orderId} 嗎？`;
                // 設定確認按鈕的連結
                document.getElementById("modalConfirmButton").href = `./?url=admin/orders/operations&order_id=${orderId}&operation=canceled`;
                // 顯示模態框
                $('#confirmationModal').modal('show');
            });
        });

        // 處理訂單編號點擊以顯示詳細資訊
        document.querySelectorAll(".toggle-details").forEach(link => {
            link.addEventListener("click", function (event) {
                // 不阻止默認行為，允許重定向
                // 若不需要 JavaScript 處理顯示詳細資訊，可刪除此處
            });
        });
    });
</script>
</body>
</html>
