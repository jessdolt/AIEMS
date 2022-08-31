<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="<?php echo URLROOT;?>/images/logo-32px.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css">
    <script src="<?php echo URLROOT;?>/js/index.js" defer></script>
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
            <a href="<?php echo URLROOT?>/pages/home" class="logo"></a>
            <h1>PUP Institute of Technology</h1>
            <span class="userType">Admin Page</span>
            <a href="<?php echo URLROOT?>/admin/dashboard">Back to Admin Home</a>
        </header>
        <div class="main">