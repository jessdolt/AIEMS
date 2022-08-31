<?php require APPROOT . '/views/inc/header_admin.php';?>

<?php 
    $url= rtrim($_GET['url'],'/');
    $url= explode('/', $url);
?>
        <section class="filterNav">
            <a href="<?php echo URLROOT?>/admin/alumni_report" class="allUser">
                <!-- update change users to alumni -->
                All Respondents
                <span class="allUserCount"><?php echo (!empty($data['allCount'])) ? $data['allCount'] : '0'?></span>
            </a>
            <hr>
            <ul class="department">
                <?php foreach($data['batch'] as $batch) : ?>    
                <li>

                    <a href="<?php echo URLROOT?>/alumni_report/showBatch/<?php echo $batch->id?>" class="deptHead <?php echo ($url[2] == $batch->id) ? 'active' : ''?>">
                        Batch <?php echo $batch->year?>
                        <span class="icon dropArrow">
                            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 21.3333C15.6885 21.3339 15.3866 21.2254 15.1467 21.0266L7.14671 14.36C6.87442 14.1336 6.70319 13.8084 6.67068 13.4559C6.63817 13.1033 6.74706 12.7522 6.97338 12.48C7.19969 12.2077 7.52491 12.0364 7.87748 12.0039C8.23005 11.9714 8.58109 12.0803 8.85338 12.3066L16 18.28L23.1467 12.52C23.2831 12.4092 23.44 12.3265 23.6085 12.2766C23.7769 12.2267 23.9536 12.2106 24.1283 12.2291C24.303 12.2477 24.4723 12.3007 24.6265 12.3849C24.7807 12.4691 24.9167 12.583 25.0267 12.72C25.1488 12.8571 25.2413 13.0179 25.2984 13.1924C25.3554 13.3669 25.3758 13.5513 25.3583 13.734C25.3408 13.9168 25.2857 14.094 25.1965 14.2544C25.1073 14.4149 24.986 14.5552 24.84 14.6666L16.84 21.1066C16.5933 21.274 16.2975 21.3538 16 21.3333Z"/>
                            </svg>
                            <svg class="settings" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.2854 7.86008L14.6104 7.36008C14.4945 6.95573 14.3353 6.56512 14.1354 6.19508L14.9554 4.66008C14.9861 4.60214 14.9974 4.53582 14.9875 4.47097C14.9776 4.40612 14.947 4.34619 14.9004 4.30008L13.7054 3.10008C13.6592 3.05341 13.5993 3.02286 13.5345 3.01295C13.4696 3.00304 13.4033 3.01431 13.3454 3.04508L11.8204 3.86008C11.4467 3.65041 11.0509 3.48272 10.6404 3.36008L10.1404 1.70508C10.1192 1.64408 10.0792 1.59138 10.0262 1.55454C9.97322 1.5177 9.90989 1.49863 9.84535 1.50008H8.15535C8.09042 1.50038 8.02728 1.52139 7.97513 1.56006C7.92297 1.59873 7.88451 1.65304 7.86535 1.71508L7.36535 3.36508C6.95136 3.48707 6.55223 3.65477 6.17535 3.86508L4.67535 3.05508C4.61741 3.02431 4.55109 3.01304 4.48624 3.02295C4.42139 3.03286 4.36146 3.06341 4.31535 3.11008L3.10035 4.29508C3.05369 4.34119 3.02313 4.40112 3.01322 4.46597C3.00332 4.53082 3.01458 4.59714 3.04535 4.65508L3.85535 6.15508C3.64538 6.53037 3.47769 6.9278 3.35535 7.34008L1.70035 7.84008C1.63831 7.85924 1.58401 7.89769 1.54534 7.94985C1.50667 8.00201 1.48565 8.06515 1.48535 8.13008V9.82008C1.48565 9.885 1.50667 9.94814 1.54534 10.0003C1.58401 10.0525 1.63831 10.0909 1.70035 10.1101L3.36535 10.6101C3.48902 11.0155 3.65669 11.4061 3.86535 11.7751L3.04535 13.3451C3.01458 13.403 3.00332 13.4693 3.01322 13.5342C3.02313 13.599 3.05369 13.659 3.10035 13.7051L4.29535 14.9001C4.34146 14.9467 4.40139 14.9773 4.46624 14.9872C4.53109 14.9971 4.59741 14.9858 4.65535 14.9551L6.20035 14.1301C6.56583 14.3273 6.95136 14.4849 7.35035 14.6001L7.85035 16.2851C7.86951 16.3471 7.90797 16.4014 7.96013 16.4401C8.01228 16.4788 8.07542 16.4998 8.14035 16.5001H9.83035C9.89528 16.4998 9.95842 16.4788 10.0106 16.4401C10.0627 16.4014 10.1012 16.3471 10.1204 16.2851L10.6204 14.5951C11.0159 14.4793 11.3981 14.3217 11.7604 14.1251L13.3154 14.9551C13.3733 14.9858 13.4396 14.9971 13.5045 14.9872C13.5693 14.9773 13.6292 14.9467 13.6754 14.9001L14.8704 13.7051C14.917 13.659 14.9476 13.599 14.9575 13.5342C14.9674 13.4693 14.9561 13.403 14.9254 13.3451L14.0954 11.7951C14.294 11.4314 14.4533 11.0476 14.5704 10.6501L16.2554 10.1501C16.3174 10.1309 16.3717 10.0925 16.4104 10.0403C16.449 9.98814 16.47 9.925 16.4704 9.86008V8.15508C16.4733 8.0929 16.4572 8.03131 16.4241 7.97858C16.391 7.92585 16.3426 7.8845 16.2854 7.86008V7.86008ZM9.00035 11.7501C8.45645 11.7501 7.92477 11.5888 7.47253 11.2866C7.0203 10.9844 6.66782 10.555 6.45968 10.0525C6.25154 9.54996 6.19708 8.99703 6.30319 8.46358C6.4093 7.93013 6.67121 7.44013 7.05581 7.05553C7.4404 6.67094 7.93041 6.40903 8.46385 6.30292C8.9973 6.19681 9.55023 6.25127 10.0527 6.45941C10.5552 6.66755 10.9847 7.02002 11.2869 7.47226C11.5891 7.92449 11.7504 8.45618 11.7504 9.00008C11.7504 9.72942 11.4606 10.4289 10.9449 10.9446C10.4292 11.4603 9.7297 11.7501 9.00035 11.7501V11.7501Z"/>
                            </svg>
                        </span>
                        <?php foreach($data['alumniPerBatch'] as $alumniCount): ?>
                        <?php if($alumniCount['batchID'] == $batch->id):?>
                            <span class="groupUserCount"><?php echo (!empty($alumniCount['alumniCount']) ? $alumniCount['alumniCount'] : '0')?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </a>
                    </a>

                    <ul class="groupList">
                        <?php foreach($data['course'] as $course) :?>
                        <li class="group">
                            <a href="<?php echo URLROOT?>/alumni_report/showCourse/<?php echo $batch->id?>/<?php echo $course->id?>" class="groupHeader <?php echo ($url[3] == $course->id) ? 'active' : ''?>">
                                <?php echo $course->course_code?> 
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php endforeach; ?>
            </ul>
            
        </section>
        <main class="admin">
            <section class="pageSpecificHeader">
                <div>
                    <h2>
                        <span class="department">Survey</span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.47246 19.0139C9.23881 19.0143 9.01237 18.9329 8.83246 18.7839C8.7312 18.6999 8.6475 18.5968 8.58615 18.4805C8.5248 18.3641 8.487 18.2368 8.47493 18.1058C8.46285 17.9749 8.47673 17.8428 8.51578 17.7172C8.55482 17.5916 8.61826 17.4749 8.70246 17.3739L13.1825 12.0139L8.86246 6.64386C8.7794 6.54157 8.71737 6.42387 8.67993 6.29753C8.6425 6.17119 8.63041 6.0387 8.64435 5.90767C8.65829 5.77665 8.69798 5.64966 8.76116 5.53403C8.82433 5.41839 8.90974 5.31638 9.01246 5.23386C9.11593 5.14282 9.23709 5.07415 9.36836 5.03216C9.49962 4.99017 9.63814 4.97577 9.77524 4.98986C9.91233 5.00394 10.045 5.04621 10.165 5.11401C10.285 5.18181 10.3897 5.27368 10.4725 5.38386L15.3025 11.3839C15.4495 11.5628 15.53 11.7872 15.53 12.0189C15.53 12.2505 15.4495 12.4749 15.3025 12.6539L10.3025 18.6539C10.2021 18.7749 10.0747 18.8705 9.9305 18.9331C9.78629 18.9956 9.62937 19.0233 9.47246 19.0139Z" fill="white"/>
                        </svg>
                        <span class="batch">Alumni Report</span>
                    </h2>
                    <div class="btnContainer">
                    <?php if(!empty($data['alumni'])) : ?>
                    <form action="<?php echo URLROOT?>/alumni_report/export" method="POST">
                        <?php foreach($data['alumni'] as $export) : ?>
                            <input type="hidden" name="result[]" value="<?php echo $export->employment_id?>">
                        <?php endforeach; ?>
                        <button>
                            Export
                            <!-- update svg -->
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 16H13V7H16L12 2L8 7H11V16Z" fill="black" fill-opacity="0.87"/>
                                <path d="M5 22H19C20.103 22 21 21.103 21 20V11C21 9.897 20.103 9 19 9H15V11H19V20H5V11H9V9H5C3.897 9 3 9.897 3 11V20C3 21.103 3.897 22 5 22Z" fill="black" fill-opacity="0.87"/>
                            </svg>
                        </button>
                    </form>
                    <?php endif; ?>
                    <a href="<?php if($url[1] == "showBatch" || $url[1] == "showBatch_1st_half" || $url[1] == "showBatch_2nd_half") {
                        echo URLROOT.'/alumni_report/showBatch_1st_half/'.$url[2];
                    } elseif ($url[1] == "showCourse" || $url[1] == "showCourse_1st_half" || $url[1] == "showCourse_2nd_half") {
                        echo URLROOT.'/alumni_report/showCourse_1st_half/'.$url[2].'/'.$url[3];
                    } else {
                        echo URLROOT.'/admin/alumni_report_1st_half';
                    }?>">January - June</a>
                    <a href="<?php if($url[1] == "showBatch" || $url[1] == "showBatch_1st_half" || $url[1] == "showBatch_2nd_half") {
                        echo URLROOT.'/alumni_report/showBatch_2nd_half/'.$url[2];
                    } elseif ($url[1] == "showCourse" || $url[1] == "showCourse_1st_half" || $url[1] == "showCourse_2nd_half") {
                        echo URLROOT.'/alumni_report/showCourse_2nd_half/'.$url[2].'/'.$url[3];
                    } else {
                        echo URLROOT.'/admin/alumni_report_2nd_half';
                    }?>">July - December</a>
                        
                    </div>
                </div>
                <div class="container">
                    <div class="textFieldContainer">
                    <?php if($url[1] == "alumni_report"):?>
                        <input type="search" name="searchNews" id="search-alumni" placeholder="Search">
                        <label class="icon" for="search-news">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.5001 13.9999H14.7101L14.4301 13.7299C15.6301 12.3299 16.2501 10.4199 15.9101 8.38989C15.4401 5.60989 13.1201 3.38989 10.3201 3.04989C6.09014 2.52989 2.53014 6.08989 3.05014 10.3199C3.39014 13.1199 5.61014 15.4399 8.39014 15.9099C10.4201 16.2499 12.3301 15.6299 13.7301 14.4299L14.0001 14.7099V15.4999L18.2501 19.7499C18.6601 20.1599 19.3301 20.1599 19.7401 19.7499C20.1501 19.3399 20.1501 18.6699 19.7401 18.2599L15.5001 13.9999ZM9.50014 13.9999C7.01014 13.9999 5.00014 11.9899 5.00014 9.49989C5.00014 7.00989 7.01014 4.99989 9.50014 4.99989C11.9901 4.99989 14.0001 7.00989 14.0001 9.49989C14.0001 11.9899 11.9901 13.9999 9.50014 13.9999Z" fill="black" fill-opacity="0.6"/>
                            </svg>
                        </label>
                    <?php endif;?>
                    </div>
                </div>
            </section>
            <section class="mainContent userReport">
                <form action="" class="table-form">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Batch</th>
                                <th>Status</th>
                                <th>Date responded</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="search-insert">
                            <?php foreach($data['alumni'] as $alumni) : ?>
                            <tr>
                                <td><p class="studentID"><?php echo $alumni->student_no?></p></td>
                                <td><p class="studentName"><?php echo $alumni->first_name  . ' ' .  (!empty($alumni->middle_name) ? substr($alumni->middle_name,0,1) . '.' : ''). ' ' . $alumni->last_name?></td>
                                <td><p class="course"><?php echo $alumni->course?></p></td>
                                <td><p class="batch"><?php echo $alumni->year?></p></td>
                                <td><p class="emp-stat"><?php echo $alumni->status?></p></td>
                                <td><time><?php echo date('F j' .','. ' Y ', strtotime($alumni->date_responded))?></time></td>
                                <td><span data-employment_id='<?php echo $alumni->employment_id?>' class="viewAlumni"><svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="28" height="28" rx="14" fill="#EEEEEE"/>
                                        <path d="M17.4756 19.5C18.0279 19.5 18.4756 19.0523 18.4756 18.5C18.4756 17.9477 18.0279 17.5 17.4756 17.5C16.9233 17.5 16.4756 17.9477 16.4756 18.5C16.4756 19.0523 16.9233 19.5 17.4756 19.5Z" fill="black" fill-opacity="0.87"/>
                                        <path d="M21.3641 18.2395C21.0551 17.4524 20.522 16.7733 19.8308 16.2864C19.1396 15.7994 18.3207 15.526 17.4756 15.5C16.6305 15.526 15.8116 15.7994 15.1203 16.2864C14.4291 16.7733 13.896 17.4524 13.5871 18.2395L13.4756 18.5L13.5871 18.7605C13.896 19.5476 14.4291 20.2267 15.1203 20.7136C15.8116 21.2006 16.6305 21.474 17.4756 21.5C18.3207 21.474 19.1396 21.2006 19.8308 20.7136C20.522 20.2267 21.0551 19.5476 21.3641 18.7605L21.4756 18.5L21.3641 18.2395ZM17.4756 20.5C17.08 20.5 16.6933 20.3827 16.3644 20.1629C16.0355 19.9432 15.7792 19.6308 15.6278 19.2654C15.4765 18.8999 15.4368 18.4978 15.514 18.1098C15.5912 17.7219 15.7817 17.3655 16.0614 17.0858C16.3411 16.8061 16.6974 16.6156 17.0854 16.5384C17.4734 16.4613 17.8755 16.5009 18.241 16.6522C18.6064 16.8036 18.9188 17.06 19.1385 17.3889C19.3583 17.7178 19.4756 18.1044 19.4756 18.5C19.4749 19.0302 19.264 19.5386 18.8891 19.9135C18.5141 20.2884 18.0058 20.4993 17.4756 20.5Z" fill="black" fill-opacity="0.87"/>
                                        <path d="M11.7755 20.4286H9.57557V7.5716H13.9755V10.7858C13.9764 11.0697 14.0925 11.3418 14.2986 11.5425C14.5047 11.7433 14.784 11.8564 15.0755 11.8573H18.3754V14.0001H19.4754V10.7858C19.4773 10.7154 19.4636 10.6455 19.4351 10.5807C19.4066 10.516 19.3641 10.458 19.3104 10.4108L15.4605 6.66089C15.4121 6.60858 15.3526 6.56712 15.2861 6.53937C15.2196 6.51163 15.1478 6.49826 15.0755 6.50018H9.57557C9.2841 6.50103 9.00482 6.61418 8.79872 6.81493C8.59263 7.01568 8.47646 7.2877 8.47559 7.5716V20.4286C8.47646 20.7125 8.59263 20.9845 8.79872 21.1853C9.00482 21.386 9.2841 21.4992 9.57557 21.5H11.7755V20.4286ZM15.0755 7.78588L18.1554 10.7858H15.0755V7.78588Z" fill="black" fill-opacity="0.87"/>
                                        </svg>
                                    </span>
                                </div></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    <div class="pagination">
                        <span class="currentRows"><?php echo $data['start'] . '-' . $data['limit'] . ' of ' . $data['total']?></span>
                        <a href="
                        <?php if($url[1] == 'showBatch') {
                            echo URLROOT .'/alumni_report/showBatch/'. $url[2] . $data['first'];
                        } elseif($url[1] == 'showCourse') {
                            echo URLROOT .'/alumni_report/showCourse/'.$url[2]."/".$url[3] . $data['first'];
                        } elseif($url[1] == 'alumni_report_1st_half') {
                            echo URLROOT .'/alumni_report/alumni_report_1st_half' . $data['first'];
                        } elseif($url[1] == 'alumni_report_2nd_half') {
                            echo URLROOT .'/alumni_report/alumni_report_2nd_half' . $data['first'];
                        } elseif($url[1] == 'showBatch_1st_half') {
                            echo URLROOT .'/alumni_report/showBatch_1st_half/'. $url[2] . $data['first'];
                        } elseif($url[1] == 'showBatch_2nd_half') {
                            echo URLROOT .'/alumni_report/showBatch_2nd_half/'. $url[2] . $data['first'];
                        } else {
                            echo URLROOT .'/admin/alumni_report' . $data['first'];
                        }
                        ?>" class="start">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 3C5.75507 3.00003 5.51866 3.08996 5.33563 3.25272C5.15259 3.41547 5.03566 3.63975 5.007 3.883L5 4V20C5.00028 20.2549 5.09788 20.5 5.27285 20.6854C5.44782 20.8707 5.68695 20.9822 5.94139 20.9972C6.19584 21.0121 6.44638 20.9293 6.64183 20.7657C6.83729 20.6021 6.9629 20.3701 6.993 20.117L7 20V4C7 3.73478 6.89464 3.48043 6.70711 3.29289C6.51957 3.10536 6.26522 3 6 3ZM18.707 3.293C18.5348 3.12082 18.3057 3.01739 18.0627 3.00211C17.8197 2.98683 17.5794 3.06075 17.387 3.21L17.293 3.293L9.293 11.293C9.12082 11.4652 9.01739 11.6943 9.00211 11.9373C8.98683 12.1803 9.06075 12.4206 9.21 12.613L9.293 12.707L17.293 20.707C17.473 20.8863 17.7144 20.9905 17.9684 20.9982C18.2223 21.006 18.4697 20.9168 18.6603 20.7488C18.8508 20.5807 18.9703 20.3464 18.9944 20.0935C19.0185 19.8406 18.9454 19.588 18.79 19.387L18.707 19.293L11.414 12L18.707 4.707C18.8945 4.51947 18.9998 4.26516 18.9998 4C18.9998 3.73484 18.8945 3.48053 18.707 3.293Z" fill="black" fill-opacity="0.87"/>
                            </svg>
                        </a>
                        <a href="
                        <?php if($url[1] == 'showBatch') {
                            echo URLROOT .'/alumni_report/showBatch/'. $url[2] . $data['previous'];
                        } elseif($url[1] == 'showCourse') {
                            echo URLROOT .'/alumni_report/showCourse/'.$url[2]."/".$url[3] . $data['previous'];
                        } elseif($url[1]== 'alumni_report_1st_half') {
                            echo URLROOT .'/alumni_report/alumni_report_1st_half'. $data['first'];
                        } elseif($url[1]== 'alumni_report_2nd_half') {
                            echo URLROOT .'/alumni_report/alumni_report_2nd_half'. $data['first'];
                        } elseif($url[1]== 'showBatch_1st_half') {
                            echo URLROOT .'/alumni_report/showBatch_1st_half/'. $url[2] . $data['first'];
                        } elseif($url[1]== 'showBatch_2nd_half') {
                            echo URLROOT .'/alumni_report/showBatch_2nd_half/'. $url[2] . $data['first'];
                        }  else {
                            echo URLROOT .'/admin/alumni_report' . $data['previous'];
                        }
                        ?>" class="previous">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.0625 3.00197C16.3056 3.01725 16.5347 3.12068 16.7069 3.29286C16.8943 3.48039 16.9996 3.7347 16.9996 3.99986C16.9996 4.26503 16.8943 4.51933 16.7069 4.70686L9.41386 11.9999L16.7069 19.2929L16.7899 19.3869C16.9453 19.5879 17.0184 19.8405 16.9943 20.0934C16.9702 20.3463 16.8507 20.5806 16.6601 20.7486C16.4696 20.9166 16.2222 21.0058 15.9682 20.9981C15.7143 20.9903 15.4728 20.8862 15.2929 20.7069L7.29286 12.7069L7.20986 12.6129C7.06061 12.4205 6.98669 12.1802 7.00197 11.9372C7.01725 11.6942 7.12068 11.4651 7.29286 11.2929L15.2929 3.29286L15.3869 3.20986C15.5793 3.06061 15.8195 2.98669 16.0625 3.00197Z" fill="black" fill-opacity="0.87"/>
                            </svg> 
                        </a>
                        <a href="
                        <?php if($url[1] == 'showBatch') {
                            echo URLROOT .'/alumni_report/showBatch/'. $url[2] . $data['next'];
                        } elseif($url[1] == 'showCourse') {
                            echo URLROOT .'/alumni_report/showCourse/'.$url[2]."/".$url[3] . $data['next'];
                        } elseif($url[1]== 'alumni_report_1st_half') {
                            echo URLROOT .'/alumni_report/alumni_report_1st_half' . $data['first'];
                        } elseif($url[1]== 'alumni_report_2nd_half') {
                            echo URLROOT .'/alumni_report/alumni_report_2nd_half' . $data['first'];
                        } elseif($url[1]== 'showBatch_1st_half') {
                            echo URLROOT .'/alumni_report/showBatch_1st_half/'. $url[2] . $data['first'];
                        } elseif($url[1]== 'showBatch_2nd_half') {
                            echo URLROOT .'/alumni_report/showBatch_2nd_half/'. $url[2] . $data['first'];
                        }  else {
                            echo URLROOT .'/admin/alumni_report' . $data['next'];
                        }
                        ?>" class="next">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.29279 3.29311C7.46498 3.12093 7.69408 3.0175 7.93711 3.00222C8.18013 2.98694 8.42038 3.06085 8.61279 3.21011L8.70679 3.29311L16.7068 11.2931C16.879 11.4653 16.9824 11.6944 16.9977 11.9374C17.013 12.1805 16.939 12.4207 16.7898 12.6131L16.7068 12.7071L8.70679 20.7071C8.52683 20.8865 8.28535 20.9906 8.0314 20.9983C7.77745 21.0061 7.53007 20.9169 7.33951 20.7489C7.14894 20.5808 7.02948 20.3466 7.00539 20.0936C6.98129 19.8407 7.05437 19.5881 7.20979 19.3871L7.29279 19.2931L14.5858 12.0001L7.29279 4.70711C7.10532 4.51958 7 4.26527 7 4.00011C7 3.73494 7.10532 3.48063 7.29279 3.29311Z" fill="black" fill-opacity="0.87"/>
                            </svg>
                        </a>
                        <a href="
                        <?php if($url[1] == 'showBatch') {
                            echo URLROOT .'/alumni_report/showBatch/'. $url[2] . $data['last'];
                        } elseif($url[1] == 'showCourse') {
                            echo URLROOT .'/alumni_report/showCourse/'.$url[2]."/".$url[3] . $data['last'];
                        } elseif($url[1]== 'alumni_report_1st_half') {
                            echo URLROOT .'/alumni_report/alumni_report_1st_half' . $data['first'];
                        } elseif($url[1]== 'alumni_report_2nd_half') {
                            echo URLROOT .'/alumni_report/alumni_report_2nd_half' . $data['first'];
                        } elseif($url[1]== 'showBatch_1st_half') {
                            echo URLROOT .'/alumni_report/showBatch_1st_half/'. $url[2] . $data['first'];
                        } elseif($url[1]== 'showBatch_2nd_half') {
                            echo URLROOT .'/alumni_report/showBatch_2nd_half/'. $url[2] . $data['first'];
                        }  else {
                            echo URLROOT .'/admin/alumni_report' . $data['last'];
                        }
                        ?>" class="end">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 3C18.245 3.00003 18.4814 3.08996 18.6644 3.25272C18.8474 3.41547 18.9644 3.63975 18.993 3.883L19 4V20C18.9997 20.2549 18.9022 20.5 18.7272 20.6854C18.5522 20.8707 18.3131 20.9822 18.0586 20.9972C17.8042 21.0121 17.5537 20.9293 17.3582 20.7657C17.1627 20.6021 17.0371 20.3701 17.007 20.117L17 20V4C17 3.73478 17.1054 3.48043 17.2929 3.29289C17.4805 3.10536 17.7348 3 18 3ZM5.29303 3.293C5.46522 3.12082 5.69432 3.01739 5.93735 3.00211C6.18038 2.98683 6.42063 3.06075 6.61303 3.21L6.70703 3.293L14.707 11.293C14.8792 11.4652 14.9826 11.6943 14.9979 11.9373C15.0132 12.1803 14.9393 12.4206 14.79 12.613L14.707 12.707L6.70703 20.707C6.52707 20.8863 6.2856 20.9905 6.03165 20.9982C5.7777 21.006 5.53032 20.9168 5.33975 20.7488C5.14919 20.5807 5.02973 20.3464 5.00563 20.0935C4.98154 19.8406 5.05462 19.588 5.21003 19.387L5.29303 19.293L12.586 12L5.29303 4.707C5.10556 4.51947 5.00024 4.26516 5.00024 4C5.00024 3.73484 5.10556 3.48053 5.29303 3.293Z" fill="black" fill-opacity="0.87"/>
                            </svg>
                        </a>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>

    <div class="modalConFilterNav " id="manageModal">

    </div>

<script>
    $(document).ready(function(){
           $('.viewAlumni').click(function(){
                var employment_id = $(this).attr('data-employment_id');
                // console.log(employment_id);
                $.ajax({
                    url:'<?php echo URLROOT;?>/alumni_report/report',
                    data: { id : employment_id},
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        // console.log(res);
                        $('#manageModal').html(res);
                        $('#manageModal').addClass('show');
                        closeModal();
                    }, 
                    error: function(er){
                        console.log(er);
                    }
                });
            })  
            
            function closeModal() {
                $('.close-btn').click(function() {
                    $('#manageModal').removeClass('show');
                })
            }
    })

    $(document).on('input', '#search-alumni', function(){
        const searchChar = $(this).val();
        $.ajax({ 
                url:'<?php echo URLROOT;?>/admin/alumni_report',
                data: { searchKey : searchChar, isSearch : 1},
                method: 'POST',
                type: 'POST',
                success:function(res){
                    // var newObj = jQuery.parseJSON(res);
                    // console.log(newObj[0].title);
                    //console.log(res);
                    $('#search-insert').html(res);
                    //console.log(res);   
                }, 
                error: function(er){
                    console.log(er);
                }
        });
    })

</script>

<?php require APPROOT . '/views/inc/footer.php';?>