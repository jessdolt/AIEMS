<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    
    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        
        $row = $this->db->single();
        if($this->db->rowCount() > 0) {

            $hashedPassword = $row->password;

            if (password_verify($password, $hashedPassword) || $password == $row->password) {
                return $row;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public function validation($data){
        $this->db->query('SELECT * FROM alumni WHERE last_name = :last_name AND student_no = :student_no AND birth_date = :birth_date');
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':student_no', $data['student_no']);
        $this->db->bind(':birth_date', $data['birth_date']);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return $row;
        }
        else{
            return false;
        }
    }

    public function getUserTypeIdAlumni() {
        $this->db->query('SELECT * FROM user_type WHERE user_control = "Alumni"');
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return $row;
        }
    }


    public function getAlumni($a_id){
        $this->db->query('SELECT * FROM alumni WHERE alumni_id = :a_id');
        $this->db->bind(':a_id', $a_id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return $row;
        }
        else{
            return false;
        }
    }

    public function registerAlumni($data) {
        $this->db->query('INSERT INTO users(a_id,name,email, password, user_type) VALUES(:a_id,:name,:email,:password,:user_type)');
        $this->db->bind(':a_id', $data['a_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':user_type', $data['user_type']);
        
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }


    public function loginCount($date) {
        $this->db->query('UPDATE login_count SET visit_count = visit_count + :visit WHERE login_date = :date');
        $visit = 1;
        $this->db->bind(':date', $date);
        $this->db->bind(':visit', $visit);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function addLoginDate($date) {
        $this->db->query('INSERT INTO login_count(login_date) VALUES(:date)');
        $this->db->bind(':date', $date);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function checkLoginDate($date) {
        $this->db->query('SELECT login_date FROM `login_count` where login_date = :date');
        $this->db->bind(':date', $date);
        $row = $this->db->single();
        return $row;
    }

    // GET USER_CONTROL FROM TABLE USER_TYPE
    public function forSession($user) {
        
        $this->db->query('SELECT *
                        FROM users
                        LEFT JOIN user_type 
                        ON users.user_type = user_type.id 
                        LEFT JOIN alumni
                        ON users.a_id = alumni.alumni_id
                        WHERE users.email= :email');

        $this->db->bind(':email', $user->email);

        $row = $this->db->single();
        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function forSessionAdmin($user) {
        
        $this->db->query('SELECT *
                        FROM users
                        LEFT JOIN user_type 
                        ON users.user_type = user_type.id 
                        LEFT JOIN admin
                        ON users.user_id = admin.user_id
                        WHERE users.email= :email');

        $this->db->bind(':email', $user->email);

        $row = $this->db->single();
        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function register($data){
        $this->db->query('INSERT INTO users(name,a_id,email,password,user_type) VALUES (:name,:a_id,:email,:password,:user_type)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':a_id', $data['a_id']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':user_type', $data['user_type']);
        
        if($this->db->execute()){
            return true;
        } else{
            return false;
        }
    }

    // public function deleteUserByStudNo($studNo) {
    //     $this->db->query('DELETE FROM users WHERE student_no = :studNo');

    //     $this->db->bind(':studNo', $studNo);

    //     if($this->db->execute()){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }

    public function deleteUser($id) {
        $this->db->query('DELETE FROM users WHERE a_id = :alumni_id');

        $this->db->bind(':alumni_id', $id);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function newPassword($data) {
        $this->db->query('UPDATE users SET password=:password WHERE email=:email');

        //Bind values
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Find user by email.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);
        $this->db->single();

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function singleAlumni($alumni_id){
        $this->db->query('SELECT * from users where a_id =:alumni_id');
        $this->db->bind(':alumni_id', $alumni_id);
        $row  = $this->db->single();
        if($this->db->rowCount() > 0){
            return $row;
        }
        else{
            return false;
        }
    }

    public function singleUser($id){
        $this->db->query('SELECT * 
                        FROM alumni
                        INNER JOIN courses
                        ON alumni.courseID = courses.id
                        INNER JOIN batch
                        ON alumni.batchID = batch.id 
                        WHERE alumni_id = :alumni_id');
        $this->db->bind(':alumni_id', $id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return $row;
        }
        else{
            return false;
        }
    }

    public function singleAcc($id) {
        $this->db->query('SELECT * FROM users WHERE a_id = :alumni_id');
        $this->db->bind(':alumni_id', $id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return $row;
        }
        else{
            return false;
        }
    }

    public function userJoinUserType($user) {
        $this->db->query('SELECT * FROM users LEFT JOIN user_type ON users.user_type = user_type.id WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user->user_id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return $row;
        }
        else{
            return false;
        }
    }

    public function editProfile($data, $isUploaded){
        if($isUploaded == 1){
            $this->db->query('UPDATE alumni SET civil=:civil, auxiliary_name=:auxiliary_name, employment=:employment, address=:address, city=:city, region=:region, postal=:postal, contact_no=:contact_no, email=:email, image=:image WHERE alumni_id = :alumni_id');
            
            $this->db->bind(':civil', $data['civil']);
            $this->db->bind(':auxiliary_name', $data['auxiliary']);
            $this->db->bind(':employment', $data['employment']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':region', $data['region']);
            $this->db->bind(':postal', $data['postal']);
            $this->db->bind(':contact_no', $data['contact_no']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':image', $data['file']);
            $this->db->bind(':alumni_id', $data['alumni_id']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        } elseif(is_null($data['file'])) {
            $this->db->query('UPDATE alumni SET civil=:civil, auxiliary_name=:auxiliary_name, employment=:employment, address=:address, city=:city, region=:region, postal=:postal, contact_no=:contact_no, email=:email, image=:image WHERE alumni_id = :alumni_id');
            
            $this->db->bind(':civil', $data['civil']);
            $this->db->bind(':auxiliary_name', $data['auxiliary']);
            $this->db->bind(':employment', $data['employment']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':region', $data['region']);
            $this->db->bind(':postal', $data['postal']);
            $this->db->bind(':contact_no', $data['contact_no']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':image', $data['file']);
            $this->db->bind(':alumni_id', $data['alumni_id']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        } else {
            $this->db->query('UPDATE alumni SET civil=:civil, auxiliary_name=:auxiliary_name, employment=:employment, address=:address, city=:city, region=:region, postal=:postal, contact_no=:contact_no, email=:email WHERE alumni_id = :alumni_id');
            
            $this->db->bind(':civil', $data['civil']);
            $this->db->bind(':auxiliary_name', $data['auxiliary']);
            $this->db->bind(':employment', $data['employment']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':region', $data['region']);
            $this->db->bind(':postal', $data['postal']);
            $this->db->bind(':contact_no', $data['contact_no']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':alumni_id', $data['alumni_id']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
       
    }

    public function deletePhoto($id) {
        $this->db->query('SELECT * FROM alumni where alumni_id= (:id)');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0 ){
               $img = $row->image;
               unlink(IMAGEROOT.$img);
            }
            else{
                return false;
            }
    }

        //Insert into USERS IF first editProfile is DONE
        public function accVerified($newData) {
            $this->db->query('UPDATE users SET verify=:verify WHERE a_id = :alumni_id');
            $this->db->bind(':verify', $newData['verify']);
            $this->db->bind(':alumni_id', $newData['alumni_id']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function profileAdditionalAdd($data){
            $this->db->query('INSERT INTO employment (alumni_id, course, graduation, status, first_employment, current_employment, type_of_work, work_position, monthly_income, if_related, company_id) VALUES (:alumni_id, :course, :graduation, :status, :first_employment, :current_employment, :type_of_work, :work_position, :monthly_income, :if_related, :company_id)');
            $this->db->bind(':alumni_id', $data['alumni_id']);
            $this->db->bind(':course', $data['course']);
            $this->db->bind(':graduation', $data['gDate']);
            $this->db->bind(':status', $data['status']);
            $this->db->bind(':first_employment', $data['eDate']);
            $this->db->bind(':current_employment', $data['ceDate']);
            $this->db->bind(':type_of_work', $data['tWork']);
            $this->db->bind(':work_position', $data['wPosition']);
            $this->db->bind(':monthly_income', $data['mIncome']);
            $this->db->bind(':if_related', $data['ifRelated']);
            $this->db->bind(':company_id', $data['file']);
            
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function employment($id) {
            $this->db->query('SELECT * FROM employment WHERE alumni_id = :alumni_id');
            $this->db->bind(':alumni_id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            } else{
                return false;
            }
        }
        
        // IF profileAdditional is DONE
        public function additionalVerify($id) {
            $this->db->query('SELECT * FROM employment WHERE alumni_id = :alumni_id');
            $this->db->bind(':alumni_id', $id);
            $this->db->single();
    
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function checkOldPassword($data) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
    
            //Bind value
            $this->db->bind(':email', $data['email']);
            
            $row = $this->db->single();
    
            if($this->db->rowCount() > 0) {
    
                $password = $data['oldPassword'];
                $hashedPassword = $row->password;
    
                if (password_verify($password, $hashedPassword) || $password = $row->password) {
                    return $row;
                } else {
                    return false;
                }
    
            } else {
                return false;
            }
        }

        public function singleUserAlumniJoin($id){
            $this->db->query('SELECT * 
                            FROM alumni
                            INNER JOIN users
                            ON alumni.alumni_id = users.a_id
                            WHERE alumni_id = :alumni_id');
            $this->db->bind(':alumni_id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }
        
        public function getUserById($id){
            $this->db->query('SELECT * FROM users WHERE user_id = :id');
            $this->db->bind(':id', $id);
    
            $row = $this->db->single();
            return $row; 
        }

        public function updateEmployment($data) {
            $this->db->query('UPDATE alumni SET employment=:employment WHERE alumni_id = :alumni_id');
            $this->db->bind(':employment', $data['status']);
            $this->db->bind(':alumni_id', $data['alumni_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function privacyConsent($data) {
            $this->db->query('UPDATE users SET privacyConsent=:privacyConsent WHERE a_id = :alumni_id');
            $this->db->bind(':privacyConsent', $data['privacyConsent']);
            $this->db->bind(':alumni_id', $data['alumni_id']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
