<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('user');
        }

        public function index(){
            $data = [];
            $this->view('users/index', $data);
        }

        public function signup(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                
                $data = [
                    'student_no' => trim($_POST['student_no']),
                    'last_name' => trim($_POST['lastName']),
                    'birth_date' => trim($_POST['birthDate']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'lastName_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];  

                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

                if(empty($data['last_name'])){
                    $data['lastName_err'] = 'Please your full name.';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter your email';
                } 

                if($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already in use';
                }

                // Validate password on length, numeric values,
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password.';
                } elseif(strlen($data['password']) < 7){
                    $data['password_err'] = 'Password must be at least 8 characters';
                } elseif (preg_match($passwordValidation, $data['password'])) {
                    $data['password_err'] = 'Password must be have at least one numeric value.';
                }

                 //Validate confirm password
                 if (empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please enter password.';
                } else {
                    if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match.';
                    }
                }

                //array_print($data);
                if(empty($data['email_err']) && empty($data['lastName_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);  
            
                    $alumniInfo = $this->userModel->validation($data);
                    if(!empty($alumniInfo)){
                        sleep(3);
                        
                        if($this->sendConfirmation($data['email'])){
                            $userType = $this->userModel->getUserTypeIdAlumni();
                            $newData = [
                                'a_id' => $alumniInfo->alumni_id,
                                'name' => $alumniInfo->first_name . ' ' . $alumniInfo->last_name,
                                'email'=> $data['email'],
                                'password' => $data['password'],
                                'user_type' => $userType->id
                            ];

                            //array_print($newData);
                            if($this->userModel->registerAlumni($newData)){
                                redirect('users/verified/'. $data['email']);
                            }
                        }
                       
                    }
                    else{
                        redirect('users/signup_failed');
                    }

                } 
                else{
                    $this->view('users/signup',$data);
                }

            }

            else{
                $data = [
                    'student_no' => '',
                    'last_name' => '',
                    'birth_date' => '',
                    'email' =>'',
                    'password' => '',
                    'confirm_password' => '',
                    'lastName_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];
            }

            $this->view('users/signup', $data);
        }

        public function verified($email){
            $data = [
                'email' => $email
            ];
            $this->view('users/alumni_verify', $data);
        }

        public function signup_failed(){
            $data = [];
            $this->view('users/alumni_failed', $data);
        }

        function sendConfirmation($email){
            $referenceNo = rand(10000,99999);
    
            $mail = new PHPMailer();
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = 'smtp.gmail.com';
            
            $mail->Username = 'itechpup1@gmail.com';
            $mail->Password = 'PUPtest123';
            $mail->SMTPSecure = 'tls';
            $mail->Port = '587';
    
            $mail->isHTML();
            
            $mail->setFrom('itechpup1@gmail.com', 'PUP ITECH Administrator');
    
            $mail->addAddress($email);
            $mail->Subject = 'PUPIAIS Account Validated';
    
            $website = URLROOT;
            
            $msg = '
                    <p> You are now officially registed to PUPIAIS </p>
                    <p> You can now access to our website:<strong>'. $website.'</strong></p>
                    ';
                    
            $mail->Body = $msg;
    
            $mail->Priority = 1;
            $mail->addCustomHeader("X-MSMail-Priority: High");
            $mail->addCustomHeader("Importance: High");
            
            if($mail->Send()){
                return true;
            }
            else{
                echo $mail->ErrorInfo;
            }
        }



        public function login() {
            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => ''
            ];
    
            //Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'emailError' => '',
                    'passwordError' => '',
                ];
              
                
                //Validate email
                if (empty($data['email'])) {
                    $data['emailError'] = 'Please enter an email.';
                }
    
                //Validate password
                if (empty($data['password'])) {
                    $data['passwordError'] = 'Please enter a password.';
                } 
                
    
                //Check if all errors are empty
                if (empty($data['emailError']) && empty($data['passwordError'])) {
                    $date = date('Y-m-j');
                    $checker = $this->userModel->checkLoginDate($date);
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                    if($checker->login_date == $date){
                        if ($loggedInUser) {
                            $this->createUserSession($loggedInUser);
                            if(userType() == 'Alumni'){
                                $this->userModel->loginCount($date);
                            }
                        }
                        else {
                            $data['passwordError'] = 'Password or email is incorrect.';
                        }
                }
                else {
                    $this->userModel->addLoginDate($date);
                    if ($loggedInUser) {
                        $this->createUserSession($loggedInUser);
                        if(userType() == 'Alumni'){
                        $this->userModel->loginCount($date);
                        }
                    }
                    else {
                        $data['passwordError'] = 'Password or email is incorrect.';
                    }
                }
                    
                }
    
            } else {
                $data = [
                    'email' => '',
                    'password' => '',
                    'emailError' => '',
                    'passwordError' => ''
                ];
            }
            
            $this->view('users/login', $data);
        }

        public function createUserSession($user) {
            $check = $this->userModel->userJoinUserType($user);
            
            if($check->user_control == "Alumni") {
                $newUser = $this->userModel->forSession($user);
                $_SESSION['id'] = $newUser->user_id;
                $_SESSION['email'] = $newUser->email;
                $_SESSION['name'] = $newUser->name;
                $_SESSION['first_name'] = $newUser->first_name;
                $_SESSION['student_no'] = $newUser->student_no;
                $_SESSION['alumni_id'] = $newUser->a_id;
                $_SESSION['user_type'] = $newUser->user_control;
                $_SESSION['image'] = $newUser->image;
                $_SESSION['first_name'] = $newUser->first_name;
            } else {
                $newUser = $this->userModel->forSessionAdmin($user);
                $_SESSION['id'] = $newUser->user_id;
                $_SESSION['admin_id'] = $newUser->admin_id;
                $_SESSION['email'] = $newUser->email;
                $_SESSION['name'] = $newUser->name;
                $_SESSION['user_type'] = $newUser->user_control;
                $_SESSION['image'] = $newUser->image;
            }

            if ($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Super Admin") {
                redirect('admin/dashboard');
            }
            elseif($_SESSION['user_type'] == "Content Creator") {
                redirect('admin/news');
            } 
            else {
                redirect('pages'); 
            }
        }

        public function logout() {
            unset($_SESSION['id']);
            unset($_SESSION['admin_id']);
            unset($_SESSION['email']);
            unset($_SESSION['name']);
            unset($_SESSION['alumni_id']);
            unset($_SESSION['student_no']);
            unset($_SESSION['user_type']);
            unset($_SESSION['image']);
            session_destroy();
            
            redirect('users/login');

        }

        public function edit($id){
            $user_types = $this->userModel->getUserTypes();
            $user = $this->userModel->singleUser($id);

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                
                $data = [
                    'fName' => trim($_POST['fName']),
                    'email' => trim ($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'user_type' => $_POST['user_type'],
                    'fName_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'user_type_err' => ''
                ];  

                if(empty($data['fName'])){
                    $data['fName_err'] = 'Please your full name.';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter your email';
                }
                else{

                }


                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                } elseif (strlen($data['password']) < 3){
                    $data['password_err'] = 'Password must be at least 3 characters';
                }

                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please enter confirm password';
                }
                else{
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                if(empty($data['email_err']) && empty($data['fName_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['user_type_err'])){
                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);  
            
                     if($this->userModel->edit($data)){
                        redirect('users/index');
                     }
                     else{
                         die('Something went wrong!');
                     }
                } 

                else{
                    $data['user_type'] = $user_types;
                    $this->view('users/edit',$data);
                }

            }

            else{
                $data = [
                    'fName' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'confirm_password' => $user->password,
                    'user_type' => $user_types,
                    'fName_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'user_type_err' => ''
                ];
            }

            $this->view('users/edit',$data);
        }


        public function delete($id){
            if($this->userModel->deleteUser($id)){
                redirect('users');
            }
            else{
                die("There's an error deleting this record");
            }
        }

    }