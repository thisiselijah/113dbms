<header class="header_section mb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_header d-flex justify-content-between align-items-center">
                    <div class="header_logo">
                        <a class="sticky_none" href="?url=home"><img src="assets/img/logo/logo.png" alt=""></a>
                    </div>
                    <!--main menu start-->
                    <div class="main_menu d-none d-lg-block">
                        <nav>
                            <ul class="d-flex">
                                <li><a class="active" href="?url=home">Home</a></li> <!--按下menu會回到主頁面-->

                                <li><a href="shop1.html">Shop </a></li> <!--按下會到商城-->
                            </ul>
                        </nav>
                    </div>
                    <!--main menu end-->
                    <div class="header__ridebar d-flex align-items-center">
                        <div class="header_account">
                            <ul class="d-flex">
                                <li class="shopping_cart"><a href="#"><img src="assets/img/icon/cart.png"
                                            alt=""></a></li>
                                <li class="account_link_menu"><a href="#"><img src="assets/img/icon/person.png"
                                            alt=""></a>
                                    <ul class="dropdown_account_link">
                                        <?php
                                        if (isset($_SESSION['username'])) {
                                            echo '<li><a href="?url=logout">Log out</a></li>';
                                        } else {
                                            echo '<li><a href="?url=loginPage">Log in</a></li>';
                                        }
                                        ?>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="canvas_open">
                            <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--mini cart-->
    <div class="mini_cart">
        <div class="cart_gallery">
            <div class="cart_close">
                <div class="cart_text">
                    <h3>cart</h3>
                </div>
                <div class="mini_cart_close">
                    <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                </div>
            </div>
            <div class="cart_item">
                <div class="cart_img">
                    <a href="#"><img src="assets/img/product/small-product1.png" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="#">Primis In Faucibus</a>
                    <p>1 x <span> $65.00 </span></p>
                </div>
                <div class="cart_remove">
                    <a href="#"><i class="icon-close icons"></i></a>
                </div>
            </div>
            <div class="cart_item">
                <div class="cart_img">
                    <a href="#"><img src="assets/img/product/small-product2.png" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="#">Letraset Sheets</a>
                    <p>1 x <span> $60.00 </span></p>
                </div>
                <div class="cart_remove">
                    <a href="#"><i class="icon-close icons"></i></a>
                </div>
            </div>
        </div>
        <div class="mini_cart_table">
            <div class="cart_table_border">
                <div class="cart_total">
                    <span>Sub total:</span>
                    <span class="price">$125.00</span>
                </div>
                <div class="cart_total mt-10">
                    <span>total:</span>
                    <span class="price">$125.00</span>
                </div>
            </div>
        </div>
        <div class="mini_cart_footer">
            <div class="cart_button">
                <a href="#"><i class="fa fa-shopping-cart"></i> View cart</a>
            </div>
            <div class="cart_button">
                <a href="#"><i class="fa fa-sign-in"></i> Checkout</a>
            </div>
        </div>
    </div>
    <!--mini cart end-->
    </div>
</header>

