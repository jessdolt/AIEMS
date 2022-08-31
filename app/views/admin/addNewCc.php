<?php require APPROOT . '/views/inc/header_adminManage.php';?>
<main class="admin managePage"><!-- remove cont-creator to access all-->
    <section class="card-con">
        <a href="<?php echo URLROOT?>/admin_manage/ccAccounts" class="back"> 
            <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.8385 20.4999C15.6891 20.5004 15.5415 20.4675 15.4065 20.4034C15.2715 20.3394 15.1525 20.246 15.0584 20.13L10.2275 14.1305C10.0804 13.9516 10 13.7272 10 13.4956C10 13.264 10.0804 13.0396 10.2275 12.8607L15.2284 6.86122C15.3982 6.65702 15.6422 6.52861 15.9066 6.50423C16.1711 6.47985 16.4344 6.56151 16.6387 6.73123C16.8429 6.90095 16.9714 7.14484 16.9958 7.40924C17.0202 7.67364 16.9385 7.9369 16.7687 8.1411L12.2979 13.5006L16.6187 18.8601C16.741 19.0069 16.8187 19.1856 16.8426 19.3751C16.8664 19.5646 16.8355 19.757 16.7535 19.9296C16.6714 20.1021 16.5416 20.2475 16.3795 20.3485C16.2173 20.4496 16.0296 20.5022 15.8385 20.4999Z"/>
            </svg>
        </a>
        <div class="header-con">
            <h1>New Admin Account</h1>
            <span>Fill the required Details to create account</span>
        </div>
        <form action="<?php echo URLROOT ?>/admin_manage/addCc" id="add-new-account" method="POST">
            <div>
                <label for="full-name" class="outsideLabel">Full Name:</label>
                <div class="textFieldContainer">
                    <input type="text" name="name" id="full-name" required>
                    <span class="error"><?php echo $data['name_err']?></span>
                </div>
            </div>
            <div>
                <label for="email-id" class="outsideLabel">Email:</label>
                <div class="textFieldContainer">
                    <input type="email" name="email" id="email-id"required>
                    <span class="error"><?php echo $data['email_err']?></span>
                </div>
            </div>
            <div>
                <label for="new-password" class="outsideLabel">New Password:</label>
                <div class="textFieldContainer">
                    <input type="password" name="password" id="new-password"required>
                    <span class="error"><?php echo $data['password_err']?></span>
                </div>
            </div>
            <div>
                <label for="confirm-password" class="outsideLabel">Confirm Password:</label>
                <div class="textFieldContainer">
                    <input type="password" name="confirmPassword" id="confirm-password"required>
                    <span class="error"><?php echo $data['confirmPassword_err']?></span>
                </div>
            </div>
        </form>
        <div class="btn-con">
            <button class="changePass" form="add-new-account">Add New Account</button>
        </div>
    </section>
    <p>Polytechnic University Institute of Technology Alumni Information System (PUP-IAIS)</p>
</main>
<?php require APPROOT . '/views/inc/footer_adminManage.php';?>