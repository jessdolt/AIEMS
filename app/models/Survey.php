<?php 


    class Survey{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function showSurveyIndex($page, $rowsperpage){
            $this->db->query('SELECT * FROM survey_set ORDER BY date_created DESC LIMIT :page, :rowsperpage');
            $this->db->bind(':page', $page);
            $this->db->bind(':rowsperpage', $rowsperpage);
            
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function NoOfResults() {
            $this->db->query('SELECT ALL id FROM survey_set'); 

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function addSurvey($data){
            $this->db->query('INSERT INTO survey_set(title,description,user_id,start_date,end_date, s_type, google_form_link,google_form_editor_link) VALUES (:title,:description,:user_id,:start_date,:end_date,:s_type, :form_link, :form_editor_link)');

            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':start_date', $data['start_date']);
            $this->db->bind(':end_date', $data['end_date']);
            $this->db->bind(':s_type', $data['s_type']);
            $this->db->bind(':form_link', $data['form_link']);
            $this->db->bind(':form_editor_link', $data['form_editor_link']);
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function showSurvey(){
            $this->db->query('SELECT * from survey_set');
            $row = $this->db->resultSet();
            if($row > 0){
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

        public function updateSurvey($data){      
            $this->db->query('UPDATE survey_set set title=:title, description=:description, user_id=:user_id, start_date=:start_date, end_date=:end_date , s_type = :s_type, google_form_link = :form_link, google_form_editor_link = :form_editor_link WHERE id =:id');
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':start_date', $data['start_date']);
            $this->db->bind(':end_date', $data['end_date']);
            $this->db->bind(':s_type', $data['s_type']);
            $this->db->bind(':form_link', $data['form_link']);
            $this->db->bind(':form_editor_link', $data['form_editor_link']);
            $this->db->bind(':id', $data['sid']);
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function deleteSurvey($id){
            $this->db->query('DELETE FROM survey_set where id=:id');
            $this->db->bind(':id', $id);
            if($this->db->execute()){
                return true;
            }
            else{
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

        public function addQuestion($data){      
            $this->db->query('INSERT INTO questions set '. $data);
            if($this->db->execute()){
                return true;
            } else{
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

        public function updateQuestion($data, $qid){      
            $this->db->query('UPDATE questions set '. $data . ' WHERE id=' .$qid);
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function deleteQuestion($qid){
            $this->db->query('DELETE FROM questions where id=' .$qid);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }
        
        public function updateSort($i, $v){
            $this->db->query('UPDATE questions set order_by=:i where id=:v');
            $this->db->bind(':i',$i);
            $this->db->bind(':v',$v);
            
            if($this->db->execute()){
                return true;
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
    }