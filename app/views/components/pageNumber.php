<?php 
$itemsPerPage = 9; // 每頁顯示商品數量

// 檢查是否存在 category_id，若存在則使用對應類別的商品數量
if (isset($_GET['category_id'])) {
    $categoryId = (int)$_GET['category_id']; // 從 URL 中獲取 category_id
    $totalItems = $categories[$categoryId - 1]['item_count']; // 根據 category_id 查找對應類別的商品數量
} else {
    $totalItems = $data['merchandisesCount']; // 沒有 category_id，則使用全部商品數量
}

// 計算總頁數
$totalPages = ceil($totalItems / $itemsPerPage); 

$currentUrl = $_SERVER["REQUEST_URI"]; // 當前網址

// 生成頁面 URL 的函數
function generatePageUrl($currentUrl, $page) {
    $parsedUrl = parse_url($currentUrl);
    $query = [];
    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $query); // 將查詢字串解析成陣列
    }
    $query['page'] = $page; // 覆蓋或新增 page 參數
    if (isset($_GET['category_id'])) {
        $query['category_id'] = $_GET['category_id']; // 如果有 category_id，保留該參數
    }
    $queryString = http_build_query($query); // 將陣列轉回查詢字串

    $baseUrl = $parsedUrl['path']; // 不含查詢參數的基礎 URL
    return htmlspecialchars($baseUrl . '?' . $queryString);
}

// 動態生成分頁 HTML
$paginationHTML = '';
for ($i = 1; $i <= $totalPages; $i++) {
    $pageUrl = generatePageUrl($currentUrl, $i);
    $pageNumber = str_pad($i, 2, '0', STR_PAD_LEFT); // 格式化頁碼為兩位數
    $paginationHTML .= <<<HTML
    <li><a href="$pageUrl">$pageNumber</a></li>
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
