<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="<?php echo URLROOT;?>/images/logo-32px.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css">
    <script src="<?php echo URLROOT;?>/js/clock.js"></script>
    <script src="<?php echo URLROOT;?>/js/index.js" defer></script>
    <script src="<?php echo URLROOT;?>/js/image_render.js" defer></script>
    <script src="<?php echo URLROOT;?>/js/survey.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script
     src="https://code.jquery.com/jquery-3.6.0.min.js"
     integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
     crossorigin="anonymous"></script>
     <script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
</head>
<body id="Admin">
    <div class="fullscreen">
        <header class="adminHeader">
            <div class="hamburgerAdmin">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a href="<?php echo URLROOT;?>/pages/home" class="logo"></a>
            <h1>PUP Institute of Technology</h1>
            <span>Admin Page</span>
            <a href="<?php echo URLROOT;?>/pages/home">Switch to homepage</a>
        </header>
            <div class="main users">
                <nav class="adminNav">
                    <div class="accountNameContainer">
                        <div class="imageContainer">
                            <?php if(empty($_SESSION['image'])) :?>
                            <img src="<?php echo URLROOT?>/images/official-default-avatar.svg">
                            <?php else: ?>
                            <img src="<?php echo URLROOT?>/uploads/<?php echo $_SESSION['image']?>">
                            <?php endif; ?>
                        </div>
                        <h3><?php echo $_SESSION['name']?></h3>
                        <a href="<?php echo URLROOT?>/admin_manage/manage">
                        <svg class="icon" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.8392 9.51204L15.3861 9.07871C15.2857 8.72828 15.1475 8.38975 14.9741 8.06905L15.6854 6.73872C15.7121 6.6885 15.7219 6.63103 15.7133 6.57483C15.7047 6.51862 15.6782 6.46668 15.6377 6.42672L14.601 5.38673C14.561 5.34628 14.509 5.3198 14.4528 5.31122C14.3965 5.30263 14.339 5.31239 14.2887 5.33906L12.9658 6.04539C12.6416 5.86368 12.2983 5.71835 11.9421 5.61206L11.5083 4.17773C11.49 4.12487 11.4553 4.07919 11.4093 4.04727C11.3634 4.01534 11.3084 3.99881 11.2524 4.00007H9.78632C9.72999 4.00033 9.67522 4.01854 9.62997 4.05205C9.58472 4.08557 9.55136 4.13263 9.53474 4.1864L9.10098 5.61639C8.74184 5.72211 8.39559 5.86745 8.06864 6.04972L6.76737 5.34773C6.71711 5.32106 6.65957 5.3113 6.60332 5.31988C6.54706 5.32847 6.49507 5.35495 6.45507 5.39539L5.40104 6.42239C5.36055 6.46235 5.33405 6.51429 5.32545 6.57049C5.31686 6.6267 5.32663 6.68417 5.35332 6.73439L6.05601 8.03438C5.87386 8.35963 5.72838 8.70407 5.62225 9.06137L4.18652 9.49471C4.1327 9.51131 4.08559 9.54464 4.05204 9.58984C4.01849 9.63505 4.00026 9.68977 4 9.74604V11.2107C4.00026 11.267 4.01849 11.3217 4.05204 11.3669C4.08559 11.4121 4.1327 11.4454 4.18652 11.462L5.63093 11.8954C5.73822 12.2467 5.88367 12.5853 6.06468 12.905L5.35332 14.2657C5.32663 14.3159 5.31686 14.3734 5.32545 14.4296C5.33405 14.4858 5.36055 14.5377 5.40104 14.5777L6.43772 15.6133C6.47772 15.6538 6.52971 15.6803 6.58597 15.6889C6.64222 15.6974 6.69976 15.6877 6.75002 15.661L8.09033 14.946C8.40739 15.1169 8.74184 15.2535 9.08797 15.3533L9.52173 16.8137C9.53835 16.8674 9.57171 16.9145 9.61696 16.948C9.66221 16.9815 9.71698 16.9997 9.77331 17H11.2394C11.2957 16.9997 11.3505 16.9815 11.3958 16.948C11.441 16.9145 11.4744 16.8674 11.491 16.8137L11.9247 15.349C12.2679 15.2486 12.5994 15.1121 12.9137 14.9417L14.2627 15.661C14.313 15.6877 14.3705 15.6974 14.4268 15.6889C14.483 15.6803 14.535 15.6538 14.575 15.6133L15.6117 14.5777C15.6522 14.5377 15.6787 14.4858 15.6873 14.4296C15.6959 14.3734 15.6861 14.3159 15.6594 14.2657L14.9394 12.9224C15.1117 12.6072 15.2499 12.2745 15.3514 11.93L16.8132 11.4967C16.867 11.4801 16.9141 11.4468 16.9477 11.4016C16.9812 11.3564 16.9994 11.3016 16.9997 11.2454V9.7677C17.0023 9.71382 16.9883 9.66044 16.9596 9.61474C16.9309 9.56904 16.8889 9.5332 16.8392 9.51204ZM10.5194 12.8834C10.0475 12.8834 9.58629 12.7436 9.19397 12.4817C8.80165 12.2198 8.49587 11.8476 8.3153 11.4121C8.13474 10.9766 8.08749 10.4974 8.17955 10.0351C8.2716 9.57275 8.49881 9.14808 8.83245 8.81477C9.16609 8.48146 9.59118 8.25447 10.054 8.16251C10.5167 8.07055 10.9964 8.11774 11.4323 8.29813C11.8682 8.47852 12.2408 8.784 12.503 9.17593C12.7651 9.56787 12.905 10.0287 12.905 10.5C12.905 11.1321 12.6537 11.7383 12.2063 12.1853C11.7589 12.6323 11.1521 12.8834 10.5194 12.8834Z" fill="black" fill-opacity="0.87"/>
                        </svg>
                       
                        </a>
                    </div>
                    <ul class="mainCategoryList">

                        <?php   $url= rtrim($_GET['url'],'/');
                                $url= explode('/', $url);
                        ?>
                        <?php if(userType() == "Admin" || userType() == "Super Admin") : ?>
                        <li class="mainCategory <?php echo ($url[1] == 'dashboard') ? 'open' : ' '?>" >
                            <div class="categoryContainer">
                                <a href="<?php echo URLROOT;?>/admin/dashboard">Dashboard</a>
                            </div>
                        </li>
                        <li class="mainCategory <?php echo ($url[1] == 'alumni' || $url[0] == 'alumni') ? 'open' : ' '?>" tabindex="0">
                            <div class="categoryContainer">
                                <a href="<?php echo URLROOT;?>/admin/alumni">Alumni</a>
                            </div>
                        </li>
                        <li class="mainCategory 
                        <?php echo ($url[1] == 'gallery' || $url[1] == 'events' || $url[1] == 'news' || $url[1] == 'job_portal' || $url[0] == 'events' || $url[0] == 'news' || $url[0] =='job_portal') ? 'open' : ' '?>" tabindex="0">
                            <div class="categoryContainer">
                                <span>Contents</span>
                                <span class="icon dropArrow">
                                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 21.3333C15.6885 21.3339 15.3866 21.2254 15.1467 21.0266L7.14671 14.36C6.87442 14.1336 6.70319 13.8084 6.67068 13.4559C6.63817 13.1033 6.74706 12.7522 6.97338 12.48C7.19969 12.2077 7.52491 12.0364 7.87748 12.0039C8.23005 11.9714 8.58109 12.0803 8.85338 12.3066L16 18.28L23.1467 12.52C23.2831 12.4092 23.44 12.3265 23.6085 12.2766C23.7769 12.2267 23.9536 12.2106 24.1283 12.2291C24.303 12.2477 24.4723 12.3007 24.6265 12.3849C24.7807 12.4691 24.9167 12.583 25.0267 12.72C25.1488 12.8571 25.2413 13.0179 25.2984 13.1924C25.3554 13.3669 25.3758 13.5513 25.3583 13.734C25.3408 13.9168 25.2857 14.094 25.1965 14.2544C25.1073 14.4149 24.986 14.5552 24.84 14.6666L16.84 21.1066C16.5933 21.274 16.2975 21.3538 16 21.3333Z"/>
                                    </svg>
                                </span>
                            </div>
                            <ul class="subCategoryList">
                                <li><a href="<?php echo URLROOT;?>/admin/news">News</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/events">Events</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/gallery">Gallery</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/job_portal">Job Portal</a></li>
                            </ul>
                        </li>
                        <li class="mainCategory <?php echo ($url[1] == 'alumni_report' || $url[0] == 'alumni_report'  || $url[1] == 'survey_list' || $url[1] == 'survey_report' || $url[1] == 'employment' || $url[0] == 'surveys' ) ? 'open' : ' '?>" tabindex="0">
                            <div class="categoryContainer">
                                <span>Survey</span>
                                <span class="icon dropArrow">
                                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 21.3333C15.6885 21.3339 15.3866 21.2254 15.1467 21.0266L7.14671 14.36C6.87442 14.1336 6.70319 13.8084 6.67068 13.4559C6.63817 13.1033 6.74706 12.7522 6.97338 12.48C7.19969 12.2077 7.52491 12.0364 7.87748 12.0039C8.23005 11.9714 8.58109 12.0803 8.85338 12.3066L16 18.28L23.1467 12.52C23.2831 12.4092 23.44 12.3265 23.6085 12.2766C23.7769 12.2267 23.9536 12.2106 24.1283 12.2291C24.303 12.2477 24.4723 12.3007 24.6265 12.3849C24.7807 12.4691 24.9167 12.583 25.0267 12.72C25.1488 12.8571 25.2413 13.0179 25.2984 13.1924C25.3554 13.3669 25.3758 13.5513 25.3583 13.734C25.3408 13.9168 25.2857 14.094 25.1965 14.2544C25.1073 14.4149 24.986 14.5552 24.84 14.6666L16.84 21.1066C16.5933 21.274 16.2975 21.3538 16 21.3333Z"/>
                                    </svg>
                                </span>
                            </div>
                            <ul class="subCategoryList ">
                                <li><a href="<?php echo URLROOT;?>/admin/survey_list">Survey List</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/survey_report">Survey Report</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/alumni_report">Alumni Report</a></li>
                            </ul>
                        </li>
<!-- 
                        <li class="mainCategory" >
                            <div class="categoryContainer">
                                <a href="<?php echo URLROOT;?>/admin/notif">Send Email</a>
                            </div>
                        </li> -->
                        <!-- <li class="mainCategory" >
                            <div class="categoryContainer">
                                <a href="<?php echo URLROOT;?>/admin/dashTest">Dashboard Test</a>
                            </div>
                        </li> -->

                        <!-- <li class="mainCategory" >
                            <div class="categoryContainer">
                                <a href="<?php echo URLROOT;?>/admin/api_test">API TEST</a>
                            </div>
                        </li> -->

                        <?php else :?>
                            <li class="mainCategory 
                        <?php echo ($url[1] == 'events' || $url[1] == 'news' || $url[1] == 'job_portal' || $url[0] == 'events' || $url[0] == 'news' || $url[0] =='job_portal') ? 'open' : ' '?>" tabindex="0">
                            <div class="categoryContainer">
                                <span>Contents</span>
                                <span class="icon dropArrow">
                                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 21.3333C15.6885 21.3339 15.3866 21.2254 15.1467 21.0266L7.14671 14.36C6.87442 14.1336 6.70319 13.8084 6.67068 13.4559C6.63817 13.1033 6.74706 12.7522 6.97338 12.48C7.19969 12.2077 7.52491 12.0364 7.87748 12.0039C8.23005 11.9714 8.58109 12.0803 8.85338 12.3066L16 18.28L23.1467 12.52C23.2831 12.4092 23.44 12.3265 23.6085 12.2766C23.7769 12.2267 23.9536 12.2106 24.1283 12.2291C24.303 12.2477 24.4723 12.3007 24.6265 12.3849C24.7807 12.4691 24.9167 12.583 25.0267 12.72C25.1488 12.8571 25.2413 13.0179 25.2984 13.1924C25.3554 13.3669 25.3758 13.5513 25.3583 13.734C25.3408 13.9168 25.2857 14.094 25.1965 14.2544C25.1073 14.4149 24.986 14.5552 24.84 14.6666L16.84 21.1066C16.5933 21.274 16.2975 21.3538 16 21.3333Z"/>
                                    </svg>
                                </span>
                            </div>
                            <ul class="subCategoryList">
                                <li><a href="<?php echo URLROOT;?>/admin/news">News</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/events">Events</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/gallery">Gallery</a></li>
                                <li><a href="<?php echo URLROOT;?>/admin/job_portal">Job Portal</a></li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                    
                    <button class="btnLogout">
                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.625 16.875H7.875C7.57672 16.8747 7.29075 16.7561 7.07983 16.5452C6.86892 16.3343 6.7503 16.0483 6.75 15.75V14.0625H7.875V15.75H14.625V2.25H7.875V3.9375H6.75V2.25C6.7503 1.95172 6.86892 1.66575 7.07983 1.45483C7.29075 1.24392 7.57672 1.1253 7.875 1.125H14.625C14.9233 1.1253 15.2093 1.24392 15.4202 1.45483C15.6311 1.66575 15.7497 1.95172 15.75 2.25V15.75C15.7497 16.0483 15.6311 16.3343 15.4202 16.5452C15.2093 16.7561 14.9233 16.8747 14.625 16.875Z"/>
                            <path d="M6.42037 11.5796L4.40325 9.5625H12.375V8.4375H4.40325L6.42037 6.42037L5.625 5.625L2.25 9L5.625 12.375L6.42037 11.5796Z" />
                        </svg>
                        Logout
                    </button>
                </nav>

          