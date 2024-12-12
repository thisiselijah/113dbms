<?php require APP_ROOT . 'views/components/loginBar.php'; ?>
<?php require APP_ROOT . 'views/include/LoginHeader.php'; ?>
<!--
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="public/?url=login" method="post">
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                placeholder="Enter your username"
                required />

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter your password"
                required />
            <button type="submit" >Login</button>
        </form>
    </div>
</body>

</html>
-->

<body>
    <div class="login-container">
        <h2 class="text-md-center">Login</h2>
        <form id="loginForm" method="post">
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                placeholder="Enter your username"
                required />

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter your password"
                required />

            <button type="submit" >Login</button>

            <div calss ="text-md-left">
                <text class="remind">Don't have an account?</text>
                <text class="register"><a href="SignUp.html">Sign up</a></text>     <!--轉到註冊-->
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/login.js"></script>
</body>

</html>