<?php 
    Class Promos_advertisement extends Controller {

        public function __construct(){

    

        }

        public function savePromosAdvertisement(){
            $promosAdvertismentModel = $this->model('promosadvertisement');
    
            $file = $_FILES['image'];
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
                'title' => $_POST['title'],
                'date_of_advertisement' => $_POST['date_of_advertisement'],
                'image' => $fileNameNew,
                'quantity' => $_POST['quantity'],
                'user_type' => $_POST['user_type'],
                'posted_by' => $_POST['posted_by']
            ];
    
            $json = json_decode(json_encode($data));
            $isSaved = $promosAdvertismentModel->addPromosAdvertisement($json);
    
            if($isSaved){
                $response = ['message' => 'Promos/Advertisement is Successfully submitted', 'isSuccess' => 1];
    
            }
            else{
                $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];
    
            }
    
            echo json_encode($response);
            
        }
    }
?>