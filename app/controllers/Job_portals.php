<?php 

    class Job_portals extends Controller{
        public function __construct(){
            $this->jobModel = $this->model('job_portal');
        }

        public function index(){

        }

        public function add(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
               
                $data = [
                    'company_logo' => '',
                    'work_status' => trim($_POST['work_status']),
                    'job_status' => trim($_POST['job_status']),
                    'avail_pos' => trim($_POST['avail_pos']),
                    'company_name' => trim($_POST['company_name']),
                    'job_title' => trim($_POST['job_title']),
                    'job_description' => $_POST['job_description'],
                    'others' => $_POST['others'],
                    'avail_pos_err' => '',
                    'company_name_err' => '',
                    'job_title_err' => '',   
                    'company_logo_err'=> ''
                ];

                if($_FILES['fileUpload']['error'] == 0){
                    $file = $_FILES['fileUpload'];

                    $filename = $file['name'];
                    $fileTmpName = $file['tmp_name'];
                    $fileSize = $file['size'];
                    $fileError = $file['error'];
                    $fileType = $file['type'];
    
                  
                  
                    $fileExt = explode ('.',$filename);
                    $fileActualExt = strtolower(end($fileExt));
                    $allowed = array('jpg','jpeg', 'png', 'pdf');
    
                    if(in_array($fileActualExt, $allowed)){
                        if( $fileError === 0){
                            if($fileSize < 1000000){        
                                $fileNameNew = uniqid('',true).".".$fileActualExt;
                                $target = "company_logo/". basename($fileNameNew);
                                move_uploaded_file($fileTmpName, $target);
                                $data['company_logo'] = $fileNameNew;
                            }
                        }
                        else{
                            $data['company_logo_err'] = 'File Size too big. Maximum of 1mb only';
                        }
                    }
                    else{
                        $data['company_logo_err'] = 'There was a problem in uploading the file';
                    }
                }

                if(empty($data['avail_pos'])){
                    $data['avail_pos_err'] = 'Enter the available position';
                }
                if(empty($data['company_name'])){
                    $data['company_name_err'] = 'Enter the company name';
                }
                if(empty($data['job_title'])){
                    $data['job_title_err'] = 'Enter job title';
                }
               
                
                if(empty($data['avail_pos_err']) && empty($data['company_name_err']) && empty($data['job_title_err']) && empty($data['company_logo_err'])){
                     if($this->jobModel->addJob($data)){
                         flash('job_portal_add_success', 'Job successfully addeed');
                         redirect('admin/job_portal');
                     }
                     else{
                          die("something went wrong");
                     }
                }
                else{
                    $this->view('job_portal/add',$data);
                }
            }else{
                $data = [
                    'company_logo' => '',
                    'work_status' => '',
                    'job_status' => '',
                    'avail_pos' => '',
                    'company_name' => '',
                    'job_title' => '',
                    'job_description' => '',
                    'others' => '',
                    'company_logo_err' => '',
                    'avail_pos_err' => '',
                    'company_name_err' => '',
                    'job_title_err' => '',  
                ];

            }

           $this->view('job_portal/add', $data);
        }

        public function edit($id){
            $job = $this->jobModel->getJobById($id);
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                
                $data = [
                    'id' => $id,
                    'company_logo' => $job->company_logo,
                    'work_status' => trim($_POST['work_status']),
                    'job_status' => trim($_POST['job_status']),
                    'avail_pos' => $_POST['avail_pos'],
                    'company_name' => trim($_POST['company_name']),
                    'job_title' => trim($_POST['job_title']),
                    'job_description' => $_POST['job_description'],
                    'others' => $_POST['others'],
                    'avail_pos_err' => '',
                    'company_name_err' => '',
                    'job_title_err' => '',   
                    'posted_on' => $job->posted_on,
                    'company_logo_err'=> '',
                    'isUploaded' => trim($_POST['isUploaded'])
                ];

                if($_FILES['fileUpload']['error'] == 0){
                    $file = $_FILES['fileUpload'];

                    $filename = $file['name'];
                    $fileTmpName = $file['tmp_name'];
                    $fileSize = $file['size'];
                    $fileError = $file['error'];
                    $fileType = $file['type'];
        
                    $fileExt = explode ('.',$filename);
                    $fileActualExt = strtolower(end($fileExt));
                    $allowed = array('jpg','jpeg', 'png', 'pdf');
    
                    if(in_array($fileActualExt, $allowed)){
                        if( $fileError === 0){
                            if($fileSize < 1000000){        
                                $fileNameNew = uniqid('',true).".".$fileActualExt;
                                $target = "company_logo/". basename($fileNameNew);
                                move_uploaded_file($fileTmpName, $target);
                                $data['company_logo'] = $fileNameNew;
                            }
                        }
                        else{
                            $data['company_logo_err'] = 'File Size too big. Maximum of 1mb only';
                        }
                    }
                    else{
                        $data['company_logo_err'] = 'There was a problem in uploading the file';
                    }
                }

                if(empty($data['avail_pos'])){
                    $data['avail_pos_err'] = 'Enter the available position';
                }
                if(empty($data['company_name'])){
                    $data['company_name_err'] = 'Enter the company name';
                }
                if(empty($data['job_title'])){
                    $data['job_title_err'] = 'Enter job title';
                }
               
                
                if(empty($data['avail_pos_err']) && empty($data['company_name_err']) && empty($data['job_title_err']) && empty($data['company_logo_err'])){
                     if($this->jobModel->editJob($data)){
                           flash('job_portal_edit_success', 'Job successfully edited');
                           redirect('admin/job_portal');
                      }
                      else{
                          die("something went wrong");
                     }
                }
                else{
                    $this->view('job_portal/edit',$data);
                }
            }
            else{
                $data = [
                    'id' => $id,
                    'company_logo' => $job->company_logo,
                    'work_status' => $job->work_status,
                    'job_status' => $job->job_status,
                    'avail_pos' => $job->avail_pos,
                    'company_name' => $job->company_name,
                    'job_title' => $job->job_title,
                    'job_description' => $job->description,
                    'others' => $job->others,
                    'posted_on' => $job->posted_on,
                    'company_logo_err' => '',
                    'avail_pos_err' => '',
                    'company_name_err' => '',
                    'job_title_err' => '',  
                ];
            }
            $this->view('job_portal/edit', $data);
        }

        public function single($id){
            $job = $this->jobModel->getJobById($id);
            $user_type = 'Admin';

            $data = [
                'job' => $job,
                'user_type' => $user_type
            ];

            $this->view('pages/singleJobs', $data);
        }


        public function delete() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $todelete = $_POST['checkbox'];

                foreach ($todelete as $id) {
    
                    if ($this->jobModel->deleteJob($id)){
                        flash('job_portal_delete_success', 'Job successfully deleted');
                        redirect('admin/job_portal');
                    }
                    else {
                        die("There's an error deleting this record");
                    }
                }
            }
        }
        

        public function deleteRow($id){
            if($this->jobModel->deleteJob($id)){
                flash('job_portal_delete_success', 'Job successfully deleted');
                redirect('admin/job_portal');
            }
            else{
                die("There's an error deleting this record");
            }
        }   
        
        
    }
