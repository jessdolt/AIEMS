<?php 

class promosAdvertisement {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function addPromosAdvertisement($data) {
     
        $this->db->query('INSERT INTO promos_advertisement(title, date_of_advertisement, image, quantity, user_type, posted_by, created_on) VALUES (:schoolname, :logo)');

        $this->db->bind(':title', $data->title);
        $this->db->bind(':date_of_advertisement', $data->date_of_advertisement);
        $this->db->bind(':image', $data->image);
        $this->db->bind(':quantity', $data->quantity);
        $this->db->bind(':user_type', $data->user_type);
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