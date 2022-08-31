<?php

class Vote extends Controller{
    public function __construct(){
        $this->voteModel = $this->model('new_vote');
    }


    public function getVote(){
        extract($_POST);

        $rowVote = $this->voteModel->getVoteCount($id);
        echo $rowVote[0]->vote_count;
        
    }

    public function upVote(){
        extract($_POST);

        if(!isset($isVoted)){
            $data = [
                'topic_id' => $topic_id,
                'vote_count' => $count,
                'user_id' => $user_id
            ];
    
            if($this->voteModel->upVote($data)){
                echo '1';    
            }
        }
        else{
            $data = [
                'topic_id' => $topic_id,
                'vote_count' => $count,
                'user_id' => $user_id
            ];
         
            if($this->voteModel->editVote($data)){
                echo '1';
            }
        }
        
        //array_print($_POST);
    }


    public function normalStateVote(){;
        extract($_POST);
        $data = [
            'topic_id' => $topic_id,
            'user_id' => $user_id
        ];
        if($this->voteModel->deleteVote($data)){
            echo '1';
        }
    }

    public function downVote(){
        extract($_POST);

        if(!isset($isVoted)){
            $data = [
                'topic_id' => $topic_id,
                'vote_count' => $count,
                'user_id' => $user_id
            ];
    
            if($this->voteModel->downVote($data)){
                echo '1';    
            }
        }
        else{
            $data = [
                'topic_id' => $topic_id,
                'vote_count' => $count,
                'user_id' => $user_id
            ];
         
            if($this->voteModel->editVote($data)){
                echo '1';
            }
        }
        
        //array_print($_POST);
    }

}