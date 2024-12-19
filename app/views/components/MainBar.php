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

                                <li><a href="./?url=show/merchandises">Shop </a></li> <!--按下會到商城-->
                                <li></li> 
                                <li></li> 
                            </ul>
                        </nav>
                    </div>
                    <!--main menu end-->
                    <div class="header__ridebar d-flex align-items-center">
                        <div class="header_account">
                            <ul class="d-flex">
                                <li class="account_link_menu"><a href="#"><img src="assets/img/icon/person.png"
                                            alt=""></a>
                                    <ul class="dropdown_account_link">
                                        <li>
                                            <a href="?url=user/orders">Order</a>
                                        </li>
                                        <?php
                                        if (isset($_SESSION['id'])) {
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

</header>
