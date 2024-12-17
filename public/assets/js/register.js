function validateName(fullname) {
    return fullname.length > 0 && fullname.length <= 50;
}

function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
function validatePhoneNumber(phoneNumber) {
    const phoneRegex = /^\d{10}$/;
    return phoneRegex.test(phoneNumber);   
}

// 註冊即時驗證邏輯 (放在全域範圍內)
document.querySelector('input[name="fullname"]').addEventListener('blur', function() {
    if (!validateName(this.value.trim())) {
        this.setCustomValidity('姓名不能為空，且不得超過 50 字元');
    } else {
        this.setCustomValidity('');
    }
});


document.querySelector('input[name="email"]').addEventListener('blur', function() {
    if (!validateEmail(this.value.trim())) {
        this.setCustomValidity('請輸入有效的電子郵件地址(ex.example@gmail.com)');
    } else {
        this.setCustomValidity('');
    }
});

document.querySelector('input[name="phone_number"]').addEventListener('blur', function() {
    if (!validatePhoneNumber(this.value.trim())) {
        this.setCustomValidity('請輸入有效的電話號碼（10 碼數字）');
    } else {
        this.setCustomValidity('');
    }
});



document.getElementById('registerForm2').addEventListener('submit', function(event) {
    event.preventDefault(); // 防止表單提交

    const fullname = this.querySelector('input[name="fullname"]').value.trim();
    const email = this.querySelector('input[name="email"]').value.trim();
    const phoneNumber = this.querySelector('input[name="phone_number"]').value.trim();

    // 驗證表單欄位
    if (!validateName(fullname)) {
        showAlert('姓名不能為空，且不得超過 50 字元');
        return;
    }

    // 驗證電子郵件和電話號碼
    if (!validateEmail(email)) {
        alert('請輸入正確的電子郵件格式');
        return; // 終止提交
    }

    if (!validatePhoneNumber(phoneNumber)) {
        alert('請輸入正確的電話號碼（10 碼數字）');
        return; // 終止提交
    }

    // 如果驗證通過，繼續處理
    const data = new FormData(document.getElementById('registerForm1'));
    const formData = new FormData(this);
    for (const [key, value] of data.entries()) {
        formData.append(key, value);
    }

    fetch('?url=register', {    // 使用 fetch 向伺服器發送 POST 請求
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        
        console.log('Response data:', data);
        if (data.status === 'error') {
            alert(data.message || '發生錯誤，請稍後再試');
            showAlert();
        } else {
            signUp();
            
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
    setTimeout(redirect, 2000);
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