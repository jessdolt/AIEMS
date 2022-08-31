<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="alumni editProfile">
        <section class="heroBox behind">
        </section>
        <section class="mainContent questionnaire">
            <div class="container">
                <form action="<?php echo URLROOT; ?>/profile/changePassword/<?php echo $data['alumni_id']?>" method="POST" class="form">
                    <div>
                        <h2>Change Password</h2>
                        <p>Choose a strong password and don’t reuse it for other accounts.</p>
                    </div>
                    <div class="questionCon changePass">
                        <div class="smallComponentsContainer">
                            <div>
                                <label for="old-password" class="outsideLabel">Old Password:</label>
                                <div class="textFieldContainer">
                                    <input type="password" name="oldPassword" id="old-password"required>
                                    <span class="error"><?php echo $data['oldPassword_error'] ?></span>
                                </div>
                            </div>
                            <div>
                                <label for="new-password" class="outsideLabel">New Password:</label>
                                <div class="textFieldContainer">
                                    <input type="password" name="password" id="new-password"required>
                                    <span class="error"><?php echo $data['password_error'] ?></span>
                                </div>
                            </div>
                            <div>
                                <label for="confirm-password" class="outsideLabel">Confirm Password:</label>
                                <div class="textFieldContainer">
                                    <input type="password" name="confirmPassword" id="confirm-password"required>
                                    <span class="error"><?php echo $data['confirmPassword_error'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button>
                        Change Password
                    </button>
                </form>
            </div>
        </section>
    </main>

<?php require APPROOT . '/views/inc/footer_u.php'; ?>