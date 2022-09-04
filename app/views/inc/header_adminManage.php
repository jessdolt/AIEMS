<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
</head>
<?php   
    $url= rtrim($_GET['url'],'/');
    $url= explode('/', $url);
?>
<body id="Admin">
    <div class="fullscreen">
        <header class="adminHeader">
            <div class="hamburgerAdmin">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a href="<?php echo URLROOT?>/pages/home" class="logo"    style="background-image: url(<?php echo URLROOT.'/uploads/'.$_SESSION['logo']?>); background-color: transparent !important"  ></a>
            <h1>PUP Institute of Technology</h1>
            <span class="userType">Admin Page</span>
            <a href="<?php echo URLROOT?>/admin/dashboard">Back to Admin Home</a>
        </header>
        <div class="main">