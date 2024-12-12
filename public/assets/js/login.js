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


//帳號創建成功
const signUp = () => {
    Swal.fire({
    icon: 'success',
    title: '創建成功',
    timer: 2000,
     timerProgressBar: true,
    })
}

//註冊帳號的第二頁
document.getElementById('next-button').addEventListener('click', function () {
    // 移動到第二部分
    document.querySelector('.login-slider').style.transform = 'translateX(-50%)';
});

// 返回按鈕
document.getElementById('back-button').addEventListener('click', function () {
    // 滑動回到第一頁
    document.querySelector('.login-slider').style.transform = 'translateX(0)';
});

