<?php 
    
    class New_vote{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function getUserVote($id){
            $this->db->query('SELECT * from upvote WHERE sender = :user_id AND topic_voted = :topic_id');
            $this->db->bind(':user_id', $id['user_id']);
            $this->db->bind(':topic_id', $id['topic_id']);

            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getVoteCount($id){
            $this->db->query('SELECT SUM(vote) as vote_count from upvote WHERE topic_voted = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }


        public function upVote($data){
            $this->db->query('INSERT INTO upvote (topic_voted,vote,sender) VALUES(:topic_id, :vote_count, :user_id)');
            $this->db->bind(':topic_id' , $data['topic_id']);
            $this->db->bind(':vote_count' , $data['vote_count']);
            $this->db->bind(':user_id' , $data['user_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteVote($data){
            $this->db->query('DELETE FROM upvote where sender= :user_id AND topic_voted = :topic_id');
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':topic_id', $data['topic_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function downVote($data){
            $this->db->query('INSERT INTO upvote (topic_voted,vote,sender) VALUES(:topic_id, :vote_count, :user_id)');
            $this->db->bind(':topic_id' , $data['topic_id']);
            $this->db->bind(':vote_count' , $data['vote_count']);
            $this->db->bind(':user_id' , $data['user_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function editVote($data){
            $this->db->query('UPDATE upvote SET vote = :vote_count WHERE topic_voted = :topic_id AND sender = :user_id');
            $this->db->bind(':vote_count', $data['vote_count']);
            $this->db->bind(':topic_id', $data['topic_id']);
            $this->db->bind(':user_id', $data['user_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

    }