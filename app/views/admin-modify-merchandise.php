<?php
// 定義名稱對應表
$nameMapping = [
    'chair' => '椅子',
    'table' => '桌子',
    'decoration' => '裝飾',
    'bedding' => '臥室',
    'lamps' => '燈具',
];

// 動態生成類別選項
$categoryOptions = '<option value="">-- 請選擇類別 --</option>';

if (isset($data['category']) && is_array($data['category'])) {
    foreach ($data['category'] as $category) {
        $id = htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8');
        $displayName = htmlspecialchars($nameMapping[$name] ?? $name, ENT_QUOTES, 'UTF-8'); // 對應中文名稱

        // 判斷當前類別是否被選中
        $selected = ($data['merchandises']['category_id'] == $id) ? 'selected' : '';
        $categoryOptions .= <<<HTML
        <option value="{$id}" {$selected}>{$displayName}</option>
        HTML;
    }
}

// 動態導入資料
$productName = htmlspecialchars($data['merchandises']['name'], ENT_QUOTES, 'UTF-8');
$productDescription = htmlspecialchars($data['merchandises']['description'], ENT_QUOTES, 'UTF-8');
$productPrice = htmlspecialchars($data['merchandises']['price'], ENT_QUOTES, 'UTF-8');
$productStock = htmlspecialchars($data['merchandises']['stock_quantity'], ENT_QUOTES, 'UTF-8');
$productImage = htmlspecialchars($data['merchandises']['image_path'], ENT_QUOTES, 'UTF-8');
?>

<?php require APP_ROOT . 'views/include/ShopHeader.php'; ?>
<?php require APP_ROOT . 'views/components/checkOutBar.php'; ?>
<style>
    body {
        background-color: #f8f9fa;
    }
    .form-container {
        max-width: 700px;
        background: #fff;
        padding: 30px;
        margin: 50px auto;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    .form-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }
</style>
<body>
<div class="container">
    <div class="form-container">
        <h2 class="form-title">修改商品</h2>
        <form id="productForm" action="./?url=admin/modify/merchandise" method="POST" enctype="multipart/form-data">
            <!-- Hidden Input for Product ID -->
            <input type="hidden" name="id" value="<?= $data['merchandises']['id'] ?>">

            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="product-name" class="form-label">商品名稱</label>
                        <input type="text" class="form-control" id="product-name" name="name" value="<?= $productName ?>" placeholder="輸入商品名稱" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-image" class="form-label">商品圖片</label>
                        <div class="mb-2">
                            <img src="<?= $productImage ?>" alt="<?= $productName ?>" class="img-thumbnail" style="width: 150px; height: auto;">
                        </div>
                        <input type="file" class="form-control" id="product-image" name="image" accept="image/*">
                        <small class="text-muted">若不上傳新圖片，將使用原圖片</small>
                    </div>
                    <div class="mb-3">
                        <label for="product-description" class="form-label">商品描述</label>
                        <textarea class="form-control" id="product-description" name="description" rows="3" placeholder="輸入商品描述" required><?= $productDescription ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="product-price" class="form-label">價錢 (NT$)</label>
                        <input type="number" class="form-control" id="product-price" name="price" value="<?= $productPrice ?>" placeholder="輸入價錢" min="1" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-stock" class="form-label">庫存數量</label>
                        <input type="number" class="form-control" id="product-stock" name="stock" value="<?= $productStock ?>" placeholder="輸入庫存數量" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-category" class="form-label">商品類別</label>
                        <select class="form-select" id="product-category" name="category" required>
                            <?= $categoryOptions ?>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">保存修改</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById("productForm").addEventListener("submit", function (e) {
        e.preventDefault();

        // 顯示確認訊息
        Swal.fire({
            title: "確認保存",
            text: "您確定要修改商品資訊嗎？",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "是的，保存",
            cancelButtonText: "取消"
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit(); // 提交表單
            }
        });
    });
</script>
</body>