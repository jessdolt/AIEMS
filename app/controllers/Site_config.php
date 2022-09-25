<?php 



Class Site_config extends Controller {

    public function __construct(){

    

    }
    
    public function isSetUp() {
        $siteConfigModel = $this->model('siteconfig');
        $siteConfig = $this->siteConfigModel->showSiteConfig();

        if (!$siteConfig) {
        
            return false;
        }

        return true;
    }
    
    public function findSiteConfig() {
        $siteConfigModel = $this->model('siteconfig');
        $siteConfig = $siteConfigModel->showSiteConfig();

        if ($siteConfig) {
            $response = ['message' => 'Successfully Fetched', 'data' => $siteConfig];
        
            echo json_encode($response);
        } else {
            return false;
        }


    }

    // public function getSiteConfig() {
    //     $siteConfigModel = $this->model('siteconfig');
    //     $siteConfig = $siteConfigModel->singleSiteConfig();

    //     $response = ['message' => 'Successfully Fetched', 'data' => $siteConfig];
        
    //     echo json_encode($response);
    // }

    public function saveSiteConfig(){
        $siteConfigModel = $this->model('siteconfig');

        $file = $_FILES['logo'];
        $filename = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode ('.',$filename);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg', 'png', 'pdf','jfif');

        if(in_array($fileActualExt, $allowed)){
            if( $fileError === 0){
                if($fileSize < 1000000){        
                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                    $target = "uploads/". basename($fileNameNew);
                    move_uploaded_file($fileTmpName, $target);
                    $data['file'] = $fileNameNew;
                }
            }
        }

        $data = [
            'logo' => $fileNameNew,
            'schoolname' => $_POST['schoolname'],
        ];

        $json = json_decode(json_encode($data));
        $isSaved = $siteConfigModel->addSiteConfig($json);

        if($isSaved){
            $response = ['message' => 'Site Information Successfully Saved', 'isSuccess' => 1];

        }
        else{
            $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];

        }

        echo json_encode($response);
        
    }

    public function editSiteConfig($id){
      
        $siteConfigModel = $this->model('siteconfig');

        // SCHOOL LOGO
   
        if (isset($_POST['heroimage'])){
            $fileNameHeroImg = $_POST['heroimage'];
        }
        if (isset($_POST['logo'])){
            $fileNameLogoImg = $_POST['logo'];
        }

        if (isset($_FILES['logo'])) {
            $file = $_FILES['logo'];
            $filename = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];
    
            $fileExt = explode ('.',$filename);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg','jpeg', 'png', 'pdf','jfif');
    
            if(in_array($fileActualExt, $allowed)){
                if( $fileError === 0){
                    if($fileSize < 1000000){        
                        $fileNameLogoImg = uniqid('',true).".".$fileActualExt;
                        $target = "uploads/". basename($fileNameLogoImg);
                        move_uploaded_file($fileTmpName, $target);
                        $data['logo'] = $fileNameLogoImg;
                    }
                }
            }
        }
        

        // HERO IMAGE
        if (isset($_FILES['heroimage'])) {
        $file = $_FILES['heroimage'];
        $filename = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode ('.',$filename);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg', 'png', 'pdf','jfif');

        if(in_array($fileActualExt, $allowed)){
            if( $fileError === 0){
                if($fileSize < 1000000){        
                    $fileNameHeroImg = uniqid('',true).".".$fileActualExt;
                    $target = "uploads/". basename($fileNameHeroImg);
                    move_uploaded_file($fileTmpName, $target);
                    $data['heroimage'] = $fileNameHeroImg;
                }
            }
        }
        }



        $data = [
            'schoolname' => $_POST['schoolname'],
            'logo' => $fileNameLogoImg,
            'heroimage'=> $fileNameHeroImg,
            'sitecolor' => $_POST['sitecolor'],
            'sitecolor_dark' => $_POST['sitecolor_dark'],
            'sitecolor_light' => $_POST['sitecolor_light'],
            'sitecolor_secondary' => $_POST['sitecolor_secondary'],
        ];

        $json = json_decode(json_encode($data));

        // print_r($json);
        $isUpdated = $siteConfigModel->updateSiteConfig($json, $id);

        if($isUpdated){
            $_SESSION['schoolname'] = $data['schoolname'];
            $_SESSION['logo'] = $data['logo'];
            $_SESSION['heroimage'] = $data['heroimage'];
            $_SESSION['sitecolor'] = $data['sitecolor'];
            $_SESSION['sitecolor_dark'] = $data['sitecolor_dark'];
            $_SESSION['sitecolor_light'] = $data['sitecolor_light'];
            $_SESSION['sitecolor_secondary'] = $data['sitecolor_secondary'];

            $response = ['message' => 'Site Settings has been updated', 'isSuccess' => 1];
            echo json_encode($response);
        }
        else{
            $bad_request = ['message' => 'Something went wrong. Try again', 'isSuccess' => 0];
            echo json_encode($bad_request);
        }
        
    }

    public function addAdmin() {
        $isSetUp = $this->isSetUp();
        // SETTING UP SITE IF NO RESULT
        // REDIRECT TO SETTING UP SITE
        
        if (!$isSetUp) {
            redirect('pages/systemPrompt');
            return;
        }

        $siteConfigModel = $this->model('siteconfig');
        $json  =  json_decode(file_get_contents('php://input'));
        
        // $hashPassword = password_hash($json->password, PASSWORD_DEFAULT);

        // get user_id in users table for admin table
        // $isAdded = $siteConfigModel->addAdmin($json, $hashPassword);
        $isAdded = $siteConfigModel->addAdmin($json);
        
        if(!empty($isAdded)) {
            
            $added = $siteConfigModel->registerAdmin($json, $isAdded);
            $response = ['message' => 'Admin has been successfully added', 'isSuccess' => 1];
            echo json_encode($response);

            // if ($added) {
            //     redirect('users/login');
            // }
            
        }
        else{
            $bad_request = ['message' => 'Something went wrong', 'isSuccess' => 0];
            echo json_encode($bad_request);
            //error
        }

  
    }


    // public function testSingleEvent($id) {
    //     $eventModel = $this->model('event');
    //     $event = $eventModel->singleEvent($id);

    //     // print_r($event);
    
    //     $response = ['message' => 'Successfully Fetched', 'data' => $event];
        
    //     echo json_encode($response);
    //     // if($event){
    //     //     Response::ok('successfully fetched');
    //     // }
    //     // else{
    //     //     Response::badRequest('something went wrong');
    //     // }
    // }

    // public function editTest($id){
    //     $eventModel = $this->model('event');
    //     $json  =  json_decode(file_get_contents('php://input'));


    //     $isUpdated = $eventModel->editEvent($json, $id);

     
    //     if($isUpdated){
    //         $response = ['message' => 'Successfully Fetched', 'isSuccess' => 1];
    //         echo json_encode($response);
    //     }
    //     else{
    //         $bad_request = ['message' => 'Something went wrong', 'isSuccess' => 0];
    //         echo json_encode($bad_request);
    //         //error
    //     }
        
    // }

  

    // public function deleteTest($id){
    //     $eventModel = $this->model('event');


    //     $isDeleted = $eventModel->deleteEvent2($id);

     
    //     if($isDeleted){
    //         $response = ['message' => 'Successfully Deleted', 'isSuccess' => 1];
    //         echo json_encode($response);
    //     }
    //     else{
    //         $bad_request = ['message' => 'Something went wrong', 'isSuccess' => 0];
    //         echo json_encode($bad_request);
    //         //error
    //     }
        
    // }
}