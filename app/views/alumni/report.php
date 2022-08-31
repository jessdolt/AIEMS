        <!-- addNewDept -->
        <div class="modalFilterNav alum-rep show">
            <svg class="close-btn" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.7608 11.9989L19.1306 6.64085C19.3658 6.40566 19.4979 6.08668 19.4979 5.75408C19.4979 5.42148 19.3658 5.1025 19.1306 4.86731C18.8955 4.63213 18.5765 4.5 18.244 4.5C17.9114 4.5 17.5925 4.63213 17.3573 4.86731L12 10.2379L6.64268 4.86731C6.40752 4.63213 6.08859 4.5 5.75603 4.5C5.42348 4.5 5.10454 4.63213 4.86939 4.86731C4.63424 5.1025 4.50213 5.42148 4.50213 5.75408C4.50213 6.08668 4.63424 6.40566 4.86939 6.64085L10.2392 11.9989L4.86939 17.357C4.75234 17.4731 4.65944 17.6113 4.59604 17.7635C4.53264 17.9157 4.5 18.0789 4.5 18.2438C4.5 18.4087 4.53264 18.5719 4.59604 18.7241C4.65944 18.8763 4.75234 19.0144 4.86939 19.1306C4.98548 19.2476 5.1236 19.3405 5.27578 19.4039C5.42795 19.4674 5.59118 19.5 5.75603 19.5C5.92089 19.5 6.08411 19.4674 6.23629 19.4039C6.38847 19.3405 6.52659 19.2476 6.64268 19.1306L12 13.76L17.3573 19.1306C17.4734 19.2476 17.6115 19.3405 17.7637 19.4039C17.9159 19.4674 18.0791 19.5 18.244 19.5C18.4088 19.5 18.572 19.4674 18.7242 19.4039C18.8764 19.3405 19.0145 19.2476 19.1306 19.1306C19.2477 19.0144 19.3406 18.8763 19.404 18.7241C19.4674 18.5719 19.5 18.4087 19.5 18.2438C19.5 18.0789 19.4674 17.9157 19.404 17.7635C19.3406 17.6113 19.2477 17.4731 19.1306 17.357L13.7608 11.9989Z" fill="black" fill-opacity="0.87"/>
            </svg>


            <div class="profile-header">
                <h3>View report details</h3>
                <p class="date-res-con">Date responded: <span class="date-res"><?php echo date('F j' .','. ' Y ', strtotime($data['alumni']->date_responded))?></span></p>
                
            </div>
            <div class="profile-body">
                <section class="profile-information">
                    <h3>Alumni Information</h3>
                    <ul>
                        <li>
                            <span class="li-header">STUDENT ID</span>
                            <p class="li-data"><?php echo $data['alumni']->student_no ?></p>
                        </li>
                        <li>
                            <span class="li-header">ALUMNI NAME</span>
                            <p class="li-data"><?php echo $data['alumni']->first_name  . ' ' .  (!empty($data['alumni']->middle_name) ? substr($data['alumni']->middle_name,0,1) . '.' : ''). ' ' . $data['alumni']->last_name?></p>
                        </li>
                        <li>
                            <span class="li-header">COURSE</span>
                            <p class="li-data"><?php echo $data['alumni']->course_name ?></p>
                        </li>
                        <li>
                            <span class="li-header">YEAR GRADUATED</span>
                            <p class="li-data"><?php echo $data['alumni']->year ?></p>
                        </li>
                        <li>
                            <span class="li-header">EMPLOYMENT STATUS</span>
                            <p class="li-data"><?php echo $data['alumni']->status ?></p>
                        </li>
                    </ul>
                </section>
                <section class="profile-information">
                    <h3>Employment Information</h3>
                    <ul>
                        <li>
                            <span class="li-header">FIRST EMPLOYMENT</span>
                            <?php if(!is_null($data['alumni']->first_employment) || $data['alumni']->first_employment != 0000-00-00) :?>  
                            <p class="li-data"><?php echo date('F j' .','. ' Y ', strtotime($data['alumni']->first_employment))?></p>
                            <?php else: ?>
                            <p class="li-data">N/A</p>
                            <?php endif;?>
                        </li>
                        <li>
                            <span class="li-header">CURRENT EMPLOYMENT</span>
                            <?php if(!is_null($data['alumni']->current_employment) || $data['alumni']->current_employment != 0000-00-00) :?>  
                            <p class="li-data"><?php echo date('F j' .','. ' Y ', strtotime($data['alumni']->current_employment))?></p>
                            <?php else: ?>
                            <p class="li-data">N/A</p>
                            <?php endif;?>
                        </li>
                        <li>
                            <span class="li-header">TYPE OF WORK</span>
                            <?php if(!empty($data['alumni']->type_of_work)) :?>                            
                            <p class="li-data"><?php echo $data['alumni']->type_of_work ?></p>
                            <?php else: ?>
                            <p class="li-data">N/A</p>
                            <?php endif;?>
                        </li>
                        <li>
                            <span class="li-header">WORK POSITION</span>
                            <?php if(!empty($data['alumni']->work_position)) :?>
                            <p class="li-data"><?php echo $data['alumni']->work_position ?></p>
                            <?php else: ?>
                            <p class="li-data">N/A</p>
                            <?php endif;?>
                        </li>
                        <li>
                            <span class="li-header">MONTHLY INCOME</span>
                            <?php if(!empty($data['alumni']->monthly_income)) :?>
                            <p class="li-data">P <?php echo number_format($data['alumni']->monthly_income) ?></p>
                            <?php else: ?>
                            <p class="li-data">N/A</p>
                            <?php endif;?>
                        </li>
                        <li>
                            <span class="li-header">IS WORK RELATED TO COURSE?</span>
                            <?php if(!empty($data['alumni']->monthly_income)) :?>
                            <p class="li-data"><?php echo $data['alumni']->if_related ?></p>
                            <?php else: ?>
                            <p class="li-data">N/A</p>
                            <?php endif;?>
                        </li>
                        <li>
                            <span class="li-header">COMPANY ID</span>
                            <div class="li-data img-main-con">
                                <div class="img-con">
                                    <?php if (!empty($data['alumni']->company_id)) :?>
                                    <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['alumni']->company_id ?>">
                                    <?php else : ?>
                                    <img src=" ">
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        </li>
                    </ul>
                </section>
            </div>


        </div>