<?php 

    class Survey_report extends Controller{

        public function __construct(){
            $this->surveyReportModel = $this->model('s_report');
        }

        public function index(){
            $survey = $this->surveyReportModel->showSurvey();
            $data = [
               'surveyList' => $survey 
            ]; 
            $this->view('survey_report/index', $data);
        }

        public function view_report($sid){
            $survey = $this->surveyReportModel->getSurveyById($sid);
            $taken = $this->surveyReportModel->surveyTaken($sid);
            $answers = $this->surveyReportModel->getAnswers($sid);
            $questions = $this->surveyReportModel->getQuestions($sid);

            $ans = array();

            foreach($answers as $row){
                if($row->type == 'radio'){
                    $ans[$row->question_id][$row->answer][]= 1;
                }
                if($row->type == 'check'){
                    foreach(explode(",", str_replace(array("[","]"), '', $row->answer)) as $v){
                        $ans[$row->question_id][$v][] = 1;
                    }
                }
                if($row->type == 'textfield_s'){
                    $ans[$row->question_id][] = $row->answer;
                }
            }

            $data = [
               'survey' => $survey,
               'questions' => $questions,
               'taken' => $taken,
               'answers'=> $ans
            ]; 
            
            $this->view('survey_report/view_report', $data);
        }
        

    


        public function print_report($sid){
            $survey = $this->surveyReportModel->getSurveyById($sid);
            $taken = $this->surveyReportModel->surveyTaken($sid);
            $answers = $this->surveyReportModel->getAnswers($sid);
            $questions = $this->surveyReportModel->getQuestions($sid);

            $ans = array();

            foreach($answers as $row){
                if($row->type == 'radio'){
                    $ans[$row->question_id][$row->answer][]= 1;
                }
                if($row->type == 'check'){
                    foreach(explode(",", str_replace(array("[","]"), '', $row->answer)) as $v){
                        $ans[$row->question_id][$v][] = 1;
                    }
                }
                if($row->type == 'textfield_s'){
                    $ans[$row->question_id][] = $row->answer;
                }
            }

            $data = [
               'survey' => $survey,
               'questions' => $questions,
               'taken' => $taken,
               'answers'=> $ans
            ]; 
            
            $this->view('survey_report/print_report', $data);
        }
        
    }