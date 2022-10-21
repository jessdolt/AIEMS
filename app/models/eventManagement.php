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


    public function addEvent($data) {
     
        $this->db->query('INSERT INTO event_management (type, title, description, start_date, end_date, image, participants, posted_by, created_on) VALUES (:type, :title, :description, :start_date, :end_date, :image, :participants, :posted_by, :created_on)');

        $this->db->bind(':type', $data->type);
        $this->db->bind(':title', $data->title);
        $this->db->bind(':description', $data->description);
        $this->db->bind(':start_date', $data->start_date);
        $this->db->bind(':end_date', $data->end_date);
        $this->db->bind(':image', $data->image);
        $this->db->bind(':participants', $data->participants);
        $this->db->bind(':posted_by', $data->posted_by);
        $this->db->bind(':created_on', date("Y-m-d H:i:s"));
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
?>