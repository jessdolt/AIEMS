<?php 

    class Admin_manage extends Controller {
        
       
        public function __construct() {
            $this->adminModel = $this->model('Admin_model');
            $this->userModel = $this->model('user');

            if (!isLoggedIn()) {
                redirect('users/login');
            }

            if (!isAdmin()) {
                redirect('pages/home');
            }
            
        }

        public function index(){

        }

        public function manage() {
            $data = [];
            $this->view('admin/manage', $data);
        }

        public function editProfile($id) {
            $admin = $this->adminModel->single($id);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    
                $file = $_FILES['fileUpload'];
                $isUploaded = $_POST['isUploaded'];

                $data = [
                    'user_id' => $id,
                    'file' => $admin->image,
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'birth_date' => trim($_POST['birth_date']),
                    'contact_no' => trim($_POST['contact_no']),
                    'name_err' => '',
                    'email_err' => '',
                    'birth_date_err' => '',
                    'contact_no_err' => '',
                    'file_err' => ''
                ];
    
                $filename = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];
              
                $fileExt = explode ('.',$filename);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg', 'jpeg', 'png');
    
                if(in_array($fileActualExt, $allowed) && $isUploaded == 1){
                    if( $fileError === 0){
                        if($fileSize < 2000000){        
                            $fileNameNew = uniqid('',true).".".$fileActualExt;
                            $target = "uploads/". basename($fileNameNew);
                            move_uploaded_file($fileTmpName, $target);
                            $data['file'] = $fileNameNew;
                        } else{
                            $data['file_error'] = 'File too big';
                        }
                    } else{
                        $data['file_error'] = 'File Size too big. Maximum of 1mb only';
                    }
                } elseif($isUploaded == 1){
                    $data['file_error'] = 'There was a problem in uploading the file';
                }
    
                if(empty($data['file_error'])) {

                    if($this->adminModel->editProfile($data, $isUploaded)) {
                        $_SESSION['image'] = $data['file'];
                        $_SESSION['name'] = $data['name'];
                        redirect('admin_manage/manage');
                    } else {
                        die("Something went wrong");
                    }

                }

            } else {

                $data = [
                    'user_id' => $id,
                    'file' => $admin->image,
                    'name' => $admin->name,
                    'email' => $admin->email,
                    'birth_date' => $admin->birth_date,
                    'contact_no' => $admin->contact_no,
                    'name_err' => '',
                    'email_err' => '',
                    'birth_date_err' => '',
                    'contact_no_err' => '',
                    'file_err' => ''
                ];
    
            }
    
            $this->view('admin/profileEdit', $data);
        }

        public function changePassword() {

            $data = [
                'email' => '',
                'oldPassword' => '',
                'password' => '',
                'confirmPassword' => '',
                'oldPassword_error' => '',
                'password_error' => '',
                'confirmPassword_error' => ''
            ];
    
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data = [
                    'email' => $_SESSION['email'],
                    'oldPassword' => trim($_POST['oldPassword']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'oldPassword_error' => '',
                    'password_error' => '',
                    'confirmPassword_error' => ''
                ];
    
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
    
                if(empty($data['oldPassword'])) {
                    $data['oldPassword_error'] = 'Please enter your old password.';
                }
    
                // Validate password on length, numeric values,
                if(empty($data['password'])){
                    $data['password_error'] = 'Please enter password.';
                } elseif(strlen($data['password']) < 7){
                    $data['password_error'] = 'Password must be at least 8 characters';
                } elseif (preg_match($passwordValidation, $data['password'])) {
                    $data['password_error'] = 'Must have at least one numeric value.';
                }
    
                //Validate confirm password
                if (empty($data['confirmPassword'])) {
                    $data['confirmPassword_error'] = 'Please enter password.';
                } else {
                    if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPassword_error'] = 'Passwords do not match.';
                    }
                }
    
                if(empty($data['oldPassword_error']) && empty($data['password_error']) && empty($data['confirmPassword_error'])) {
                    if ($this->userModel->checkOldPassword($data)) {
                        
                        // Hash password
                        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
                        $this->userModel->newPassword($data);
                        redirect('admin_manage/manage');

                        
                    } else {
                        $data['oldPassword_error'] = 'Your old password does not match';
                    }
                }
    
            }
    
            $this->view('admin/changePassword', $data);
            
        }

        public function adminAccounts() {
            $data = $this->adminModel->showAdmin($_SESSION['id']);
            $this->view('admin/adminAccounts', $data);
        }

        public function ccAccounts() {
            $data = $this->adminModel->showCc();
            $this->view('admin/ccAccounts', $data);
        }

        public function addAdmin() {
           
            if(isset($_SESSION['noBack'])) {
                unset($_SESSION['noBack']); 
                redirect('admin_manage/manage');
            }

            $data = [
                'user_type' => '',
                'name' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirmPassword_err' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'user_type' => $_POST['user_type'],
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirmPassword_err' => ''
                ];

                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

                if (empty($data['name'])) {
                    $data['name_err'] = 'Please enter a name';
                }

                //Validate email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email address.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = 'Please enter the correct format.';
                } else {
                    //Check if email exists.
                    if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken.';
                    }
                }

                // Validate password on length, numeric values,
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password.';
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 8 characters';
                } elseif (preg_match($passwordValidation, $data['password'])) {
                    $data['password_err'] = 'Password must be have at least one numeric value.';
                }

                //Validate confirm password
                if (empty($data['confirmPassword'])) {
                    $data['confirmPassword_err'] = 'Please enter password.';
                } else {
                    if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPassword_err'] = 'Passwords do not match, please try again.';
                    }
                }


                // Make sure that errors are empty
                if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirmPassword_err'])) {
                    $userType = $this->adminModel->getUserTypeIdAdmin($data['user_type']);
                    
                    $data['user_type'] = $userType->id;

                    // Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //Register user from model function
                    $user_id = $this->adminModel->addAdmin($data);
                    if(!empty($user_id)) {
                        $newData = [
                            'user_id' => $user_id,
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'user_type' => $data['user_type']
                        ];
                        if($this->adminModel->registerAdmin($newData)) {
                        //Redirect to the login page
                        $_SESSION['noBack'] = rand();
                        redirect('admin_manage/adminAccounts');
                        } else {
                            die('Something went wrong.');
                        }
                    }

                }

            } else {
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirmPassword' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirmPassword_err' => ''
                ];
            }

            $this->view('admin/addNewAdmin', $data);
        }

        public function addCc() {

            if(isset($_SESSION['noBack'])) {
                unset($_SESSION['noBack']);
                redirect('admin_manage/manage');
            }

            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirmPassword_err' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirmPassword_err' => ''
                ];

                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

                if (empty($data['name'])) {
                    $data['name_err'] = 'Please enter a name';
                }

                //Validate email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email address.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = 'Please enter the correct format.';
                } else {
                    //Check if email exists.
                    if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken.';
                    }
                }

                // Validate password on length, numeric values,
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password.';
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 8 characters';
                } elseif (preg_match($passwordValidation, $data['password'])) {
                    $data['password_err'] = 'Password must be have at least one numeric value.';
                }

                //Validate confirm password
                if (empty($data['confirmPassword'])) {
                    $data['confirmPassword_err'] = 'Please enter password.';
                } else {
                    if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPassword_err'] = 'Passwords do not match, please try again.';
                    }
                }

                // Make sure that errors are empty
                if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirmPassword_err'])) {
                    $userType = $this->adminModel->getUserTypeIdCc();
                    // Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    $data['user_type'] = $userType->id;

                    //Register user from model function
                    $user_id = $this->adminModel->addAdmin($data);
                    
                    if(!empty($user_id)) {
                        $newData = [
                            'user_id' => $user_id,
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'user_type' => $userType->id
                        ];
                        if($this->adminModel->registerAdmin($newData)) {
                        //Redirect to the login page
                        $_SESSION['noBack'] = rand();
                        redirect('admin_manage/ccAccounts');
                        } else {
                            die('Something went wrong.');
                        }
                    }

                }

            } else {
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirmPassword' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirmPassword_err' => ''
                ];
            }

            $this->view('admin/addNewCc', $data);
        }

        public function deleteRowAdmin($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => $_SESSION['email'],
                    'password' => trim($_POST['password']),
                    'password_error' => ''
                ];

                if(empty($data['password'])){
                    $data['password_error'] = 'Please enter password.';
                }

                if(empty($data['password_error'])) {
                    if ($this->adminModel->checkPassword($data)) {
                        if($this->adminModel->deleteAdmin($id)){
                            redirect('admin_manage/adminAccounts');
                        }
                        else {
                            die("There's an error deleting this record");
                        }
                    } else {
                        $data = [
                            'password_error' => 'Your password is wrong.'
                        ];
                        $this->view('admin/adminAccounts', $data);
                    }
                }

            } else {
                $data = [
                    'password' => '',
                    'password_error' => ''
                ];
            }

        }

        public function deleteRowCc($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => $_SESSION['email'],
                    'password' => trim($_POST['password']),
                    'password_error' => ''
                ];

                if(empty($data['password'])){
                    $data['password_error'] = 'Please enter password.';
                }

                if(empty($data['password_error'])) {
                    if ($this->adminModel->checkPassword($data)) {
                        if($this->adminModel->deleteAdmin($id)){
                            redirect('admin_manage/ccAccounts');
                        }
                        else {
                            die("There's an error deleting this record");
                        }
                    } else {
                        $data = [
                            'password_error' => 'Your password is wrong.'
                        ];
                        $this->view('admin/ccAccounts', $data);
                    }
                }

            } else {
                $data = [
                    'password' => '',
                    'password_error' => ''
                ];
            }

        }
        

    
}   