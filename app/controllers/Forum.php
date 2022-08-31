<?php 

    class Forum extends Controller{
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->forumModel = $this->model('new_forum');
            $this->userModel = $this->model('user');
            $this->alumniModel = $this->model('alumni_model');
            $this->voteModel = $this->model('new_vote');
            $this->adminModel = $this->model('admin_model');
        }

        
        public function showFiltered($id){
            $category = $this->forumModel->getCategory();
            $all = $this->forumModel->categoryCounter();
            // $posts = $this->forumModel->getPostByCategory($id); 
            $pop = $this->forumModel->getPopular();
            $reply = $this->forumModel->getPostsReplies();
            $my = $this->forumModel->getCurrent($_SESSION['id']);

            // Get Page # in URL
            $page = $this->getPage();
                    
            // Limit row displayed
            $limit = 12;
            $start = ($page - 1) * $limit;

            $newData = [
                'id' => $id,
                'start' => $start,
                'limit' => $limit
            ];

            $posts = $this->forumModel->getPostByCategory($newData);

            $pagination = $this->forumModel->NoOfResultsByCategory($id);
            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('pages/forum?page='.$pages);
            }

            $startFormula = $start + 1;
            $limitFormula = $startFormula - 1 + $limit;

            if($page == $pages) {
                if ($limitFormula >= $total) {
                    $limitFormula = $total;
                }
            }

            if($total == 0) {
                $startFormula = 0;
                $limitFormula = 0;
            }

            $data = [
                'posts' => $posts,
                'reply' => $reply,
                'popular' => $pop,
                'user_posts' => $my,
                'category' => $category,
                'all' => $all,

                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];

            $this->view('forum/category',$data);
        }

        public function show($id){
            $post = $this->forumModel->getPostById($id);
            
            $reply = $this->forumModel->getReply();
            $user = $this->userModel->getUserByID($post->topic_author);
            $alumni = $this->alumniModel->getAlumniByID($user->a_id);
            $admin = $this->adminModel->single($user->user_id);
            if($_SESSION['user_type'] == 'Super Admin'|| $_SESSION['user_type'] == 'Admin' || $_SESSION['user_type'] == 'Content Creator'){
                $current = $this->adminModel->single($_SESSION['id']);
            } 
             else{ 
                $current = $this->alumniModel->getAlumniByID($_SESSION['alumni_id']);
            } 
            $commentCounter = $this->forumModel->commentCounter($id);
            $replyCounter = $this->forumModel->replyCounter($id);
            $pop = $this->forumModel->getPopular();
            $voteYep = [
                'topic_id' => $id,
                'user_id'  => $_SESSION['id'],
            ];

            $vote = $this->voteModel->getUserVote($voteYep);
            $comment = $this->forumModel->getComments();

            $data = [
                'post' => $post,
                'user' => $user,
                'comment' => $comment,
                'reply' => $reply,
                'alumni' => $alumni,
                'admin'   => $admin,
                'current' => $current,
                'popular' => $pop,
                'vote' => $vote,
                'comment-counter' => $commentCounter,
                'reply-counter' => $replyCounter,
            ];
            
            
            $this->view('forum/view',$data);
            $this->forumModel->viewCounter($data);
        }


        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'category' => trim($_POST['category']),
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['id'],
                    'title_err' => '',
                    'body_err' => ''
                ];


                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter title';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body text';
                }

                if(empty($data['title_err']) && empty($data['body_err'])){
                    // Validated
                    if($this->forumModel->addPost($data)){
                        redirect('pages/forum');
                    }
                        else{
                            die('Something went wrong');
                    }
                } 
                else{
                    // Load the view with errors
                    $this->view('forum/add', $data);
                }

            } else{
                $data = [
                    'category' => '',
                    'title' => '',
                    'body' => '',
                    'title_err' => '',
                    'body_err' => ''
                ];
            }
           
            $this->view('forum/add',$data);

        }
        
        public function comment($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'comment_for' => $id,
                    'comment' => trim($_POST['comment']),
                    'comment_sender' => $_SESSION['id'],
                ];


                if($this->forumModel->addComment($data)){
                    redirect('forum/show/' . $id);
                }
                else{
                    die('something went wrong');
                }
            }
            else {

                $data = [
                    'comment_for' => '',
                    'comment' => '',
                    'comment_sender' => $_SESSION['id'],
                ];
            }
        }

        public function reply($id,$topic){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'parent' => $id,
                    'reply' => trim($_POST['reply']),
                    'reply_for' => $topic,
                    'reply_sender' => $_SESSION['id'],
                ];


                if($this->forumModel->addReply($data)){
                    redirect('forum/show/' . $topic);
                }
                else{
                    die('something went wrong');
                }
            }
            else {

                $data = [
                    'parent' => $id[0],
                    'reply' => '',
                    'reply_sender' => $_SESSION['id'],

                ];
            }
        }
        public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['id'],
                    'id' => $id,
                    'title_err' => '',
                    'body_err' => ''
                ];


                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter title';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body text';
                }

                if(empty($data['title_err']) && empty($data['body_err'])){
                    // Validated
                    if($this->forumModel->updatePost($data)){
                        
                        redirect('forum/show/' .$id);
                    }else{
                        die('Something went wrong');
                    }
                } else{
                    // Load the view with errors
                
                    $this->view('forum/edit', $data);
                }

            } else{
                // Check for owner
                $post = $this->forumModel->getPostById($id);
                if($post->topic_author != $_SESSION['id']){
                    redirect('forum');
                }
                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body,
                    'title_err' => '',
                    'body_err' => '',
                ];
            }
           

            $this->view('forum/edit',$data);
        }
        
        public function delete($id){
                // Check for owner
                $post = $this->forumModel->getPostById($id);
                if($post->topic_author != $_SESSION['id']){
                    redirect('forum');
                }
                
                if($this->forumModel->deletePost($id)){
                
                    redirect('pages/forum');
                }    
                else{
                    die("Something went wrong");
                }
            }

        public function deleteComment($id,$for){
            $comment = $this->forumModel->getCommentById($id);
            if($comment->comment_sender != $_SESSION['id']){
                redirect('pages/forum');
            }

            if($this->forumModel->deleteComment($id)){
                
                redirect('forum/show/' . $for);
            }    
            else{
                die("Something went wrong");
            }
        }

        public function deleteReply($id,$for){
            $comment = $this->forumModel->getReplyById($id);
            if($comment->comment_sender != $_SESSION['id']){
                redirect('pages/forum');
            }

            if($this->forumModel->deleteReply($id)){
                
                redirect('forum/show/' . $for);
            }    
            else{
                die("Something went wrong");
            }
        }

        public function getPage() {

            // Get Page # in URL
            if (!isset($_GET['page'])) {
                $page = 1;
            } elseif($_GET['page'] == 0) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
    
            return $page;
    
        }

    }


    