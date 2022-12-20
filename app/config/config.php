<?php 

    //LOCAL DB (PHPMYADMIN)

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '12345');
    define('DB_NAME', 'aiems');

    define('AC_HIGHEST', 12);
    define('AC_LOWEST', 4);
    define('AC_AVERAGE', 8);


    //App Root
    define('APPROOT',dirname(dirname(__FILE__)));
    define('IMAGEROOT', dirname(dirname(dirname(__FILE__))). '\public\uploads\\');
    define('CLOGOROOT', dirname(dirname(dirname(__FILE__))). '\public\company_logo\\');
    
    //Url Root
    define('URLROOT', 'http://localhost/aiems'); 

    // http://localhost/pupiais
    
    //Site Name
    define('SITENAME', 'AIEMS');

    // DateTime Default
    date_default_timezone_set('Asia/Manila');

    // Hostinger
    // define('URLROOT', 'http://aiems.online'); 
    // define('DB_HOST', 'localhost');
    // define('DB_USER', 'u693528914_aiems');
    // define('DB_PASS', 'Pup@1928');
    // define('DB_NAME', 'u693528914_aiems');