<?php 
    Class Promos_advertisement extends Controller {

        public function __construct(){

    

        }
        
        public function addPromos() {

            $data = [

            ];
            $this->view('promos/add_promo', $data);
        }

        public function addPromosAdvertisement(){
            
            $promosAdvertismentModel = $this->model('promosadvertisement');
    
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

            $data = [
                'type' => $_POST['type'],
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'date' => $_POST['date'],
                'quantity' => $_POST['quantity'],
                'voucherImage' => $fileNameNew,
                'duration' => $_POST['duration'],
                'payment' => $_POST['payment'],
                'gCashRefNumber' => $_POST['gCashRefNumber'],
                'user_type' => $_SESSION['user_type'],
                'posted_by' => $_SESSION['alumni_id']
            ];

            $jsonPromo = json_decode(json_encode($data));
            $lastPromoId = $promosAdvertismentModel->addPromosAdvertisement($jsonPromo);

            $arrayReference = explode(",",$_POST['referenceCode']);

            foreach($arrayReference as $reference) {

                $newData = [
                    'referenceCode' =>  $reference
                ];
                
                $jsonReference = json_decode(json_encode($newData));
                $isReferenceSaved = $promosAdvertismentModel->addReferenceCode($lastPromoId, $jsonReference);
            }
            

            if($isReferenceSaved){

                $response = ['message' => 'Promos/Advertisement is Successfully submitted', 'isSuccess' => 1];

            }
            else{
                $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];

            }

            echo json_encode($response);
            
        }
    }
?>