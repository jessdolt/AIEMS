<?php require APPROOT . '/views/inc/header_login.php'?>
<body>  
    <main class="loginMain">
            
        <div>
            <header>
                <h1><?php echo empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname'];?></h1>
                <div></div>
                <span class="changePassHeader">Password Reset</span>
                <span>
                    Please enter your email address to
                    <br> 
                    find your account
                </span>
            </header>

            <form action="<?php echo URLROOT; ?>/email/forgotPassword" method="POST">
                <div class="textFieldContainer">
                    <input type="email" name="email" id="user-email" placeholder="Email" required>
                    <label class="icon" for="user-email">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 3C13.1935 3 14.3381 3.47411 15.182 4.31802C16.0259 5.16193 16.5 6.30653 16.5 7.5C16.5 8.69347 16.0259 9.83807 15.182 10.682C14.3381 11.5259 13.1935 12 12 12C10.8065 12 9.66193 11.5259 8.81802 10.682C7.97411 9.83807 7.5 8.69347 7.5 7.5C7.5 6.30653 7.97411 5.16193 8.81802 4.31802C9.66193 3.47411 10.8065 3 12 3ZM12 14.25C16.9725 14.25 21 16.2638 21 18.75V21H3V18.75C3 16.2638 7.0275 14.25 12 14.25Z"/>
                        </svg>
                    </label>
                    <span class="error"><?php echo $data['emailError']; ?></span>
                </div>
                <Button>Submit</Button>
            </form>

        </div>
    </main>

<?php require APPROOT . '/views/inc/footer.php'?>