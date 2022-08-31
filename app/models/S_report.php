<?php 


    class S_report{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function showSurvey(){
            $this->db->query('SELECT * from survey_set');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function searchSurvey($char){
            $this->db->query("SELECT * from survey_set WHERE title like CONCAT('%', :test, '%') ORDER BY date_created DESC");
            $this->db->bind(':test' , $char);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
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


        public function surveyTaken($sid){
            $this->db->query("SELECT distinct(user_id) from answers where survey_id =:sid");
            $this->db->bind(':sid', $sid);
            $row = $this->db->resultSet();
            return $this->db->rowCount();
        }

        public function getAnswers($sid){
            $this->db->query("SELECT a.*,q.type from answers a inner join questions q on q.id = a.question_id where a.survey_id ={$sid}");
            $row = $this->db->resultSet();
            return $row;
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


        // QUESTION DATABASE INTERACTION 

        public function getQuestions($id){
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