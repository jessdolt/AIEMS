<?php require APPROOT . '/views/inc/header_login.php'?>
<body>  
    <main class="loginMain">
        <div>
            <header>
                <h1>AIEMS</h1>
                <div></div>
                <span>
                <title></title>

                    Sign in to 
                    <b><?php echo empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname'];?></b>
                    <br>
                    Alumni Information Event Management Sytem
                </span>
            </header>

            <form action="<?php echo URLROOT; ?>/users/login" method ="POST">
                <div class="textFieldContainer">
                    <input type="email" name="email" id="user-email" placeholder="Email" required>
                    <label class="icon" for="user-email">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 3C13.1935 3 14.3381 3.47411 15.182 4.31802C16.0259 5.16193 16.5 6.30653 16.5 7.5C16.5 8.69347 16.0259 9.83807 15.182 10.682C14.3381 11.5259 13.1935 12 12 12C10.8065 12 9.66193 11.5259 8.81802 10.682C7.97411 9.83807 7.5 8.69347 7.5 7.5C7.5 6.30653 7.97411 5.16193 8.81802 4.31802C9.66193 3.47411 10.8065 3 12 3ZM12 14.25C16.9725 14.25 21 16.2638 21 18.75V21H3V18.75C3 16.2638 7.0275 14.25 12 14.25Z"/>
                        </svg>
                    </label>
                    <span class="error"><?php echo $data['emailError']; ?></span>
                </div>
                
                <div class="textFieldContainer">
                    <input type="password" name="password" id="user-Password" placeholder="Password" required>
                    <label class="icon" for="user-Password">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12.2266C19 11.2339 18.2151 10.4266 17.25 10.4266H16.375V7.72656C16.375 5.24526 14.4124 3.22656 12 3.22656C9.58763 3.22656 7.625 5.24526 7.625 7.72656V10.4266H6.75C5.78487 10.4266 5 11.2339 5 12.2266V19.4266C5 20.4193 5.78487 21.2266 6.75 21.2266H17.25C18.2151 21.2266 19 20.4193 19 19.4266V12.2266ZM9.375 7.72656C9.375 6.23796 10.5528 5.02656 12 5.02656C13.4473 5.02656 14.625 6.23796 14.625 7.72656V10.4266H9.375V7.72656Z"/>
                        </svg>
                    </label>
                    <span class="error"><?php echo $data['passwordError']; ?></span>
                </div>
                <button type="submit" value="submit">Sign in</button>
            </form>
            <p>Register for an Alumni account here. <a href="<?php echo URLROOT;?>/users/signup">Sign Up</a></p>
            <a href="<?php echo URLROOT; ?>/email/forgotPassword"><span>forgot password</span></a>
        </div>
    </main>

<?php require APPROOT . '/views/inc/footer.php'?>