<?php require APPROOT . '/views/inc/header_adminManage.php';?>
<main class="admin managePage"><!-- remove cont-creator to access all-->
    <section class="card-con">
        <a href="<?php echo URLROOT?>/admin_manage/manage" class="back"> 
            <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.8385 20.4999C15.6891 20.5004 15.5415 20.4675 15.4065 20.4034C15.2715 20.3394 15.1525 20.246 15.0584 20.13L10.2275 14.1305C10.0804 13.9516 10 13.7272 10 13.4956C10 13.264 10.0804 13.0396 10.2275 12.8607L15.2284 6.86122C15.3982 6.65702 15.6422 6.52861 15.9066 6.50423C16.1711 6.47985 16.4344 6.56151 16.6387 6.73123C16.8429 6.90095 16.9714 7.14484 16.9958 7.40924C17.0202 7.67364 16.9385 7.9369 16.7687 8.1411L12.2979 13.5006L16.6187 18.8601C16.741 19.0069 16.8187 19.1856 16.8426 19.3751C16.8664 19.5646 16.8355 19.757 16.7535 19.9296C16.6714 20.1021 16.5416 20.2475 16.3795 20.3485C16.2173 20.4496 16.0296 20.5022 15.8385 20.4999Z"/>
            </svg>
        </a>
        <div class="header-con">
            <h1>My Account</h1>
            <span>Manage your info</span>
        </div>

        <div class="image-con">
        <?php if (empty($data['file'])) : ?>
            <img src="<?php echo URLROOT?>/images/official-default-avatar.svg" id="myImg">
        <?php else : ?>
            <img src="<?php echo URLROOT?>/uploads/<?php echo $data['file']?>" id="myImg">
        <?php endif; ?>
            <label for="upload-pic">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.75" y="0.0500488" width="31.25" height="31.175" rx="15.5875" fill="white"/>
                    <path d="M16.3746 1.5C8.53779 1.5 2.20312 7.81946 2.20312 15.6375C2.20312 23.4555 8.53779 29.775 16.3746 29.775C24.2115 29.775 30.5461 23.4555 30.5461 15.6375C30.5461 7.81946 24.2115 1.5 16.3746 1.5ZM20.7678 8.66771C20.9662 8.66771 21.1646 8.7384 21.3347 8.89391L23.1344 10.6894C23.4604 11.0004 23.4604 11.4952 23.1344 11.7921L21.7173 13.2059L18.8121 10.3077L20.2293 8.89391C20.371 8.7384 20.5694 8.66771 20.7678 8.66771ZM17.976 11.1276L20.8953 14.04L12.3074 22.6073H9.38808V19.695L17.976 11.1276Z" fill="#A63F3F"/>
                </svg>
            </label>
            <input type="file" id="upload-pic" name="fileUpload" class="hide" accept="image/*" form="edit-form">
        </div>
        <form action="<?php echo URLROOT?>/admin_manage/editProfile/<?php echo $_SESSION['id'] ?>" id="edit-form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="isUploaded" id="hiddenBool">
            <div>
                <label for="full-name" class="outsideLabel">Full Name:</label>
                <div class="textFieldContainer">
                    <input type="text" name="name" id="full-name" value="<?php echo $data['name']?>" readonly required>
                    <span class="error"></span>
                </div>
            </div>
            <div>
                <label for="email-id" class="outsideLabel">Email:</label>
                <div class="textFieldContainer">
                    <input type="email" name="email" id="email-id" value="<?php echo $data['email']?>" readonly required>
                    <span class="error"><?php echo $data['email_err']?></span>
                </div>
            </div>
            <div class="small-con">
                <label for="contact-num-id" class="outsideLabel">Contact Number:</label>
                <div class="textFieldContainer">
                    <input type="tel" name="contact_no" id="contact-num-id" value="<?php echo $data['contact_no']?>" readonly required>
                    <span class="error"></span>
                </div>
            </div>
            <div class="small-con">
                <label for="birth-date" class="outsideLabel">Birth Date:</label>
                <div class="textFieldContainer">
                    <input type="date" name="birth_date" id="birth-date" value="<?php echo $data['birth_date']?>" readonly required>
                    <span class="error"></span>
                </div>
            </div>
        </form>
        <div class="btn-con">
            <button type="button" class="edit">Edit</button>
            <button type="button" class="cancel">Cancel</button>
            <button class="save" form="edit-form">Save</button>
        </div>
    </section>
    <p>Polytechnic University Institute of Technology Alumni Information System (PUP-IAIS)</p>
</main>
    </div>
</div>
<script> 
        const fileUpload = document.getElementById('upload-pic');
        const img_box = document.getElementById('myImg');
        const reader = new FileReader();

        const uploadInput = document.getElementById('hiddenBool');

        fileUpload.addEventListener('change',function(event){
            const files = event.target.files;
            const file = files[0];
            reader.readAsDataURL(file);
            reader.addEventListener('load', function(event){
                img_box.src = event.target.result;
                img_box.alt = file.name; 
            })     
            isUploaded();
        }) 

        function isUploaded(){
            if(fileUpload.files.length == 0){
                uploadInput.value = 0;
            }
            else{
                uploadInput.value = 1;
            }
        }

        isUploaded();
       


    </script>
</body>
</html>