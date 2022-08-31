<?php require APPROOT . '/views/inc/header_login.php'?>
<body>  
    <main class="loginMain">
        <span class="pupPylon">
            <div class="img-con">
                <img src="<?php echo URLROOT;?>/images/login-pylon.png">
            </div>
        </span>
        
        <div class="registration">
            <header>
                <h1>PUP-Itech AIS</h1>
                <div></div>
                <span>Welcome to PUP IAIS Registration</span>
            </header>

            <article class="verify-con">
                <h3 class="">Alumni Verification</h3>
                <p>We have sent an email to <span> <?php echo $data['email']?> </span> validating if you are a verified alumni of Polytechnic University of the Philippines Institute of Technology. After receiving the email follow the instructions to complete your registration.</p>
            </article>
            <div class="btn-con">
                <a href="<?php echo URLROOT;?>/users/login" class="primary">Ok</a>
            </div>
        </div>
    </main>
</body>
<?php require APPROOT . '/views/inc/footer.php'?>