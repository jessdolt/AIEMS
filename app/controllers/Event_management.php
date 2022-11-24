<?php 
    Class Event_management extends Controller {

        public function __construct() {
            
        }

        public function add(){
            $data = [];
            $this->view('event_management/add');
        }

        public function viewAllEvents() {
            $eventManagementModel = $this->model('eventmanagement');
            $getEvent = $eventManagementModel->getAllEvents();
            echo json_encode($getEvent);
        }

        public function viewAllEventsAvailable() {
            $eventManagementModel = $this->model('eventmanagement');
            $getEvent = $eventManagementModel->getAllEventsAvailable();
            echo json_encode($getEvent);
        }

        public function addEvent() {
            $eventManagementModel = $this->model('eventmanagement');
            // $json = json_decode(file_get_contents('php://input'));

            $file = $_FILES['eventImage'];
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
            $date = explode(',', $_POST['date']);
            $data = [
                'type' => $_POST['type'],
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'start' => date('Y-m-d H:i:s', strtotime($date[0])),
                'end' => date('Y-m-d H:i:s', strtotime($date[1])),
                'location' => $_POST['location'],
                'image' => $fileNameNew,
                // 'participants' => $_POST['participants'],
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

        public function addParticipant() {
            $eventManagementModel = $this->model('eventmanagement');
            // $json = json_decode(file_get_contents('php://input'));

    

            $data = [
                'event_id' => $_POST['event_id'],
                'user_id' => $_POST['user_id'],
            ];
            
            $json = json_decode(json_encode($data));

            $isAdded = $eventManagementModel->participateEvent($json);    

            if($isAdded){

                $response = ['message' => 'You have successfully participated', 'isSuccess' => 1];

            } else {
                $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];

            }

            echo json_encode($response);
            
        }

        public function isParticipated(){
            $eventManagementModel = $this->model('eventmanagement');
            // $json = json_decode(file_get_contents('php://input'));


            $data = [
                'event_id' => $_POST['event_id'],
                'user_id' => $_POST['user_id'],
            ];
            
            $json = json_decode(json_encode($data));

            $isParticipated = $eventManagementModel->isParticipated($json);    

            if(!empty($isParticipated)){
                $response = ['isParticipated' => 1, 'isSuccess' => 1];
            } else {
                $response = ['isParticipated' => 0, 'isSuccess' => 0];
            }

            echo json_encode($response);
        }

        public function approveRow($id){
            $eventManagementModel = $this->model('eventmanagement');
            $isEventUpdated = $eventManagementModel->approveEvent($id);
      
            if($isEventUpdated){
                  $response = ['message' => 'Event is successfully approved', 'isSuccess' => 1];
            } else {
                  $response = ['message' => 'Something went wrong. Please try to reload the page', 'isSuccess' => 0];
            }
      
            echo json_encode($response);
         }

        // FOR DELETING INLINE //
        public function deleteRow($id) {
            $eventManagementModel = $this->model('eventmanagement');
            $isEventDeleted = $eventManagementModel->deleteEvent($id);

            if ($isEventDeleted){
                flash('event_delete_success', 'Event successfully deleted', 'successAlert');
                redirect('admin/event_management');
            }
            else {
                die("There's an error deleting this record");
            }
        }


        // FOR DELETING CHECKBOX
        public function delete() {
             $eventManagementModel = $this->model('eventmanagement');

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $todelete = $_POST['checkbox'];
                foreach ($todelete as $id) {
                    if ($eventManagementModel->deletePromo($id)){
                        flash('promo_delete_success', 'Event successfully deleted', 'successAlert');
                        redirect('admin/event_management');
                    }
                    else {
                        die("There's an error deleting this record");
                    }
                }
            }
        }

        public function sendEventNotification($id){
            $eventManagementModel = $this->model('eventmanagement');
            $data = $eventManagementModel->singleEvent($id);

            $mail = new PHPMailer(true);
            
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->SMTPDebug = 0;
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'universitymailtest@gmail.com';                     //SMTP username
                $mail->Password   = 'buiesfznxbpjznhp';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('universitymailtest@gmail.com', 'AIEMS Administrator');
                $mail->addAddress($_SESSION['email'], $_SESSION['name']);     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');
            
                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'AIEMS Event';
                $mail->Body    = 'Your reference code is <b>'.$data->code.'</b>'
                                . '<img src="cid:voucherImage" 
                                style="display: block;
                                width: 50%;">';
                $path = URLROOT.'/public/uploads/'.$getPromo->image;
                $name = $getPromo->image;
                $path2 = $_SERVER['DOCUMENT_ROOT'].'/aiems/public/uploads/'.$name;


                // $mail->AddEmbeddedImage($path, 'voucherImage', 'Voucher Image');
                $mail->AddEmbeddedImage("$path2", "voucherImage", "$name");
                $mail->Priority = 1;
                $mail->addCustomHeader("X-MSMail-Priority: High");
                $mail->addCustomHeader("Importance: High");

                // print_r($path2);
                if($mail->Send()){
                    $response = ['message' => 'Email has been sent successfully.', 'isSuccess' => 1];
                } else {
                    $response = ['message' => $mail->ErrorInfo, 'isSuccess' => 0];
                }
                echo json_encode($response);
        }
        

    }

?>