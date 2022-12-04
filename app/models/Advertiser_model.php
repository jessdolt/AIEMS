<?php
    class Advertiser_model {
        private $db;
        public function __construct() {
            $this->db = new Database;
        }

        public function allAdvertiser() {
            $this->db->query('SELECT * FROM advertiser');

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
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
            $this->db->bind(':contact_no', $data->mobileNumber);
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

        // public function indexRewards($id) {
        //     $this->db->query('SELECT *
        //     FROM reference_code AS a
        //     LEFT JOIN promos_advertisement AS b
        //     ON a.promoid = b.promoid
        //     WHERE b.date <= CURDATE() AND b.is_approved = 1 AND b.posted_by = :id
        //     ORDER BY b.date DESC
        //     ;');

        //     $this->db->bind(':id', $id);
    
        //     $row = $this->db->resultSet();
        //     if($this->db->rowCount() > 0){
        //         return $row;
        //     }
        // }

        public function indexRewards($id) {
            $this->db->query('SELECT * FROM promos_advertisement WHERE posted_by=:id;');
            
            $this->db->bind(':id', $id);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
        }

        public function addPromosAdvertisement($data) {
     
            $this->db->query('INSERT INTO promos_advertisement (type, title, description, date, image, quantity, duration, payment, gCashRefNumber, user_type, posted_by, created_on) 
            VALUES (:type, :title, :description, :date, :image, :quantity, :duration, :payment, :gCashRefNumber, :user_type, :posted_by, :created_on)');
    
            $this->db->bind(':type', $data->type);
            $this->db->bind(':title', $data->title);
            $this->db->bind(':description', $data->description);
            $this->db->bind(':date', $data->date);
            $this->db->bind(':image', $data->voucherImage);
            $this->db->bind(':quantity', $data->quantity);
            $this->db->bind(':duration', $data->duration);
            $this->db->bind(':payment', $data->payment);
            $this->db->bind(':gCashRefNumber', $data->gCashRefNumber);
            $this->db->bind(':user_type', $data->user_type);
            $this->db->bind(':posted_by', $data->posted_by);
            $this->db->bind(':created_on', date("Y-m-d H:i:s"));
            
            if($this->db->execute()){
                return $this->db->getLastId();
                // return true;
            } else {
                return false;
            }
        }
    
        public function addReferenceCode($lastPromoId, $data) {
            $this->db->query('INSERT INTO reference_code (promoid, code) VALUES (:promoid, :code)');
            
            $this->db->bind(':promoid', $lastPromoId);
            $this->db->bind(':code', $data->referenceCode);
    
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updateReferenceCode($id, $alumni_id) {
            $this->db->query('UPDATE reference_code SET used_quantity = (used_quantity + 1), redeemed_by = :alumni_id WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':alumni_id', $alumni_id);
    
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function editProfileAdvertiser($data, $id){
            $this->db->query('UPDATE advertiser SET name = :name, image=:image, contact_no=:mobileNumber, address=:address, email=:email WHERE user_id = :id');

            $this->db->bind(':name', $data->name);
            $this->db->bind(':image', $data->logo);
            $this->db->bind(':mobileNumber', $data->mobileNumber);
            $this->db->bind(':address', $data->address);
            $this->db->bind(':email', $data->email);
            $this->db->bind(':id', $id);
            
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function editProfileUser($data, $id){
            $this->db->query('UPDATE users SET name=:name, email=:email WHERE user_id =:id');

            $this->db->bind(':name', $data->name);
            $this->db->bind(':email', $data->email);
            $this->db->bind(':id', $id);
            
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }


        public function singleAdvertiserProfile($id){
            $this->db->query('SELECT * FROM advertiser WHERE user_id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        // public function checkOldPassword($data, $id) {
        //     $this->db->query('SELECT * FROM users WHERE user_id = :id');
    
        //     //Bind value
        //     $this->db->bind(':id', $id);
            
        //     if($this->db->rowCount() > 0) {

        //         $row = $this->db->single();
        //         $password = $data->currentPassword;
        //         $hashedPassword = $row->password;
    
        //         if (password_verify($password, $hashedPassword) || $password = $row->password) {
        //             return true;
        //         } else {
        //             return false;
        //         }
    
        //     } else {
        //         return false;
        //     }
        // }

        public function checkOldPassword($data) {
            $this->db->query('SELECT * FROM users WHERE user_id = :id');
    
            $this->db->bind(':id', $data->id);
            $row = $this->db->single();
            
            if($this->db->rowCount() > 0) {
                
                $password = $data->currentPassword;
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

        public function newPassword($id, $hashPassword) {
            $this->db->query('UPDATE users SET password=:password WHERE user_id = :id');

            $this->db->bind(':password', $hashPassword);
            $this->db->bind(':id', $id);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function approveAdvertiser($id) {
            $this->db->query('UPDATE advertiser SET is_approved = 1 WHERE user_id = :id');
            $this->db->bind(':id', $id);
    
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteAdvertiser($id){
            $this->db->query('SELECT * FROM advertiser WHERE user_id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
    
            if($this->db->rowCount() > 0 ){
               $img = $row->image;
            }
            else{
                return false;
            }
    
            if(unlink(IMAGEROOT.$img)) {
                $this->db->query('DELETE FROM advertiser WHERE user_id = :id');
                $this->db->bind(':id', $id);
    
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
    
        }

        public function deletePromo($id){
            $this->db->query('SELECT * FROM promos_advertisement WHERE promoid = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
    
            if($this->db->rowCount() > 0 ){
               $img = $row->image;
            }
            else{
                return false;
            }
    
            if(unlink(IMAGEROOT.$img)) {
                $this->db->query('DELETE FROM promos_advertisement WHERE promoid = :id');
                $this->db->bind(':id', $id);
    
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        

        


    }
?>