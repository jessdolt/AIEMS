<?php 

    class Events extends Controller{
        public function __construct(){
             $this->eventModel = $this->model('event');
        }

        public function index(){
            
        }

        public function single($id){
            $event = $this->eventModel->singleEvent($id);
            $other = $this->eventModel->otherEvent($id);

            $data = [
                'events' => $event,
                'other' => $other
            ];

            $this->view('pages/singleEvents', $data);
        }


        



        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $file = $_FILES['fileUpload'];

                $data = [
                    'title' => trim($_POST['title']),
                    'description' => trim ($_POST['description']),
                    'file' => '',
                    'title_err' => '',
                    'description_err' => '',
                    'file_err' => ''
                ];
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
                    else{
                        $data['file_err'] = 'File Size too big. Maximum of 1mb only';
                    }
                }
                else{
                    $data['file_err'] = 'There was a problem in uploading the file';
                }

                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter a title';
                }

                if(empty($data['description'])){
                    $data['description_err'] = 'Please enter a description';
                }
            
                if(empty($data['title_err']) && empty($data['description_err']) && empty($data['file_err'])){
                     if($this->eventModel->addEvent($data)){
                         flash('events_add_success', 'Event successfully added', 'successAlert');
                         redirect('admin/events');
                     }
                     else{
                         die("Something went wrong");
                     }
                } 
            } 

            else{
                $data = [
                    'title' => '',
                    'description' => '',
                    'file' => '',
                    'title_err' => '',
                    'description_err' => '',
                    'file_err' => ''
                ];
            }
            
            $this->view('events/add', $data); 
        }

        public function edit($id){
            $event = $this->eventModel->singleEvent($id);
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $file = $_FILES['fileUpload'];
                $isUploaded = $_POST['isUploaded'];

                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'description' => trim ($_POST['description']),
                    'file' => $event->image,
                    'title_err' => '',
                    'description_err' => '',
                    'file_err' => ''
                ];

                $filename = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];
              
                $fileExt = explode ('.',$filename);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg','jpeg', 'png', 'pdf','jfif');

                if(in_array($fileActualExt, $allowed) && $isUploaded == 1){
                    if( $fileError === 0){
                        if($fileSize < 1000000){        
                            $fileNameNew = uniqid('',true).".".$fileActualExt;
                            $target = "uploads/". basename($fileNameNew);
                            move_uploaded_file($fileTmpName, $target);
                            $data['file'] = $fileNameNew;
                        }
                        else{
                            $data['file_err'] = 'File too big';
                        }
                    }
                    else{
                        $data['file_err'] = 'File Size too big. Maximum of 1mb only';
                    }
                }
                elseif($isUploaded == 1){
                    $data['file_err'] = 'There was a problem in uploading the file';
                }

                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter a title';
                }

                if(empty($data['description'])){
                    $data['description_err'] = 'Please enter a description';
                }
            
                if(empty($data['title_err']) && empty($data['description_err']) && empty($data['file_err'])){
                    if($this->eventModel->editEvent($data,$isUploaded)){
                        flash('events_edit_success', 'Event successfully edited', 'successAlert');
                        redirect('admin/events');
                    }
                    else{
                        die("Something went wrong");
                    }
                } else{
                    $this->view('events/edit', $data);
                } 
            } 

            else{
                $data = [
                    'id' => $id,
                    'title' => $event->title,
                    'description' => $event->description,
                    'file' => $event->image,
                    'created_at' => $event->created_at,
                    'title_err' => '',
                    'description_err' => '',
                    'file_err' => ''
                ];
            }
            
            $this->view('events/edit', $data); 
        }
        

        public function delete() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $todelete = $_POST['checkbox'];

                foreach ($todelete as $id) {
    
                    if ($this->eventModel->deleteEvent($id)){
                        flash('events_delete_success', 'Event successfully deleted', 'successAlert');
                        redirect('admin/events');
                    }
                    else {
                        die("There's an error deleting this record");
                    }
                }
            }
        }

        public function deleteRow($id){
            if($this->eventModel->deleteEvent($id)){
                flash('events_delete_success', 'Event successfully deleted', 'successAlert');
                redirect('admin/events');
            }
            else{
                die("There's an error deleting this record");
            }
        }   

        public function search(){
            extract($_POST);
            $events = $this->eventModel->searchEvents($searchChar);
            echo json_encode($events);
        }
        
    
    }