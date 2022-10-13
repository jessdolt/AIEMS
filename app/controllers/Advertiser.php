<?php 

class Advertiser extends Controller {
   
   public function __construct(){


    }

   public function index(){
      $advertiserModel = $this->model('advertiser_model');
         $data = $advertiserModel->indexRewards($_SESSION['id']);
      if (empty($data)) {
         $data =[];
      }
      
      $this->view('external_user/home', $data);
   }

   public function accountSettings(){
      $advertiserModel = $this->model('advertiser_model');
      $data = $advertiserModel->singleAdvertiserProfile($_SESSION['id']);

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
   
   public function logout() {
      session_destroy();
      redirect('users/login');
  }

   public function addAdvertiser() {
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

   public function addPromosAdvertisement(){
      $advertiserModel = $this->model('advertiser_model');

      $file = $_FILES['voucherImage'];
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

      switch ($_POST['duration']) {
         case "1 Day":
            $duration = 1;
            break;
         case "2 Days":
            $duration = 2;
            break;
         case "3 Days":
            $duration = 3;
            break;
         case "5 Days":
            $duration = 5;
            break;
         case "1 Week":
            $duration = 7;
            break;
         case "2 Weeks":
            $duration = 14;
            break;
         case "1 Month":
            $duration = 30;
            break;
      }

      $data = [
            'type' => $_POST['type'],
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'date' => $_POST['date'],
            'quantity' => $_POST['quantity'],
            'voucherImage' => $fileNameNew,
            'duration' => $duration,
            'payment' => $_POST['payment'],
            'gCashRefNumber' => $_POST['gCashRefNumber'],
            'user_type' => $_SESSION['user_type'],
            'posted_by' => $_SESSION['id']
      ];

      $jsonPromo = json_decode(json_encode($data));
      $lastPromoId = $advertiserModel->addPromosAdvertisement($jsonPromo);

      $arrayReference = explode(",",$_POST['referenceCode']);

      foreach($arrayReference as $reference) {

            $newData = [
               'referenceCode' =>  $reference
            ];
            
            $jsonReference = json_decode(json_encode($newData));
            $isReferenceSaved = $advertiserModel->addReferenceCode($lastPromoId, $jsonReference);
      }
      

      if($isReferenceSaved){

            $response = ['message' => 'Promos/Advertisement is Successfully submitted', 'isSuccess' => 1];

      }
      else{
            $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];

      }

      echo json_encode($response);
            
   }

   public function editProfile($id){
      
      $advertiserModel = $this->model('advertiser_model');

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

     $data = [
         'name' => $_POST['name'],
         'logo' => $fileNameLogoImg,
         'mobileNumber'=> $_POST['mobileNumber'],
         'address' => $_POST['address'],
         'email' => $_POST['email'],
      ];

      $json = json_decode(json_encode($data));

      $isSaved = $advertiserModel->editProfileAdvertiser($json, $id);
      
      if($isSaved){
         $isSavedUser = $advertiserModel->editProfileUser($json, $id);

          if($isSavedUser) {
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['image'] = $data['logo'];

            $response = ['message' => 'Account Settings has been updated', 'isSuccess' => 1];

            echo json_encode($response);
          }

      } else {
          $bad_request = ['message' => 'Something went wrong. Try again', 'isSuccess' => 0];
          echo json_encode($bad_request);
      }
      
  }

   public function updatePassword($id) {
      $advertiserModel = $this->model('advertiser_model');
      $json = json_decode(file_get_contents('php://input'));

      $isConfirmed = $advertiserModel->checkOldPassword($json);

      if ($isConfirmed) {
         
         $hashPassword = password_hash($json->newPassword, PASSWORD_DEFAULT);

         $isSaved = $advertiserModel->newPassword($id, $hashPassword);
         if($isSaved) {
            $response = ['message' => 'Password has been updated', 'isSuccess' => 1];
            echo json_encode($response);
         } else {
            $bad_request = ['message' => 'Something went wrong. Try again', 'isSuccess' => 0];
            echo json_encode($bad_request);
         }
      
         } else {
          $bad_request = ['message' => 'Something went wrong. Try again', 'isSuccess' => 0];
          echo json_encode($bad_request);
      }
   }

      public function approveRow($id){
         $advertiserModel = $this->model('advertiser_model');
         $isAdvertiserUpdated = $advertiserModel->approveAdvertiser($id);

         if($isAdvertiserUpdated){
             flash('advertiser_approve_success', 'Advertiser is successfully approved', 'successAlert');
             $response = ['message' => 'Advertiser is successfully approved', 'isSuccess' => 1];
         } else {
             $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];
         }

         echo json_encode($response);
     }

         // FOR DELETING INLINE //
         public function deleteRow($id) {
         $advertiserModel = $this->model('advertiser_model');
         $isAdvertiserDeleted = $advertiserModel->deleteAdvertiser($id);

         if ($isAdvertiserDeleted){
               flash('advertiser_delete_success', 'Advertiser successfully deleted', 'successAlert');
               redirect('admin/advertiser');
         }
         else {
               die("There's an error deleting this record");
         }
      }

      // FOR DELETING CHECKBOX
      public function delete() {
         $advertiserModel = $this->model('advertiser_model');

         if($_SERVER['REQUEST_METHOD'] == 'POST'){
               $todelete = $_POST['checkbox'];
               foreach ($todelete as $id) {
                  if ($advertiserModel->deleteAdvertiser($id)){
                     flash('advertiser_delete_success', 'Advertiser successfully deleted', 'successAlert');
                     redirect('admin/promos_advertisement');
                  }
                  else {
                     die("There's an error deleting this record");
                  }
               }
         }
      }




}
?>