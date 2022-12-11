<?php 

    class Siteconfig {
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function showSiteConfig(){
            $this->db->query('SELECT * FROM siteconfig');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            } else {
                return false;
            }
        }

        public function singleSiteConfig(){
            $this->db->query('SELECT * FROM siteconfig ORDER BY updated_on DESC LIMIT 1');

            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function addSiteConfig($data) {
     
            $this->db->query('INSERT INTO siteconfig(schoolname,logo) VALUES (:schoolname, :logo)');

            $this->db->bind(':schoolname', $data->schoolname);
            $this->db->bind(':logo', $data->logo);
            
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updateSiteConfig($data, $id){


            $this->db->query('UPDATE siteconfig SET schoolname=:schoolname, logo=:logo, heroimage=:heroimage, sitecolor=:sitecolor, sitecolor_dark=:sitecolor_dark, sitecolor_light=:sitecolor_light, sitecolor_secondary=:sitecolor_secondary, updated_on=:updated_on WHERE id =:id');

            $this->db->bind(':schoolname', $data->schoolname);
            $this->db->bind(':logo', $data->logo);
            $this->db->bind(':heroimage', $data->heroimage);
            $this->db->bind(':sitecolor', $data->sitecolor);
            $this->db->bind(':sitecolor_dark', $data->sitecolor_dark);
            $this->db->bind(':sitecolor_light', $data->sitecolor_light);
            $this->db->bind(':sitecolor_secondary', $data->sitecolor_secondary);
            $this->db->bind(':updated_on', date("Y-m-d H:i:s"));
            $this->db->bind(':id', $id);
            
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
           
        }

        // PUT  addAdmin($data, $hashPassword)
        public function addAdmin($data, $hashPassword) {
            $this->db->query('INSERT INTO users (name, email, password, user_type) VALUES (:name, :email, :password, :user_type)');
            $this->db->bind(':name', $data->name);
            $this->db->bind(':email', $data->email);
            $this->db->bind(':password', $hashPassword);
            $this->db->bind(':user_type', $data->user_type);

            try{
                if($this->db->execute()){
                    
                    return $this->db->getLastId();
                }
            }
            catch (PDOException $e){
                die('Something Went Wrong.');
            }
        }

        public function registerAdmin($newData, $isAdded){
            $this->db->query('INSERT INTO admin (user_id, name, email, user_type) VALUES (:user_id, :name, :email, :user_type)');
            $this->db->bind(':user_id', $isAdded);
            $this->db->bind(':name', $newData->name);
            $this->db->bind(':email', $newData->email);
            $this->db->bind(':user_type', $newData->user_type);
            
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        



    }
