<?php require APPROOT . '/views/inc/header_login.php'?>

<body>  
    <main class="loginMain">
            
        <div>
            <header>
                <h1><?php echo empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname'];?></h1>
                <div></div>
                <span class="changePassHeader">Change Password</span>
                <span>
                    Enter your new password
                </span>
            </header>

            <form action="<?php echo URLROOT; ?>/email/forgotNewPassword" method="POST">
                <div class="textFieldContainer">
                    <input type="password" name="password" id="new-pass" placeholder="Password" required>
                    <label class="icon" for="new-pass">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12.2266C19 11.2339 18.2151 10.4266 17.25 10.4266H16.375V7.72656C16.375 5.24526 14.4124 3.22656 12 3.22656C9.58763 3.22656 7.625 5.24526 7.625 7.72656V10.4266H6.75C5.78487 10.4266 5 11.2339 5 12.2266V19.4266C5 20.4193 5.78487 21.2266 6.75 21.2266H17.25C18.2151 21.2266 19 20.4193 19 19.4266V12.2266ZM9.375 7.72656C9.375 6.23796 10.5528 5.02656 12 5.02656C13.4473 5.02656 14.625 6.23796 14.625 7.72656V10.4266H9.375V7.72656Z"/>
                        </svg>
                    </label>
                    <span class="error"><?php echo $data['passwordError']?></span>
                </div>
                <div class="textFieldContainer">
                    <input type="password" name="confirmPassword" id="new-pass-confirm" placeholder="Confirm Password" required>
                    <label class="icon" for="new-pass-confirm">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 12.5C20 14.6217 19.1571 16.6566 17.6569 18.1569C16.1566 19.6571 14.1217 20.5 12 20.5C9.87827 20.5 7.84344 19.6571 6.34315 18.1569C4.84285 16.6566 4 14.6217 4 12.5C4 10.3783 4.84285 8.34344 6.34315 6.84315C7.84344 5.34285 9.87827 4.5 12 4.5C14.1217 4.5 16.1566 5.34285 17.6569 6.84315C19.1571 8.34344 20 10.3783 20 12.5V12.5ZM16.03 9.47C15.9586 9.39882 15.8735 9.34277 15.7799 9.30522C15.6863 9.26766 15.5861 9.24936 15.4853 9.25141C15.3845 9.25347 15.2851 9.27583 15.1932 9.31717C15.1012 9.35851 15.0185 9.41797 14.95 9.492L11.477 13.917L9.384 11.823C9.24182 11.6905 9.05378 11.6184 8.85948 11.6218C8.66518 11.6253 8.47979 11.704 8.34238 11.8414C8.20497 11.9788 8.12625 12.1642 8.12283 12.3585C8.1194 12.5528 8.19152 12.7408 8.324 12.883L10.97 15.53C11.0413 15.6012 11.1262 15.6572 11.2196 15.6949C11.313 15.7325 11.413 15.7509 11.5137 15.7491C11.6144 15.7472 11.7137 15.7251 11.8057 15.684C11.8977 15.6429 11.9804 15.5837 12.049 15.51L16.041 10.52C16.1771 10.3785 16.2523 10.1893 16.2504 9.99296C16.2485 9.79664 16.1698 9.60888 16.031 9.47H16.03Z"/>
                        </svg> 
                    </label>
                    <span class="error"><?php echo $data['confirmPasswordError'] ?></span>
                </div>
                <Button>Submit</Button>
            </form>

        </div>
    </main>

<?php require APPROOT . '/views/inc/footer.php'?>