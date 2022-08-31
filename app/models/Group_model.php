<?php 

    class Group_model{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function showClassification(){
            $this->db->query('SELECT *
                             FROM classification 
                            
                             INNER JOIN courses
                             ON classification.course_id = courses.id
                             INNER JOIN batch
                             ON classification.batch_id = batch.id
                             INNER JOIN department
                             ON courses.department_id = department.id
                             order by batch.year asc
                            ');
                            
            $row = $this->db->resultSet();

            if($row > 0){
                return $row;
            }
        }

        public function addDepartment($data){
            $this->db->query('INSERT INTO department(department_name) VALUES (:dept_name)');

            $this->db->bind(':dept_name', $data['dept_name']);
            try{
                if($this->db->execute()){
                    flash('department_add_success', 'Department successfully added');
                    redirect('admin/alumni');
                }
            }
            catch (PDOException $e){
                // $msgData = [
                //     'errorMsg' => 'Batch '. $data['batch'] . ' is already in Database'
                // ];
                flash('department_duplicate', ''.$data['dept_name'].' is already existed', 'errorAlert');
                redirect('alumni/duplicationError/'. $data['dept_name']);
            }
        }
        

        public function addCourse($data){
            $this->db->query('INSERT INTO courses(course_name,course_code,department_id) VALUES (:course_name,:course_code,:department_id)');

            $this->db->bind(':course_name', $data['course_name']);
            $this->db->bind(':course_code', $data['course_code']);
            $this->db->bind(':department_id', $data['department_id']);
            try{
                if($this->db->execute()){
                    $this->insertBatch($data['course_code']);
                }
            }
            catch (PDOException $e){
                flash('course_code_duplicate', ''.$data['course_code'].' is already existed', 'errorAlert');
                redirect('alumni/duplicationError/'. $data['course_code']);
            }
        }
        
        public function addBatch($data){
            $this->db->query('INSERT INTO batch(year) VALUES (:year)');
            $this->db->bind(':year', $data['batch']);
            try{
                if($this->db->execute()){
                    $this->insertGroup($data['batch']);
                }
            }
            catch (PDOException $e){
                flash('batch_duplicate', 'Batch '.$data['batch'].' is already existed', 'errorAlert');
                redirect('alumni/duplicationError/'. $data['batch']);
            } 
        }

        public function insertGroup($year){
            $count = 0;
            $this->db->query('SELECT * from courses');
            $rowCourse= $this->db->resultSet();

            $this->db->query('SELECT id from batch where year=:year');
            $this->db->bind(':year', $year);
            $rowBatch = $this->db->single();

            foreach($rowCourse as $course){
                $this->db->query('INSERT INTO classification(course_id,batch_id) VALUES (:course_id,:batch_id)');
                $this->db->bind(':course_id', $course->id);
                $this->db->bind(':batch_id', $rowBatch->id);
                $this->db->execute();
                $count++;
            }

            if($count === count($rowCourse)){
                flash('batch_add_success', 'Batch successfully added');
                redirect('admin/alumni');
            }

            
        }

        public function insertBatch($course){
            $count = 0;
            $this->db->query('SELECT * from batch');
            $rowBatch = $this->db->resultSet();

            $this->db->query('SELECT id from courses where course_code=:course_code');
            $this->db->bind(':course_code', $course);
            $rowCourse = $this->db->single();

            foreach($rowBatch as $batch){
                $this->db->query('INSERT INTO classification(course_id,batch_id) VALUES (:course_id,:batch_id)');
                $this->db->bind(':course_id', $rowCourse->id);
                $this->db->bind(':batch_id', $batch->id);
                $this->db->execute();
                $count++;
            }

            if($count === count($rowBatch)){
                flash('course_add_success', 'Course successfully added');
                redirect('admin/alumni');
            }
        }



        ///edit functions
       
        public function getDepartmentById($dept_id){
            $this->db->query('SELECT * FROM department WHERE id=:dept_id');
            $this->db->bind(':dept_id', $dept_id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function updateDepartment($data){
            $this->db->query('UPDATE department SET department_name = :dept_name WHERE id = :dept_id');
            $this->db->bind(':dept_name', $data['dept_name']);
            $this->db->bind(':dept_id', $data['dept_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        
        //course edit
        public function getDepartment(){
            $this->db->query('SELECT * FROM `department`');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }


        public function getCourseById($course_id){
            $this->db->query('SELECT * FROM courses WHERE id=:course_id');
            $this->db->bind(':course_id', $course_id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }


        public function updateCourse($data){
            $this->db->query('UPDATE courses SET course_name = :course_name, course_code = :course_code, department_id = :dept_id WHERE id = :course_id');
            $this->db->bind(':course_name', $data['course_name']);
            $this->db->bind(':course_code', $data['course_code']);
            $this->db->bind(':dept_id', $data['department_id']);
            $this->db->bind(':course_id', $data['course_id']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }


        //edit batch
        public function getBatchById($batch_id){
            $this->db->query('SELECT * FROM batch WHERE id=:batch_id');
            $this->db->bind(':batch_id', $batch_id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function updateBatch($data){
            $this->db->query('UPDATE batch SET year = :year WHERE id = :batch_id');
            $this->db->bind(':year', $data['year']);
            $this->db->bind(':batch_id', $data['batch_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }


        //delete 

        public function deleteDept($id){
            $this->db->query('DELETE FROM department WHERE id = :dept_id');

            $this->db->bind(':dept_id', $id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteCourse($id){
            $this->db->query('DELETE FROM courses WHERE id = :course_id');

            $this->db->bind(':course_id', $id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteBatch($id){
            $this->db->query('DELETE FROM batch WHERE id = :batch_id');

            $this->db->bind(':batch_id', $id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

}