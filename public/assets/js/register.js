// 透過 fetch API 來完成表單的提交。
document.getElementById('registerForm2').addEventListener('submit', function(event) {
    event.preventDefault(); // 防止表單提交
    const data = new FormData(document.getElementById('registerForm1'));
    const formData = new FormData(this);
    for (const [key, value] of data.entries()) {
        formData.append(key, value);
    }
    fetch('?url=register', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Response data:', data);
        if (data.status === 'error') {
            showAlert();
        }else {
            signUp();
            setTimeout(redirect, 2000);
        }
        
    })
    .catch(error => console.error('Error:', error));
});



const showAlert = () => {
    Swal.fire({
    icon: 'error',
    title: '創建失敗',
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


const redirect = () => {
    window.location.href = './?url=loginPage';
}