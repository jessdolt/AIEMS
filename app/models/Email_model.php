<?php 

    class Email_model{
        private $db;
        public function __construct(){
            $this->db = new Database;
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

        public function showAlumniNotSent(){
            $this->db->query('SELECT * from users where a_id IS NOT NULL AND isSend = 0');
            $row  = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function updateSend($alumni_id){
            $this->db->query('UPDATE users set isSend = 1 WHERE a_id = :alumni_id');
            $this->db->bind(':alumni_id', $alumni_id);
            if($this->db->execute()){
                return true;
            }
            else{
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

        public function findEmailDuplicate($email) {
            //Prepared statement
            $this->db->query('SELECT * FROM pwdreset WHERE pwdResetEmail = :email');
    
            //Email param will be binded with the email variable
            $this->db->bind(':email', $email);
            $this->db->single();
    
            //Check if email is already registered
            if($this->db->rowCount() > 0) {
                $this->db->query('DELETE FROM pwdreset WHERE pwdResetEmail = :email');
                $this->db->bind(':email', $email);
                    if($this->db->execute()){
                        return true;
                    }
                    else{
                        return false;
                    }
            } else {
                return false;
            }
        }

        public function forgot($data) {
            $this->db->query('INSERT INTO pwdreset (pwdResetEmail, pwdResetToken, pwdResetCode, pwdResetExpires) VALUES (:email, :token, :code, :expires)');
        
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':token', $data['token']);
            $this->db->bind(':code', $data['code']);
            $this->db->bind(':expires', $data['expires']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function findCode($data) {
            $this->db->query('SELECT * FROM pwdreset WHERE pwdResetToken = :resetToken');
            $this->db->bind(':resetToken', $data['token']);
            $row = $this->db->single();
    
            if($this->db->rowCount() > 0) {
    
                $expires = $row->pwdResetExpires;
    
                if ($expires > date("U")) { 
    
                    $codedb = $row->pwdResetCode;
                    if ($data['code'] == $codedb) {
                        return true;
                    }
                    else {
                        return false;
                    }
                } 
                else {
                    return false;
                }
            }
            else {
                return false;
            }
        }

        // DELETE AFTER CHANGING PASSWORD
        public function deleteRequest($email) {
            $this->db->query('DELETE FROM pwdreset WHERE pwdResetEmail = :email');
            $this->db->bind(':email', $email);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }