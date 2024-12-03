//星星數量包括商品和評論
// 初始化所有評分
function initializeRatings() {
    // 遍歷所有的評分容器
    document.querySelectorAll('.rating-container').forEach(container => {
        const rating = parseInt(container.getAttribute('data-rating'), 10); // 獲取評分
        const stars = container.querySelectorAll('.rating-stars i'); // 獲取星星

        // 設定每顆星的激活狀態
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add('active'); // 激活星星
            } else {
                star.classList.remove('active'); // 清除激活
            }
        });
    });
}

// 執行初始化
initializeRatings();
