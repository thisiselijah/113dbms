<?php require APP_ROOT . 'views/include/LoginHeader.php'; ?>
<?php require APP_ROOT . 'views/components/publicNavBar.php'; ?>

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

            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>