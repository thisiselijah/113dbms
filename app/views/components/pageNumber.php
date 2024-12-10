<?php
$itemsPerPage = 9; // 每頁顯示商品數量

// 檢查是否存在 category_id，若存在則使用對應類別的商品數量
if (isset($_GET['category_id'])) {
    $categoryId = (int)$_GET['category_id']; // 從 URL 中獲取 category_id
    $totalItems = $categories[$categoryId - 1]['item_count'] ?? 0; // 防止數據不存在
} else {
    $totalItems = $data['merchandisesCount'] ?? 0; // 沒有 category_id，則使用全部商品數量
}

// 計算總頁數
$totalPages = ceil($totalItems / $itemsPerPage);

// 當前頁碼
$currentPage = isset($_GET['page']) ? max((int)$_GET['page'], 1) : 1; // 頁碼最小為 1
$currentPage = min($currentPage, $totalPages); // 頁碼不超過總頁數

// 生成頁面 URL 的函數
function generatePageUrl($currentUrl, $page) {
    $parsedUrl = parse_url($currentUrl);
    $query = [];
    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $query); // 將查詢字串解析成陣列
    }
    $query['page'] = $page; // 覆蓋或新增 page 參數
    $queryString = http_build_query($query); // 將陣列轉回查詢字串
    $baseUrl = $parsedUrl['path']; // 不含查詢參數的基礎 URL
    return htmlspecialchars($baseUrl . '?' . $queryString);
}

// 當前網址
$currentUrl = $_SERVER["REQUEST_URI"];

// 動態生成分頁 HTML
$paginationHTML = '';




// 添加「上一頁」按鈕
if ($currentPage > 1) {
    $prevPageUrl = generatePageUrl($currentUrl, $currentPage - 1);
    $paginationHTML .= <<<HTML
    <li class="arrow-left">
        <a href="$prevPageUrl"><i class="ion-ios-arrow-left"></i></a>
    </li>
    HTML;
}

// 計算要顯示的頁碼範圍
$pagesToShow = 4; // 每次顯示的頁碼數
$startPage = max(1, $currentPage - floor($pagesToShow / 2)); // 從當前頁的前半部分開始
$endPage = min($totalPages, $startPage + $pagesToShow - 1); // 保持範圍不超過總頁數
if ($endPage - $startPage + 1 < $pagesToShow) {
    $startPage = max(1, $endPage - $pagesToShow + 1); // 確保範圍有足夠的頁碼
}

for ($i = $startPage; $i <= $endPage; $i++) {
    $pageUrl = generatePageUrl($currentUrl, $i);
    $pageNumber = str_pad($i, 2, '0', STR_PAD_LEFT); // 格式化頁碼為兩位數
    $activeClass = ($i == $currentPage) ? 'class="active"' : ''; // 當前頁添加 active 類
    $paginationHTML .= <<<HTML
    <li $activeClass><a href="$pageUrl">$pageNumber</a></li>
    HTML;
}



// 添加「下一頁」按鈕
if ($currentPage < $totalPages) {
    $nextPageUrl = generatePageUrl($currentUrl, $currentPage + 1);
    $paginationHTML .= <<<HTML
    <li class="arrow-right">
        <a href="$nextPageUrl"><i class="ion-ios-arrow-right"></i></a>
    </li>
    HTML;
}

// 包裹生成的分頁 HTML
$paginationHTML = <<<HTML
<ul class="pagination">
    $paginationHTML
</ul>
HTML;

// 輸出分頁 HTML
echo $paginationHTML;
?>

