<?php 



Class Site_config extends Controller {

    public function __construct(){
       

    }

    // public function findSiteConfig() {
    //     $siteConfigModel = $this->model('siteconfig');
    //     $siteConfig = $siteConfigModel->showSiteConfig();

    //     if ($siteConfig) {
    //         $response = ['message' => 'Successfully Fetched', 'data' => $siteConfig];
        
    //         echo json_encode($response);
    //     } else {
    //         return false;
    //     }


    // }

    public function getSiteConfig($id) {
        $siteConfigModel = $this->model('siteconfig');
        $siteConfig = $siteConfigModel->singleSiteConfig($id);

        $response = ['message' => 'Successfully Fetched', 'data' => $siteConfig];
        
        echo json_encode($response);
    }

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

        $response = ['message' => 'Successfully Fetched', 'isSaved' => 1];
        
        echo (json_encode($response));
    }

    public function editSiteConfig($id){
      
        $siteConfigModel = $this->model('siteconfig');
   
        // $data = [
        //     'schoolname' => $_POST['schoolname'],
        //     'logo' => $fileNameLogoImg,
        //     'heroimg'=> $fileNameHeroImg,
        //     'sitecolor' => $_POST['sitecolor'],
        //     'sitecolor_dark' => $_POST['sitecolor_dark'],
        //     'sitecolor_light' => $_POST['sitecolor_light'],
        //     'sitecolor_secondary' => $_POST['sitecolor_secondary'],
        // ];

        // $json = json_decode(json_encode($data));

        $isUpdated = $siteConfigModel->updateSiteConfig($json, $id);

        if($isUpdated){
            $response = ['message' => 'Successfully Fetched', 'isSuccess' => 1];
            echo json_encode($response);
        }
        else{
            $bad_request = ['message' => 'Something went wrong', 'isSuccess' => 0];
            echo json_encode($bad_request);
        }
        
    }


    public function testSingleEvent($id) {
        $eventModel = $this->model('event');
        $event = $eventModel->singleEvent($id);

        // print_r($event);
    
        $response = ['message' => 'Successfully Fetched', 'data' => $event];
        
        echo json_encode($response);
        // if($event){
        //     Response::ok('successfully fetched');
        // }
        // else{
        //     Response::badRequest('something went wrong');
        // }
    }

    public function editTest($id){
        $eventModel = $this->model('event');
        $json  =  json_decode(file_get_contents('php://input'));


        $isUpdated = $eventModel->editEvent($json, $id);

     
        if($isUpdated){
            $response = ['message' => 'Successfully Fetched', 'isSuccess' => 1];
            echo json_encode($response);
        }
        else{
            $bad_request = ['message' => 'Something went wrong', 'isSuccess' => 0];
            echo json_encode($bad_request);
            //error
        }
        
    }

  

    public function deleteTest($id){
        $eventModel = $this->model('event');


        $isDeleted = $eventModel->deleteEvent2($id);

     
        if($isDeleted){
            $response = ['message' => 'Successfully Deleted', 'isSuccess' => 1];
            echo json_encode($response);
        }
        else{
            $bad_request = ['message' => 'Something went wrong', 'isSuccess' => 0];
            echo json_encode($bad_request);
            //error
        }
        
    }
}