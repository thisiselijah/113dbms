document.addEventListener('DOMContentLoaded', () => {
    const cartGallery = document.querySelector('.cart_gallery');

    // 綁定 "加入購物車" 按鈕點擊事件
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.getAttribute('data-id');
            const productName = button.getAttribute('data-name');
            const productPrice = parseFloat(button.getAttribute('data-price'));
            const productImg = button.getAttribute('data-img');

            // 獲取對應的數量輸入框
            const quantityInput = button.closest('.product_details_right').querySelector('.pro-qty input');
            const quantity = parseInt(quantityInput.value) || 1; // 確保數量為有效值

            // 檢查購物車是否已有此商品
            let existingItem = document.querySelector(`.cart_item[data-id="${productId}"]`);
            if (existingItem) {
                // 更新數量
                let currentQuantity = parseInt(existingItem.getAttribute('data-quantity'));
                let newQuantity = currentQuantity + quantity;
                existingItem.setAttribute('data-quantity', newQuantity);
                existingItem.querySelector('.item_quantity').textContent = newQuantity;
            } else {
                // 添加新商品
                const cartItemHTML = `
                    <div class="cart_item" data-id="${productId}" data-price="${productPrice}" data-quantity="${quantity}">
                        <div class="cart_img">
                            <a href="#"><img src="${productImg}" alt="${productName}"></a>
                        </div>
                        <div class="cart_info">
                            <a href="#">${productName}</a>
                            <p>
                                <span class="item_quantity">${quantity}</span> x <span class="item_price">$${productPrice.toFixed(2)}</span>
                            </p>
                        </div>
                    </div>
                `;
                cartGallery.insertAdjacentHTML('beforeend', cartItemHTML);
            }

            // 更新購物車數量和金額
            updateCart();
            const cartCount = getCartCount();
            updateCartCount(cartCount); // 更新購物車圖標上的數字
        });
    });

    // 更新購物車金額
    function updateCart() {
        let cartItems = document.querySelectorAll('.cart_item');
        let subtotal = 0;

        cartItems.forEach(item => {
            let quantity = parseInt(item.getAttribute('data-quantity'));
            let price = parseFloat(item.getAttribute('data-price'));
            subtotal += quantity * price;
        });

        document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
        document.getElementById('total').textContent = `$${subtotal.toFixed(2)}`;
    }

    // 更新購物車數量
    function updateCartCount(count) {
        const cartCount = document.getElementById('cart-count'); // 假設圖標數字元素的ID是 cart-count

        if (count > 0) {
            cartCount.textContent = count; // 顯示數量
            cartCount.style.display = 'inline-block'; // 顯示數字 (確保不被隱藏)
        } else {
            cartCount.textContent = ''; // 清空數字
            cartCount.style.display = 'none'; // 隱藏數字
        }
    }


    // 計算購物車內商品數量
    function getCartCount() {
        let count = 0;
        document.querySelectorAll('.cart_item').forEach(item => {
            count += parseInt(item.getAttribute('data-quantity'));
        });
        return count;
    }
});
