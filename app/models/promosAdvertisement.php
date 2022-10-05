<?php 

class promosAdvertisement {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function allPromosAdvertisement() {
        $this->db->query('SELECT a.*, b.name FROM promos_advertisement AS a LEFT JOIN users AS b ON a.posted_by = b.a_id');
        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
    }

    public function allRewards($id) {
        $this->db->query('SELECT *
        FROM reference_code
        LEFT JOIN promos_advertisement
        ON reference_code.promoid = promos_advertisement.promoid
        WHERE promos_advertisement.posted_by != :id AND promos_advertisement.date <= CURDATE()
        ORDER BY promos_advertisement.date DESC
        ;');
        $this->db->bind(':id', $id);

        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
    }
    
    // AND is_approved = 1
    public function checkHasReferenceCode($id) {
        $this->db->query('SELECT * 
        FROM `promos_advertisement` AS a 
        LEFT JOIN `reference_code` AS b 
        ON a.promoid = b.promoid 
        WHERE b.quantity <> b.used_quantity 
        AND a.date <= CURDATE()
        AND a.promoid = :promoid
        AND is_approved = 1');
        $this->db->bind(':promoid', $id);

        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
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

    public function updatePromosAdvertisement($id) {
        $this->db->query('UPDATE promos_advertisement SET used_quantity = (used_quantity + 1) WHERE promoid = :id');
        $this->db->bind(':id', $id);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function approvePromo($id) {
        $this->db->query('UPDATE promos_advertisement SET is_approved = 1 WHERE promoid = :id');
        $this->db->bind(':id', $id);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function promoApproveReject($data) {
        $this->db->query('UPDATE promos_advertisement SET is_approved = :status WHERE promoid = :id');
        $this->db->bind(':id', $data->id);
        $this->db->bind(':status', $data->status);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function singlePromo($id) {
        $this->db->query('SELECT * FROM promos_advertisement WHERE promoid = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        if($this->db->rowCount() > 0 ){
           return $row;
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

    // AND is_approved = 1
    public function getAllAvailablePromos($id) {
        $this->db->query('SELECT * FROM `promos_advertisement` WHERE quantity <> used_quantity AND date <= CURDATE() AND :id != posted_by AND is_approved = 1 ORDER BY date DESC');
        $this->db->bind(':id', $id);

        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
    }

    // AND is_approved = 1
    public function getAllAvailablePromosAdmin() {
        $this->db->query('SELECT * FROM `promos_advertisement` WHERE quantity <> used_quantity AND date <= CURDATE() AND is_approved = 1 ORDER BY date DESC');

        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
    }

    // AND is_approved = 1
    public function unclaimedRewards($id) {
    
        $this->db->query('SELECT * FROM `promos_advertisement` WHERE quantity <> used_quantity AND date <= CURDATE() AND :id != posted_by AND is_approved = 1 ORDER BY date DESC LIMIT 3 ');
        $this->db->bind(':id', $id);

        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
    }

    public function yourRedeemedRewards($id) {
        $this->db->query('SELECT *
        FROM reference_code AS a
        LEFT JOIN promos_advertisement AS b
        ON a.promoid = b.promoid
        WHERE a.redeemed_by=:id;');
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $row;
        }
    }

    public function yourAdvertisement($id) {
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


}
?>