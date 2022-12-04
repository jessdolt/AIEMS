<?php require APPROOT . '/views/inc/header_login.php'?>
<body>  
    <main class="loginMain">
        
        
        <div class="registration" style="padding-top: 200px;"> 
            <header>
                <h1><?php echo empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname'];?></h1>
                <div></div>
                <span>Welcome to <?php echo empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname'];?> Registration</span>
            </header>

            <form action="<?php echo URLROOT;?>/users/signup" method="POST" id="changeThisNiel">
                <h3 class="">Enter Alumni Information</h3>
                <div class="input-con-list">
                    <div>
                        <label for="student-id" class="outsideLabel">Student ID:</label>
                        <div class="textFieldContainer">
                            <input type="text" name="student_no" id="student-id" value="<?php echo $data['student_no']?>" required>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div>
                        <label for="last-name" class="outsideLabel">Last Name:</label>
                        <div class="textFieldContainer">
                            <input type="text" name="lastName" id="last-name" value="<?php echo $data['last_name']?>" required>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div>
                        <label for="email-id" class="outsideLabel">Email:</label>
                        <div class="textFieldContainer">
                            <input type="email" name="email" id="email-id" value="<?php echo $data['email']?>" required>
                            <span class="error"><?php echo $data['email_err']?></span>
                        </div>
                    </div>
                    <div>
                        <label for="birth-date" class="outsideLabel">Birth Date:</label>
                        <div class="textFieldContainer">
                            <input type="date" name="birthDate" id="birth-date"  value="<?php echo $data['birth_date']?>" required>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div>
                        <label for="password" class="outsideLabel">Password:</label>
                        <div class="textFieldContainer">
                            <input type="password" name="password" id="password" required>
                            <span class="error"><?php echo $data['password_err']?></span>
                        </div>
                    </div>
                    <div> 
                        <label for="confirm-password" class="outsideLabel">Confirm Password:</label>
                        <div class="textFieldContainer">
                            <input type="password" name="confirm_password" id="confirm-password" required>
                            <span class="error"><?php echo $data['confirm_password_err']?></span>
                        </div>
                    </div>

                </div>
            </form>
            <div class="btn-con">
                <a href="<?php echo URLROOT?>/users/login">Cancel</a>
                <Button class="primary" form="changeThisNiel">Submit</Button>
            </div>
        </div>
    </main>
</body>

<?php require APPROOT . '/views/inc/footer.php'?>