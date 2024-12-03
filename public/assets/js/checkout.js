//送出訂單按鈕
const showAlert = () => {
    Swal.fire({
    icon: 'question',
    title: '是否確定下單',
    confirmButtonText: "是",
    cancelButtonText: "再想想",
    showCancelButton: true,
}).then((result) => {
    console.log(result)
    if(result.isConfirmed){
        Swal.fire({
            icon: 'success',
            title: '訂單已送出',
        })
    }
})
}


//計算訂單區塊
document.addEventListener('DOMContentLoaded', () => {
    const cartItems = document.querySelectorAll('.cart-item');
    const totalAmountElement = document.getElementById('total-amount');
  
    // 更新整體總金額
    const updateTotalAmount = () => {
      let total = 0;
      document.querySelectorAll('.total-price').forEach((item) => {
        const price = parseFloat(item.textContent.replace('$', '').trim()); // 去掉多餘文字
        total += isNaN(price) ? 0 : price; // 防止非數值導致計算錯誤
      });
      totalAmountElement.textContent = `$${total.toFixed(0)}`; // 顯示為整數
    };
  
    cartItems.forEach((item) => {
      const minusButton = item.querySelector('.minus');
      const addButton = item.querySelector('.add');
      const numElement = item.querySelector('.num');
      const priceElement = item.querySelector('.product-price');
      const totalElement = item.querySelector('.total-price');
      const removeButton = item.querySelector('.remove-item');
  
      let count = parseInt(numElement.textContent); // 初始數量
      const price = parseFloat(priceElement.dataset.price); // 單價，從 data-price 中提取
  
      // 更新單個商品的總價
      const updateTotalPrice = () => {
        const totalPrice = price * count;
        totalElement.textContent = `$${totalPrice.toFixed(0)}`;
        updateTotalAmount(); // 同步更新整體總金額
      };
  
      // 綁定減少數量按鈕
      minusButton.addEventListener('click', () => {
        if (count > 1) {
          count--;
          numElement.textContent = count;
          updateTotalPrice();
        }
      });
  
      // 綁定增加數量按鈕
      addButton.addEventListener('click', () => {
        count++;
        numElement.textContent = count;
        updateTotalPrice();
      });
  
      // 綁定刪除商品按鈕
      removeButton.addEventListener('click', () => {
        item.remove(); // 刪除該商品項
        updateTotalAmount(); // 更新整體總金額
      });
  
      updateTotalPrice(); // 初始化每個商品的總價
    });
  
    updateTotalAmount(); // 初始化整體總金額
  });
  
  