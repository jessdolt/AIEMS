<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname'];?></title>
    <link rel="shortcut icon" href="<?php echo URLROOT;?>/uploads/<?php echo empty($_SESSION['logo']) ? "" : $_SESSION['logo'];?>" type="image/x-icon">
    
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .loginMain form button{
            background-color: <?= $_SESSION['sitecolor_light'] ?>;
        }

        .loginMain p a, 
        .loginMain p span,
        .loginMain a span{
            color: <?= $_SESSION['sitecolor_light'] ?>;
        }

        .swal-modal .swal-text {
            text-align: center;
        }
    </style>
</head>