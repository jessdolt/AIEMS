<?php
    class Admin_model {
        private $db;
        public function __construct() {
            $this->db = new Database;
        }

        public function single($id) {
            $this->db->query('SELECT * FROM admin WHERE user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0) {
                return $row;
            } else {
                return false;
            }
        }

        public function showAdmin($id) {
            $this->db->query('SELECT * FROM admin LEFT JOIN user_type ON admin.user_type = user_type.id WHERE user_control = "Admin" OR user_control = "Super Admin" AND user_id <> :user_id ORDER BY user_control = "Super Admin" DESC');
            $this->db->bind(':user_id', $id);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function showCc() {
            $this->db->query('SELECT * FROM admin LEFT JOIN user_type ON admin.user_type = user_type.id WHERE user_control = "Content Creator"');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function addAdmin($data) {
            $this->db->query('INSERT INTO users (name, password, email, user_type) VALUES (:name, :password, :email, :user_type)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':user_type', $data['user_type']);

            try{
                if($this->db->execute()){
                    return $this->db->getLastId();
                }
            }
            catch (PDOException $e){
                die('Something Went Wrong.');
            }
        }

        public function registerAdmin($newData){
            $this->db->query('INSERT INTO admin (user_id, name, email, user_type) VALUES (:user_id, :name, :email, :user_type)');
            $this->db->bind(':user_id', $newData['user_id']);
            $this->db->bind(':name', $newData['name']);
            $this->db->bind(':email', $newData['email']);
            $this->db->bind(':user_type', $newData['user_type']);
            
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function editProfile($data, $isUploaded){
            if($isUploaded == 1 ){
                $this->db->query('UPDATE admin SET name=:name, email=:email, birth_date=:birth_date, contact_no=:contact_no, image=:image WHERE user_id = :user_id');
    
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':birth_date', $data['birth_date']);
                $this->db->bind(':contact_no', $data['contact_no']);
                $this->db->bind(':image', $data['file']);
                $this->db->bind(':user_id', $data['user_id']);
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            } else{
                $this->db->query('UPDATE admin SET name=:name, email=:email, birth_date=:birth_date, contact_no=:contact_no WHERE user_id = :user_id');
    
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':birth_date', $data['birth_date']);
                $this->db->bind(':contact_no', $data['contact_no']);
                $this->db->bind(':user_id', $data['user_id']);
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
           
        }

        public function deleteAdmin($id){
            $this->db->query('SELECT * FROM admin WHERE user_id = (:id)');
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
                    $this->db->query('DELETE FROM users WHERE user_id = (:id)');
                    $this->db->bind(':id', $id);
    
                    if($this->db->execute()){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
            } else {
                $this->db->query('DELETE FROM users WHERE user_id = (:id)');
                $this->db->bind(':id', $id);

                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        public function getUserTypeIdCc() {
            $this->db->query('SELECT * FROM user_type WHERE user_control = "Content Creator"');
            $row = $this->db->single();
            if($row > 0){
                return $row;
            }
        }

        public function getUserTypeIdAdmin($id) {
            $this->db->query('SELECT * FROM user_type WHERE user_control = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($row > 0){
                return $row;
            }
        }


        public function checkPassword($data) {
            $this->db->query('SELECT * FROM users WHERE email = :email');

            //Bind value
            $this->db->bind(':email', $data['email']);
            $row = $this->db->single();
    
            if($this->db->rowCount() > 0) {
    
                $password = $data['password'];
                $hashedPassword = $row->password;
    
                if (password_verify($password, $hashedPassword)) {
                    return true;
                } else {
                    return false;
                }
    
            } else {
                return false;
            }
        }


    }