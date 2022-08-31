<?php 


    class S_widget{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function getSurvey(){
            $this->db->query("SELECT * FROM survey_set where '".date('Y-m-d')."' between date(start_date) and date(end_date)");
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
        }

        public function getSurveyById($id){
            $this->db->query('SELECT * from survey_set where id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }


        public function isAnswer($user_id){
            $this->db->query("SELECT distinct(survey_id) from answers where user_id =:id");
            $this->db->bind(':id', $user_id);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function surveyAnswered($user_id){
            $this->db->query('SELECT distinct(survey_id) from answers where user_id = :user_id');
            $this->db->bind(':user_id', $user_id);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return 0;
            }
        }


        public function checkIfAnswered($user_id, $sid){
            $this->db->query("SELECT * from answers WHERE user_id=:user_id AND survey_id = :sid");
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':sid', $sid);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public function addAnswer($data){      
            $this->db->query('INSERT INTO answers set '. $data);
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function markAsDone($data){      
            $this->db->query('INSERT INTO answers(user_id, survey_id) VALUES (:user_id, :sid)');
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':sid', $data['sid']);
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }


        // QUESTION DATABASE INTERACTION 

        public function getQuestion($id){
            $this->db->query('SELECT * from questions where survey_id=:id order by abs(order_by) asc,abs(id) asc');
            $this->db->bind(':id', $id);
            $row = $this->db->ResultSet();
            if($row > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getQuestionById($id){
            $this->db->query('SELECT * from questions where id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

    }