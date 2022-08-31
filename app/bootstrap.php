<?php 
    //Load Config
    require_once 'config/config.php';

    require_once 'helpers/array_print.php';
    require_once 'helpers/url_helper.php';

  
    require_once 'helpers/session_helper.php';
    require_once 'helpers/time_helper.php';

 
    require_once 'helpers/PHPMailer.php';
    require_once 'helpers/SMTP.php';
    require_once 'helpers/Exception.php';


    //Load Libraries
     require_once 'libraries/Core.php';
     require_once 'libraries/Controller.php';
     require_once 'libraries/Database.php';

    // Autoload Core Libraries
    // spl_autoload_register(function($className){
    //     require_once 'libraries/'.$className.'.php';
    // });