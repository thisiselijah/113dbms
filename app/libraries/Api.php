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
            
        ],
        'hasLogin' => [
            'logout' => ['AuthController', 'logout'],
            'cart/fetch' => ['PageController','getCart'],
            'cart/add' => ['PageController','addItem'],
            'purchase/merchandises' => ['ShopController','purchaseMerchandise'],
            'submit/order' => ['ShopController','storeOrders'],
            'user/orders' => ['OrderController','showOrders'],
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

