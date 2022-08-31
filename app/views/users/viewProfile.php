<?php require APPROOT . '/views/inc/header.php'; ?>

<?php   
    $url= rtrim($_GET['url'],'/');
    $url= explode('/', $url);
?>

<main class="alumni">
        <section class="heroBox behind">
        </section>
        <section class="mainContent profile">
            <div class="container">
                <div class="profile-header">
                    <?php if (empty($data['user']->image)) :?>
                        <img src="<?php echo URLROOT;?>/images/official-default-avatar.svg" id="myImg">
                    <?php else: ?>
                        <img src="<?php echo URLROOT;?>/uploads/<?php echo ($data['user']->image) ?>" id="myImg">
                    <?php endif; ?>
                    <h1 class="alumni-name"><?php echo $data['user']->first_name . ' ' . $data['user']->middle_name . ' ' . $data['user']->last_name . ' ' . $data['user']->auxiliary_name?></h1>
                    <span class="alumni-lrn">(<?php echo $data['user']->student_no; ?>)</span>
                    <?php if (userType() == "Alumni") :?>
                    <?php if($data['user']->alumni_id == $_SESSION['alumni_id']): ?>
                    <a href="<?php echo URLROOT; ?>/profile/editProfile/<?php echo $_SESSION['alumni_id'] ?>" class="editBtn">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.2406 1.50879L16.4906 3.75879L14.7754 5.47479L12.5254 3.22479L14.2406 1.50879Z" />
                            <path d="M6 11.9999H8.25L13.7153 6.53467L11.4653 4.28467L6 9.74992V11.9999Z"/>
                            <path d="M14.25 14.25H6.1185C6.099 14.25 6.07875 14.2575 6.05925 14.2575C6.0345 14.2575 6.00975 14.2507 5.98425 14.25H3.75V3.75H8.88525L10.3853 2.25H3.75C2.92275 2.25 2.25 2.922 2.25 3.75V14.25C2.25 15.078 2.92275 15.75 3.75 15.75H14.25C14.6478 15.75 15.0294 15.592 15.3107 15.3107C15.592 15.0294 15.75 14.6478 15.75 14.25V7.749L14.25 9.249V14.25Z"/>
                        </svg>
                        <span>Edit Profile</span>
                    </a>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="profile-body">
                    <section class="profile-information">
                        <h3>Alumni Information</h3>
                        <ul>
                            <li>
                                <span class="li-header">course</span>
                                <p class="li-data"><?php echo ($data['user']->course_name) ?></p>
                            </li>
                            <li>
                                <span class="li-header">YEAR GRADUATED</span>
                                <p class="li-data"><?php echo ($data['user']->year) ?></p>
                            </li>
                        </ul>
                    </section>

                    <section class="profile-information">
                        <h3>Personal Information</h3>
                        <ul>
                            <li>
                                <span class="li-header">birth date</span>
                                <?php if ($data['user']->birth_date != "") { ?>
                                <p class="li-data"><?php echo date('F j' .','. ' Y ', strtotime($data['user']->birth_date)) ?></p>
                                <?php } ?>
                            </li>
                            <li>
                                <span class="li-header">gender</span>
                                <p class="li-data"><?php echo ($data['user']->gender) ?></p>
                            </li>
                            <li>
                                <span class="li-header">employment status</span>
                                <p class="li-data"><?php echo ($data['user']->employment) ?></p>
                            </li>
                        </ul>
                    </section>

                    <section class="profile-information">
                        <h3>Contact Information</h3>
                        <ul>
                            <li>
                                <span class="li-header">address</span>
                                <p class="li-data">
                                <?php echo ($data['user']->address) . ' ' . ($data['user']->city) . ' ' . ($data['user']->region) . ' ' . (($data['user']->postal != 0) ? $data['user']->postal : "") ?></p>
                            </li>
                            <li>
                                <span class="li-header">contact number</span>
                                <p class="li-data"><?php echo (($data['user']->contact_no != 0) ? $data['user']->contact_no : "") ?></p>
                            </li>
                            <li>
                                <span class="li-header">email</span>
                                <p class="li-data"><?php echo ($data['user']->email) ?></p>
                            </li>
                        </ul>
                    </section>

                </div>
            </div>
        </section>
    </main>

<?php require APPROOT . '/views/inc/footer_u.php'; ?>
