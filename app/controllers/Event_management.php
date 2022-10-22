<?php 
    Class Event_management extends Controller {

        public function __construct() {
            
        }

        public function add(){
            $data = [];
            $this->view('event_management/add');
        }

        public function addEvent() {
            $eventManagementModel = $this->model('eventmanagement');
            // $json = json_decode(file_get_contents('php://input'));

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
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'image' => $fileNameNew,
                'participants' => $_POST['participants'],
                'posted_by' => $_SESSION['id']
            ];

            $json = json_decode(json_encode($data));

            $isEventSaved = $eventManagementModel->addEvent($json);    

            if($isEventSaved){

                $response = ['message' => 'Event is Successfully submitted', 'isSuccess' => 1];

            } else {
                $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];

            }

            echo json_encode($response);
            
        }
        

    }

?>