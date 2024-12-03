document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // 防止表單提交

    const formData = new FormData(this);

    fetch('?url=login', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Response data:', data);
        if (data.status === 'error') {
            Swal.fire({
                icon: 'error',
                text: data.message,
                title: '密碼錯誤',
                timer: 2000,
                timerProgressBar: true,
            });
        } else{
            redirect();
        }
        
    })
    .catch(error => console.error('Error:', error));
});

const redirect = () => {
    window.location.href = './?url=home';
}