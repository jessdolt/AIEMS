<?php

class Pages extends Controller{
    public function __construct(){
      
        if (!isLoggedIn()) {
            redirect('users/login');
        }
    
        if(userType() == "Alumni") {
            if ($this->checkVerify()) {
                redirect('profile/editProfile/'.$_SESSION['alumni_id']);
            } 
            else {
                if($this->isEmployed()) {
                    redirect('profile/profileAdditionalAdd/'.$_SESSION['alumni_id']);
                } 
                 if($this->checkSurvey()){
                    redirect('survey_widget');
                }
            }
        }

        // $this->checkVerify();
        // $this->isEmployed();
        // CHECK IF PROFILE UPDATED (VERIFIED)

        //$this->checkSurvey();
        // CHECK IF PROFILE UPDATED (VERIFIED)

        // $this->surveyWidgetModel = $this->model('s_widget');
        // $surveyExists = $this->surveyWidgetModel->getSurvey();
        // if(isset($surveyExists)){
        //     redirect('survey_widget');
        // }   
      
        //$this->alumniModel = $this->model('alumni_model');\
        
    }
    
    public function index(){
        if(isLoggedIn()) {
        /* $this->checkSurvey(); */
            redirect('pages/home');
        }
    }

    function checkVerify() {
        $this->userModel = $this->model('user');
        $user = $this->userModel->singleAcc($_SESSION['alumni_id']);
        if($user->verify != "YES") {
            return true;
            // redirect('profile/editProfile/'.$_SESSION['alumni_id']);
        } else {
            return false;
        }
    }

    function isEmployed() {
        $user = $this->userModel->singleUserAlumniJoin($_SESSION['alumni_id']);
        $findRecord = $this->userModel->additionalVerify($_SESSION['alumni_id']);
        $userData = $this->userModel->singleAcc($_SESSION['alumni_id']);

        if($userData->privacyConsent == "Accept" || $userData->privacyConsent == NULL) {
            if(empty($findRecord)) {
                return true;
                // redirect('profile/profileAdditionalAdd/'.$_SESSION['alumni_id']);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    function checkSurvey(){
        $this->surveyListModel = $this->model('s_widget');
        $currentSurvey = $this->surveyListModel->getSurvey();
        $answeredSurvey = $this->surveyListModel->surveyAnswered($_SESSION['id']);

        $answered = array();
        if(!empty($currentSurvey)){
            foreach($currentSurvey as $c_survey){
                foreach($answeredSurvey as $a_survey ){
                    if($c_survey->id === $a_survey->survey_id){
                        array_push($answered, 1);
                    }
                }
            }
            
            if(count($currentSurvey) == count($answered)){
                // redirect('pages/home'); 
                return false;
            }
            else{
                return true;
                //redirect('survey_widget');
            }
        }
        else{
            return false;
        }
        
    }

    public function home() {

        $this->postModel = $this->model('post');
        $this->eventModel = $this->model('event');
        $this->jobModel = $this->model('job_portal');
        $this->forumModel = $this->model('new_forum');

        $news = $this->postModel->showNewsHome();
        $events = $this->eventModel->showEventHome();
        $job_portal = $this->jobModel->showJobsHome();
        $forum = $this->forumModel->forumIndex();
        $data = [
            'news' => $news,
            'events' => $events,
            'job_portals' => $job_portal,
            'forum' => $forum
        ];

         $this->view('pages/home', $data);
    }

    public function gallery() {
        $this->galleryModel = $this->model('Gallery');

        // $gallery = $this->galleryModel->showGalleryLimit();
        $images  = $this->galleryModel->showImages(); 

        // Get Page # in URL
        $page = $this->getPage();
                
        // Limit row displayed
        $limit = 12;
        $start = ($page - 1) * $limit;

        $gallery = $this->galleryModel->showGalleryLimit($start, $limit);

        $pagination = $this->galleryModel->NoOfResults();
        $total = count($pagination);
        $pages = ceil($total/$limit);

        // No URL bypass
        if($pages == 0) {
            $pages = 1;
        }
        if($page > $pages) {
            redirect('pages/gallery?page='.$pages);
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
            'gallery' => $gallery,
            'images' => $images,

            'start' => $startFormula,
            'limit' => $limitFormula,
            'total' => $total,
            'first' => '?page=1',
            'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
            'next' => '?page='. ($page == $pages ? $pages : $page + 1),
            'last' => '?page=' . $pages
        ];

        $this->view('pages/gallery', $data);
    }

    public function singleGallery($id) {
        $this->galleryModel = $this->model('Gallery');

        $gallery = $this->galleryModel->showGalleryById($id);
        $counter = $this->galleryModel->showGalleryCount($id);
        $images  = $this->galleryModel->showImagesByGalId($id); 
        
        $data = [
            'gallery' => $gallery,
            'count'  => $counter,
            'images' => $images,
        ];

        $this->view('pages/singleGallery', $data);
    }


    public function forum() {
        $this->forumModel = $this->model('new_forum');

        $category = $this->forumModel->getCategory();
        $all = $this->forumModel->categoryCounter();
        // $posts = $this->forumModel->getPosts();
        $reply = $this->forumModel->getPostsReplies();
        $pop = $this->forumModel->getPopular();
        $my = $this->forumModel->getCurrent($_SESSION['id']);

        // Get Page # in URL
        $page = $this->getPage();
                
        // Limit row displayed
        $limit = 12;
        $start = ($page - 1) * $limit;

        $posts = $this->forumModel->getPosts($start, $limit);

        $pagination = $this->forumModel->NoOfResults();
        $total = count($pagination);
        $pages = ceil($total/$limit);

        // No URL bypass
        if($pages == 0) {
            $pages = 1;
        }
        if($page > $pages) {
            redirect('pages/forum?page='.$pages);
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
            'post' => $posts,
            'reply' => $reply,
            'popular' => $pop,
            'user_posts' => $my,
            'category' => $category,
            'all' => $all,

            'start' => $startFormula,
            'limit' => $limitFormula,
            'total' => $total,
            'first' => '?page=1',
            'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
            'next' => '?page='. ($page == $pages ? $pages : $page + 1),
            'last' => '?page=' . $pages
        ];

        // array_print($data);
       $this->view('pages/forum',$data);

    }

    public function news() {
        $this->postModel = $this->model('post');
        $news = $this->postModel->showNewsList();

        // Get Page # in URL
        $page = $this->getPage();
                
        // Limit row displayed
        $limit = 10;
        $start = ($page - 1) * $limit;
        $oldNews = $this->postModel->showNewsIndex($start + 10, $limit);

        $pagination = $this->postModel->NoOfResultsOld();
        $total = count($pagination);
        $pages = ceil($total/$limit);

        // No URL bypass
        if($pages == 0) {
            $pages = 1;
        }
        if($page > $pages) {
            redirect('pages/news?page='.$pages);
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
                'latestNews' => $news,
                'oldNews' => $oldNews,
                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];

        $this->view('pages/news', $data);
    }

    public function events() {
        $this->eventModel = $this->model('event');
        $events = $this->eventModel->showEventsList();

        // Get Page # in URL
        $page = $this->getPage();
                        
        // Limit row displayed
        $limit = 10;

        $pagination = $this->eventModel->NoOfResultsOld();

        $total = count($pagination);
        $pages = ceil($total/$limit);

        $start = ($page - 1) * $limit;

        $oldEvents = $this->eventModel->showEventsIndex($start + 10, $limit);

        // No URL bypass
        if($pages == 0) {
            $pages = 1;
        }
        if($page > $pages) {
            redirect('pages/events?page='.$pages);
        }

        $startFormula = $start + 1;
        $limitFormula = $startFormula - 1 + $limit;

        if($page == $pages) {
            if ($limitFormula >= $total) {
                $limitFormula = $total;
            }
        }

        $originalCount = $this->eventModel->NoOfResults();
        
        if ($originalCount < 10) {

            $data = [
                'latestEvents' => $events,
                'oldEvents' => $oldEvents,
                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];
        } else {

            $data = [
                'latestEvents' => $events,
                'oldEvents' => $oldEvents,
                'start' => 0,
                'limit' => 0,
                'total' => 0,
                'first' => '?page=0',
                'previous' => '?page=0',
                'next' => '?page=0',
                'last' => '?page=0'
            ];

        }

        $this->view('pages/events', $data);
    }

    public function job_portals() {
        $this->jobModel = $this->model('job_portal');
        $job_portal_active = $this->jobModel->showJobListActive();
        $job_portal_archived = $this->jobModel->showJobListArchive();
        $data = [
            'active' => $job_portal_active,
            'archive' => $job_portal_archived
        ];
        $this->view('pages/job_portals', $data);
    }

    public function login(){
        $data = [];
        $this->view('users/login', $data);
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