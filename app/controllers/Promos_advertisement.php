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
                'referenceCode' => $_POST['referenceCode'],
            ];

            $arrayReference = explode(",",$data['referenceCode']);

            foreach($arrayReference as $reference) {
                $newData = [
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
                    'posted_by' => $_SESSION['name'],
                    'referenceCode' => $reference,
                ];
                $json = json_decode(json_encode($newData));
                $lastPromoId = $promosAdvertismentModel->addPromosAdvertisement($json);

                $isReferenceSaved = $promosAdvertismentModel->addReferenceCode($json, $lastPromoId);

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