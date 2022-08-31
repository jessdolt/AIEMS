<?php

    class Alumni_model{
        private $db;
        public function __construct() {
            $this->db = new Database;
        }

        public function showAlumni() {
            $this->db->query('SELECT * 
                            FROM alumni
                            INNER JOIN courses
                            ON alumni.courseID = courses.id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            ');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function searchAlumni($char) {
            $this->db->query("SELECT * 
                            FROM alumni
                            INNER JOIN courses
                            ON alumni.courseID = courses.id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            WHERE first_name like CONCAT('%', :test, '%') OR last_name like CONCAT('%', :test, '%')
                            OR student_no like CONCAT('%', :test, '%')
                            ");
            $this->db->bind(':test',$char);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function showAlumniIndex($page, $rowsperpage) {
            $this->db->query('SELECT * 
                            FROM alumni
                            INNER JOIN courses
                            ON alumni.courseID = courses.id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            LIMIT :page, :rowsperpage
                            ');
            $this->db->bind(':page', $page);
            $this->db->bind(':rowsperpage', $rowsperpage);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function NoOfResults() {
            $this->db->query('SELECT ALL alumni_id FROM alumni'); 

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }



        public function alumniCountPerCourse(){
            $this->db->query('SELECT * FROM courses');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $this->getCountPerCourse($row);
            }    
        }

        public function getCountPerCourse($courses){
            $courseCount = array();

            foreach($courses as $course){
                $this->db->query('SELECT ALL courseID FROM alumni WHERE courseID = :course_id');
                $this->db->bind(':course_id', $course->id);
                $row = $this->db->resultSet();
                $newRow = [
                    'alumniCount' => count($row),
                    'courseID' => $course->id
                ];
                array_push($courseCount, $newRow);
            }

            return $courseCount;
        }



        public function showDepartment(){
            $this->db->query('SELECT * FROM `department`');
            $row = $this->db->resultSet();
            if($row > 0){
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


        public function showYear(){
            $this->db->query('SELECT * FROM `department` inner join `classification` on department.id = classification.dept_id left join `batch` on classification.batch_id = batch.id where department.id');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }


        public function addAlumni($data){
            $this->db->query('INSERT INTO alumni (student_no,last_name,first_name,middle_name,auxiliary_name,gender,civil,birth_date,address,city,region,postal,contact_no,email,courseID,batchID
            ) VALUES (:student_no,:last_name,:first_name,:middle_name,:auxiliary_name,:gender,:civil, :birth_date,:address,:city,:region,:postal,:contact_no,:email,:course,:batch)');
            
            
            $this->db->bind(':student_no', $data['student_no']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':middle_name', $data['middle_name']);
            $this->db->bind(':auxiliary_name', $data['auxiliary']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':civil', $data['civil']);
            $this->db->bind(':birth_date', $data['birth_date']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':region', $data['region']);
            $this->db->bind(':postal', $data['postal']);
            $this->db->bind(':contact_no', $data['contact_no']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':course', $data['course']);
            $this->db->bind(':batch', $data['batch']);

            try{
                if($this->db->execute()){
                    return $this->db->getLastId();
                }
            }
            catch (PDOException $e){
                // $msgData = [
                //     'errorMsg' => 'Batch '. $data['batch'] . ' is already in Database'
                // ];
                    redirect('group/duplicateError');
            }
        }

        public function addBulkAlumni($data){
            $this->db->query('INSERT INTO alumni(student_no, last_name, first_name, middle_name, gender, birth_date ,email, contact_no, courseID, batchID) VALUES (:student_no, :last_name, :first_name, :middle_name, :gender, :birth_date, :email, :contact_no, :course, :batch)');

            $this->db->bind(':student_no', $data['student_no']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':middle_name', $data['middle_name']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':birth_date', $data['birth_date']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':contact_no', $data['contact_no']);
            $this->db->bind(':course', $data['course']);
            $this->db->bind(':batch', $data['batch']);
            
            if($this->db->execute()){
                return $this->db->getLastId();
            } else{
                return false;
            }
        }

        
        public function addDepartment($data){
            $this->db->query('INSERT INTO department (department,departmentCode) VALUES (:department,:departmentCode)');

            $this->db->bind(':department', $data['department']);
            $this->db->bind(':departmentCode', $data['departmentCode']);
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }


        public function addBatch($data){
            $this->db->query('INSERT INTO batch (batch) VALUES (:batch)');

            $this->db->bind(':batch', $data['batch']);

            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }


        public function editAlumni($data){
            $this->db->query('UPDATE alumni SET first_name = :first_name , last_name =:last_name, middle_name= :middle_name, auxiliary_name=:auxiliary_name, birth_date = :birth_date, civil=:civil, gender = :gender, address = :address, city = :city, region = :region, postal = :postal,contact_no = :contact_no, email = :email, courseID = :course, batchID = :batch WHERE alumni_id =:id');
        
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':auxiliary_name', $data['auxiliary']);
        $this->db->bind(':birth_date', $data['birth_date']);
        $this->db->bind(':civil', $data['civil']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':region', $data['region']);
        $this->db->bind(':postal', $data['postal']);
        $this->db->bind(':contact_no', $data['contact_no']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':course', $data['course']);
        $this->db->bind(':batch', $data['batch']);
        $this->db->bind(':id',$data['id']);

        if($this->db->execute()) {
            return true;
            } 
        else {
            return false;
            }
        }

        public function editDepartment($data){
            $this->db->query('UPDATE department SET department = :department WHERE id = :id');

            $this->db->bind(':department', $data['department']);
            $this->db->bind('departmentID',$data['departmentID']);
            $this->db->bind(':id',$data['id']);
        }

        public function deleteAlumni($id){
            $this->db->query('SELECT * FROM alumni where alumni_id= (:id)');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0 ){
               $img = $row->image;
            }
            else{
                return false;
            }
            if(!empty($img)) {
                if(unlink(IMAGEROOT.$img)){
                    $this->db->query('DELETE FROM alumni where alumni_id= (:id)');
                    $this->db->bind(':id', $id);

                    if($this->db->execute()){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
            }  else {
                $this->db->query('DELETE FROM alumni WHERE alumni_id = (:id)');
                $this->db->bind(':id', $id);

                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
            
        }

        public function deleteDepartment($id) {
            $this->db->query('DELETE FROM department WHERE departmentID = (:departmentID)');

            $this->db->bind(':departmentID', $id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function getAlumniById($id){
            $this->db->query('SELECT * FROM alumni WHERE alumni_id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

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

        public function getBatchById($id){
            $this->db->query('SELECT * FROM batch WHERE id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

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

        public function getAlumniByClass($course_id,$batch_id){
            $this->db->query('SELECT * 
                            FROM alumni
                            INNER JOIN courses 
                            ON alumni.courseID = courses.id
                            INNER JOIN batch
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

    