document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const submitButton = document.querySelector('button[type="submit"]');
    // const totalAmountElement = document.getElementById('total-amount'); // 移除總金額元素選取

    // // 計算訂單總金額
    // const updateTotalAmount = () => {
    //     let total = 0;
    //     document.querySelectorAll('.total-price').forEach((item) => {
    //         const price = parseFloat(item.textContent.replace(/[^\d.]/g, '')); // 提取數字
    //         total += isNaN(price) ? 0 : price;
    //     });
    //     totalAmountElement.textContent = `NT$ ${total.toFixed(0)}`;
    // };

    // 顯示 SweetAlert 確認框
    const showAlert = (e) => {
        e.preventDefault(); // 阻止表單提交
        Swal.fire({
            icon: 'question',
            title: '是否確定下單',
            text: '確認後將無法修改訂單內容',
            showCancelButton: true,
            confirmButtonText: '是，送出訂單',
            cancelButtonText: '再想想',
        }).then((result) => {
            if (result.isConfirmed) {
                // 顯示成功訊息
                Swal.fire({
                    icon: 'success',
                    title: '訂單已送出',
                    text: '感謝您的購買！',
                }).then(() => {
                    // 提交表單至後端處理
                    form.submit();
                });
            }
        });
    };

    // 綁定送出按鈕事件
    submitButton.addEventListener('click', showAlert);

    // // 初始化訂單總金額
    // updateTotalAmount();

    // 新增：綁定訂單編號連結的點擊事件
    const toggleLinks = document.querySelectorAll('.toggle-details');
    toggleLinks.forEach(link => {
        link.addEventListener('click', () => {
            const orderId = link.getAttribute('data-order-id');
            const detailsRow = document.getElementById(`details-${orderId}`);
            if (detailsRow.classList.contains('hidden')) {
                detailsRow.classList.remove('hidden');
                link.classList.add('active'); // 可選：添加活動狀態類別
            } else {
                detailsRow.classList.add('hidden');
                link.classList.remove('active'); // 可選：移除活動狀態類別
            }
        });
    });

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
