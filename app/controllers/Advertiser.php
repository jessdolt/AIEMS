<?php 

class Advertiser extends Controller {
   
   public function __construct(){


    }

   public function index(){
      $advertiserModel = $this->model('advertiser_model');

      $data = $advertiserModel->indexRewards();
      if (empty($data)) {
         $data =[];
      } 
      
      $this->view('external_user/home', $data);
   }

   public function accountSettings(){
      $data =[];

      $this->view('external_user/accountSettings', $data);
   }

     
   public function changePassword(){
      $data =[];

      $this->view('external_user/changePass', $data);
   }

   public function create(){
      $data =[];

      $this->view('external_user/create', $data);
   }


   public function signup(){
      $data =[];

      $this->view('external_user/signup', $data);
   }
   
   public function logOut(){
        // $data =[];
 
        // $this->view('external_user/logOut', $data);
   }

   public function addAdmin() {
      $advertiserModel = $this->model('advertiser_model');
    
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

      // $hashPassword = password_hash($_POST['password], PASSWORD_DEFAULT);

      $data = [
         'logo' => $fileNameNew,
         'name' => $_POST['name'],
         'mobileNumber' => $_POST['mobileNumber'],
         'address' => $_POST['address'],
         'email' => $_POST['email'],
         'password' => $_POST['password'],
         'user_type' => 6
      ];

      $json = json_decode(json_encode($data));
      $isAdded = $advertiserModel->addAdvertiser($json);

      if(!empty($isAdded)){

         $isSaved = $advertiserModel->registerAdvertiser($isAdded, $json);

         if($isSaved) {
            $response = ['message' => 'Your Company is Successfully Registered.', 'isSuccess' => 1];
         } else {
            $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];
        }
         
      } else {
          $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];
      }

      echo json_encode($response);
      
  }
  



}
?>