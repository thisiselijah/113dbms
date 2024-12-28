<?php

class ShopController extends Controller{

    private mixed $merchandiseModel;
    private mixed $merchandiseReviews;
    private mixed $cartsModel;
    private mixed $ordersModel;
    private mixed $orderItemsModel;
    private mixed $categoryModel;

    public function __construct() {
        $this->merchandiseModel = $this->model('Merchandises'); 
        $this->categoryModel = $this->model('categories');
    }

    public function showSingleProduct(){
        $this->merchandiseReviews = $this->model('MerchandiseReviews');
        $getData = $this->retrieveGetData();
        $data = [
            'merchandise' => $this->merchandiseModel->getMerchandiseById($getData['id']),
            'reviews' => $this->merchandiseReviews->getReviewsByMerchandiseId($getData['id']),
        ];
        $this->view('single-product',$data);
    }

    public function showMerchandises() {
        $getData = $this->retrieveGetData();
        $categories = $this->merchandiseModel->getAllMerchandiseCategoryCount();
        $merchandises = isset($getData['category_id']) && !empty($getData['category_id']) 
            ? $this->merchandiseModel->getMerchandisesByCategoryId($getData['category_id'],isset($getData['page']) ? (int)$getData['page'] : 1) 
            : $this->merchandiseModel->getLimitMerchandises(isset($getData['page']) ? (int)$getData['page'] : 1);
        $identity = isset($_SESSION['identity']) ? $_SESSION['identity'] : null;
        $data = [
            'categories' => $categories,
            'merchandises' => $merchandises,
            'merchandisesCount' => $this->merchandiseModel->getAllMerchandiseCount(),
            'identity' => $identity,
        ];
        $this->view('merchandises', $data);
    }
    

    public function searchItem(){
        $postData = $this->retrievePostData();
        if (!isset($postData['item']) || empty($postData['item'])) {
            $this->redirect('?url=show/merchandises');
        }
        $merchandises = $this->merchandiseModel->searchMerchandiseByName($postData['item']);
        if (empty($merchandises)) {
            $this->view('merchandises', [
                'categories' => $this->merchandiseModel->getAllMerchandiseCategoryCount(),
                'merchandises' => $merchandises,
                'merchandisesCount' => count($merchandises),
                'identity'=>$_SESSION['identity'],
            ]);
        }
        $data = [
            'categories' => $this->merchandiseModel->getAllMerchandiseCategoryCount(),
            'merchandises' => $merchandises,
            'merchandisesCount' => count($merchandises),
            'identity'=>$_SESSION['identity'],
        ];
        $this->view('merchandises', $data);
        
    }

    public function purchaseMerchandise(){
        $this->cartsModel = $this->model('CartsModel');
        $carts = $this->cartsModel->getUserCart();
        foreach($carts as $cart){
            $merchandise = $this->merchandiseModel->getMerchandiseNamePricePathById($cart['merchandise_id']);
            $merchandises[] = [
                'id' => $cart['merchandise_id'],
                'name' => $merchandise['name'],
                'price' => $merchandise['price'],
                'image_path' => $merchandise['image_path'],
                'quantity' => $cart['quantity'],
                
            ];  
        }
        $data =[    
            'merchandises' => $merchandises
        ];
        $this->view('checkOut',$merchandises);
    }

    public function storeOrders(){
        $this->ordersModel = $this->model('Orders');
        $this->orderItemsModel = $this->model('Order_items');

        $postData = $this->retrievePostData();
        $status = 'processing'; 
        $items = $postData['items'];
        $this->ordersModel->insertOrder($postData['user_id'],$status,$postData['total_price'],$postData['address'],$postData['payment']);
        $order_id = $this->ordersModel->returnOrderId();
        foreach ($items as $item){
            $this->orderItemsModel->insertOrderItem($order_id['next_id'],$item['id'],$item['quantity']);
        }
        $this->redirect(".\?url=user/orders");
    }
    
    public function showNewMerchandise(){
        $categories = $this->categoryModel->getCategory();
        $this->view("admin-new-merchandise",$categories);
    }

    public function newMerchandise(){
        $postData = $this->retrievePostData();
        // 圖片上傳處理
        $uploadDir = 'assets/img/product/';
        $category = $this->categoryModel->getNameIdById($postData['category']);
        $uploadDir .= $category ['name']."/";
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        $imagePath = '';
        $imagePath = move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile) ? $uploadFile : die("圖片上傳失敗！");
        $this->merchandiseModel->newMerchandise($postData['category'],$postData['name'],$postData['description'],$postData['price'],$postData['stock'],$imagePath);
        $this->redirect(".\?url=show/merchandises");

    }

    public function showModifyMerchandise(){
        $getData = $this->retrieveGetData();
        $merchandises = $this->merchandiseModel->getMerchandiseById($getData['id']);
        $category = $this->categoryModel->getCategory();
        $data =[
            'merchandises' => $merchandises,
            'category' => $category
        ];
        $this->view('admin-modify-merchandise',$data);
    }

    public function modifyMerchandise(){
        $postData = $this->retrievePostData();
        $currentMerchandise = $this->merchandiseModel->getMerchandiseById($postData['id']);
        if (!$currentMerchandise) {
            die("無效的商品 ID！");
        }
        $currentCategoryId = $currentMerchandise['category'];
        $currentImagePath = $currentMerchandise['image_path'];

        $newCategoryId = $postData['category'];
        $categoryChanged = ($currentCategoryId != $newCategoryId);
        $newCategory = $this->categoryModel->getNameIdById($newCategoryId);
        if (!$newCategory) {
            die("無效的分類 ID！");
        }
        $newCategoryName = $newCategory['name'];
        $uploadDir = 'assets/img/product/' . $newCategoryName . '/';
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                die("無法創建目標資料夾！");
            }
        }

        $imagePath = $currentImagePath;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $fileMimeType = mime_content_type($_FILES['image']['tmp_name']);
            if (!in_array($fileMimeType, $allowedMimeTypes)) {
                die("無效的圖片格式。只允許 JPG, PNG, GIF 格式。");
            }
            $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $uniqueFileName = uniqid('img_', true) . '.' . $fileExtension;

            $uploadFile = $uploadDir . $uniqueFileName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                if ($currentImagePath && file_exists($currentImagePath)) {
                    unlink($currentImagePath);
                }
                $imagePath = $uploadFile;
            } else {
                die("圖片上傳失敗！");
            }
        } else {
            if ($categoryChanged) {
                if ($currentImagePath && file_exists($currentImagePath)) {
                    $imageFileName = basename($currentImagePath);
                    $newImagePath = $uploadDir . $imageFileName;
                    if (rename($currentImagePath, $newImagePath)) {
                        $imagePath = $newImagePath;
                    } else {
                        die("圖片移動失敗！");
                    }
                }
            }
        }
        $postData['image_path'] = $imagePath;
        $updateResult = $this->merchandiseModel->updateMerchandise($postData);
        if ($updateResult) {
            $this->redirect("./?url=show/merchandises");
        } else {
            die("更新商品失敗！");
        }
    }
}