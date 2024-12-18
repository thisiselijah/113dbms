document.addEventListener("DOMContentLoaded", function () {
    // 獲取當前的 order_id
    const currentOrderId = new URLSearchParams(window.location.search).get("order_id");

    // 如果 URL 包含 order_id，顯示對應的詳細資訊
    if (currentOrderId) {
        document.querySelector(`#order-${currentOrderId}`).style.display = "table-row";
    }

    // 點擊訂單連結時
    document.querySelectorAll(".table-cart-link").forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); // 阻止默認行為
            const orderId = this.href.split("order_id=")[1]; // 從 URL 取得訂單 ID

            // 顯示詳細資訊
            document.querySelectorAll(".details-row").forEach(row => row.style.display = "none");
            document.querySelector(`#order-${orderId}`).style.display = "table-row";

            // 更新 URL
            const url = new URL(window.location.href);
            url.searchParams.set("order_id", orderId);
            history.pushState(null, "", url);

            // 導向該連結頁面
            window.location.href = `./?url=user/orders&order_id=${orderId}`;
        });
    });
});