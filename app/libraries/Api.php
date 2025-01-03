<?php
class Api {
    private array $routes = [
        'noRestriction' => [
            'post/show' => ['PostController', 'show'],
            'home' => ['PageController','showHome'],
            'show/merchandises' => ['ShopController','showMerchandises'],
            'merchandises/merchandise' => ['ShopController','showSingleProduct'],
            'loginPage' => ['PageController','showLoginPage'],
            'login' => ['AuthController', 'login'],
            'search' => ['ShopController','searchItem'],
            'register' => ['AuthController', 'register'],  
            'registerPage' => ['PageController','showRegisterPage']
        ],
        'hasLogin' => [
            'logout' => ['AuthController', 'logout'],
            'cart/fetch' => ['PageController','getCart'],
            'cart/add' => ['PageController','addItem'],
            'purchase/merchandises' => ['ShopController','purchaseMerchandise'],
            'submit/order' => ['ShopController','storeOrders'],
            'user/orders' => ['OrderController','showOrders'],
            'cart/delete' => ['PageController','deleteItem'],
            'user/submit/reviews' => ['OrderController','storeReviews'],
            
        ],
        'admin' => [
            'admin/show/new/merchandise'=>['ShopController','showNewMerchandise'],
            'admin/new/merchandise'=>['ShopController','newMerchandise'],
            'admin/show/modify/merchandise'=>['ShopController','showModifyMerchandise'],
            'admin/modify/merchandise'=>['ShopController','modifyMerchandise'],
            'admin/orders'=>['OrderController','adminShowOrders'],
            'admin/orders/operations'=>['OrderController','ordersOperations'],
        ]
    ];

    /**
     * @throws HttpStatusException
     */
    public function findRoute($targetRoute): array
    {
        foreach ($this->routes as $restriction => $route) {
            if (array_key_exists($targetRoute, $route)) {
                return [
                    'restriction' => $restriction,
                    'handler' => $route[$targetRoute]
                ];
            }
        }
        throw new HttpStatusException(404, "找不到您想要瀏覽的網頁或執行的動作!");
    }
}

