<?php 

    class Posts extends Controller{
        public function __construct(){
           $this->postModel = $this->model('post');
           
        }

        public function search(){
            extract($_POST);
            $posts = $this->postModel->searchNews($searchChar);
            echo json_encode($posts);
        }

        public function single($id){
            $post = $this->postModel->singleNews($id);
            $other = $this->postModel->otherNews($id);

            $data = [
                'post' => $post,
                'other' => $other
            ];

            $this->view('pages/singleNews', $data);
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $file = $_FILES['fileUpload'];

                $data = [
                    'user_id' => $_SESSION['id'],
                    'title' => $_POST['title'],
                    'author' => $_POST['author'],
                    'description' => $_POST['description'],
                    'file' => '',
                    'title_error' => '',
                    'author_error' => '',
                    'description_error' => '',
                    'file_error' => ''
                ];

                $filename = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];

                $fileExt = explode ('.',$filename);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg','jpeg', 'png','jfif');

                if(in_array($fileActualExt, $allowed)){
                    if( $fileError === 0){
                        if($fileSize < 1000000){        
                            $fileNameNew = uniqid('',true).".".$fileActualExt;
                            $target = "uploads/". basename($fileNameNew);
                            move_uploaded_file($fileTmpName, $target);
                            $data['file'] = $fileNameNew;
                        }
                    }
                    else{
                        $data['file_error'] = 'File Size too big. Maximum of 1mb only';
                    }
                }
                else{
                    $data['file_error'] = 'There was a problem in uploading the file';
                }

                if(empty($data['title'])){
                    $data['title_error'] = 'Please enter a title';
                }

                if (empty($data['author'])) {
                    $data['author_error'] = 'Please enter the Author';
                }

                if(empty($data['description'])){
                    $data['description_error'] = 'Please enter a description';
                }
            
                array_print($data);
                if(empty($data['title_error']) && empty($data['author_error']) && empty($data['description_error']) && empty($data['file_error'])){
                    //array_print($data);
                    if($this->postModel->addNews($data)){
                        flash('news_add_success', 'News successfully added', 'successAlert');
                        redirect('admin/news');
                    }
                    else{
                        die("Something went wrong");
                    } 
                } else{
                    $this->view('posts/add', $data);
                } 
            } 

            else{
                $data = [
                    'title' => '',
                    'author' => '',
                    'description' => '',
                    'file' => '',
                    'title_error' => '',
                    'author_error' => '',
                    'description_error' => '',
                    'file_error' => ''
                ];
            }
            
            $this->view('posts/add', $data);
        }

        public function edit($id){
            $post = $this->postModel->singleNews($id);

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $file = $_FILES['fileUpload'];
                $isUploaded = $_POST['isUploaded'];

                $data = [
                    'id' => $id,
                    'title' => $_POST['title'],
                    'author' => $_POST['author'],
                    'description' => $_POST['description'],
                    'file' => $post->image,
                    'lastDateEdited' => date("Y-m-d H:i:s"),
                    'title_error' => '',
                    'author_error' => '',
                    'description_error' => '',
                    'file_error' => ''
                ];

                $filename = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];
              
                $fileExt = explode ('.',$filename);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg', 'jpeg', 'png');

                if(in_array($fileActualExt, $allowed) && $isUploaded == 1){
                    if( $fileError === 0){
                        if($fileSize < 1000000){        
                            $fileNameNew = uniqid('',true).".".$fileActualExt;
                            $target = "uploads/". basename($fileNameNew);
                            move_uploaded_file($fileTmpName, $target);
                            $data['file'] = $fileNameNew;
                        }
                        else{
                            $data['file_error'] = 'File too big';
                        }
                    }
                    else{
                        $data['file_error'] = 'File Size too big. Maximum of 1mb only';
                    }
                }
                elseif($isUploaded == 1){
                    $data['file_error'] = 'There was a problem in uploading the file';
                }

                if(empty($data['title'])){
                    $data['title_error'] = 'Please enter a title';
                }

                if(empty($data['author'])) {
                    $data['author_error'] = 'Please enter the Author';
                }

                if(empty($data['description'])){
                    $data['description_error'] = 'Please enter a description';
                }
            
                if(empty($data['title_error']) && empty($data['author_error']) && empty($data['description_error']) && empty($data['file_error'])){
                    if($this->postModel->editNews($data, $isUploaded)){
                        flash('news_edit_success', 'News successfully edited', 'successAlert');
                        redirect('admin/news');
                    }
                    else{
                        die("Something went wrong");
                    }
                } else{
                    $this->view('posts/edit', $data);
                }
            } 

            else{
                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'author' => $post->author,
                    'description' => $post->description,
                    'created_at' => $post->created_at,
                    'lastDateEdited' => $post->lastDateEdited,
                    'file' => $post->image,
                    'title_error' => '',
                    'author_error' => '',
                    'description_error' => '',
                    'file_error' => ''
                ];
            }
            
            $this->view('posts/edit', $data); 
        }

        // FOR CHECKBOX
        public function delete() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $todelete = $_POST['checkbox'];
                foreach ($todelete as $id) {
                    if ($this->postModel->deleteNews($id)){
                        flash('news_delete_success', 'News successfully deleted', 'successAlert');
                        redirect('admin/news');
                    }
                    else {
                        die("There's an error deleting this record");
                    }
                }
            }
        }
        
        // FOR INLINE
        public function deleteRow($id) {

            if ($this->postModel->deleteNews($id)){
                flash('news_delete_success', 'News successfully deleted', 'successAlert');
                redirect('admin/news');
            }
            else {
                die("There's an error deleting this record");
            }
        }

    }