<?php 

    class Post{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        /*      
        public function showNews() {
            $this->db->query('SELECT * FROM posts ORDER BY created_at ASC;');
                $row = $this->db->resultSet();
                if($row > 0){
                    return $row;
                }
        } 
        */
        
        public function showNewsHome(){
            $this->db->query('SELECT * FROM posts ORDER BY created_at DESC LIMIT 3');
                $row = $this->db->resultSet();
                if($row > 0){
                    return $row;
            }
           
        }

        public function showNewsList(){
            $this->db->query('SELECT * FROM posts ORDER BY created_at DESC LIMIT 10');
                $row = $this->db->resultSet();
                if($row > 0){
                    return $row;
            }
        }

        public function showNewsIndex($page, $rowsperpage){
            $this->db->query('SELECT * FROM posts ORDER BY created_at DESC LIMIT :page, :rowsperpage');
            $this->db->bind(':page', $page);
            $this->db->bind(':rowsperpage', $rowsperpage);
            
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function NoOfResults() {
            $this->db->query('SELECT ALL id FROM posts'); 

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function NoOfResultsOld() {
            $this->db->query('SELECT ALL id FROM posts ORDER BY created_at DESC LIMIT 18446744073709551610 OFFSET 10'); 

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function addNews($data){
            $this->db->query('INSERT INTO posts (user_id, title, author, description, image) VALUES (:user_id, :title, :author, :description, :image)');
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':author', $data['author']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':image', $data['file']);
            
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function editNews($data, $isUploaded){
            if($isUploaded == 1 ){
                $this->db->query('UPDATE posts SET title=:title, author=:author, description=:description, lastDateEdited=:lastDateEdited, image=:image WHERE id =:id');

                $this->db->bind(':title', $data['title']);
                $this->db->bind(':author', $data['author']);
                $this->db->bind(':description', $data['description']);
                $this->db->bind(':lastDateEdited', $data['lastDateEdited']);
                $this->db->bind(':image', $data['file']);
                $this->db->bind(':id', $data['id']);
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                $this->db->query('UPDATE posts SET title=:title, author=:author, description=:description, lastDateEdited=:lastDateEdited WHERE id =:id');
                $this->db->bind(':title',$data['title']);
                $this->db->bind(':author', $data['author']);
                $this->db->bind(':description',$data['description']);
                $this->db->bind(':lastDateEdited', $data['lastDateEdited']);
                $this->db->bind(':id',$data['id']);
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
           
        }
        
        public function singleNews($id){
            $this->db->query('SELECT * FROM posts WHERE id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function otherNews($id) {
            $this->db->query('SELECT * FROM posts WHERE id <> :id ORDER BY created_at DESC LIMIT 5');
            $this->db->bind(':id', $id);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function findPostById($id) {
            $this->db->query('SELECT * FROM posts WHERE id = :id');
    
            $this->db->bind(':id', $id);
    
            $row = $this->db->single();
    
            return $row;
        }

        public function deleteNews($id){
            $this->db->query('SELECT * FROM posts WHERE id = :id ');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0 ){
               $img = $row->image;
            }
            else{
                return false;
            }
            if(unlink(IMAGEROOT.$img)) {
                $this->db->query('DELETE FROM posts WHERE id=:id');
                $this->db->bind(':id', $id);

                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }

        }

        public function searchNews($char){
            $this->db->query("SELECT * from posts WHERE title like CONCAT('%', :test, '%') ORDER BY created_at desc");
            $this->db->bind(':test' , $char);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }
    }