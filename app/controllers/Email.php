<?php 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email extends Controller{  
    public function __construct(){
        $this->emailModel = $this->model('email_model');
        $this->userModel = $this->model('user');
    }

    public function sendConfirmation(){
        
    }

    //Email specific alumni
    public function sendCredentials($id){
        $alumniUser = $this->emailModel->singleAlumni($id);
        $alumni = $this->emailModel->getAlumniById($id);
        $referenceNo = rand(10000,99999);

        $mail = new PHPMailer();
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
       
        $mail->Username = 'itechpup1@gmail.com';
        $mail->Password = 'PUPtest123';
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';

        $mail->isHTML();
       
        $mail->setFrom('itechpup1@gmail.com', 'PUP ITECH Administrator');

        $mail->addAddress($alumni->email);
        $mail->Subject = 'Login Credentials for PUPIAIS (Reference No. '.$referenceNo.')';

        $website = URLROOT;
       

        $msg = '
                <p>Your Username is <strong>'.$alumni->email.'</strong></p>
                <p>Your Password is <strong>'.$alumniUser->password.'</strong></p>
                <p>You can access our website at <strong>'. $website.'</strong></p>
                ';
                
        $mail->Body = $msg;

        $mail->Priority = 1;
        $mail->addCustomHeader("X-MSMail-Priority: High");
        $mail->addCustomHeader("Importance: High");
       
        if($mail->Send()){
            if($this->emailModel->updateSend($alumni->alumni_id)){
                redirect('admin/alumni');
            }
        }
        else{
            echo $mail->ErrorInfo;
        }
    }

    public function sendToAll(){
        //$alumni = $this->emailModel->getAlumniById($id);
        $alumniUser = $this->emailModel->showAlumniNotSent();
            foreach($alumniUser as $user){
                $alumni = $this->emailModel->getAlumniById($user->a_id); 
                $referenceNo = rand(10000,99999);

                $mail = new PHPMailer();
                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Host = 'smtp.gmail.com';
            
                $mail->Username = 'itechpup1@gmail.com';
                $mail->Password = 'PUPtest123';
                $mail->SMTPSecure = 'tls';
                $mail->Port = '587';

                $mail->isHTML();
            
                $mail->setFrom('itechpup1@gmail.com', 'PUP ITECH Administrator');
                 
                $mail->addAddress($alumni->email);
                $mail->Subject = 'Login Credentials for PUPIAIS (Reference No. '.$referenceNo.')';

                $website = URLROOT;
            
                $msg = '
                        <p>Your Username is <strong>'.$alumni->email.'</strong></p>
                        <p>Your Password is <strong>'.$user->password.'</strong></p>
                        <p>You can access our website at <strong>'. $website.'</strong></p>
                        ';
                        
                $mail->Body = $msg;

                $mail->Priority = 1;
                $mail->addCustomHeader("X-MSMail-Priority: High");
                $mail->addCustomHeader("Importance: High");
            
                if($mail->Send()){
                    $sent[] = $this->emailModel->updateSend($alumni->alumni_id);
                }
                else{
                    echo $mail->ErrorInfo;
                }
            }

            if($sent){
                echo "1";
            }
    }

    public function forgotPassword() {

        unset($_SESSION['email']);

        $data = [
            'code' => '',
            'codeError' => '',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'emailError' => '',
                'codeError' => ''
            ];

            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter your email.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {

                    //SEND EMAIL CODE
                    if ($this->emailModel->findUserByEmail($data['email'])) {

                        $referenceNo = rand(10000,99999);
                        $expires = date("U") + 300;
                        $token = bin2hex(rand(111111, 999999));
                        $code = rand(111111, 999999);

                        $mail = new PHPMailer();
                        $mail->SMTPDebug = 2;
                        $mail->isSMTP();
                        $mail->SMTPAuth = true;
                        $mail->Host = 'smtp.gmail.com';
                    
                        $mail->Username = 'itechpup1@gmail.com';
                        $mail->Password = 'PUPtest123';
                        $mail->SMTPSecure = 'tls';
                        $mail->Port = '587';

                        $mail->isHTML();
                    
                        $mail->setFrom('itechpup1@gmail.com', 'PUP ITECH Administrator');

                        $mail->addAddress($data['email']);
                        $mail->Subject = 'Password Reset for PUPIAIS (Reference No. '.$referenceNo.')';
                        $to = $data['email'];

                        $subject = "Password Reset Code";
                        
                        $msg = '
                        <p>If you requested a password reset for, <strong>'.$to.'</strong> use the confirmation code below to complete the process.</p>
                        <p>If you didn\'t make this request, ignore this email.</p>
                        <p>Your password reset code is <strong>'.$code.'</strong></p>
                        <p>This code will expire in 5 minutes.<p>
                        ';
        
                        $mail->Body = $msg;

                        $mail->Priority = 1;
                        $mail->addCustomHeader("X-MSMail-Priority: High");
                        $mail->addCustomHeader("Importance: High");
                    
                        $data = [
                            'token' => $token,
                            'code' => $code,
                            'expires' => $expires,
                            'email' => $data['email']
                        ];

                        $this->emailModel->findEmailDuplicate($data['email']);
                        $this->emailModel->forgot($data);

                        if($mail->Send()) {
                            $_SESSION['token'] = $token;
                            $_SESSION['email'] = $data['email'];
                            redirect('email/emailVerification');
                        }
                        else{
                            echo $mail->ErrorInfo;
                        }

                    } else {
                        $data['emailError'] = 'Email does not exist';
                    }
            }


        } else {
            $data = [
                'email' => '',
                'code' => '',
                'emailError' => '',
            ];
        }


        $this->view('users/forgotPassword', $data);
    }

    public function resend() {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->emailModel->findUserByEmail($_SESSION['email'])) {

               $referenceNo = rand(10000,99999);
                        $expires = date("U") + 300;
                        $token = bin2hex(rand(111111, 999999));
                        $code = rand(111111, 999999);

                        $mail = new PHPMailer();
                        $mail->SMTPDebug = 2;
                        $mail->isSMTP();
                        $mail->SMTPAuth = true;
                        $mail->Host = 'smtp.gmail.com';
                    
                        $mail->Username = 'itechpup1@gmail.com';
                        $mail->Password = 'PUPtest123';
                        $mail->SMTPSecure = 'tls';
                        $mail->Port = '587';

                        $mail->isHTML();
                    
                        $mail->setFrom('itechpup1@gmail.com', 'PUP ITECH Administrator');

                        $mail->addAddress($_SESSION['email']);
                        $mail->Subject = 'Password Reset for PUPIAIS (Reference No. '.$referenceNo.')';
                        $to = $_SESSION['email'];

                        $subject = "Password Reset Code";
                        
                        $msg = '
                        <p>If you requested a password reset for, <strong>'.$to.'</strong> use the confirmation code below to complete the process. If you didn\'t make this request, ignore this email.</p>
                        <p>Your password reset code is <strong>'.$code.'</strong></p>
                        <p>This code will expire in 5 minutes.<p>
                        ';
        
                        $mail->Body = $msg;

                        $mail->Priority = 1;
                        $mail->addCustomHeader("X-MSMail-Priority: High");
                        $mail->addCustomHeader("Importance: High");
                    
                        $data = [
                            'token' => $token,
                            'code' => $code,
                            'expires' => $expires,
                            'email' => $_SESSION['email']
                        ];

                        $this->emailModel->findEmailDuplicate($data['email']);
                        $this->emailModel->forgot($data);

                        if($mail->Send()){
                            $_SESSION['token'] = $token;
                            redirect('email/emailVerification');
                        }
                        else{
                            echo $mail->ErrorInfo;
                        }

            } else {
                $data['emailError'] = 'Email does not exist';
            }
        }
    }

    public function emailVerification() {
        if(!isset($_SESSION['token']) && empty($_SESSION['token'])) {
            redirect('email/forgotPassword');
        }

        if(!isset($_SESSION['email']) && empty($_SESSION['email'])) {
            redirect('email/forgotPassword');
        }

        $data = [
            'code' => '',
            'token' => '',
            'codeError' => ''
        ];
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'code' => $_POST['code'],
                'token' => $_SESSION['token'],
                'codeError' => ''
            ];

            if(empty($data['code'])) {
                $data['codeError'] = 'Please enter your code.';
            }

            if(empty($data['codeError'])) {

                if ($this->emailModel->findCode($data)) {
                    redirect('email/forgotNewPassword');

                } else {
                    $data['codeError'] = 'Your code is invalid or expired';
                }
                
            }

        } else {
            $data = [
                'email' => '',
                'code' => '',
                'codeError' => ''
            ];
        }
        $this->view('users/emailVerification', $data);
    }

    public function forgotNewPassword() {

        unset($_SESSION['token']);

        if(!isset($_SESSION['email']) && empty($_SESSION['email'])) {
            redirect('email/forgotPassword');
        }

        $data = [
            'password' => '',
            'confirmPassword' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => $_SESSION['email'],
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            // Validate password on length, numeric values,
            if(empty($data['password'])){
                $data['passwordError'] = 'Please enter password.';
              } elseif(strlen($data['password']) < 6){
                $data['passwordError'] = 'Password must be at least 8 characters';
              } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'Password must be have at least one numeric value.';
              }
  
              //Validate confirm password
               if (empty($data['confirmPassword'])) {
                  $data['confirmPasswordError'] = 'Please enter password.';
              } else {
                  if ($data['password'] != $data['confirmPassword']) {
                  $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                  }
              }

              // Make sure that errors are empty
            if (empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->newPassword($data)) {
                    $this->emailModel->deleteRequest($data['email']);
                    //Redirect to the login page
                    session_destroy();
                    redirect('users/login');
                } else {
                    die('Something went wrong.');
                } 
            }

        } else {
            $data = [
                'password' => '',
                'confirmPassword' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];
        }

        $this->view('users/forgotNewPassword', $data);
    }
}

    