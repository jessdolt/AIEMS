<?php 

    class Event{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        /*        
        public function showEvent(){
            $this->db->query('SELECT * from events');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        } 
        */

        public function showEventHome(){
            $this->db->query('SELECT * FROM events ORDER BY created_at DESC LIMIT 3;');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function showEventsList(){
            $this->db->query('SELECT * FROM events ORDER BY created_at DESC LIMIT 10;');
                $row = $this->db->resultSet();
                if($row > 0){
                    return $row;
            }
        }

        public function showEventsIndex($page, $rowsperpage){
            $this->db->query('SELECT * FROM events ORDER BY created_at DESC LIMIT :page, :rowsperpage');
            $this->db->bind(':page', $page);
            $this->db->bind(':rowsperpage', $rowsperpage);
            
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function NoOfResults() {
            $this->db->query('SELECT ALL id FROM events'); 

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function NoOfResultsOld() {
            $this->db->query('SELECT ALL id FROM events ORDER BY created_at DESC LIMIT 18446744073709551610 OFFSET 10'); 

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function addEvent($data){
            $this->db->query('INSERT INTO events(title,description,image) VALUES (:title,:description,:image)');

            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':image', $data['file']);
            
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function editEvent($data,$isUploaded){
            if($isUploaded == 1 ){
                $this->db->query('UPDATE events set title=:title,description=:description,image=:image where id =:id');

                $this->db->bind(':title',$data['title']);
                $this->db->bind(':description',$data['description']);
                $this->db->bind(':image',$data['file']);
                $this->db->bind(':id',$data['id']);
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                $this->db->query('UPDATE events set title=:title,description=:description where id =:id');
                $this->db->bind(':title',$data['title']);
                $this->db->bind(':description',$data['description']);
                $this->db->bind(':id',$data['id']);
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
           
        }

        public function singleEvent($id){
            $this->db->query('SELECT * from events where id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function otherEvent($id){
            $this->db->query('SELECT * FROM events WHERE id <> :id ORDER BY created_at DESC LIMIT 5');
            $this->db->bind(':id', $id);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function deleteEvent($id){
            $this->db->query('SELECT * FROM events where id= (:id)');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0 ){
               $img = $row->image;
            }
            else{
                return false;
            }
            if(unlink(IMAGEROOT.$img)){
                $this->db->query('DELETE FROM events where id= (:id)');
                $this->db->bind(':id', $id);

                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
            
        }

        public function searchEvents($char){
            $this->db->query("SELECT * from events WHERE title like CONCAT('%', :test, '%') ORDER BY created_at desc");
            $this->db->bind(':test' , $char);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        // public function searchEvents($char){
        //     $this->db->query("SELECT * from events WHERE title like '%".$char."%'  ");
            
        //     $row = $this->db->resultSet();
        //     if($this->db->rowCount() > 0){
        //         return $row;
        //     }
        //     else{
        //         return false;
        //     }
        // }
    }