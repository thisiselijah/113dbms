import { useState, useEffect } from "react";
import Merchandise from "./Merchandise";
import Sum from "./Sum";

const Cart = () => {
  const [cartItems, setCartItems] = useState([]);

  useEffect(() => {
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

const totalSum = cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);

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
    </div>
);
};

export default Cart;



