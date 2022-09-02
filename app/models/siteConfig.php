<?php 

    class siteConfig {
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

        public function singleSiteConfig($data){
            $this->db->query('SELECT * from siteconfig where id=:id');
            $this->db->bind(':id', $data);

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
            $this->db->query('UPDATE siteconfig SET schoolname=:schoolname, logo=:logo, heroimage=:heroimage, sitecolor=:sitecolor, sitecolor_dark=:sitecolor_dark, sitecolor_light=:sitecolor_light, sitecolor_secondary=:sitecolor_secondary updated_on=:updated_on WHERE id =:id');

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

        



    }