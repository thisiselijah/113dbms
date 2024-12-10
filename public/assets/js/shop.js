//目錄部分
document.querySelectorAll('.category').forEach(item => {
    item.addEventListener('click', function (event) {
        event.preventDefault(); // 阻止默認的跳轉行為

        // 移除所有類別的 active 樣式
        document.querySelectorAll('.category').forEach(el => el.classList.remove('active'));

        // 為當前點擊的項目加上 active 樣式
        this.classList.add('active');
    });
});






//商品頁數部分
document.addEventListener('DOMContentLoaded', () => {
    const paginationContainer = document.querySelector('.pagination');
    const totalPages = 10; // 總頁數
    let currentPage = 1;   // 初始化當前頁數
    const visiblePages = 4; // 每次顯示的頁碼數量

    // 動態生成頁碼
    function renderPagination() {
        paginationContainer.innerHTML = ''; // 清空現有內容
        const startPage = Math.max(1, currentPage - visiblePages + 1);
        const endPage = Math.min(totalPages, startPage + visiblePages - 1);

        // 添加「返回上一頁」按鈕
        if (startPage > 1) {
            const leftArrow = document.createElement('li');
            leftArrow.innerHTML = '<a href="#" class="arrow-left"><i class="ion-ios-arrow-left"></i></a>';
            paginationContainer.appendChild(leftArrow);

            leftArrow.addEventListener('click', function (e) {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    renderPagination();
                }
            });
        }

        // 生成頁碼
        for (let i = startPage; i <= endPage; i++) {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#';
            a.textContent = i.toString().padStart(2, '0');
            a.dataset.page = i;

            if (i === currentPage) {
                a.classList.add('active');
            }

            li.appendChild(a);
            paginationContainer.appendChild(li);

            // 點擊頁碼按鈕事件
            a.addEventListener('click', function (e) {
                e.preventDefault();
                currentPage = i;
                renderPagination();
            });
        }

        // 添加省略號（如果必要）
        if (endPage < totalPages) {
            const rightEllipsis = document.createElement('li');
            rightEllipsis.innerHTML = '<a href="#" class="disabled">...</a>';
            paginationContainer.appendChild(rightEllipsis);
        }

        // 添加「下一頁」按鈕
        const rightArrow = document.createElement('li');
        rightArrow.innerHTML = '<a href="#" class="arrow-right"><i class="ion-ios-arrow-right"></i></a>';
        paginationContainer.appendChild(rightArrow);

        rightArrow.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentPage < totalPages) {
                currentPage++;
                renderPagination();
            }
        });
    }

    // 初始渲染
    renderPagination();
});



