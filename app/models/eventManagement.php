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
     
        $this->db->query('INSERT INTO event_management (type, title, description, date, image, participants, posted_by) VALUES (:type, :title, :description, :date, :image, :participants, :posted_by)');

        $this->db->bind(':type', $data->type);
        $this->db->bind(':title', $data->title);
        $this->db->bind(':description', $data->description);
        $this->db->bind(':date', $data->date);
        $this->db->bind(':image', $data->image);
        $this->db->bind(':participants', $data->participants);
        $this->db->bind(':posted_by', $data->posted_by);
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
?>