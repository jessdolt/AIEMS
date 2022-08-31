<?php 

    class Gallery{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function addGallery($data){
            $this->db->query('INSERT INTO gallery(gallery_title,created_by) VALUES (:title, :created_by)');

            $this->db->bind(':title', $data['gallery_title']);
            $this->db->bind(':created_by', $data['created_by']);

            if($this->db->execute()){
                return $this->db->getLastId();
            } else{
                return false;
            }
        }

        public function addImgGallery($data){
            $this->db->query('INSERT INTO gallery_images(gallery_id, image, description ,isCover) VALUES (:gallery_id, :image, :description, :isCover)');

            $this->db->bind(':gallery_id', $data['gallery_id']);
            $this->db->bind(':image', $data['file']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':isCover', $data['isCover']);


            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function showGallery(){
            $this->db->query('SELECT * from gallery');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function showGalleryLimit($start, $limit){
            $this->db->query('SELECT * from gallery LIMIT :start, :limit');
            $this->db->bind(':start', $start);
            $this->db->bind(':limit', $limit);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function NoOfResults() {
            $this->db->query('SELECT ALL id FROM gallery'); 
            
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function changeCover($image_id, $gallery_id){
            $this->db->query('SELECT * from gallery_images WHERE isCover = 1 AND gallery_id ='. $gallery_id);
            $rowCurrentCover = $this->db->single();

            if(!empty($rowCurrentCover)){
                $this->db->query('UPDATE gallery_images set isCover = 0 WHERE id = :image_id');
                $this->db->bind(':image_id', $rowCurrentCover->id);

                if($this->db->execute()){
                    $this->db->query('UPDATE gallery_images set isCover = 1 WHERE id ='. $image_id);
                    if($this->db->execute()){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
            }
            else{

                $this->db->query('UPDATE gallery_images set isCover = 1 WHERE id ='. $image_id);
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
            
        }


        public function showImages(){
            $this->db->query('SELECT * 
                             FROM gallery_images
                             INNER JOIN gallery 
                             ON gallery_images.gallery_id = gallery.id
                             ');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function showGalleryById($gid){
            $this->db->query('SELECT * from gallery WHERE id =:gal_id ');
            $this->db->bind(':gal_id', $gid);
            $row = $this->db->single();
            return $row;
        }

        public function showGalleryCount($gid) {
            $this->db->query('SELECT COUNT(id) as counter FROM gallery_images WHERE gallery_id = :gal_id');
            $this->db->bind(':gal_id', $gid);
            $row = $this->db->single();
            return $row;
        }
       

        public function showImagesByGalId($gid){
            $this->db->query('SELECT * from gallery_images WHERE gallery_id =:gal_id');
            $this->db->bind(':gal_id', $gid);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function editGallery($data){
            $this->db->query('UPDATE gallery set gallery_title=:gallery_title WHERE id=:gallery_id');
            $this->db->bind(':gallery_title', $data['gallery_title']);
            $this->db->bind(':gallery_id', $data['gallery_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function editDesc($data){
            $this->db->query('UPDATE gallery_images set description=:description WHERE id=:image_id');
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':image_id', $data['image_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteGallery($gid){

            $this->db->query('DELETE FROM gallery where id= (:id)');
            $this->db->bind(':id', $gid);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteImagesByGalId($gid){

            $this->db->query('DELETE FROM gallery_images where gallery_id= (:id)');
            $this->db->bind(':id', $gid);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteImageById($image_id){
            $this->db->query('SELECT * FROM gallery_images where id= (:id)');
            $this->db->bind(':id', $image_id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0 ){
               $img = $row->image;
            }
            else{
                return false;
            }

            if(unlink(IMAGEROOT.$img)){
                $this->db->query('DELETE FROM gallery_images where id= (:id)');
                $this->db->bind(':id', $image_id);
    
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
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

        

        
    }