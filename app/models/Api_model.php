<?php 

    class Api_model{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function news_read(){
            $this->db->query('SELECT * from posts');
            $row = $this->db->resultSet();
            return $row;
        }

        public function events_read(){
            $this->db->query('SELECT * from events');
            $row = $this->db->resultSet();
            return $row;
        }

        public function survey_set_read($sid){
            $this->db->query('SELECT * from survey_set WHERE id =:sid');
            $this->db->bind(':sid' , $sid);
            $row = $this->db->resultSet();
            return $row;
        }

        public function questions_read($sid){
            $this->db->query('SELECT * from questions WHERE survey_id =:sid ORDER BY order_by asc');
            $this->db->bind(':sid' , $sid);
            $row = $this->db->resultSet();
            return $row;
        }

        public function answers_read($sid){
            $this->db->query('SELECT * from answers WHERE survey_id =:sid');
            $this->db->bind(':sid' , $sid);
            $row = $this->db->resultSet();
            return $row;
        }


        public function job_portal_active_read(){
            $this->db->query('SELECT COUNT(*) as job_active from job_portal WHERE job_status = "Active"');
            $row = $this->db->resultSet();
            return $row;
        }


        public function latestSurvey_read(){
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

        public function user_count_read(){
            $this->db->query('SELECT COUNT(*) as respondents from users WHERE a_id IS NOT NULL');
            $row = $this->db->resultSet();
            return $row;
        }

        public function taken_count_read($sid){
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

        public function batch_read(){
            $this->db->query('SELECT * from batch ORDER BY id desc');
            $row = $this->db->resultSet();
            return $row;
        }

        public function masterlist_read($batch_id){
            $this->db->query('SELECT * 
                            FROM classification
                            INNER JOIN courses
                            ON classification.course_id = courses.id
                            WHERE batch_id = :batch_id;
                            ');
            $this->db->bind(':batch_id', $batch_id);
            $row = $this->db->resultSet();
            return $row;
        }

        public function alumni_count_read($course_id, $batch_id){
            $this->db->query('SELECT COUNT(*) as alumniCount from alumni WHERE courseID = :course_id AND batchID = :batch_id');
            $this->db->bind(':course_id', $course_id);
            $this->db->bind(':batch_id', $batch_id);
            $row = $this->db->resultSet();
            return $row;
        }

        public function topic_read(){
            $this->db->query('SELECT * ,
                            topic.type as rType,
                            topic.created_at as rCreated_at
                            FROM topic 
                            INNER JOIN users
                            ON topic.topic_author = users.user_id
                            INNER JOIN alumni
                            ON users.a_id = alumni.alumni_id
                            ORDER BY created_at desc LIMIT 4');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return 0;
            }
        }

        public function comments_read(){
            $this->db->query('SELECT *, 
                            comment.type as rType,
                            comment.created_at as rCreated_at
                            FROM comment 
                            INNER JOIN users
                            ON comment.comment_sender = users.user_id 
                            INNER JOIN topic 
                            ON comment.comment_for = topic.topic_id
                            INNER JOIN alumni
                            ON users.a_id = alumni.alumni_id
                            ORDER BY comment.created_at desc
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

        public function replies_read(){
            $this->db->query('SELECT *,
                            reply.type as rType,
                            reply.replied_at as rCreated_at
                            FROM reply 
                            INNER JOIN users
                            on reply.reply_sender = users.user_id
                            INNER JOIN comment
                            ON reply.parent_comment = comment.comment_id
                            INNER JOIN topic 
                            ON comment.comment_for = topic.topic_id
                            INNER JOIN alumni
                            ON users.a_id = alumni.alumni_id
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
        
        // public function survey_list_read(){
        //     $this->db->query('SELECT * from events');
        //     $row = $this->db->resultSet();
        //     return $row;
        // }

    }