<?php require APPROOT . '/views/inc/header_login.php'?>
<body>  
    <main class="loginMain">
        
        <div class="registration" style="padding-top: 200px;">
            <header>
                <h1><?php echo empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname']." AIEMS" ;?></h1>
                <div></div>
                <span>Registration Failed</span>
            </header>
        
            <article class="verify-con">
                <h3 class="">Alumni Verification Unsuccessful</h3>
                <p>There's a problem on your registration and the possible reasons are:</p>
                <ul>
                    <li>Your student number is not yet listed as an alumni by the admin.</li>
                    <li>The student number/surname/birth date you entered doesn't match in the database.</li>
                </ul>
            </article>
            <div class="btn-con">
                <a href="<?php echo URLROOT;?>/users/login" class="primary">Ok</a>
            </div>
        </div>
    </main>
</body>
</html>
<?php require APPROOT . '/views/inc/footer.php'?>