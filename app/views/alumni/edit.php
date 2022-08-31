<?php require APPROOT . '/views/inc/header_admin.php';?>
        <main class="admin userAdd dataInput">
                <section class="pageSpecificHeader">
                    
                </section>
                <section class="mainContent adminForm">
                    <form action="?php echo URLROOT;?>/alumni/edit" method="POST">
                        <div class="form">
                            <h2>
                                Accounts
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.47149 19.0139C9.23783 19.0143 9.0114 18.9329 8.83149 18.7839C8.73023 18.6999 8.64653 18.5968 8.58517 18.4805C8.52382 18.3641 8.48603 18.2368 8.47395 18.1058C8.46187 17.9749 8.47576 17.8428 8.5148 17.7172C8.55385 17.5916 8.61728 17.4749 8.70149 17.3739L13.1815 12.0139L8.86149 6.64386C8.77842 6.54157 8.71639 6.42387 8.67896 6.29753C8.64153 6.17119 8.62943 6.0387 8.64337 5.90767C8.65731 5.77665 8.69701 5.64966 8.76018 5.53403C8.82335 5.41839 8.90876 5.31638 9.01149 5.23386C9.11495 5.14282 9.23612 5.07415 9.36738 5.03216C9.49864 4.99017 9.63717 4.97577 9.77426 4.98986C9.91135 5.00394 10.0441 5.04621 10.164 5.11401C10.284 5.18181 10.3887 5.27368 10.4715 5.38386L15.3015 11.3839C15.4486 11.5628 15.529 11.7872 15.529 12.0189C15.529 12.2505 15.4486 12.4749 15.3015 12.6539L10.3015 18.6539C10.2012 18.7749 10.0737 18.8705 9.92953 18.9331C9.78532 18.9956 9.62839 19.0233 9.47149 19.0139Z" fill="#A63F3F"/>
                                </svg>
                                Edit Alumni
                            </h2>
                            <section class="infoCon">
                                <h3>personal information</h3>
                                <div class="infoSubCon">
                                    <div class="smallComponentsContainer">
                                        <div>
                                            <label for="first-name" class="outsideLabel">First Name:</label>
                                            <div class="textFieldContainer">
                                                <input type="text" name="first_name" value="<?php echo($data['first_name'])?>"id="first-name">
                                                <span class="error")></span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="last-name" class="outsideLabel">Last Name:</label>
                                            <div class="textFieldContainer">
                                                <input type="text" name="last_name" value="<?php echo($data['last_name'])?>" id="last-name">
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="middle-name" class="outsideLabel">Middle Name:</label>
                                            <div class="textFieldContainer">
                                                <input type="text" name="middle_name" value="<?php echo($data['middle_name'])?>" id="middle-name">
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="auxiliary-name" class="outsideLabel">Auxiliary Name:</label>
                                            <div class="textFieldContainer">
                                                <input type="text" name="auxiliary" id="auxiliaryname" value="<?php echo($data['auxiliary_name'])?>">
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="birth-date" class="outsideLabel">Birth Date:</label>
                                            <div class="textFieldContainer">
                                                <input type="date" name="birth_date" value="<?php echo($data['birth_date'])?>" id="birth-date">
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
                                    
                                        <div>
                                            <label class="outsideLabel">Gender:</label>
                                            <fieldset class="radioBtnContainer">
                                                <input type="radio" class="male" name="gender" id="male-id" value="Male" <?php echo ($data['gender'] == 'Male') ? 'checked' : '' ?>>
                                                <input type="radio" class="female" name="gender" id="female-id" value="Female" <?php echo ($data['gender'] == 'Female') ? 'checked' : '' ?>>
                                            </fieldset>
                                        </div>
                                        
                                    </div>
                                </div>
                            </section>
                            <section class="infoCon">
                                <h3>Contact Information</h3>
                                <div class="infoSubCon">
                                    <div class="smallComponentsContainer">
                                        <div>
                                            <label for="address-line1" class="outsideLabel">Address Line 1:</label>
                                            <div class="textFieldContainer">
                                                <input type="text" name="address" value="<?php echo($data['address'])?>"id="address-line1">
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="city-id" class="outsideLabel">City:</label>
                                            <div class="textFieldContainer">
                                                <input type="text" name="city" value="<?php echo($data['city'])?>" id="city-id">
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="spr-id" class="outsideLabel">State | Province | Region:</label>
                                            <div class="textFieldContainer">
                                                <input type="text" name="region" value="<?php echo($data['region'])?>"id="spr-id">
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="zpc-id" class="outsideLabel">Zip | Postal Code:</label>
                                            <div class="textFieldContainer">
                                                <input type="tel" name="postal" value="<?php echo($data['postal'])?> "id="zpc-id">
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="contact-num-id" class="outsideLabel">Contact Number:</label>
                                            <div class="textFieldContainer">
                                                <input type="tel" name="contact_no" value="<?php echo($data['contact_no'])?>" id="contact-num-id">
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="email-id" class="outsideLabel">Email:</label>
                                            <div class="textFieldContainer">
                                                <input type="email" name="email" value="<?php echo($data['email'])?>"id="email-id">
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="infoCon">
                                <h3>Alumni Information</h3>
                                <div class="infoSubCon">
                                    <div class="smallComponentsContainer">
                                        <div>
                                            <label for="course-id" class="outsideLabel">Course:</label>
                                            <div class="textFieldContainer">
                                                <select name="course" id="course-id" value="<?php echo($data['course'])?>" >
                                                <?php foreach($data['course'] as $code):?>
                                                    <option value="<?php echo $code->id ?>" <?php if($data['courseID']==$code->id) echo 'selected="selected"'; ?> ><?php echo $code->course_code;?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="batch-id" class="outsideLabel">Batch:</label>
                                            <div class="textFieldContainer">
                                                <select name="batch" id="batch-id" >
                                                    <?php foreach($data['year'] as $batch):?>
                                                        <option value="<?php echo $batch->id?>" data-batch="<?php echo $batch->year?> <?php echo($data['batch']==$batch->id) ? 'selected="selected"' : '' ?> ">
                                                        Batch <?php echo $batch->year;?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="student-id" class="outsideLabel">Student ID:</label>
                                            <div class="textFieldContainer">
                                                <input type="text" name="student_no" value="<?php echo($data['student_no'])?>" id="student-id">
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="form">
                            <a href="<?php echo URLROOT;?>/admin/alumni" class="closeIcon">
                                <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7624 15L22.1374 9.63749C22.3728 9.40211 22.505 9.08287 22.505 8.74999C22.505 8.41711 22.3728 8.09787 22.1374 7.86249C21.902 7.62711 21.5828 7.49487 21.2499 7.49487C20.917 7.49487 20.5978 7.62711 20.3624 7.86249L14.9999 13.2375L9.63742 7.86249C9.40204 7.62711 9.0828 7.49487 8.74992 7.49487C8.41705 7.49487 8.0978 7.62711 7.86242 7.86249C7.62704 8.09787 7.49481 8.41711 7.49481 8.74999C7.49481 9.08287 7.62704 9.40211 7.86242 9.63749L13.2374 15L7.86242 20.3625C7.74526 20.4787 7.65227 20.6169 7.58881 20.7693C7.52535 20.9216 7.49268 21.085 7.49268 21.25C7.49268 21.415 7.52535 21.5784 7.58881 21.7307C7.65227 21.883 7.74526 22.0213 7.86242 22.1375C7.97863 22.2547 8.11688 22.3476 8.2692 22.4111C8.42153 22.4746 8.58491 22.5072 8.74992 22.5072C8.91494 22.5072 9.07832 22.4746 9.23064 22.4111C9.38297 22.3476 9.52122 22.2547 9.63742 22.1375L14.9999 16.7625L20.3624 22.1375C20.4786 22.2547 20.6169 22.3476 20.7692 22.4111C20.9215 22.4746 21.0849 22.5072 21.2499 22.5072C21.4149 22.5072 21.5783 22.4746 21.7306 22.4111C21.883 22.3476 22.0212 22.2547 22.1374 22.1375C22.2546 22.0213 22.3476 21.883 22.411 21.7307C22.4745 21.5784 22.5072 21.415 22.5072 21.25C22.5072 21.085 22.4745 20.9216 22.411 20.7693C22.3476 20.6169 22.2546 20.4787 22.1374 20.3625L16.7624 15Z" fill="black" fill-opacity="0.87"/>
                                </svg>
                            </a>
                            <div class="imageInputContainer">
                                <svg width="160" height="142" viewBox="0 0 160 142" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M146.667 8.875H13.3333C5.97222 8.875 0 14.8379 0 22.1875V26.625H160V22.1875C160 14.8379 154.028 8.875 146.667 8.875ZM0 119.812C0 127.162 5.97222 133.125 13.3333 133.125H146.667C154.028 133.125 160 127.162 160 119.812V35.5H0V119.812ZM97.7778 55.4688C97.7778 54.2484 98.7778 53.25 100 53.25H140C141.222 53.25 142.222 54.2484 142.222 55.4688V59.9062C142.222 61.1266 141.222 62.125 140 62.125H100C98.7778 62.125 97.7778 61.1266 97.7778 59.9062V55.4688ZM97.7778 73.2188C97.7778 71.9984 98.7778 71 100 71H140C141.222 71 142.222 71.9984 142.222 73.2188V77.6562C142.222 78.8766 141.222 79.875 140 79.875H100C98.7778 79.875 97.7778 78.8766 97.7778 77.6562V73.2188ZM97.7778 90.9688C97.7778 89.7484 98.7778 88.75 100 88.75H140C141.222 88.75 142.222 89.7484 142.222 90.9688V95.4062C142.222 96.6266 141.222 97.625 140 97.625H100C98.7778 97.625 97.7778 96.6266 97.7778 95.4062V90.9688ZM48.8889 53.25C58.6944 53.25 66.6667 61.2098 66.6667 71C66.6667 80.7902 58.6944 88.75 48.8889 88.75C39.0833 88.75 31.1111 80.7902 31.1111 71C31.1111 61.2098 39.0833 53.25 48.8889 53.25ZM18.6389 109.884C20.9722 102.756 27.6667 97.625 35.5556 97.625H37.8333C41.25 99.0395 44.9722 99.8438 48.8889 99.8438C52.8056 99.8438 56.5556 99.0395 59.9444 97.625H62.2222C70.1111 97.625 76.8056 102.756 79.1389 109.884C80.0278 112.629 77.6944 115.375 74.8056 115.375H22.9722C20.0833 115.375 17.75 112.602 18.6389 109.884Z" fill="#A63F3F"/>
                                </svg>
                            </div>
                            <div class="btnGroupContainer">
                                <button class="reset">
                                    <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 6C13.9477 3.78 11.6527 2.25 9 2.25C8.11358 2.25 7.23583 2.42459 6.41689 2.76381C5.59794 3.10303 4.85382 3.60023 4.22703 4.22703C3.60023 4.85382 3.10303 5.59794 2.76381 6.41689C2.42459 7.23583 2.25 8.11358 2.25 9C2.25 9.88642 2.42459 10.7642 2.76381 11.5831C3.10303 12.4021 3.60023 13.1462 4.22703 13.773C4.85382 14.3998 5.59794 14.897 6.41689 15.2362C7.23583 15.5754 8.11358 15.75 9 15.75C10.7902 15.75 12.5071 15.0388 13.773 13.773C15.0388 12.5071 15.75 10.7902 15.75 9M15.75 2.25V6.75H11.25" stroke="black" stroke-opacity="0.87" stroke-width="2"/>
                                    </svg>
                                    reset
                                </button>
                                <button class="save">
                                    <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.75 15.75H14.25C14.6478 15.75 15.0294 15.592 15.3107 15.3107C15.592 15.0294 15.75 14.6478 15.75 14.25V6L12 2.25H3.75C3.35218 2.25 2.97064 2.40804 2.68934 2.68934C2.40804 2.97064 2.25 3.35218 2.25 3.75V14.25C2.25 14.6478 2.40804 15.0294 2.68934 15.3107C2.97064 15.592 3.35218 15.75 3.75 15.75ZM5.25 3.75H8.25V5.25H9.75V3.75H11.25V6.75H5.25V3.75ZM5.25 9.75H12.75V14.25H5.25V9.75Z" fill="white"/>
                                    </svg>
                                    SAVE
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </main>

<?php require APPROOT . '/views/inc/footer.php';?>