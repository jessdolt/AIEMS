<?php require APPROOT . '/views/inc/header_login.php'?>
<body>  
    <main class="loginMain">
        
        <div class="registration" style="padding-top: 200px;">
            <header>
                <h1><?php echo empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname']." AIEMS" ;?></h1>
                <div></div>
                <span>Welcome to <?php echo empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname']." AIEMS" ;?> Registration</span>
            </header>

            <article class="verify-con">
                <h3 class="">Alumni Verification</h3>
                <p>We have sent an email to <span> <?php echo $data['email']?> </span> validating if you are a verified alumni of <?php echo empty($_SESSION['schoolname']) ? "the School" : $_SESSION['schoolname'] ;?>. After receiving the email follow the instructions to complete your registration.</p>
            </article>
            <div class="btn-con">
                <a href="<?php echo URLROOT;?>/users/login" class="primary">Ok</a>
            </div>
        </div>
    </main>
</body>
<?php require APPROOT . '/views/inc/footer.php'?>