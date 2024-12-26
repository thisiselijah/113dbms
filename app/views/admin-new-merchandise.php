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

if (isset($data) && is_array($data)) {
    foreach ($data as $category) {
        $id = htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8');
        $displayName = htmlspecialchars($nameMapping[$name] ?? $name, ENT_QUOTES, 'UTF-8'); // 對應中文名稱
        $categoryOptions .= <<<HTML
        <option value="{$id}">{$displayName}</option>
        HTML;
    }
}
?>

<?php require APP_ROOT . 'views/include/ShopHeader.php'; ?>
<?php require APP_ROOT . 'views/components/checkOutBar.php'; ?>
<style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
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
            <h2 class="form-title">新增商品</h2>
            <form id="productForm" action="./?url=admin/new/merchandise" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="product-name" class="form-label">商品名稱</label>
                    <input type="text" class="form-control" id="product-name" name="name" placeholder="輸入商品名稱" required>
                </div>
                <div class="mb-3">
                    <label for="product-image" class="form-label">上傳圖片</label>
                    <input type="file" class="form-control" id="product-image" name="image" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="product-description" class="form-label">商品描述</label>
                    <textarea class="form-control" id="product-description" name="description" rows="3" placeholder="輸入商品描述" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="product-price" class="form-label">價錢 (NT$)</label>
                    <input type="number" class="form-control" id="product-price" name="price" placeholder="輸入價錢" min="1" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="product-stock" class="form-label">庫存數量</label>
                    <input type="number" class="form-control" id="product-stock" name="stock" placeholder="輸入庫存數量" min="0" required>
                </div>
                <div class="mb-3">
                    <label for="product-category" class="form-label">商品類別</label>
                    <select class="form-select" id="product-category" name="category" required>
                        <?= $categoryOptions ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">新增商品</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById("productForm").addEventListener("submit", function (e) {
        e.preventDefault(); // 阻止表單預設提交動作

        const productName = document.getElementById("product-name").value.trim();
        const productDescription = document.getElementById("product-description").value.trim();
        const productPrice = document.getElementById("product-price").value;
        const productStock = document.getElementById("product-stock").value;
        const productCategory = document.getElementById("product-category").value;
        const productImage = document.getElementById("product-image").files[0];

        // 驗證欄位
        if (!productName || !productDescription || !productPrice || !productStock || !productCategory || !productImage) {
            Swal.fire({
                icon: 'warning',
                title: '表單不完整',
                text: '請填寫所有欄位！',
                confirmButtonText: '確認'
            });
            return;
        }

        if (productPrice <= 0 || productStock < 0) {
            Swal.fire({
                icon: 'error',
                title: '輸入錯誤',
                text: '請確認價錢和庫存輸入正確！',
                confirmButtonText: '確認'
            });
            return;
        }

        // 顯示確認訊息
        Swal.fire({
            title: '確認提交',
            text: "您確定要新增此商品嗎？",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '是的，提交',
            cancelButtonText: '取消'
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit(); // 提交表單
            }
        });
    });
</script>
</body>
</html>
