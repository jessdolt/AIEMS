<?php 

    class Admin extends Controller {
        
       
        public function __construct() {

            if (!isLoggedIn()) {
                redirect('users/login');
            }

            if (!isAdmin()) {
                redirect('pages/home');
            }
            
        }

        public function index(){
        }

        public function api_test(){

            $data = [];
            $this->view('tryouts/api_test', $data);
        }

        public function dashboard(){

            $data = [];
            $this->view('admin_d/dashboard', $data);
        }

        public function dashTest(){
             $this->dashBoardModel = $this->model('dashboard_model');
            // $news = $this->dashBoardModel->showNewsCount();
            // $events = $this->dashBoardModel->showEventsCount();
            // $latestSurvey = $this->dashBoardModel->getLatestSurvey();
            // $totalAlumni = $this->dashBoardModel->getAlumniCount();
            // $taken = $this->dashBoardModel->getAlumniSurveyed($latestSurvey[0]->id);
            // $batch = $this->dashBoardModel->getBatch();
            // $class = $this->dashBoardModel->getClassification();

            // $latestTopic = $this->dashBoardModel->getTopic();
            // $latestComment = $this->dashBoardModel->getComments();
            // $latestReplies = $this->dashBoardModel->getReplies();
            $test = date('Y-m-d');
            $countDay = $this->dashBoardModel->getDailyCount($test);
            $countMonthly = $this->dashBoardModel->getMonthlyCount();
            $countYearly = $this->dashBoardModel->getYearlyCount();
            $data = [
                // 'news_count' => $news[0]->news_count,
                // 'events_count' => $events[0]->events_count,
                // 'latestSurvey' => $latestSurvey[0],
                // 'totalRespondets' => $totalAlumni[0]->alumniCount,
                // 'taken' => $taken[0]->userTaken,
                // 'batch' => $batch,
                // 'class' => $class
                // 'topic' => $latestTopic,
                // 'comments' => $latestComment,
                // 'replies' => $latestReplies
                    'day' => $countDay->visit_count,
                    'month' => $countMonthly[0]->visit_count,
                    'yearly' => $countYearly[0]->visit_count
            ];

            //array_print($data);
            $this->view('prac/prac_db', $data);
        }

        public function notif(){
            $data =[];
            
            $this->view('admin_d/email_notif', $data);
        }

        public function passHash(){
            $data =[];
            
            $this->view('admin_d/testPass', $data);
        }

        public function alumni(){
            $this->alumniModel = $this->model('alumni_model');
            $this->groupModel = $this->model('group_model');
            extract($_POST);
            if(!isset($isSearch)){
                // Get Page # in URL
                $page = $this->getPage();

                // Limit row displayed
                $limit = 20;
                $start = ($page - 1) * $limit;
                
                $alumniCountPerCourse = $this->alumniModel->alumniCountPerCourse();
                 $allAlumni = $this->alumniModel->showAlumni();
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
                    'alumni' => $alumni,
                    'department' =>  $department,
                    'courses' => $courses,
                    'classification' => $classification,
                    'isPreview' => 0,
                    'title' => 'All Alumni',
                    'batch' => '',
                    'alumniCount' => count($allAlumni ),
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
            else{
                $alumni = $this->alumniModel->searchAlumni($searchKey);
                //array_print($alumni);
                $data = [
                    'alumni' => $alumni
                ];

                $this->view('search/alumni', $data);
            }
            
        }

        public function news() {
            $this->postModel = $this->model('post');
            extract($_POST);

            if(!isset($isSearch)){
           
                // Get Page # in URL
                $page = $this->getPage();
                    
                // Limit row displayed
                $limit = 10;
                $start = ($page - 1) * $limit;

                $posts = $this->postModel->showNewsIndex($start, $limit);

                $pagination = $this->postModel->NoOfResults();

                $total = count($pagination);
                $pages = ceil($total/$limit);

                // No URL bypass
                if($pages == 0) {
                    $pages = 1;
                }
                if($page > $pages) {
                    redirect('admin/news?page='.$pages);
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
                    'news' => $posts,
                    'start' => $startFormula,
                    'limit' => $limitFormula,
                    'total' => $total,
                    'first' => '?page=1',
                    'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                    'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                    'last' => '?page=' . $pages
                ];
            
                $this->view('admin_d/news', $data);
            } else{
                $posts = $this->postModel->searchNews($searchKey);
                //array_print($events);
                if(!empty($posts)){
                    $data = ['news'=> $posts];
                }
                else{
                    $data = ['news' => ''];
                }
          
                
                $this->view('search/news', $data);
            }
        }

        public function events(){
            $this->eventModel = $this->model('Event');
            extract($_POST);

            if(!isset($isSearch)){
                // Get Page # in URL
                $page = $this->getPage();
                    
                // Limit row displayed
                $limit = 10;
                $start = ($page - 1) * $limit;
    
                $events = $this->eventModel->showEventsIndex($start, $limit);
    
                $pagination = $this->eventModel->NoOfResults();
    
                $total = count($pagination);
                $pages = ceil($total/$limit);
    
                // No URL bypass
                if($pages == 0) {
                    $pages = 1;
                }
                if($page > $pages) {
                    redirect('admin/events?page='.$pages);
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
                    'events' => $events,
                    'start' => $startFormula,
                    'limit' => $limitFormula,
                    'total' => $total,
                    'first' => '?page=1',
                    'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                    'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                    'last' => '?page=' . $pages
                ];
            
                $this->view('admin_d/events', $data);
            }
            else{
                $events = $this->eventModel->searchEvents($searchKey);
                //array_print($events);
                if(!empty($events)){
                    $data = ['events'=> $events];
                }
                else{
                    $data = ['events' => ''];
                }
          
                
                $this->view('search/events', $data);
            }
           

        }

        public function job_portal() {
            $this->jobModel = $this->model('job_portal');
            extract($_POST);

            if(!isset($isSearch)){
                // Get Page # in URL
                if (!isset($_GET['page'])) {
                    $page = 1;
                } elseif($_GET['page'] == 0) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
                    
                // Limit row displayed
                $limit = 20;
                $start = ($page - 1) * $limit;

                $jobs = $this->jobModel->showJobsIndex($start, $limit);

                $pagination = $this->jobModel->NoOfResults();

                $total = count($pagination);
                $pages = ceil($total/$limit);

                // No URL bypass
                if($pages == 0) {
                    $pages = 1;
                }
                if($page > $pages) {
                    redirect('admin/job_portal?page='.$pages);
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
                    'jobs' => $jobs,
                    'start' => $startFormula,
                    'limit' => $limitFormula,
                    'total' => $total,
                    'first' => '?page=1',
                    'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                    'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                    'last' => '?page=' . $pages
                ];
            
                $this->view('admin_d/job_portal', $data);
            } else {
                $jobs = $this->jobModel->searchJobs($searchKey);
                //array_print($events);
                if(!empty($jobs)){
                    $data = ['jobs'=> $jobs];
                }
                else{
                    $data = ['jobs' => ''];
                }
          
                
                $this->view('search/job_portal', $data);
            }

        }

        public function survey_list() {
            $this->surveyModel = $this->model('survey');
            extract($_POST);

            if(!isset($isSearch)){
                // Get Page # in URL
                $page = $this->getPage();
                    
                // Limit row displayed
                $limit = 10;
                $start = ($page - 1) * $limit;

                $survey = $this->surveyModel->showSurveyIndex($start, $limit);

                $pagination = $this->surveyModel->NoOfResults();

                $total = count($pagination);
                $pages = ceil($total/$limit);

                // No URL bypass
                if($pages == 0) {
                    $pages = 1;
                }
                if($page > $pages) {
                    redirect('admin/survey_list?page='.$pages);
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
                    'survey' => $survey,
                    'start' => $startFormula,
                    'limit' => $limitFormula,
                    'total' => $total,
                    'first' => '?page=1',
                    'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                    'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                    'last' => '?page=' . $pages
                ];
            
                $this->view('admin_d/survey', $data);
            } else {
                $survey = $this->surveyModel->searchSurvey($searchKey);
                //array_print($events);
                if(!empty($survey)){
                    $data = ['survey'=> $survey];
                }
                else{
                    $data = ['survey' => ''];
                }
          
                $this->view('search/survey_list', $data);
            }
        }
    

        public function survey_report(){
            $this->surveyReportModel = $this->model('s_report');
            extract($_POST);

            if(!isset($isSearch)){  
                $surveys = $this->surveyReportModel->showSurvey();
                
                if(!empty($surveys)) {
                    foreach($surveys as $survey){
                        $survey->{'respondents'} = $this->surveyReportModel->surveyTaken($survey->id);
                    }
    
                    $currentDate = date('Y-m-d');
                    $activeSurvey = array();
                    $pastSurvey = array();
    
                    foreach($surveys as $survey){
                        if($survey->end_date >= $currentDate){
                            array_push($activeSurvey,$survey);
                        }
                        else{
                            array_push($pastSurvey,$survey);
                        }
                    }
    
                    $data = [
                        'activeSurvey' => $activeSurvey,
                        'pastSurvey' => $pastSurvey
                    ];
                } else {
                    $data = [
                        'activeSurvey' => '',
                        'pastSurvey' => ''
                    ];
                }

                $this->view('admin_d/survey_report', $data);
            } else {
                $surveys = $this->surveyReportModel->searchSurvey($searchKey);
                
                //array_print($events);
                if(!empty($surveys)){
                    foreach($surveys as $survey){
                        $survey->{'respondents'} = $this->surveyReportModel->surveyTaken($survey->id);
                    }
    
                    $currentDate = date('Y-m-d');
                    $activeSurvey = array();
    
                    foreach($surveys as $survey){
                        if($survey->end_date >= $currentDate){
                            array_push($activeSurvey,$survey);
                        }
                    }

                    $data = ['activeSurvey'=> $surveys];
                }
                else{
                    $data = ['activeSurvey' => ''];
                }
          
                $this->view('search/survey_report', $data);
            }
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

        public function gallery(){
            $this->galleryModel = $this->model('gallery');
            $rowGallery = $this->galleryModel->showGallery();
            $rowImages = $this->galleryModel->showImages();
            $data = [
                'gallery' => $rowGallery,
                'images' => $rowImages 
            ];

            $this->view('admin_d/gallery' , $data);
        }

        public function alumni_report() {
            $this->alumniRModel = $this->model('alumniR_model');
            extract($_POST);

            if(!isset($isSearch)) {
                // $alumni = $this->alumniRModel->showAll();
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
                    'start' => $start,
                    'limit' => $limit,
                ];

                if(isset($_POST['dateFilter'])) {
                    if($_POST['dateFilter'] == 1) {
                        $startDate = date('Y')."-01-01";
                        $endDate = date('Y')."-06-31";
                    } 

                    if ($_POST['dateFilter'] == 2) {
                        $startDate = date('Y')."-07-01";
                        $endDate = date('Y')."-12-31";
                    }

                    $newData = [
                        'start' => $start,
                        'limit' => $limit,
                        'date' => $_POST['dateFilter'],
                        'startDate' => $startDate,
                        'endDate' => $endDate
                    ];    
                }

                $alumni = $this->alumniRModel->showAlumniIndex($newData);
                

                $pagination = $this->alumniRModel->NoOfResults();

            
                $total = count($pagination);
                $pages = ceil($total/$limit);

                // No URL bypass
                if($pages == 0) {
                    $pages = 1;
                }
                if($page > $pages) {
                    redirect('admin/alumni_report?page='.$pages);
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
            } else {
                $alumni = $this->alumniRModel->searchAlumniReport($searchKey);
                //array_print($events);
                if(!empty($alumni)){
                    $data = ['alumni'=> $alumni];
                }
                else{
                    $data = ['alumni' => ''];
                }
          
                $this->view('search/alumni_report', $data);
            }
        }

        public function alumni_report_1st_half() {
            $this->alumniRModel = $this->model('alumniR_model');
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

            $startDate = date('Y')."-01-01";
            $endDate = date('Y')."-06-31";
     
            $newData = [
                'start' => $start,
                'limit' => $limit,
                'startDate' => $startDate,
                'endDate' => $endDate
            ];

            $alumni = $this->alumniRModel->showAlumniFiltered($newData);
            

            $pagination = $this->alumniRModel->NoOfResultsFiltered($newData);

           
            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('admin/alumni_report?page='.$pages);
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

        public function alumni_report_2nd_half() {
            $this->alumniRModel = $this->model('alumniR_model');
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

            $startDate = date('Y')."-07-01";
            $endDate = date('Y')."-12-31";
     
            $newData = [
                'start' => $start,
                'limit' => $limit,
                'startDate' => $startDate,
                'endDate' => $endDate
            ];

            $alumni = $this->alumniRModel->showAlumniFiltered($newData);
            

            $pagination = $this->alumniRModel->NoOfResultsFiltered($newData);

           
            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('admin/alumni_report?page='.$pages);
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
}