<?php 

    class Group extends Controller{
        //add department
        public function __construct(){
            $this->groupModel = $this->model('group_model');
        }

        public function index(){
            
        }

        public function new_dept(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                    'dept_name' => $_POST['department_name'],
                ];
                $this->groupModel->addDepartment($data);
            }
        }
    

        public function new_course(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                    'course_name' => $_POST['course_name'],
                    'course_code' => $_POST['course_code'],
                    'department_id' => $_POST['department_id']
                ];
                $this->groupModel->addCourse($data);
            }

        }


        //add batch
        public function new_batch(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                    'batch' => $_POST['batch'],
                    
                ];
                $this->groupModel->addBatch($data);
            }
        }

        public function edit_dept_modal(){
            extract($_POST);
            $dept = $this->groupModel->getDepartmentByID($id);
            $data = [
                'dept' => $dept
            ];
            $this->view('group/edit_dept', $data);
        }

        public function edit_dept(){
            $data= [
                'dept_id' => $_POST['department_id'],
                'dept_name' => $_POST['department_name']
            ];
            if($this->groupModel->updateDepartment($data)){
                flash('department_edit_success', 'Department successfully edited');
                redirect('admin/alumni');
            }   
            else{
                die('something went wrong');
            }
        }

        public function edit_course_modal(){
            extract($_POST);
            $course = $this->groupModel->getCourseById($id);
            $dept = $this->groupModel->getDepartment();
            $data = [
                'course' => $course,
                'dept' => $dept
            ];

            //array_print($data);
            $this->view('group/edit_course', $data);
        }

        public function edit_course(){
            $data= [
                'course_id' => $_POST['course_id'],
                'course_name' => $_POST['course_name'],
                'course_code' => $_POST['course_code'],
                'department_id' => $_POST['department_id']
            ];

            if($this->groupModel->updateCourse($data)){
                flash('course_edit_success', 'Course successfully edited');
                redirect('admin/alumni');
            }   
            else{
                die('something went wrong');
            }
        }

        public function edit_batch_modal(){
            extract($_POST);
            $batch = $this->groupModel->getBatchById($id);
            $data = [
                'batch' => $batch
            ];
            $this->view('group/edit_batch', $data);
        }

        public function edit_batch(){
            $data= [
                'batch_id' => $_POST['batch_id'],
                'year' => $_POST['year']
            ];
            if($this->groupModel->updateBatch($data)){
                flash('batch_edit_success', 'Batch successfully edited');
                redirect('admin/alumni');
            }   
            else{
                die('something went wrong');
            }
        }
        

        //delete functions 
        public function deleteDept($dept_id){
            if($this->groupModel->deleteDept($dept_id)){
                flash('department_delete_success', 'Department successfully deleted');
                redirect('admin/alumni');
            }
            else{
                die('Something went wrong!');
            }
        }

        public function deleteCourse($course_id){
            if($this->groupModel->deleteCourse($course_id)){
                flash('course_delete_success', 'Course successfully deleted');
                redirect('admin/alumni');
            }
            else{
                die('Something went wrong!');
            }
        }

        public function deleteBatch($batch_id){
            if($this->groupModel->deleteBatch($batch_id)){
                flash('batch_delete_success', 'Batch successfully deleted');
                redirect('admin/alumni');
            }
            else{
                die('Something went wrong!');
            }
        }

        public function duplicateError(){
            echo 'Data is already in database';
        }

        public function courseError($code){
            $this->alumniModel = $this->model('alumni_model');
    
            // Get Page # in URL
            $page = $this->getPage();
    
            // Limit row displayed
            $limit = 20;
            $start = ($page - 1) * $limit;
            
            $alumniCountPerCourse = $this->alumniModel->alumniCountPerCourse();
            // $alumni = $this->alumniModel->showAlumni();
            $department = $this->alumniModel->showDepartment();
            $courses = $this->alumniModel->showCourses();
            $classification = $this->groupModel->showClassification();
    
            $alumni = $this->alumniModel->showAlumniIndex($start, $limit);
    
            $pagination = $this->alumniModel->showAlumni();
    
            $total = count($pagination);
            $pages = ceil($total/$limit);
    
            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('admin/alumni?page='.$pages);
            }
    
            $startFormula = $start + 1;
            $limitFormula = $startFormula - 1 + $limit;
    
            if($page == $pages) {
                if ($limitFormula >= $total) {
                    $limitFormula = $total;
                }
            }
    
            if($total == 0) {
                $startFormula = 0;
                $limitFormula = 0;
            }
            
            $data = [
                'courseError' => $code,
                'alumni' => $alumni,
                'department' =>  $department,
                'courses' => $courses,
                'classification' => $classification,
                'isPreview' => 0,
                'title' => 'All Alumni',
                'batch' => '',
                'alumniCount' => count($alumni),
                'alumniPerCourse' => $alumniCountPerCourse,
                
                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];
    
            // $data = $this->alumniModel->showAlumni();
            // $dep  = $this->alumniModel->showDepartment(); 
            // $year = $this->alumniModel->showYear();
            $this->view('admin_d/alumni', $data);
        }

        public function getPage() {

            // Get Page # in URL
            if (!isset($_GET['page'])) {
                $page = 1;
            } elseif($_GET['page'] == 0) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
    
            return $page;
    
        }
    }