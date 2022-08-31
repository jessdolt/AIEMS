<?php require APPROOT . '/views/inc/header_adminManage.php';?>
<main class="admin managePage"><!-- remove cont-creator to access all-->
    <section class="card-con specificPadding">
        <a href="<?php echo URLROOT?>/admin_manage/manage" class="back"> 
            <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.8385 20.4999C15.6891 20.5004 15.5415 20.4675 15.4065 20.4034C15.2715 20.3394 15.1525 20.246 15.0584 20.13L10.2275 14.1305C10.0804 13.9516 10 13.7272 10 13.4956C10 13.264 10.0804 13.0396 10.2275 12.8607L15.2284 6.86122C15.3982 6.65702 15.6422 6.52861 15.9066 6.50423C16.1711 6.47985 16.4344 6.56151 16.6387 6.73123C16.8429 6.90095 16.9714 7.14484 16.9958 7.40924C17.0202 7.67364 16.9385 7.9369 16.7687 8.1411L12.2979 13.5006L16.6187 18.8601C16.741 19.0069 16.8187 19.1856 16.8426 19.3751C16.8664 19.5646 16.8355 19.757 16.7535 19.9296C16.6714 20.1021 16.5416 20.2475 16.3795 20.3485C16.2173 20.4496 16.0296 20.5022 15.8385 20.4999Z"/>
            </svg>
        </a>
        <div class="header-con">
            <h1>Manage Content Creator Accounts</h1>
            <span>Add or Remove Admin Users</span>
        </div>
        <form action="" id="add-new-account" class="table-form">
            <table class="data-table">
                <?php if($url[1] != 'deleteRowCc'):?>
                <?php foreach($data as $cc): ?>
                <tr>
                    <td>
                        <?php if(empty($cc->image)): ?>
                            <img src="<?php echo URLROOT?>/images/official-default-avatar.svg">
                        <?php else:?>
                            <img src="<?php echo URLROOT?>/uploads/<?php echo $cc->image?>">
                        <?php endif; ?>
                    </td>
                    <td><p class="full-name"><?php echo $cc->name?></p></td>
                    <td><p class="email"><?php echo $cc->email?></p></td>
                    <td><div class="option icon" tabindex="0">
                        <span class="optionSpan">&#8942</span>
                        <div class="optionModal">
                            <button type="button" class="btnDeleteAccount" data-id="<?php echo $cc->user_id ?>" data-url="<?php echo URLROOT?>/admin_manage/deleteRowCc">
                                <svg viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.75 1.875H2.25C1.62868 1.875 1.125 2.43464 1.125 3.125V3.75C1.125 4.44036 1.62868 5 2.25 5H15.75C16.3713 5 16.875 4.44036 16.875 3.75V3.125C16.875 2.43464 16.3713 1.875 15.75 1.875Z"/>
                                    <path d="M2.61724 6.25C2.57772 6.24977 2.53859 6.25879 2.50242 6.27648C2.46624 6.29417 2.43383 6.32014 2.40729 6.35268C2.38076 6.38523 2.36069 6.42362 2.34841 6.46536C2.33612 6.5071 2.33189 6.55125 2.33599 6.59493L3.26095 16.4606C3.26076 16.4634 3.26076 16.4663 3.26095 16.4691C3.30928 16.9255 3.50672 17.3462 3.81579 17.6514C4.12486 17.9567 4.52404 18.1252 4.93755 18.125H13.0618C13.4752 18.125 13.8742 17.9564 14.1831 17.6512C14.4921 17.3459 14.6894 16.9253 14.7377 16.4691V16.4609L15.6613 6.59493C15.6654 6.55125 15.6611 6.5071 15.6488 6.46536C15.6366 6.42362 15.6165 6.38523 15.59 6.35268C15.5634 6.32014 15.531 6.29417 15.4948 6.27648C15.4587 6.25879 15.4195 6.24977 15.38 6.25H2.61724ZM11.3662 13.3082C11.4197 13.3659 11.4623 13.4349 11.4916 13.5111C11.5209 13.5873 11.5362 13.6692 11.5367 13.752C11.5373 13.8349 11.523 13.917 11.4947 13.9937C11.4664 14.0703 11.4246 14.1399 11.3719 14.1985C11.3192 14.2571 11.2565 14.3034 11.1875 14.3348C11.1185 14.3662 11.0446 14.3821 10.97 14.3814C10.8955 14.3808 10.8217 14.3637 10.7532 14.3312C10.6846 14.2986 10.6226 14.2512 10.5706 14.1918L8.99986 12.4465L7.42872 14.1918C7.32275 14.3062 7.18051 14.3697 7.03276 14.3685C6.885 14.3674 6.74359 14.3016 6.63908 14.1856C6.53458 14.0695 6.47537 13.9124 6.47426 13.7482C6.47315 13.5841 6.53022 13.426 6.63314 13.3082L8.20427 11.5625L6.63314 9.8168C6.53022 9.699 6.47315 9.54093 6.47426 9.37676C6.47537 9.21259 6.53458 9.05549 6.63908 8.93942C6.74359 8.82336 6.885 8.75764 7.03276 8.75648C7.18051 8.75532 7.32275 8.8188 7.42872 8.93321L8.99986 10.6785L10.5706 8.93321C10.6766 8.8188 10.8188 8.75532 10.9666 8.75648C11.1144 8.75764 11.2558 8.82336 11.3603 8.93942C11.4648 9.05549 11.524 9.21259 11.5251 9.37676C11.5262 9.54093 11.4691 9.699 11.3662 9.8168L9.79509 11.5625L11.3662 13.3082Z"/>
                                </svg>
                            </button>
                        </div>
                    </div></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </form>
        <div class="btn-con">
            <a href="<?php echo URLROOT?>/admin_manage/addCc" class="changePass" form="add-new-account">Add New Account</a>
        </div>
    </section>
    <p>Polytechnic University Institute of Technology Alumni Information System (PUP-IAIS)</p>
</main>
</div>
</div>
<div class="alertModalContainer <?php echo (isset($data['password_error'])) ? 'show' : ''?>">
        <!-- this inline -->
        <div class="alertModal deleteAlert manage <?php echo (isset($data['password_error'])) ? 'show' : ''?>">
            <svg></svg>
            <form action="" class="delete-acc-form" method="POST">
                <h2>Enter Password to Delete</h2>
                <div class="column">
                    <label for="password" class="outsideLabel">Password:</label>
                    <div class="textFieldContainer">
                        <input type="password" name="password" id="password" required>
                        <span class="error"><?php echo (isset($data['password_error'])) ? $data['password_error'] : '' ?></span>
                    </div>
                </div>
                <div>
                    <a href="<?php echo URLROOT ?>/admin_manage/ccAccounts" class="cancelBtn">Cancel</a>
                    <button class="modalDeleteInline">Delete</button>
                </div>
            </form>
        </div>
    </div>

        
</body>
</html> 