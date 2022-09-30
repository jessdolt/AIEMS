<?php 

class promosAdvertisement {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function allPromosAdvertisement() {
        $this->db->query('SELECT * FROM promos_advertisement ORDER BY created_on;');
        $row = $this->db->resultSet();
        if($row > 0){
            return $row;
        }
    }

    public function yourRedeemedRewards() {
        $this->db->query('SELECT * FROM promos_advertisement;');
        $row = $this->db->resultSet();
        if($row > 0){
            return $row;
        }
    }

    public function addPromosAdvertisement($data) {
     
        $this->db->query('INSERT INTO promos_advertisement (type, title, description, date, image, quantity, reference_code, duration, payment, gCashRefNumber, user_type, posted_by, created_on) 
        VALUES (:type, :title, :description, :date, :image, :quantity, :reference_code, :duration, :payment, :gCashRefNumber, :user_type, :posted_by, :created_on)');

        $this->db->bind(':type', $data->type);
        $this->db->bind(':title', $data->title);
        $this->db->bind(':description', $data->description);
        $this->db->bind(':date', $data->date);
        $this->db->bind(':image', $data->voucherImage);
        $this->db->bind(':quantity', $data->quantity);
        $this->db->bind(':reference_code', $data->referenceCode);
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

    public function addReferenceCode($data, $lastPromoId) {
        $this->db->query('INSERT INTO reference_code (promoid, code, quantity) VALUES (:promoid, :code, :quantity)');
        
        $this->db->bind(':promoid', $lastPromoId);
        $this->db->bind(':code', $data->referenceCode);
        $this->db->bind(':quantity', $data->quantity);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


}
?>