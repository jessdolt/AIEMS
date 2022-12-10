<?php require APPROOT . '/views/inc/header_login.php'?>

<body>  
    <main class="loginMain">
            
        <div>
            <header>
                <h1><?php echo empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname'];?></h1>
                <div></div>
                <span class="changePassHeader text-initial">Check your email</span>
                <span>
                    Please enter the verification code 
                    <br> 
                    sent to your email address
                </span>
            </header>

            <form action="<?php echo URLROOT; ?>/email/emailVerification" class="verification-code" method="POST">
                <div class="textFieldContainer">
                    <input type="number" name="code" id="verification-code" placeholder="000000" maxlength = "6" required>
                    <span class="error"><?php echo $data['codeError'] ?></span>
                </div>
                <Button>Submit</Button>
            </form>
            <form action="<?php echo URLROOT; ?>/email/resend" method ="POST">
            <button class="resend" id="submit" type="submit" value="submit">Resend Code</button>
            </form>
        </div>
    </main>

<?php require APPROOT . '/views/inc/footer.php'?>