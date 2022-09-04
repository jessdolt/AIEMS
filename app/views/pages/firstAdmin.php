<?php require APPROOT . '/views/inc/header_login.php'; ?>

<main class="admin managePage">
    <section class="card-con">
        <div class="header-con">
            <h1>Create Admin Account</h1>
            <span>Fill the required Details to create account</span>
        </div>
        <form class="form" id="firstAdminForm">

            <div>
                <label for="full-name" class="outsideLabel">Full name:</label>
                <div class="textFieldContainer">
                <input
                    type="text"
                    name="name"
                    id="user-name"
                    required
                    class="user-name"
                    />
                    <span class="error"></span>
                </div>
            </div>
            <div>
                <label for="email-id" class="outsideLabel">Email:</label>
                <div class="textFieldContainer">
                <input
                    type="text"
                    name="email"
                    id="user-email"
                    required
                    class="user-email"
                    />
                    <span class="error"></span>
                </div>
            </div>
            <div>
                <label for="new-password" class="outsideLabel">Password:</label>
                <div class="textFieldContainer">
                <input
                    type="text"
                    name="password"
                    id="user-password"
                    required
                    class="user-password"
                    />
                    <span class="error" id="passwordError"></span>
                </div>
            </div>
            <div>
                <label for="confirm-password" class="outsideLabel">Confirm password:</label>
                <div class="textFieldContainer">
                <input
                    type="text"
                    name="confirmPassword"
                    id="user-confirmPassword"
                    required
                    class="user-confirmPassword"
                    />
                    <span class="error" id="confirmPasswordError"></span>
                </div>
            </div>
        
            <div class="btn-con">
                <button class="changePass">Save Account</button>
            </div>
        </form>

    </section>
    <p>Alumni Information and Event Management System (AIEMS)</p>
</main>
<script src="<?= URLROOT?>/js/SiteConfig/firstAdmin.js"></script>
</body>
</html>
