<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="alumni editProfile">
        <section class="heroBox behind">
        </section>
        <section class="mainContent questionnaire">
            <div class="container">
                <form action="<?php echo URLROOT; ?>/profile/editProfile/<?php echo $data['alumni_id']?>" method="POST" class="form" enctype="multipart/form-data">
                    <div>
                        <h2>Edit your profile</h2>
                        <p>Basic info, like your name and photo</p>
                    </div>
                    
                    <div class="questionCon">
                        <div class="questionHeader">
                            <h3>
                                Personal Information
                            </h3>
                        </div>
                        <div class="avatar" id="avatar">
                        <?php if (empty($data['file'])) : ?>
                            <img class="profilePic" src="<?php echo URLROOT ?>/images/official-default-avatar.svg" id="myImg" width="200" height="200">
                        <?php else : ?>
                            <img class="profilePic" src="<?php echo URLROOT ?>/uploads/<?php echo $data['file']?>" id="myImg" width="200" height="200">
                        <?php endif; ?>
                            <label for="profile-pic-btn">
                                <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="43" height="43" rx="21.5" fill="white"/>
                                    <path d="M21.5 2C10.7165 2 2 10.7165 2 21.5C2 32.2835 10.7165 41 21.5 41C32.2835 41 41 32.2835 41 21.5C41 10.7165 32.2835 2 21.5 2ZM27.545 11.8865C27.818 11.8865 28.091 11.984 28.325 12.1985L30.8015 14.675C31.25 15.104 31.25 15.7865 30.8015 16.196L28.8515 18.146L24.854 14.1485L26.804 12.1985C26.999 11.984 27.272 11.8865 27.545 11.8865ZM23.7035 15.2795L27.7205 19.2965L15.9035 31.1135H11.8865V27.0965L23.7035 15.2795Z" fill="#A63F3F"/>
                                </svg>
                            </label>
                            <div class="edit-pic-modal">
                                <label for="profile-pic-upload">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.6144 1.76025L19.2394 4.38525L17.2383 6.38725L14.6133 3.76225L16.6144 1.76025Z" fill="black"/>
                                        <path d="M7 14.0002H9.625L16.0011 7.62402L13.3761 4.99902L7 11.3751V14.0002Z" fill="black"/>
                                        <path d="M16.625 16.625H7.13825C7.1155 16.625 7.09188 16.6338 7.06913 16.6338C7.04025 16.6338 7.01138 16.6259 6.98163 16.625H4.375V4.375H10.3661L12.1161 2.625H4.375C3.40987 2.625 2.625 3.409 2.625 4.375V16.625C2.625 17.591 3.40987 18.375 4.375 18.375H16.625C17.0891 18.375 17.5342 18.1906 17.8624 17.8624C18.1906 17.5342 18.375 17.0891 18.375 16.625V9.0405L16.625 10.7905V16.625Z" fill="black"/>
                                    </svg>
                                    Change Photo
                                </label>
                                <button type="button" id="removeButton">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2608 10.4989L17.6306 5.14085C17.8658 4.90566 17.9979 4.58668 17.9979 4.25408C17.9979 3.92148 17.8658 3.6025 17.6306 3.36731C17.3955 3.13213 17.0765 3 16.744 3C16.4114 3 16.0925 3.13213 15.8573 3.36731L10.5 8.73789L5.14268 3.36731C4.90752 3.13213 4.58859 3 4.25603 3C3.92348 3 3.60454 3.13213 3.36939 3.36731C3.13424 3.6025 3.00213 3.92148 3.00213 4.25408C3.00213 4.58668 3.13424 4.90566 3.36939 5.14085L8.7392 10.4989L3.36939 15.857C3.25234 15.9731 3.15944 16.1113 3.09604 16.2635C3.03264 16.4157 3 16.5789 3 16.7438C3 16.9087 3.03264 17.0719 3.09604 17.2241C3.15944 17.3763 3.25234 17.5144 3.36939 17.6306C3.48548 17.7476 3.6236 17.8405 3.77578 17.9039C3.92795 17.9674 4.09118 18 4.25603 18C4.42089 18 4.58411 17.9674 4.73629 17.9039C4.88847 17.8405 5.02659 17.7476 5.14268 17.6306L10.5 12.26L15.8573 17.6306C15.9734 17.7476 16.1115 17.8405 16.2637 17.9039C16.4159 17.9674 16.5791 18 16.744 18C16.9088 18 17.072 17.9674 17.2242 17.9039C17.3764 17.8405 17.5145 17.7476 17.6306 17.6306C17.7477 17.5144 17.8406 17.3763 17.904 17.2241C17.9674 17.0719 18 16.9087 18 16.7438C18 16.5789 17.9674 16.4157 17.904 16.2635C17.8406 16.1113 17.7477 15.9731 17.6306 15.857L12.2608 10.4989Z" fill="black" fill-opacity="0.87"/>
                                    </svg>
                                    Remove Photo
                                </button>
                            </div>
                            
                            <input type="file" id="profile-pic-upload" name="fileUpload">
                        </div>
                        <div class="smallComponentsContainer">
                            <div>
                                <label for="first-name" class="outsideLabel">First Name:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="first_name" id="first-name" value="<?php echo $data['first_name']?>" readonly>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="middle-name" class="outsideLabel">Middle Name:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="middle_name" id="middle-name" value="<?php echo $data['middle_name']?>" readonly>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="last-name" class="outsideLabel">Last Name:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="last_name" id="last-name" value="<?php echo $data['last_name']?>" readonly>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="auxiliary-name" class="outsideLabel">Auxiliary Name:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="auxiliary" id="auxiliaryname" value="<?php echo $data['auxiliary']?>">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="birth-date" class="outsideLabel">Birth Date:</label>
                                <div class="textFieldContainer">
                                    <input type="date" name="birth_date" id="birth-date" value="<?php echo $data['birth_date']?>" readonly>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="civil-status" class="outsideLabel">Civil Status:</label>
                                <div class="textFieldContainer">
                                    <select name="civilStat" id="civil-status" required>
                                        <option value="Single" <?php echo ($data['civil'] == 'Single') ? 'selected' : ''?>>Single</option>
                                        <option value="Married" <?php echo ($data['civil'] == 'Married') ? 'selected' : ''?>>Married</option>
                                        <option value="Widowed" <?php echo ($data['civil'] == 'Widowed') ? 'selected' : ''?>>Widowed</option>
                                        <option value="Separated" <?php echo ($data['civil'] == 'Separated') ? 'selected' : ''?>>Separated</option>
                                        <option value="Divorced" <?php echo ($data['civil'] == 'Divorced') ? 'selected' : ''?>>Divorced</option>
                                    </select>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <?php if(!empty($data['employment'])) : ?>
                            <div>
                                <label class="outsideLabel">Employment Status:</label>
                                <fieldset class="radioBtnContainer">
                                    <input type="radio" class="eStatus" name="employment" id="unemployed-id" value="Unemployed" <?php echo ($data['employment'] == 'Unemployed') ? 'checked' : ''?> checked>
                                    <input type="radio" class="eStatus" name="employment" id="employed-id" value="Employed" <?php echo ($data['employment'] == 'Employed') ? 'checked' : ''?>>
                                </fieldset>
                            </div>
                            <?php endif; ?>
                            <div>
                                <label class="outsideLabel" disabled>Gender:</label>
                                <fieldset class="radioBtnContainer">
                                    <input type="radio" class="male" id="male-id" value="Male" <?php echo ($data['gender'] == 'Male') ? 'checked' : '' ?> disabled>
                                    <input type="radio" class="female" id="female-id" value="Female" <?php echo ($data['gender'] == 'Female') ? 'checked' : '' ?> disabled>
                                </fieldset>
                            </div>
                        </div>    
                    </div>
                    <div class="questionCon">
                        <div class="questionHeader">
                            <h3>
                                Contact Information
                            </h3>
                        </div>
                        <div class="smallComponentsContainer">
                            <div>
                                <label for="address-line1" class="outsideLabel">Street Address:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="address" id="address-line1" value="<?php echo $data['address']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="city-id" class="outsideLabel">City:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="city" id="city-id" value="<?php echo $data['city']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="spr-id" class="outsideLabel">State | Province | Region:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="region" id="spr-id" value="<?php echo $data['region']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="zpc-id" class="outsideLabel">Zip | Postal Code:</label>
                                <div class="textFieldContainer">
                                    <input type="tel" name="postal" id="zpc-id" value="<?php echo (($data['postal'] != 0) ? $data['postal'] : "") ?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="contact-num-id" class="outsideLabel">Contact Number:</label>
                                <div class="textFieldContainer">
                                    <input type="tel" name="contact_no" id="contact-num-id" value="<?php echo (($data['contact_no'] != 0) ? $data['contact_no'] : "") ?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="email-id" class="outsideLabel">Email:</label>
                                <div class="textFieldContainer">
                                    <input type="email" name="email" id="email-id" value="<?php echo $data['email']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <input type="hidden" name="isUploaded" id="hiddenBool">
                    <button>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.75 15.75H14.25C14.6478 15.75 15.0294 15.592 15.3107 15.3107C15.592 15.0294 15.75 14.6478 15.75 14.25V6L12 2.25H3.75C3.35218 2.25 2.97064 2.40804 2.68934 2.68934C2.40804 2.97064 2.25 3.35218 2.25 3.75V14.25C2.25 14.6478 2.40804 15.0294 2.68934 15.3107C2.97064 15.592 3.35218 15.75 3.75 15.75ZM5.25 3.75H8.25V5.25H9.75V3.75H11.25V6.75H5.25V3.75ZM5.25 9.75H12.75V14.25H5.25V9.75Z" fill="white"/>
                        </svg>
                        Save Changes
                    </button>
                </form>
            </div>
        </section>
    </main>

<script>
    const fileUpload = document.getElementById('profile-pic-upload');
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
        } else {
            uploadInput.value = 1;
        }
    }

    const removeButton = document.getElementById('removeButton');
    const avatar = document.getElementById('avatar');
    

    removeButton.addEventListener('click', function(){
  
        const removePhoto = document.createElement('input');
        removePhoto.setAttribute('type', 'hidden');
        removePhoto.setAttribute('name', 'removePhoto');
        img_box.setAttribute('src', '<?php echo URLROOT ?>/images/official-default-avatar.svg');
        avatar.appendChild(removePhoto);

        const inputButton = document.getElementById('profile-pic-upload');

        inputButton.addEventListener('change', function(){
            removePhoto.remove();
        })
    })



    isUploaded();
</script>

<?php require APPROOT . '/views/inc/footer_u.php'; ?>