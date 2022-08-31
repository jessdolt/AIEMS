<?php 

    class Dashboard_model{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function showNewsCount(){
            $this->db->query('SELECT (COUNT(*)) as news_count FROM posts');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return 0;
            }

        }

        public function showEventsCount(){
            $this->db->query('SELECT (COUNT(*)) as events_count FROM events');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return 0;
            }
            
        }

        public function getBatch(){
            $this->db->query('SELECT * FROM batch');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return 0;
            }
        }

        public function getClassification(){
            $this->db->query('SELECT * 
                            FROM classification
                            INNER JOIN batch 
                            ON classification.batch_id = batch.id
                            INNER JOIN courses
                            ON classification.course_id = courses.id
                            WHERE year = 2019');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return 0;
            }
        }

        public function getLatestSurvey(){
            $this->db->query("SELECT * FROM survey_set WHERE :currentDate between date(start_date) and date(end_date) ORDER BY id desc limit 1");
            $this->db->bind(':currentDate', date('Y-m-d'));
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return 0;
            }

        }

        public function getAlumniCount(){
            $this->db->query('SELECT COUNT(*) as alumniCount FROM users where a_id IS NOT NULL');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return 0;
            }
        }
        

        public function getAlumniSurveyed($sid){
            $this->db->query('SELECT COUNT(distinct(user_id)) as userTaken FROM answers WHERE survey_id =:s_id');
            $this->db->bind(':s_id', $sid);

            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return 0;
            }
        }


        public function getTopic(){
            $this->db->query('SELECT *,
                            topic.type as rType,
                            topic.created_at as rCreated_at
                            FROM topic 
                            INNER JOIN users
                            ON topic.topic_author = users.user_id
                            ORDER BY created_at desc LIMIT 4');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return 0;
            }
        }

        public function getComments(){
            $this->db->query('SELECT *,
                            comment.type as rType,
                            comment.created_at as rCreated_at
                            FROM comment 
                            INNER JOIN users
                            ON comment.comment_sender = users.user_id 
                            ORDER BY created_at desc
                            LIMIT 4
                            ');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return 0;
            }
        }

        public function getReplies(){
            $this->db->query('SELECT *,
                            reply.replied_at as rCreated_at
                            FROM reply 
                            INNER JOIN comment
                            ON reply.parent_comment = comment.comment_id
                            INNER JOIN topic 
                            ON comment.comment_for = topic.topic_id
                            ORDER BY reply.replied_at desc
                            LIMIT 4
                            ');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return 0;
            }
        }

        public function getDailyCount(){
             $currentDay = date('Y-m-d');
            $this->db->query("SELECT visit_count FROM login_count WHERE login_date = :dayToday ");
            $this->db->bind(':dayToday', $currentDay);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getMonthlyCount(){
            $monthAndFirstDay = date('Y-m-1');
            $monthAndLastDay = date('Y-m-t');
            $this->db->query('SELECT SUM(visit_count) as visit_count from login_count WHERE login_date BETWEEN :start_month AND :end_month ');
            $this->db->bind(':start_month', $monthAndFirstDay);
            $this->db->bind(':end_month', $monthAndLastDay);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getYearlyCount(){
            $currentYear = date('Y');
            $this->db->query('SELECT SUM(visit_count) as visit_count from login_count WHERE YEAR(login_date) = :current_year');
            $this->db->bind(':current_year', $currentYear);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }
        
    }