<?php 
    Class Promos_advertisement extends Controller {

        public function __construct(){

    

        }

        public function approveRow($promoid){
            $promosAdvertismentModel = $this->model('promosadvertisement');
            $isPromosUpdated = $promosAdvertismentModel->approvePromo($promoid);
  
            if($isPromosUpdated){
                $response = ['message' => 'Promo is successfully approve', 'isSuccess' => 1];
            }
            else{
                $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];
            }

            echo json_encode($response);
        }

        public function actionViewPromo(){
            $promosAdvertismentModel = $this->model('promosadvertisement');

            // $json = json_decode(json_encode($data));
            $json = json_decode(file_get_contents('php://input'));
            $isPromosUpdated = $promosAdvertismentModel->promoApproveReject($json);
  
            if($isPromosUpdated){
                $response = ['message' => 'Updated Successfully', 'isSuccess' => 1];
            }
            else{
                $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];
            }

            echo json_encode($response);
        }

        public function redeemReward($promoid){
            $promosAdvertismentModel = $this->model('promosadvertisement');
        
            $hasReferenceCode = $promosAdvertismentModel->checkHasReferenceCode($promoid);

            if(!empty($hasReferenceCode)){
                $redeemableReward = $hasReferenceCode[0];

                // UPDATE reference_code SET used_qty = (used_qty + 1) where promoid
                $isReferenceUpdated = $promosAdvertismentModel->updateReferenceCode($redeemableReward->id, $_SESSION['id']);

                if($isReferenceUpdated){
                    // UPDATE promo_advertisement SET used_qty = (used_qty + 1) where promoid
                     $isPromosUpdated = $promosAdvertismentModel->updatePromosAdvertisement($redeemableReward->promoid);
                }

                if($isPromosUpdated) {
                    // $alumniCoins = $promosAdvertismentModel->getAlumniCoin($_SESSION['alumni_id']);
                    $amountSubtracted = $redeemableReward->ac_amount;
                    // this is alumniCoins - ac_amount in table
                    $updatedAlumniCoin = $_SESSION['alumniCoins'] - intval($amountSubtracted);
                    $isACUpdated = $promosAdvertismentModel->updateAlumniCoins($updatedAlumniCoin, $_SESSION['alumni_id']);
                }

                if($isACUpdated){
                    $_SESSION['alumniCoins'] = $updatedAlumniCoin;
                    $response = ['message' => 'Promo is Successfully redeemed', 'isSuccess' => 1];
    
                }
                else{
                    $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];
    
                }
    
                echo json_encode($response);
            }
        }

        // FOR DELETING INLINE //
        public function deleteRow($id) {
            $promosAdvertismentModel = $this->model('promosadvertisement');
            $isPromoDeleted = $promosAdvertismentModel->deletePromo($id);

            if ($isPromoDeleted){
                flash('promo_delete_success', 'Promo successfully deleted', 'successAlert');
                redirect('admin/promos_advertisement');
            }
            else {
                die("There's an error deleting this record");
            }
        }


        // FOR DELETING CHECKBOX
        public function delete() {
            $promosAdvertismentModel = $this->model('promosadvertisement');

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $todelete = $_POST['checkbox'];
                foreach ($todelete as $id) {
                    if ($promosAdvertismentModel->deletePromo($id)){
                        flash('promo_delete_success', 'Promo successfully deleted', 'successAlert');
                        redirect('admin/promos_advertisement');
                    }
                    else {
                        die("There's an error deleting this record");
                    }
                }
            }
        }

        public function viewPromo($id) {
            $promosAdvertismentModel = $this->model('promosadvertisement');
            $data = $promosAdvertismentModel->singlePromo($id);

            $this->view('promos/view_promo', $data);
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
                'posted_by' => $_SESSION['id']
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