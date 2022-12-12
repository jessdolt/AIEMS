<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="alumni editProfile">
        <section class="heroBox behind">
        </section>
        <section class="mainContent questionnaire">
            <div class="container">
            <form action="<?php echo URLROOT;?>/profile/profileAdditionalUpdate/<?php echo $_SESSION['alumni_id'] ?>" method="POST" enctype="multipart/form-data" class="form">
                    <div>
                        <h2>Additional Information</h2>
                        <p>You answered this survey a year ago and we would like if you could update your information</p>
                    </div>
                    <div class="questionCon addInfo">
                        <div class="smallComponentsContainer">
                            <div>
                                <label for="course-id" class="outsideLabel">Course:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="courseId" id="course-id" value="<?php echo $data['course'] ?>" readonly>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="grad-date" class="outsideLabel">Date of Graduation:</label>
                                <div class="textFieldContainer">
                                    <input type="date" name="gDate" id="grad-date" value="<?php echo $data['gDate']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="current-status" class="outsideLabel">Current Status:</label>
                                <div class="textFieldContainer">
                                    <select name="cstatus" id="current-status" required>
                                        <option value="Unemployed" <?php echo ($data['status'] == "Unemployed") ? 'selected' : ''?>>Unemployed</option>
                                        <option value="Employed" <?php echo ($data['status'] == "Employed") ? 'selected' : ''?>>Employed</option>
                                        <option value="Student" <?php echo ($data['status'] == "Student") ? 'selected' : ''?>>Student</option>
                                    </select>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="first-emp-date" class="outsideLabel" read>Date of 1st Employment(if applicable):</label>
                                <div class="textFieldContainer">
                                    <input type="date" name="eDate" id="first-emp-date" value="<?php echo $data['eDate']?>">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="current-emp-date" class="outsideLabel">Date of Current Employment:</label>
                                <div class="textFieldContainer">
                                    <input type="date" name="ceDate" id="current-emp-date" value="<?php echo $data['ceDate']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="type-of-work" class="outsideLabel">Current Type of Work:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="tWork" id="type-of-work" value="<?php echo $data['tWork']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="work-position" class="outsideLabel">Current Work Position:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="wPosition" id="work-position" value="<?php echo $data['wPosition']?>" required>
                                    <span class="error"></span>
                                </div>
                            </div>

                            <div>
                                <label class="outsideLabel">Is your job or work related to your degree:</label>
                                <fieldset class="radioBtnContainer">
                                    <input type="radio" class="related" name="related" id="yes-id" value="Yes" checked>
                                    <input type="radio" class="related" name="related" id="no-id" value="No">
                                </fieldset>
                            </div>
                        </div>
                        <div class="imageInputContainer">
                            <label for="news-image-input">Company ID:</label>
                            <div class="image-con">
                            <?php if (empty($data['file'])) : ?>
                            <img src=" " id="myImg">
                        <?php else : ?>
                            <img src="<?php echo URLROOT ?>/uploads/<?php echo $data['file']?>" id="myImg">
                        <?php endif; ?>
                            </div>
                            <label for="news-image-input" class="fileUploadBtn">
                                Edit
                                <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.2411 2.00903L16.4911 4.25903L14.7759 5.97503L12.5259 3.72503L14.2411 2.00903Z" fill="white"/>
                                    <path d="M6 12.4999H8.25L13.7153 7.03467L11.4652 4.78467L6 10.2499V12.4999Z" fill="white"/>
                                    <path d="M14.25 14.75H6.1185C6.099 14.75 6.07875 14.7575 6.05925 14.7575C6.0345 14.7575 6.00975 14.7507 5.98425 14.75H3.75V4.25H8.88525L10.3853 2.75H3.75C2.92275 2.75 2.25 3.422 2.25 4.25V14.75C2.25 15.578 2.92275 16.25 3.75 16.25H14.25C14.6478 16.25 15.0294 16.092 15.3107 15.8107C15.592 15.5294 15.75 15.1478 15.75 14.75V8.249L14.25 9.749V14.75Z" fill="white"/>
                                </svg>
                            </label>
                            <span class="error"><?php echo $data['file_error']?></span>
                            <input type="file" name="newsImageInput" id="news-image-input" accept=".jpg, .png">
                        </div>
                        
                    </div>
                    <input type="hidden" name="isUploaded" id="hiddenBool">
                    <button>
                        Submit Response
                    </button>
                </form>
            </div>
        </section>
    </main>
<script>
    const fileUpload = document.getElementById('news-image-input');
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
</script>
<?php require APPROOT . '/views/inc/footer_u.php'; ?>