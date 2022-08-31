<?php
    class Alumni_report extends Controller {
        private $db;
        public function __construct() {
            $this->alumniRModel = $this->model('alumniR_model');
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

        public function showBatch($batch_id) {
            
            $allCount = $this->alumniRModel->allCount();
            $batch = $this->alumniRModel->showBatch();
            $course = $this->alumniRModel->showCourses();
            $alumniPerBatch = $this->alumniRModel->alumniCountPerBatch();

            if(!empty($allCount)) {
                $allCount = count($allCount);
            }

            // Get Page # in URL
            $page = $this->getPage();

            // Limit row displayed
            $limit = 20;
            $start = ($page - 1) * $limit;

            $newData = [
                'batch' => $batch_id,
                'limit' => $limit,
                'start' => $start
            ];

            $alumni = $this->alumniRModel->showAlumniBatch($newData);
            $pagination = $this->alumniRModel->NoOfResultsBatch($newData);

            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('alumni_report/showBatch/'.$batch.'?page='.$pages);
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
                'allCount' => $allCount,
                'alumni' => $alumni,
                'batch' => $batch,
                'course' => $course,
                'alumniPerBatch' => $alumniPerBatch,

                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];

            $this->view('admin_d/alumni_report', $data);
        }

        public function showBatch_1st_half($batch_id) {
            
            $allCount = $this->alumniRModel->allCount();
            $batch = $this->alumniRModel->showBatch();
            $course = $this->alumniRModel->showCourses();
            $alumniPerBatch = $this->alumniRModel->alumniCountPerBatch();

            if(!empty($allCount)) {
                $allCount = count($allCount);
            }

            // Get Page # in URL
            $page = $this->getPage();

            // Limit row displayed
            $limit = 20;
            $start = ($page - 1) * $limit;
            
            $alumni = array();
            $pagination = array();

            $getYear = $this->alumniRModel->getYear($batch_id);
            $years = range($getYear->year, date("Y"));

            foreach($years as $year) {

                $startDate = $year."-01-01";
                $endDate = $year."-06-31";
                $newData = [
                    'batch' => $batch_id,
                    'limit' => $limit,
                    'start' => $start,
                    'startDate' => $startDate,
                    'endDate' => $endDate
                ];
                $paginationArray = $this->alumniRModel->NoOfResultsBatchFiltered($newData);
                $alumniArray = $this->alumniRModel->showAlumniBatchFiltered($newData);

                foreach ($alumniArray as $key => $value) {
                    array_push($alumni, $alumniArray[$key]);
                }

                foreach ($paginationArray as $key => $value) {
                    array_push($pagination, $paginationArray[$key]);
                }
            }

            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('alumni_report/showBatch_1st_half/'.$batch.'?page='.$pages);
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
                'allCount' => $allCount,
                'alumni' => $alumni,
                'batch' => $batch,
                'course' => $course,
                'alumniPerBatch' => $alumniPerBatch,

                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];
            // $this->view('prac/prac', $data);
            $this->view('admin_d/alumni_report', $data);
        }

        public function showBatch_2nd_half($batch_id) {
            
            $allCount = $this->alumniRModel->allCount();
            $batch = $this->alumniRModel->showBatch();
            $course = $this->alumniRModel->showCourses();
            $alumniPerBatch = $this->alumniRModel->alumniCountPerBatch();

            if(!empty($allCount)) {
                $allCount = count($allCount);
            }

            // Get Page # in URL
            $page = $this->getPage();

            // Limit row displayed
            $limit = 20;
            $start = ($page - 1) * $limit;

            $alumni = array();
            $pagination = array();

            $getYear = $this->alumniRModel->getYear($batch_id);
            $years = range($getYear->year, date("Y"));

            foreach($years as $year) {

                $startDate = $year."-07-01";
                $endDate = $year."-12-31";
                $newData = [
                    'batch' => $batch_id,
                    'limit' => $limit,
                    'start' => $start,
                    'startDate' => $startDate,
                    'endDate' => $endDate
                ];
                $paginationArray = $this->alumniRModel->NoOfResultsBatchFiltered($newData);
                $alumniArray = $this->alumniRModel->showAlumniBatchFiltered($newData);

                foreach ($alumniArray as $key => $value) {
                    array_push($alumni, $alumniArray[$key]);
                }

                foreach ($paginationArray as $key => $value) {
                    array_push($pagination, $paginationArray[$key]);
                }
            }

            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('alumni_report/showBatch_2nd_half/'.$batch.'?page='.$pages);
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
                'allCount' => $allCount,
                'alumni' => $alumni,
                'batch' => $batch,
                'course' => $course,
                'alumniPerBatch' => $alumniPerBatch,

                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];

            $this->view('admin_d/alumni_report', $data);
        }

        public function showCourse($batch_id, $course_id) {
            // $alumni = $this->alumniRModel->getAlumniByCourse($batch_id, $course_id);
            $allCount = $this->alumniRModel->allCount();
            $batch = $this->alumniRModel->showBatch();
            $course = $this->alumniRModel->showCourses();
            $alumniPerBatch = $this->alumniRModel->alumniCountPerBatch();

            if(!empty($allCount)) {
                $allCount = count($allCount);
            }

            // Get Page # in URL
            $page = $this->getPage();

            // Limit row displayed
            $limit = 20;
            $start = ($page - 1) * $limit;

            $newData = [
                'batch' => $batch_id,
                'course' => $course_id,
                'limit' => $limit,
                'start' => $start
            ];
           
            $alumni = $this->alumniRModel->showAlumniBatchAndCourse($newData);
            $pagination = $this->alumniRModel->NoOfResultsBatchAndCourse($newData);

           
            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('alumni_report/showCourse/'.$batch_id.'/'.$course_id.'?page='.$pages);
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
                'allCount' => $allCount,
                'alumni' => $alumni,
                'batch' => $batch,
                'course' => $course,
                'alumniPerBatch' => $alumniPerBatch,

                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];

            $this->view('admin_d/alumni_report', $data);
        }

        public function showCourse_1st_half($batch_id, $course_id) {
            // $alumni = $this->alumniRModel->getAlumniByCourse($batch_id, $course_id);
            $allCount = $this->alumniRModel->allCount();
            $batch = $this->alumniRModel->showBatch();
            $course = $this->alumniRModel->showCourses();
            $alumniPerBatch = $this->alumniRModel->alumniCountPerBatch();

            if(!empty($allCount)) {
                $allCount = count($allCount);
            }

            // Get Page # in URL
            $page = $this->getPage();

            // Limit row displayed
            $limit = 20;
            $start = ($page - 1) * $limit;

            $alumni = array();
            $pagination = array();

            $getYear = $this->alumniRModel->getYear($batch_id);
            $years = range($getYear->year, date("Y"));
            
            foreach($years as $year) {

                $startDate = $year."-01-01";
                $endDate = $year."-07-31";
                $newData = [
                    'batch' => $batch_id,
                    'course' => $course_id,
                    'limit' => $limit,
                    'start' => $start,
                    'startDate' => $startDate,
                    'endDate' => $endDate
                ];
                $paginationArray = $this->alumniRModel->NoOfResultsBatchAndCourseFiltered($newData);
                $alumniArray = $this->alumniRModel->showAlumniBatchAndCourseFiltered($newData);

                foreach ($alumniArray as $key => $value) {
                    array_push($alumni, $alumniArray[$key]);
                }

                foreach ($paginationArray as $key => $value) {
                    array_push($pagination, $paginationArray[$key]);
                }
            }
  
            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('alumni_report/showCourse/'.$batch_id.'/'.$course_id.'?page='.$pages);
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
                'allCount' => $allCount,
                'alumni' => $alumni,
                'batch' => $batch,
                'course' => $course,
                'alumniPerBatch' => $alumniPerBatch,

                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];

            $this->view('admin_d/alumni_report', $data);
        }

        public function showCourse_2nd_half($batch_id, $course_id) {
            // $alumni = $this->alumniRModel->getAlumniByCourse($batch_id, $course_id);
            $allCount = $this->alumniRModel->allCount();
            $batch = $this->alumniRModel->showBatch();
            $course = $this->alumniRModel->showCourses();
            $alumniPerBatch = $this->alumniRModel->alumniCountPerBatch();

            if(!empty($allCount)) {
                $allCount = count($allCount);
            }

            // Get Page # in URL
            $page = $this->getPage();

            // Limit row displayed
            $limit = 20;
            $start = ($page - 1) * $limit;

            $alumni = array();
            $pagination = array();

            $getYear = $this->alumniRModel->getYear($batch_id);
            $years = range($getYear->year, date("Y"));
            
            foreach($years as $year) {

                $startDate = $year."-07-01";
                $endDate = $year."-12-31";
                $newData = [
                    'batch' => $batch_id,
                    'course' => $course_id,
                    'limit' => $limit,
                    'start' => $start,
                    'startDate' => $startDate,
                    'endDate' => $endDate
                ];
                $paginationArray = $this->alumniRModel->NoOfResultsBatchAndCourseFiltered($newData);
                $alumniArray = $this->alumniRModel->showAlumniBatchAndCourseFiltered($newData);

                foreach ($alumniArray as $key => $value) {
                    array_push($alumni, $alumniArray[$key]);
                }

                foreach ($paginationArray as $key => $value) {
                    array_push($pagination, $paginationArray[$key]);
                }
            }

            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('alumni_report/showCourse/'.$batch_id.'/'.$course_id.'?page='.$pages);
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
                'allCount' => $allCount,
                'alumni' => $alumni,
                'batch' => $batch,
                'course' => $course,
                'alumniPerBatch' => $alumniPerBatch,

                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];

            $this->view('admin_d/alumni_report', $data);
        }

        public function report() {
            extract($_POST);
            $alumniSingle = $this->alumniRModel->getAlumniSingle($id);
            $data = [
                'alumni' => $alumniSingle
            ];
            $this->view('alumni/report', $data);
        }

        function filterData(&$str){ 
            $str = preg_replace("/\t/", "\\t", $str); 
            $str = preg_replace("/\r?\n/", "\\n", $str); 
            if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
        }

        public function export() {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Excel file name for download 
                $fileName = "untitled-" . date('Ymd') . ".xls"; 

                // Headers for download 
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$fileName\""); 

                $data = array();
                $select = $_POST['result'];
                foreach($select as $id) {
                    $newData = $this->alumniRModel->selectExport($id);
                    $newData = json_decode(json_encode($newData), true);
                    array_push($data, $newData[0]);
                }

                $flag = false; 
                foreach($data as $row) {
                    
                    if(!$flag) { 
                        // display column names as first row 
                        echo implode("\t", array_keys($row)) . "\n"; 
                        $flag = true; 
                    }
                    // filter data
                    array_walk($row, array($this, 'filterData'));
                    echo implode("\t", array_values($row)) . "\n"; 
                }
            }
        }

        
    }