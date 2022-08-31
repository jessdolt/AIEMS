<?php 

    class Survey_widget extends Controller{

        public function __construct(){
            $this->surveyListModel = $this->model('s_widget');


            $currentSurvey = $this->surveyListModel->getSurvey();
            $answeredSurvey = $this->surveyListModel->surveyAnswered($_SESSION['id']);

            $answered = array();
            if($answeredSurvey != 0){
                foreach($currentSurvey as $c_survey){
                    foreach($answeredSurvey as $a_survey){
                        if($c_survey->id === $a_survey->survey_id){
                            array_push($answered, 1);
                        }
                    }
                }
            }
              
            if(count($currentSurvey) == count($answered)){
                redirect('pages/home');
            }
            

        }

        public function index(){
            $surveyList = $this->surveyListModel->getSurvey();
            
            $answers = $this->surveyListModel->isAnswer($_SESSION['id']);

            $ans = array();
            foreach($answers as $answer){
                $ans[$answer->survey_id] = 1;
            }

            $data = [
                'surveyList' => $surveyList,
                'user_id' => $_SESSION['id'],
                'answers' => $ans
            ]; 
            $this->view('pages/survey', $data);
        }
        
        public function answer_survey($sid){
            $survey = $this->surveyListModel->getSurveyById($sid);
            $questions = $this->surveyListModel->getQuestion($sid);
            $isAnswer = $this->surveyListModel->checkIfAnswered($_SESSION['id'], $sid);

            $data = [
                'survey' => $survey,
                'questions' => $questions,
                'isAnswer' => $isAnswer
            ];
            
            $this->view('survey_list/answer', $data);
        }

        public function answer(){
            extract($_POST);
                foreach($qid as $key => $value){
                    $data = " survey_id=$survey_id";
                    $data .= ", question_id='$qid[$key]'";
                    $data .= ", user_id='$user_id'";
                    if($type[$key] == 'check'){
                        $data .= ", answer='[".implode("],[",$answer[$key])."]' ";
                    }
                    else{
                        $data .= ", answer='$answer[$key]' ";
                    }
                    $save[] = $this->surveyListModel->addAnswer($data);
                }
       
            if(isset($save)){
                echo 1;
            }
        }


        public function googleFormDone(){
            extract($_POST);

            $data= [
                'sid' => $googleFormId,
                'user_id' => $_SESSION['id']
            ];
            
            if($this->surveyListModel->markAsDone($data)){
                echo '1';
            }
            else{
                return false;
            }

        }
    }