//登入失敗
const showAlert = () => {
    Swal.fire({
    icon: 'error',
    text: '請重新輸入密碼',
    title: '密碼錯誤',
    timer: 2000,
     timerProgressBar: true,
    })
}


//************下方為註冊功能************

//帳號創建成功
const signUp = () => {
    Swal.fire({
    icon: 'success',
    title: '創建成功',
    timer: 2000,
     timerProgressBar: true,
    })
}

// 按鈕和頁面切換控制
const nextButton = document.getElementById('next-button');
const backButton = document.getElementById('back-button');
const loginSlider = document.querySelector('.login-slider');

// 下一頁按鈕
nextButton.addEventListener('click', function () {
    loginSlider.style.transform = 'translateX(-50%)'; // 滑動到第二頁
    backButton.style.visibility = 'visible'; // 顯示返回按鈕
});

// 返回按鈕
backButton.addEventListener('click', function () {
    loginSlider.style.transform = 'translateX(0)'; // 滑動回第一頁
    backButton.style.visibility = 'hidden'; // 隱藏返回按鈕
});
