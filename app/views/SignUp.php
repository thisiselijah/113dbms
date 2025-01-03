<?php require APP_ROOT . 'views/components/SignUPBar.php'; ?>
<?php require APP_ROOT . 'views/include/SignUpHeader.php'; ?>



<body>
    <!-- SignUp Form Section -->
    <div class="login-container">
        <div class="login-slider">
            <!-- First Section: Username and Password -->
            <div class="login-step">
                <h2 class="text-md-center">Sign Up</h2>
                <form id="registerForm1">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                    
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
    
                    <button type="button" id="next-button">Next</button>

                    <div calss ="text-md-left">
                        <text class="remind">Already have an account?</text>
                        <text class="register"><a href="?url=loginPage">Login</a></text>
                    </div>
                </form>
            </div>
    
            <!-- Second Section: Fullname, Email, Phone -->
            <div class="login-step">
                <form id="registerForm2">        
                    <label for="fullname">Fullname</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Enter your fullname" required>
    
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter your Email" required>
    
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone_number" placeholder="Enter your phone" required>
                    
                    <button type="submit" >Sign Up</button>

                    

                   <!-- 返回按鈕 -->
                    <button type="button" id="back-button" class="icon-button">
                        <i class="fa fa-arrow-left"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Main JS -->
    <script src="assets/js/register.js"></script>

</body>
</html>
