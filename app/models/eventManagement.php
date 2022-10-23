<?php 

class eventManagement {

    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function singleEvent($id) {
        $this->db->query('SELECT * FROM event_management WHERE id = :id');
        $this->db->bind(':id', $id);

       $row = $this->db->single();
        if($this->db->rowCount() > 0 ){
           return $row;
        }
    }

    public function getAllEvents() {
        $this->db->query('SELECT a.*, b.name FROM event_management AS a LEFT JOIN users AS b ON a.posted_by = b.user_id');
        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
    }

    public function yourEvents($id) {
        $this->db->query('SELECT * FROM event_management WHERE posted_by = :id;');
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
    }

    public function upcomingEvents($id) {
    
        $this->db->query('SELECT * FROM `event_management` WHERE start >= CURDATE() AND isApproved = 1 AND :id != posted_by ORDER BY start DESC LIMIT 3');
        $this->db->bind(':id', $id);

        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
    }

    public function addEvent($data) {
     
        $this->db->query('INSERT INTO event_management (type, title, description, start, end, image, posted_by, created_on) VALUES (:type, :title, :description, :start, :end, :image, :posted_by, :created_on)');

        $this->db->bind(':type', $data->type);
        $this->db->bind(':title', $data->title);
        $this->db->bind(':description', $data->description);
        $this->db->bind(':start', $data->start);
        $this->db->bind(':end', $data->end);
        $this->db->bind(':image', $data->image);
        $this->db->bind(':posted_by', $data->posted_by);
        $this->db->bind(':created_on', date("Y-m-d H:i:s"));
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteEvent($id){
        $this->db->query('SELECT * FROM event_management WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        if($this->db->rowCount() > 0 ){
           $img = $row->image;
        }
        else{
            return false;
        }

        if(unlink(IMAGEROOT.$img)) {
            $this->db->query('DELETE FROM event_management WHERE id = :id');
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