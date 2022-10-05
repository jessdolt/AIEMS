<?php
    class Advertiser_model {
        private $db;
        public function __construct() {
            $this->db = new Database;
        }

        public function addAdvertiser($data) {
            $this->db->query('INSERT INTO users (name, password, email, user_type) VALUES (:name, :password, :email, :user_type)');
            $this->db->bind(':name', $data->name);
            $this->db->bind(':email', $data->email);
            $this->db->bind(':password', $data->password);
            $this->db->bind(':user_type', $data->user_type);
    
            if($this->db->execute()){
                return $this->db->getLastId();
            } else {
                return false;
            }
        }

        public function registerAdvertiser($lastId, $data) {
            $this->db->query('INSERT INTO advertiser (user_id, name, email, image, contact_no, address, user_type) VALUES (:user_id, :name, :email, :image, :contact_no, :address, :user_type)');
            $this->db->bind(':user_id', $lastId);
            $this->db->bind(':name', $data->name);
            $this->db->bind(':email', $data->email);
            $this->db->bind(':image', $data->logo);
            $this->db->bind(':contact_no', $data->contact_no);
            $this->db->bind(':address', $data->address);
            $this->db->bind(':user_type', $data->user_type);
            
            if($this->db->execute()){
                return true;
            } else{
                return false;
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

        public function indexRewards() {
            $this->db->query('SELECT *
            FROM reference_code AS a
            LEFT JOIN promos_advertisement AS b
            ON a.promoid = b.promoid
            WHERE b.date <= CURDATE() AND b.is_approved = "1"
            ORDER BY b.date DESC
            ;');
    
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
        }

        


    }

    
?>