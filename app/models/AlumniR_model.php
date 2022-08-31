<?php

    class AlumniR_model {
        private $db;
        public function __construct() {
            $this->db = new Database;
        }

        public function showAlumniIndex($newData) {
                $this->db->query('SELECT * 
                                FROM employment
                                INNER JOIN alumni
                                ON employment.alumni_id = alumni.alumni_id
                                INNER JOIN batch
                                ON alumni.batchID = batch.id
                                LIMIT :start, :limit
                                ');
            $this->db->bind(':start', $newData['start']);
            $this->db->bind(':limit', $newData['limit']);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function searchAlumniReport($char){
            $this->db->query("SELECT * from employment 
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            WHERE first_name like CONCAT('%', :test, '%') 
                            OR last_name like CONCAT('%', :test, '%')
                            OR student_no like CONCAT('%', :test, '%')
                            ");
            $this->db->bind(':test' , $char);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function showAlumniFiltered($newData) {
            $this->db->query('SELECT * FROM employment 
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN batch
                            ON batch.id = alumni.batchID 
                            INNER JOIN courses
                            ON courses.id = alumni.courseID
                            WHERE employment.date_responded 
                            BETWEEN :dt1 AND :dt2
                            LIMIT :start, :limit');

            $this->db->bind(':dt1', $newData['startDate']);
            $this->db->bind(':dt2', $newData['endDate']);
            $this->db->bind(':start', $newData['start']);
            $this->db->bind(':limit', $newData['limit']);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function NoOfResultsFiltered($newData) {
            $this->db->query('SELECT ALL employment_id FROM employment
                            WHERE employment.date_responded 
                            BETWEEN :dt1 AND :dt2
                            LIMIT :start, :limit
                            ');
                $this->db->bind(':start', $newData['start']);
                $this->db->bind(':limit', $newData['limit']);
                $this->db->bind(':dt1', $newData['startDate']);
                $this->db->bind(':dt2', $newData['endDate']);

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }
        
        public function showAlumniBatch($newData) {

            $this->db->query('SELECT * 
                            FROM employment
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            WHERE alumni.batchID = :batch
                            LIMIT :start, :limit
                            ');
            $this->db->bind(':batch', $newData['batch']);
            $this->db->bind(':start', $newData['start']);
            $this->db->bind(':limit', $newData['limit']);
            $row = $this->db->resultSet();
                if($row > 0){
                return $row;
                }
        }

              
        public function showAlumniBatchFiltered($newData) {

            $this->db->query('SELECT * 
                            FROM employment
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            WHERE alumni.batchID = :batch 
                            AND employment.date_responded 
                            BETWEEN :dt1 AND :dt2
                            LIMIT :start, :limit
                            ');
            $this->db->bind(':batch', $newData['batch']);
            $this->db->bind(':dt1', $newData['startDate']);
            $this->db->bind(':dt2', $newData['endDate']);
            $this->db->bind(':start', $newData['start']);
            $this->db->bind(':limit', $newData['limit']);
            $row = $this->db->resultSet();
                if($row > 0){
                return $row;
                }
        }

        public function NoOfResultsBatchFiltered($newData){
            $this->db->query('SELECT ALL employment_id
                            FROM employment
                            INNER JOIN alumni 
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN courses 
                            ON alumni.courseID = courses.id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            WHERE alumni.batchID = :batch_id
                            AND employment.date_responded 
                            BETWEEN :dt1 AND :dt2
                            LIMIT :start, :limit
                            ');
            $this->db->bind(':batch_id', $newData['batch']);
            $this->db->bind(':start', $newData['start']);
            $this->db->bind(':limit', $newData['limit']);
            $this->db->bind(':dt1', $newData['startDate']);
            $this->db->bind(':dt2', $newData['endDate']);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function showAlumniBatchAndCourse($newData) {
            $this->db->query('SELECT * 
                            FROM employment
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            WHERE alumni.batchID = :batch AND alumni.courseID = :course
                            LIMIT :page, :rowsperpage
                            ');
            $this->db->bind(':batch', $newData['batch']);
            $this->db->bind(':course', $newData['course']);
            $this->db->bind(':page', $newData['start']);
            $this->db->bind(':rowsperpage', $newData['limit']);
            $row = $this->db->resultSet();
                if($row > 0){
                return $row;
                }
            }

            public function showAlumniBatchAndCourseFiltered($newData) {
                $this->db->query('SELECT * 
                                FROM employment
                                INNER JOIN alumni
                                ON employment.alumni_id = alumni.alumni_id
                                INNER JOIN batch
                                ON alumni.batchID = batch.id
                                WHERE alumni.batchID = :batch AND alumni.courseID = :course 
                                AND employment.date_responded 
                                BETWEEN :dt1 AND :dt2
                                LIMIT :start, :limit
                                ');
                $this->db->bind(':batch', $newData['batch']);
                $this->db->bind(':course', $newData['course']);
                $this->db->bind(':dt1', $newData['startDate']);
                $this->db->bind(':dt2', $newData['endDate']);
                $this->db->bind(':start', $newData['start']);
                $this->db->bind(':limit', $newData['limit']);
                $row = $this->db->resultSet();
                    if($row > 0){
                    return $row;
                    }
                }
    
                public function NoOfResultsBatchAndCourseFiltered($newData){
                    $this->db->query('SELECT ALL employment_id
                                    FROM employment
                                    INNER JOIN alumni 
                                    ON employment.alumni_id = alumni.alumni_id
                                    INNER JOIN courses 
                                    ON alumni.courseID = courses.id
                                    INNER JOIN batch
                                    ON alumni.batchID = batch.id
                                    WHERE alumni.batchID = :batch_id AND alumni.courseID = :course_id
                                    AND employment.date_responded 
                                    BETWEEN :dt1 AND :dt2
                                    LIMIT :start, :limit
                                    ');
                    $this->db->bind(':batch_id', $newData['batch']);
                    $this->db->bind(':course_id', $newData['course']);
                    $this->db->bind(':dt1', $newData['startDate']);
                    $this->db->bind(':dt2', $newData['endDate']);
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

            // SELECT * FROM employment 
            //                 INNER JOIN alumni
            //                 ON employment.alumni_id = alumni.alumni_id
            //                 INNER JOIN batch
            //                 ON batch.id = alumni.batchID 
            //                 INNER JOIN courses
            //                 ON courses.id = alumni.courseID
            //                 WHERE alumni.batchID = 22 AND alumni.courseID = 38
            //                 AND month(employment.date_responded) BETWEEN '01' and '06'
            //                 LIMIT :page, :rowsperpage

            // SELECT * FROM employment 
            //                 INNER JOIN alumni
            //                 ON employment.alumni_id = alumni.alumni_id
            //                 INNER JOIN batch
            //                 ON batch.id = alumni.batchID 
            //                 INNER JOIN courses
            //                 ON courses.id = alumni.courseID
            //                 WHERE alumni.batchID = 22 AND alumni.courseID = 38
            //                 AND month(employment.date_responded) BETWEEN '07' and '12'

                            

        public function NoOfResults() {
            $this->db->query('SELECT ALL employment_id FROM employment'); 

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }


        public function NoOfResultsBatch($newData){
            $this->db->query('SELECT ALL employment_id
                            FROM employment
                            INNER JOIN alumni 
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN courses 
                            ON alumni.courseID = courses.id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            WHERE alumni.batchID = :batch_id
                            LIMIT :start, :limit
                            ');
            $this->db->bind(':batch_id', $newData['batch']);
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

        public function NoOfResultsBatchAndCourse($newData){
            $this->db->query('SELECT ALL employment_id
                            FROM employment
                            INNER JOIN alumni 
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN courses 
                            ON alumni.courseID = courses.id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            WHERE alumni.batchID = :batch_id AND alumni.courseID = :course_id
                            LIMIT :start, :limit
                            ');
            $this->db->bind(':batch_id', $newData['batch']);
            $this->db->bind(':course_id', $newData['course']);
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

        
        
        public function getYear($id) {
            $this->db->query('SELECT * FROM batch WHERE id = :batch_id');
            $this->db->bind(':batch_id', $id);
                $row = $this->db->single();
                if($this->db->rowCount() > 0) {
                    return $row;
                }
        }


        public function allCount() {
            $this->db->query('SELECT ALL (employment_id) FROM employment');
                $row = $this->db->resultSet();
                if($this->db->rowCount() > 0) {
                    return $row;
                }
        }



        public function showCourses(){
            $this->db->query('SELECT * FROM `courses`');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function showBatch(){
            $this->db->query('SELECT * FROM `batch`');
            $row = $this->db->resultSet();
            if($row > 0) {
                return $row;
            }
        }

        public function getAlumniByBatch($batch) {
            $this->db->query('SELECT * FROM employment 
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN batch
                            ON batch.id = alumni.batchID 
                            WHERE alumni.batchID = :batch');
            $this->db->bind(':batch', $batch);
            $row = $this->db->resultSet();
            if($row > 0) {
                return $row;
            } else {
                return false;
            }
        }
        

        public function getAlumniByCourse($batch, $course) {
            $this->db->query('SELECT * FROM employment 
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN batch
                            ON batch.id = alumni.batchID 
                            INNER JOIN courses
                            ON courses.id = alumni.courseID
                            WHERE alumni.batchID = :batch AND alumni.courseID = :course');
            $this->db->bind(':batch', $batch);
            $this->db->bind(':course', $course);
            $row = $this->db->resultSet();
            if($row > 0) {
                return $row;
            } else {
                return false;
            }
        }

        public function alumniCountPerBatch() {
            $this->db->query('SELECT * FROM batch');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $this->getCountPerBatch($row);
            }
        }

        public function getCountPerBatch($batch) {
            $batchCount = array();

            foreach($batch as $newBatch){
                $this->db->query('SELECT ALL batchID FROM employment
                                INNER JOIN alumni
                                ON employment.alumni_id = alumni.alumni_id
                                WHERE batchID = :batchID');
                $this->db->bind(':batchID', $newBatch->id);
                $row = $this->db->resultSet();
                $newRow = [
                    'alumniCount' => count($row),
                    'batchID' => $newBatch->id
                ];
                array_push($batchCount, $newRow);
            }

            return $batchCount;
        }

        public function getAlumniSingle($id) {
            $this->db->query('SELECT * 
                            FROM employment
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id 
                            INNER JOIN courses
                            ON alumni.courseID = courses.id
                            WHERE employment.employment_id = :id
            ');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
        }

        public function selectExport($id) {
            $this->db->query('SELECT student_no AS "Student No", 
                            last_name AS "Last Name",
                            first_name AS "First Name",
                            middle_name as "Middle Name",
                            course as "Course",
                            graduation as "Date Graduated",
                            status as "Status",
                            first_employment as "First Employment Date",
                            current_employment as "Current Employment",
                            type_of_work as "Type of Work",
                            work_position as "Work Position",
                            monthly_income as "Monthly Income",
                            if_related as "Course Related",
                            date_responded as "Date Responded"
                            FROM employment 
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            WHERE employment_id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
        }

        
 

    }

    