<?php
    session_start();

    function flash($name = '', $message='', $class='successAlert'){
        if(!empty($name)){
            if(!empty($message) && empty ($_SESSION[$name])){
                if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
                }
                

                if(!empty($_SESSION[$name . '_class'])){
                    unset($_SESSION[$name . '_class']);
                }

                $_SESSION[$name] = $message;
                $_SESSION[$name. '_class'] = $class;
            } elseif(empty($message) && !empty($_SESSION[$name])){
                $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
                //echo '<div class="'.$class.'" id="msg-flash">'. $_SESSION[$name].'</div>';
                $title = '';
                if($class == 'successAlert'){
                    $title = 'Success!';
                }
                elseif($class == 'warningAlert'){
                    $title = 'Warning!';
                }
                else{
                    $title = 'Error!';
                }

                if($class=='successAlert'){
                    echo '<div class="notifModalContainer show" >
                            <div class="successAlert show '.$class.'" >
                                <svg class="success-icon" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g >
                                        <g class="group-icon">
                                            <path d="M16 1.99997C13.2311 1.99997 10.5243 2.82106 8.22202 4.3594C5.91973 5.89774 4.12532 8.08424 3.06569 10.6424C2.00607 13.2006 1.72882 16.0155 2.26901 18.7312C2.80921 21.447 4.14258 23.9415 6.10051 25.8995C8.05845 27.8574 10.553 29.1908 13.2687 29.731C15.9845 30.2712 18.7994 29.9939 21.3576 28.9343C23.9157 27.8747 26.1022 26.0802 27.6406 23.778C29.1789 21.4757 30 18.7689 30 16C30 12.2869 28.525 8.72598 25.8995 6.10047C23.274 3.47497 19.713 1.99997 16 1.99997V1.99997ZM16 28C13.6266 28 11.3066 27.2962 9.33316 25.9776C7.35977 24.659 5.8217 22.7849 4.91345 20.5922C4.0052 18.3995 3.76756 15.9867 4.23058 13.6589C4.69361 11.3311 5.83649 9.19292 7.51472 7.51469C9.19295 5.83646 11.3312 4.69357 13.6589 4.23055C15.9867 3.76752 18.3995 4.00516 20.5922 4.91342C22.7849 5.82167 24.6591 7.35974 25.9776 9.33313C27.2962 11.3065 28 13.6266 28 16C28 19.1826 26.7357 22.2348 24.4853 24.4853C22.2348 26.7357 19.1826 28 16 28Z"/>
                                        </g>
                                        <g class="check-icon">
                                            <path d="M13.7671 19.113L9.17884 14.5248L7.76465 15.939L13.7671 21.9415L24.2359 11.4728L22.8216 10.0586L13.7671 19.113Z"/>
                                        </g>
                                    </g>
                                </svg>
                                <div class="notif-message-con">
                                    <h2>'.$title.'</h2>
                                    <p>'.$_SESSION[$name].'</p>
                                </div>
                            </div>
                        </div>
                     ';
                }
                else{
                    echo '<div class="notifModalContainer show" id="alert-modal-global">
                            <div class="alertModal notify '.$class.' show" id="alert-modal-inside">
                                <svg></svg>
                                <h2>'.$title.'</h2>
                                <p>'.$_SESSION[$name].'</p>
                                <div>
                                    <button type="button" id="alert-ok-btn">Ok</button>
                                </div>
                            </div>
                          </div>
                        ';
                    
                }


                unset($_SESSION[$name]);
                unset($_SESSION[$name. '_class']);
            }
        }
    }

    function isLoggedIn() {
        if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

    function userType() {
        if ($_SESSION['user_type'] == "Super Admin") {
            return 'Super Admin';
        } elseif ($_SESSION['user_type'] == "Admin") {
            return 'Admin';
        } elseif ($_SESSION['user_type'] == "Alumni") {
            return 'Alumni';
        } elseif ($_SESSION['user_type'] == "Content Creator") {
            return 'Content Creator';
        }
    }

    function isAdmin() {
        if ($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Super Admin" || $_SESSION['user_type'] == "Content Creator") {
            return true;
        } else {
            return false;
        }
    }

    function getProfileID() {
        $url= rtrim($_GET['url'],'/');
        $url= explode('/', $url);
        return $url[2];
    }

    