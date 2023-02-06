<?php

    class Generate_report_model{
        private $db;
        public function __construct() {
            $this->db = new Database;
        }

        public function addReport($data){
            $this->db->query('INSERT INTO generate_report (type,year,chosen,notedBy,approvedBy,preparedBy) VALUES (:type,:year,:chosen,:notedBy,:approvedBy,:preparedBy)');

            $this->db->bind(':type', $data['type']);
            $this->db->bind(':year', $data['year']);
            $this->db->bind(':chosen', $data['chosen']);
            $this->db->bind(':notedBy', $data['notedBy']);
            $this->db->bind(':approvedBy', $data['approvedBy']);
            $this->db->bind(':preparedBy', $data['preparedBy']);

            if($this->db->execute()){
                return $this->db->getLastId();
            } else{
                return false;
            }
        }

        public function fetchReport($id){
            $this->db->query('SELECT * 
                            FROM generate_report WHERE id=:id
                            ');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }


        public function getColleges(){
            $this->db->query('SELECT * 
                            FROM department
                            ');

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getCollegeById($id){
            $this->db->query('SELECT * 
                            FROM department WHERE id=:id
                            ');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getCourses(){
            $this->db->query('SELECT * 
                            FROM courses
                            ');

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getBatches(){
            $this->db->query('SELECT * 
                            FROM batch
                            ');

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getBatchById($id){
            $this->db->query('SELECT * 
                            FROM batch WHERE id = :id 
                            ');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getCourseByCollegeId($id){
            $this->db->query('SELECT * FROM courses WHERE department_id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getClassficationByCourseId($id){
            $this->db->query('SELECT * FROM classification WHERE course_id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        
        public function getClassificationByBatchId($id){
            $this->db->query('SELECT * FROM classification WHERE batch_id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }


        
        public function getAlumniByClass($course_id,$batch_id){
            $this->db->query('SELECT student_no, alumni_id, last_name, first_name, middle_name, auxiliary_name, gender, contact_no, email, employment
                            FROM alumni
                            LEFT JOIN courses 
                            ON alumni.courseID = courses.id
                            LEFT JOIN batch
                            ON alumni.batchID = batch.id 
                            
                            WHERE courseID=:course_id AND batchID=:batch_id  
                            ');
            $this->db->bind(':course_id', $course_id);
            $this->db->bind(':batch_id', $batch_id);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
            else{
                return false;
            }
        }


        public function getEmployementResult($alumni_id,$year){
            $this->db->query('SELECT b.student_no,  b.alumni_id, b.last_name, b.first_name, b.middle_name, b.auxiliary_name, b.gender, b.contact_no, b.email, b.employment, a.work_position, a.if_related, a.status, a.type_of_work, a.date_responded
                            FROM employment AS a
                            LEFT JOIN alumni AS b
                            ON a.alumni_id = b.alumni_id
                            WHERE a.alumni_id=:alumni_id AND YEAR(a.date_responded) = :year
                            ');

            $this->db->bind(':alumni_id', $alumni_id);
            $this->db->bind(':year', $year);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
            else{
                return false;
            }
        }


        // new is above


        public function getDepartmentById($id){
            $this->db->query('SELECT * FROM department WHERE id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getCourseById($id){
            $this->db->query('SELECT * FROM courses WHERE id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getCourseByCode($course_code){
            $this->db->query('SELECT * FROM courses WHERE course_code=:course_code');
            $this->db->bind(':course_code', $course_code);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        // public function getBatchById($id){
        //     $this->db->query('SELECT * FROM batch WHERE id=:id');
        //     $this->db->bind(':id', $id);
        //     $row = $this->db->single();
        //     if($this->db->rowCount() > 0){
        //         return $row;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        public function getBatchByYear($year){
            $this->db->query('SELECT * FROM batch WHERE year=:year');
            $this->db->bind(':year', $year);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        // public function getAlumniByClass($course_id,$batch_id){
        //     $this->db->query('SELECT * 
        //                     FROM alumni
        //                     INNER JOIN courses 
        //                     ON alumni.courseID = courses.id
        //                     INNER JOIN batch
        //                     ON alumni.batchID = batch.id
        //                     WHERE courseID=:course_id AND batchID=:batch_id 
        //                     ');
        //     $this->db->bind(':course_id', $course_id);
        //     $this->db->bind(':batch_id', $batch_id);
        //     $row = $this->db->resultSet();
        //     if($row > 0){
        //         return $row;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        public function getAlumniByClassIndex($newData){
            $this->db->query('SELECT * 
                            FROM alumni
                            INNER JOIN courses 
                            ON alumni.courseID = courses.id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            WHERE courseID=:course_id AND batchID=:batch_id
                            LIMIT :start, :limit
                            ');
            $this->db->bind(':course_id', $newData['course_id']);
            $this->db->bind(':batch_id', $newData['batch_id']);
            $this->db->bind(':start', $newData['start']);
            $this->db->bind(':limit', $newData['limit']);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function NoOfResultsFiltered($newData){
            $this->db->query('SELECT ALL alumni_id
                            FROM alumni
                            INNER JOIN courses 
                            ON alumni.courseID = courses.id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            WHERE courseID=:course_id AND batchID=:batch_id
                            LIMIT :start, :limit
                            ');
            $this->db->bind(':course_id', $newData['course_id']);
            $this->db->bind(':batch_id', $newData['batch_id']);
            $this->db->bind(':start', $newData['start']);
            $this->db->bind(':limit', $newData['limit']);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
            else{
                return false;
            }
        }


        public function checkAlumni($student_no){
            $this->db->query('SELECT * from alumni WHERE student_no = :student_no' );

            $this->db->bind(':student_no', $student_no);
            $row = $this->db->single();
            
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

    }

    