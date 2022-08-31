<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME;?></title>
    <link rel="shortcut icon" href="<?php echo URLROOT;?>/images/logo-32px.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css">
    <script src="<?php echo URLROOT;?>/js/index.js" defer></script>
    <script
     src="https://code.jquery.com/jquery-3.6.0.min.js"
     integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
     crossorigin="anonymous"></script>
     <script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
</head>

<?php   
    $url= rtrim($_GET['url'],'/');
    $url= explode('/', $url);
?>

<body id="<?php echo ($_SESSION['user_type'] == "Alumni") ? 'Alumni' : 'Admin' ?>">
    <header class="mainHeader <?php 
                                echo ($url[0] == 'survey_widget') ? 'userSurvey': ''; ?> <?php
                                echo ($url[1] == 'editProfile' && $data['accInfo']->verify != "YES") ? 'userSurvey firstEdit' : ''; ?><?php 
                                echo ($url[1] == 'profileAdditionalAdd') ? ' userSurvey' : '';
                                ?> ">
        <a href="<?php echo URLROOT?>/pages/home" class="mainLogo"></a>
        <h1>Polytechnic University of the Philippines</h1>
        <svg class="icon hamburgerIcon" tabindex="0" viewBox="0 0 44 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.3333 32H29.0286C29.7619 32 30.3619 31.4 30.3619 30.6667C30.3619 29.9333 29.7619 29.3333 29.0286 29.3333H13.3333C12.6 29.3333 12 29.9333 12 30.6667C12 31.4 12.6 32 13.3333 32ZM13.3333 25.3333H34.6667C35.4 25.3333 36 24.7333 36 24C36 23.2667 35.4 22.6667 34.6667 22.6667H13.3333C12.6 22.6667 12 23.2667 12 24C12 24.7333 12.6 25.3333 13.3333 25.3333ZM12 17.3333C12 18.0667 12.6 18.6667 13.3333 18.6667H29.0286C29.7619 18.6667 30.3619 18.0667 30.3619 17.3333C30.3619 16.6 29.7619 16 29.0286 16L13.3333 16C12.6 16 12 16.6 12 17.3333Z"/>
        </svg>
    </header>
    <div class="headerShadow"></div>
    <nav class="mainNav">
        <div class="userConMobile">
                <?php if (empty($_SESSION['image'])) :?>
                    <img src="<?php echo URLROOT;?>/images/official-default-avatar.svg">
                <?php else: ?>
                    <img src="<?php echo URLROOT;?>/uploads/<?php echo ($_SESSION['image']) ?>">
                <?php endif; ?>

            <h2><?php echo ($_SESSION['user_type'] == "Alumni") ? $_SESSION['first_name'] : $_SESSION['name'] ?></h2>
            <span><?php echo $_SESSION['email'] ?></span>
        </div>
        <ul>
            <?php if($url[0] == 'survey_widget' || $url[1] == 'profileAdditionalAdd' || $url[1] == 'profileAdditionalEdit') : ?>
            <?php else : ?>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/home" <?php if($url[1] == "home") { echo 'class="active"'; }?>>
                    <svg viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.4104 10.8564L10.9633 2.41539C10.9025 2.35445 10.8302 2.3061 10.7507 2.27311C10.6712 2.24012 10.5859 2.22314 10.4998 2.22314C10.4137 2.22314 10.3285 2.24012 10.2489 2.27311C10.1694 2.3061 10.0972 2.35445 10.0363 2.41539L1.58916 10.8564C1.34307 11.1025 1.20361 11.4368 1.20361 11.7854C1.20361 12.5093 1.79219 13.0979 2.51611 13.0979H3.40615V19.1211C3.40615 19.484 3.69941 19.7773 4.0624 19.7773H9.1873V15.1836H11.4842V19.7773H16.9372C17.3002 19.7773 17.5935 19.484 17.5935 19.1211V13.0979H18.4835C18.8321 13.0979 19.1664 12.9605 19.4125 12.7124C19.9231 12.1997 19.9231 11.3691 19.4104 10.8564Z"/>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/news" <?php if($url[1] == "news" || $url[0] == 'posts') { echo 'class="active"'; }?>>
                    <svg viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7001 5.75029H10.5001V7.85029H14.7001V5.75029ZM14.7001 8.90029H10.5001V9.95029H14.7001V8.90029ZM9.4501 5.75029H6.3001V9.95029H9.4501V5.75029ZM9.4501 12.0503H14.7001V11.0003H9.4501V12.0503ZM12.6001 14.1503H14.7001V13.1003H12.6001V14.1503ZM14.7001 15.2003H6.3001V16.2503H14.7001V15.2003ZM11.5501 13.1003H6.3001V14.1503H11.5501V13.1003ZM8.4001 11.0003H6.3001V12.0503H8.4001V11.0003ZM17.8501 1.55029H3.1501C2.87162 1.55029 2.60455 1.66092 2.40764 1.85783C2.21072 2.05474 2.1001 2.32182 2.1001 2.60029V19.4003C2.1001 19.6788 2.21072 19.9458 2.40764 20.1428C2.60455 20.3397 2.87162 20.4503 3.1501 20.4503H17.8501C18.1286 20.4503 18.3956 20.3397 18.5926 20.1428C18.7895 19.9458 18.9001 19.6788 18.9001 19.4003V2.60029C18.9001 2.32182 18.7895 2.05474 18.5926 1.85783C18.3956 1.66092 18.1286 1.55029 17.8501 1.55029ZM16.8001 18.3503H4.2001V3.65029H16.8001V18.3503Z" fill="black" fill-opacity="0.87"/>
                    </svg>
                    News
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/events" <?php if($url[1] == "events" || $url[0] == 'events') { echo 'class="active"'; }?>>
                    <svg viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.60385 12.8681L8.15704 15.3999L10.5002 14.2046L12.8433 15.3999L12.3955 12.8681L14.2918 11.0738L11.6722 10.7041L10.5002 8.3999L9.32812 10.7041L6.7085 11.0738L8.60385 12.8681Z"/>
                        <path d="M16.625 3.4165H14.875V1.6665H13.125V3.4165H7.875V1.6665H6.125V3.4165H4.375C3.40987 3.4165 2.625 4.20138 2.625 5.1665V17.4165C2.625 18.3816 3.40987 19.1665 4.375 19.1665H16.625C17.5901 19.1665 18.375 18.3816 18.375 17.4165V5.1665C18.375 4.20138 17.5901 3.4165 16.625 3.4165ZM16.6268 17.4165H4.375V6.9165H16.625L16.6268 17.4165Z"/>
                    </svg>
                    Events
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/job_portals" <?php if($url[1] == "job_portals" || $url[0] == 'job_portals') { echo 'class="active"'; }?>>
                    <svg viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5 5.1665H14.875V3.4165C14.875 2.45138 14.0901 1.6665 13.125 1.6665H7.875C6.90987 1.6665 6.125 2.45138 6.125 3.4165V5.1665H3.5C2.53487 5.1665 1.75 5.95138 1.75 6.9165V10.4165H6.125V8.6665H7.875V10.4165H13.125V8.6665H14.875V10.4165H19.25V6.9165C19.25 5.95138 18.4651 5.1665 17.5 5.1665ZM7.875 3.4165H13.125V5.1665H7.875V3.4165ZM14.875 13.0415H13.125V11.2915H7.875V13.0415H6.125V11.2915H1.75V16.5415C1.75 17.5066 2.53487 18.2915 3.5 18.2915H17.5C18.4651 18.2915 19.25 17.5066 19.25 16.5415V11.2915H14.875V13.0415Z"/>
                    </svg>
                    Jobs
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/forum" <?php if($url[1] == "forum" || $url[0] == 'forum') { echo 'class="active"'; }?>>
                    <svg viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.4444 7.22222H10.67C9.62167 7.22222 8.61111 8.35556 8.61111 9.26222V11L5.77778 13.8333V11H3.88889C2.85 11 2 10.15 2 9.11111V4.38889C2 3.35 2.85 2.5 3.88889 2.5H9.55556C10.5944 2.5 11.4444 3.35 11.4444 4.38889V7.22222ZM11.4444 8.16667H17.1111C18.15 8.16667 19 9.01667 19 10.0556V14.7778C19 15.8167 18.15 16.6667 17.1111 16.6667H15.2222V19.5L12.3889 16.6667H11.4444C10.4056 16.6667 9.55556 15.8167 9.55556 14.7778V10.0556C9.55556 9.01667 10.4056 8.16667 11.4444 8.16667Z"/>
                    </svg>
                    Forum
                </a> 
            </li>
            <li>
                
                <a href="<?php echo URLROOT;?>/pages/gallery" <?php if($url[1] == "gallery" || $url[1] == 'singleGallery') { echo 'class="active"'; }?>>
                    <svg viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.27778 19H16.7222C17.1937 19 17.6459 18.8127 17.9793 18.4793C18.3127 18.1459 18.5 17.6937 18.5 17.2222V4.77778C18.5 4.30628 18.3127 3.8541 17.9793 3.5207C17.6459 3.1873 17.1937 3 16.7222 3H4.27778C3.80628 3 3.3541 3.1873 3.0207 3.5207C2.6873 3.8541 2.5 4.30628 2.5 4.77778V17.2222C2.5 17.6937 2.6873 18.1459 3.0207 18.4793C3.3541 18.8127 3.80628 19 4.27778 19ZM6.94444 12.7778L9.04489 14.8782L12.2778 10.1111L16.7222 16.3333H4.27778L6.94444 12.7778Z"/>
                    </svg>
                    Gallery
                </a>
            </li>
            <?php endif; ?>
        </ul>
        <button type="button">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="9" y="9" width="30" height="30" rx="15" fill="white"/>
                <path d="M18.271 25.7188C17.8152 25.7188 17.378 25.5377 17.0557 25.2153C16.7333 24.893 16.5522 24.4558 16.5522 24C16.5522 23.5442 16.7333 23.107 17.0557 22.7847C17.378 22.4623 17.8152 22.2812 18.271 22.2812C18.7268 22.2812 19.164 22.4623 19.4863 22.7847C19.8087 23.107 19.9897 23.5442 19.9897 24C19.9897 24.4558 19.8087 24.893 19.4863 25.2153C19.164 25.5377 18.7268 25.7188 18.271 25.7188ZM24.0002 25.7188C23.5443 25.7188 23.1072 25.5377 22.7848 25.2153C22.4625 24.893 22.2814 24.4558 22.2814 24C22.2814 23.5442 22.4625 23.107 22.7848 22.7847C23.1072 22.4623 23.5443 22.2812 24.0002 22.2812C24.456 22.2812 24.8932 22.4623 25.2155 22.7847C25.5378 23.107 25.7189 23.5442 25.7189 24C25.7189 24.4558 25.5378 24.893 25.2155 25.2153C24.8932 25.5377 24.456 25.7188 24.0002 25.7188ZM29.7293 25.7188C29.2735 25.7188 28.8363 25.5377 28.514 25.2153C28.1917 24.893 28.0106 24.4558 28.0106 24C28.0106 23.5442 28.1917 23.107 28.514 22.7847C28.8363 22.4623 29.2735 22.2812 29.7293 22.2812C30.1852 22.2812 30.6223 22.4623 30.9447 22.7847C31.267 23.107 31.4481 23.5442 31.4481 24C31.4481 24.4558 31.267 24.893 30.9447 25.2153C30.6223 25.5377 30.1852 25.7188 29.7293 25.7188Z" fill="black" fill-opacity="0.6"/>
            </svg>
                
            <span>
            <?php echo ($_SESSION['user_type'] == "Alumni") ? $_SESSION['first_name'] : $_SESSION['name'] ?>
            </span>
        </button>
        <div class="userContainer">
            <div class="avatar">
                <?php if (empty($_SESSION['image'])) :?>
                    <img src="<?php echo URLROOT;?>/images/official-default-avatar.svg">
                <?php else: ?>
                    <img src="<?php echo URLROOT;?>/uploads/<?php echo ($_SESSION['image']) ?>">
                <?php endif; ?>
            </div>
            <a href="<?php echo URLROOT; ?>/profile/viewProfile/<?php echo $_SESSION['alumni_id'] ?>" class="profile">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4C14.21 4 16 5.79 16 8C16 10.21 14.21 12 12 12C9.79 12 8 10.21 8 8C8 5.79 9.79 4 12 4ZM12 20C12 20 20 20 20 18C20 15.6 16.1 13 12 13C7.9 13 4 15.6 4 18C4 20 12 20 12 20Z" fill="black" fill-opacity="0.87"/>
                </svg>
                Profile
            </a>
            <a href="<?php echo URLROOT; ?>/profile/changePassword/<?php echo $_SESSION['alumni_id'] ?>" class="changePass">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.43284 17.3252L3.07884 19.8002C3.05696 19.9539 3.07113 20.1105 3.12023 20.2577C3.16934 20.4049 3.25202 20.5386 3.36174 20.6483C3.47146 20.7581 3.60522 20.8407 3.75241 20.8898C3.89961 20.9389 4.05622 20.9531 4.20984 20.9312L6.68484 20.5772C7.05984 20.5242 7.99984 18.0002 7.99984 18.0002C7.99984 18.0002 8.47184 18.4052 8.66484 18.4662C9.07684 18.5962 9.47784 18.1922 9.61284 17.7822L9.99984 16.0102C9.99984 16.0102 10.5768 16.3022 10.7858 16.3452C11.0518 16.4002 11.3098 16.2362 11.4928 16.0522C11.6028 15.9427 11.6853 15.8087 11.7338 15.6612L11.9998 14.0102C11.9998 14.0102 12.6748 14.1972 12.9058 14.2242C13.1688 14.2542 13.4248 14.1202 13.6128 13.9312L14.7508 12.7942C15.7141 13.1064 16.7449 13.1467 17.7296 12.9106C18.7143 12.6745 19.6148 12.1712 20.3318 11.4562C21.3615 10.4239 21.9398 9.02532 21.9398 7.56724C21.9398 6.10916 21.3615 4.7106 20.3318 3.67824C19.2995 2.64856 17.9009 2.07031 16.4428 2.07031C14.9848 2.07031 13.5862 2.64856 12.5538 3.67824C11.8386 4.39517 11.3353 5.29563 11.0992 6.28039C10.8631 7.26515 10.9035 8.29597 11.2158 9.25924L3.71484 16.7592C3.56173 16.9122 3.46272 17.1109 3.43284 17.3252ZM18.5038 5.50624C19.0494 6.05341 19.3558 6.79457 19.3558 7.56724C19.3558 8.33992 19.0494 9.08108 18.5038 9.62825L14.3818 5.50624C14.929 4.96069 15.6702 4.65433 16.4428 4.65433C17.2155 4.65433 17.9567 4.96069 18.5038 5.50624Z" fill="black" fill-opacity="0.87"/>
                </svg>
                Change Password
            </a>
            <a href="<?php echo URLROOT; ?>/users/logout" class="logout">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.625 16.875H7.875C7.57672 16.8747 7.29075 16.7561 7.07983 16.5452C6.86892 16.3343 6.7503 16.0483 6.75 15.75V14.0625H7.875V15.75H14.625V2.25H7.875V3.9375H6.75V2.25C6.7503 1.95172 6.86892 1.66575 7.07983 1.45483C7.29075 1.24392 7.57672 1.1253 7.875 1.125H14.625C14.9233 1.1253 15.2093 1.24392 15.4202 1.45483C15.6311 1.66575 15.7497 1.95172 15.75 2.25V15.75C15.7497 16.0483 15.6311 16.3343 15.4202 16.5452C15.2093 16.7561 14.9233 16.8747 14.625 16.875Z" fill="black" fill-opacity="0.87"/>
                <path d="M6.42037 11.5796L4.40325 9.5625H12.375V8.4375H4.40325L6.42037 6.42037L5.625 5.625L2.25 9L5.625 12.375L6.42037 11.5796Z" fill="black" fill-opacity="0.87"/>
                </svg>
                Logout
            </a>
        </div>
        <a href="<?php echo URLROOT; ?>/admin/dashboard" class="dashboardLink">Admin Dashboard</a>
        <a href="<?php echo URLROOT; ?>/users/logout" class="logout">
            Logout
        </a>
    </nav>