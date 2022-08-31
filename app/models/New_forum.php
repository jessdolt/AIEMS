<?php 

    class New_forum{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function viewCounter($data){
            $this->db->query('UPDATE topic SET topic_views = :views WHERE topic_id = :id');
            $this->db->bind(':id', $data['post']->topic_id);
            $views = $data['post']->topic_views;
            $views = $views + 1;
            $this->db->bind(':views', $views);

            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }
        //comment counter
        
        public function forumIndex() {
            $this->db->query('SELECT * FROM `topic` ORDER BY created_at DESC LIMIT 5');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }
        

        public function commentCounter($id){
            $this->db->query('SELECT *, COUNT(comment_id) as counter FROM `topic`  LEFT JOIN `comment` ON comment.comment_for = topic.topic_id WHERE comment_for = :id');
            $this->db->bind(':id',$id);
            $row = $this->db->single();
            return $row;
        }


        public function replyCounter($id){
            $this->db->query('SELECT *, COUNT(comment_id) as counter, COUNT(reply_id) as replies FROM `comment` LEFT JOIN `reply` ON reply.parent_comment = comment_id where comment_for = :id group by comment_for');
            $this->db->bind(':id',$id);
            $row = $this->db->single();
            return $row;
        }

        //counter for all discussions
        public function categoryCounter(){
            $this->db->query('SELECT COUNT(*) as counter FROM `topic`');
            $results = $this->db->resultSet();
            return $results;
        }

        public function topicVotes($data){
            $this->db->query('UPDATE topic SET votes = :votes WHERE topic_id = :id');

        }

        public function getPosts($start, $limit){
            $this->db->query('SELECT *,
                              count(comment_id) as comment
                              FROM topic
                              INNER JOIN users 
                              ON topic.topic_author = users.user_id 
                              LEFT JOIN category
                              ON topic.category = category.category_id
                              LEFT JOIN comment
                              ON comment_for = topic.topic_id
                              GROUP BY topic_id
                              ORDER BY topic.created_at DESC
                              LIMIT :start, :limit
            ');
            $this->db->bind(':start', $start);
            $this->db->bind(':limit', $limit);
            $results = $this->db->resultSet();
            return $results;
        }

        public function NoOfResults() {
            $this->db->query('SELECT ALL topic_id FROM topic'); 

            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function NoOfResultsByCategory($id) {
            $this->db->query('SELECT ALL topic_id FROM topic 
                            INNER JOIN category
                            ON topic.category = category.category_id
                            WHERE category = :id
                            '); 
            $this->db->bind('id', $id);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function getPostByCategory($newData){
            $this->db->query('SELECT *, topic.topic_id as postId,
                                        users.user_id as userId,
                                        topic.created_at as postCreated,
                                        COUNT(comment_id) as comment
                                        FROM topic
                                        INNER JOIN users 
                                        ON topic.topic_author = users.user_id
                                        INNER JOIN category
                                        ON topic.category = category.category_id
                                        LEFT JOIN comment
                                        ON comment_for = topic.topic_id
                                        WHERE category = :id
                                        GROUP BY topic_id
                                        ORDER BY topic.created_at DESC
                                        LIMIT :start, :limit
                                        ');
            $this->db->bind('id', $newData['id']);
            $this->db->bind('start', $newData['start']);
            $this->db->bind('limit', $newData['limit']);
            $results = $this->db->resultSet();
            return $results;
        }

        public function getPostsReplies(){
            $this->db->query('SELECT *, COUNT(reply_id) AS replies FROM topic LEFT JOIN comment ON comment_for = topic_id LEFT JOIN reply ON reply_for = topic_id GROUP BY comment_id');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getPopular(){
            $this->db->query('SELECT *,
                             topic.topic_id as postId,
                             users.user_id as userId,
                             topic.created_at as postCreated
                             FROM topic
                             INNER JOIN users 
                             ON topic.topic_author = users.user_id
                             ORDER BY topic.topic_views DESC
                             LIMIT 5
                             ');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getCurrent($id){
            $this->db->query('SELECT *,
                             topic.topic_id as postId,
                             users.user_id as userId,
                             topic.created_at as postCreated
                             FROM topic
                             INNER JOIN users 
                             ON topic.topic_author = users.user_id
                             WHERE users.user_id = :id
                             ORDER BY topic.created_at DESC
                             LIMIT 5
                             ');
            $this->db->bind(':id',$id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function getCategory(){
            $this->db->query('SELECT *, count(topic_id) as counter FROM CATEGORY LEFT JOIN topic ON category_id = category GROUP BY category_id');
            $results = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $results;
            }
            else{
                return false;
            }
          
        }

        public function getComments(){
            $this->db->query('SELECT *,	admin.image as admin_image,
			users.name as user_name,
            comment.created_at as commented_at
            FROM comment
            INNER JOIN users 
            ON comment.comment_sender = users.user_id
            LEFT JOIN admin
            ON admin.user_id = users.user_id
            LEFT JOIN alumni
            ON users.a_id = alumni.alumni_id
            ORDER BY comment.created_at DESC
           
            ');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getReply(){
            $this->db->query('SELECT *,	admin.image as admin_image,
                                        users.name as user_name
            FROM reply
            INNER JOIN users 
            ON reply.reply_sender = users.user_id
            LEFT JOIN admin
            ON admin.user_id = users.user_id
            LEFT JOIN alumni
            ON users.a_id = alumni.alumni_id
            ORDER BY reply.replied_at ASC
            ');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getCommentById($id){
            $this->db->query('SELECT * FROM comment WHERE comment_id = :id');
            $this->db->bind(':id',$id);
            $row = $this->db->single();
            return $row;
        }

        public function getPostById($id){
            $this->db->query('SELECT * FROM topic left join category on category_id = category WHERE topic_id = :id');
            $this->db->bind(':id',$id);
            $row = $this->db->single();
            return $row;
        }

        public function getReplyById($id){
            $this->db->query('SELECT * FROM reply WHERE reply_id = :id');
            $this->db->bind(':id',$id);
            $row = $this->db->single();
            return $row;
        }


        public function addPost($data){
            $this->db->query('INSERT INTO topic (category,title,topic_author,body) VALUES (:category,:title,:user_id,:body)');
            //bind values
           
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);

            //Execute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function addComment($data){
            $this->db->query('INSERT INTO comment (comment_for,comment,comment_sender) VALUES (:comment_for,:comment,:comment_sender)');
            
            $this->db->bind(':comment_for', $data['comment_for']);
            $this->db->bind(':comment', $data['comment']);
            $this->db->bind(':comment_sender', $data['comment_sender']);

            //Execute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function addReply($data) {
            $this->db->query('INSERT INTO reply (parent_comment,reply,reply_sender,reply_for) VALUES (:parent,:reply,:reply_sender,:reply_for)');

            $this->db->bind(':parent', $data['parent']);
            $this->db->bind(':reply', $data['reply']);
            $this->db->bind(':reply_sender', $data['reply_sender']);
            $this->db->bind(':reply_for', $data['reply_for']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updatePost($data){
            $this->db->query('UPDATE topic SET title = :title, body = :body WHERE topic_id = :id');
            //bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);

            //Execute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function updateComment($data){
            $this->db->query('UPDATE comment SET comment = :body WHERE comment_id = :id');
            //bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':comment', $data['comment']);

            //Execute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function updateReply($data){
            $this->db->query('UPDATE reply SET reply = :reply WHERE reply_id = :id');
            //bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':reply', $data['reply']);

            //Execute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function topicView($data){
            $this->db->query('UPDATE topic SET topic_views = :view WHERE topic_id = :id');
        }

        public function deletePost($id){
            $this->db->query('DELETE FROM topic where topic_id = :id');
            //bind values
            $this->db->bind(':id', $id);
            //Execute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function deleteComment($id){
            $this->db->query('DELETE FROM comment where comment_id = :id');
            //bind values
            $this->db->bind(':id', $id);
            //Execute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function deleteReply($id){
            $this->db->query('DELETE FROM reply where reply_id = :id');
            //bind values
            $this->db->bind(':id', $id);
            //Execute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }
    }