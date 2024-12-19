<script src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

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
                                <li><a href="?url=home">Home</a></li> <!--按下menu會回到主頁面-->

                                <li><a class="active" href="./?url=show/merchandises">Shop </a></li> <!--按下會到商城-->
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
                                        <li>
                                            <a href="orderList.html">Order</a>
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

<div class="mini_cart" id="cart"></div>
<script type="text/babel">
    const Card = (props) => {
        return (
            <div className="cart_item">
                <div className="cart_img">
                    <a href="#">
                        <img src={props.image_path} alt="" />
                    </a>
                </div>
                <div className="cart_info">
                    <a href="#">{props.name}</a>
                    <p>
                        {props.quantity} x <span> $ {props.price} </span>
                    </p>
                </div>
                <div className="cart_remove">
                    <a href="#">
                        <i className="icon-close icons"></i>
                    </a>
                </div>
            </div>
        );
    };

    const Merchandise = (props) => {
        const renderCards = () => {
            return props.items.map((item, index) => <Card key={index} {...item} />);
        };
        return renderCards();
    };

    const Sum = ({ total }) => {
        return (
            <div className="mini_cart_table">
                <div className="cart_table_border">
                    <div className="cart_total">
                        <span>小計:</span>
                        <span className="price">${total}</span>
                    </div>
                    <div className="cart_total mt-10">
                        <span>總計:</span>
                        <span className="price">${total}</span>
                    </div>
                </div>
            </div>
        );
    };

    const Cart = () => {
        const [cartItems, setCartItems] = React.useState([]);

        React.useEffect(() => {
            fetch("?url=cart/fetch")
                .then((response) => response.json())
                .then((data) => setCartItems(data))
                .catch((error) => console.error("Error fetching cart data:", error));
        }, []);

        const merchandiseItems = Object.entries(cartItems).map(([id, item]) => ({
            id,
            name: item.name,
            price: item.price,
            quantity: item.quantity,
            image_path: item.image_path,
        }));

        const totalSum = merchandiseItems.reduce((sum, item) => sum + item.price * item.quantity, 0);

        return (
            <div className="mini_cart">
                <div className="cart_gallery">
                    <div className="cart_close">
                        <div className="cart_text">
                            <h3>購物車</h3>
                        </div>
                        <div className="mini_cart_close">
                            <a href="javascript:void(0)">
                                <i className="ion-android-close"></i>
                            </a>
                        </div>
                    </div>
                    <Merchandise items={merchandiseItems} />
                    
                </div>
                <Sum total={totalSum} />
                    <div class="mini_cart_footer">
                        <div class="cart_button">
                            <a href="?url=purchase/merchandises"><i class="fa fa-sign-in"></i> 結帳</a>
                        </div>
                    </div>
            </div>
            
        );
    };

    ReactDOM.render(<Cart />, document.getElementById("cart"));
</script>

</header>