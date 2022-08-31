<?php 

    header('Access-Controll-Allow-Origin: *');
    header('Content-Type: application/json');

    class Api extends Controller{
        public function __construct(){
            $this->apiModel = $this->model('api_model');
        }

        public function posts($request_type){
            if($request_type == 'read'){
                $result = $this->apiModel->news_read();
            
                //array_print($result);
                if (count($result) > 0){
                    $posts_arr = array();
                    $posts_arr['data'] = array();
                    foreach($result as $post){
                        $post_item = array(
                            'id' => $post->id,
                            'title' => $post->title,
                            'description' => $post->description,
                            'image'=> $post->image,
                            'author' => $post->author,
                            'last_date_edited' => $post->lastDateEdited,
                            'date_created' => $post->created_at
                                
                        );
    
                        array_push($posts_arr['data'], $post_item);
                    }
    
                    echo json_encode($posts_arr);
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }
            }
            else{
                echo json_encode(array(
                    'messsage' => 'Inavlid Request'
                ));
            }

            
        }


        public function events($request_type){
            if($request_type == 'read'){
                $result = $this->apiModel->events_read();
            
                //array_print($result);
                if (count($result) > 0){
                    $events_arr = array();
                    $events_arr['data'] = array();
    
                    foreach($result as $event){
                        $event_item = array(
                            'id' => $event->id,
                            'title' => $event->title,
                            'description' => $event->description,
                            'image'=> $event->image,
                            'date_created' => $event->created_at
                        );
    
                        array_push($events_arr['data'], $event_item);
                    }
    
                    echo json_encode($events_arr);
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }
            }
            else{
                echo json_encode(array(
                    'messsage' => 'Inavlid Request'
                ));
            }
        }

        public function single($request_type,$survey_id){
            if($request_type == 'survey'){
                $result = $this->apiModel->survey_set_read($survey_id);
                $resultQuestions = $this->apiModel->questions_read($survey_id); 
                $resultAnswers = $this->apiModel->answers_read($survey_id);

                //array_print($result);
                $chart_arr = array();
                $chart_arr['data'] = array();
                if (count($result) > 0){
                    $survey_arr = array();
                    $survey_arr['survey'] = array();
    
                    foreach($result as $survey){
                        $survey_item = array(
                            'id' => $survey->id,
                            'title' => $survey->title,
                            'description' => $survey->description,
                            'user_id'=> $survey->user_id,
                            'start_date'=> $survey->start_date,
                            'end_date'=> $survey->end_date,
                            'date_created' => $survey->date_created
                        );
                        
                        array_push($survey_arr['survey'], $survey_item);
                    }
    
                    array_push($chart_arr['data'],$survey_arr);
                    
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }

                if(count($resultQuestions)> 0){
                    $question_arr = array();
                    $question_arr['question'] = array();
    
                    foreach($resultQuestions as $question){
                        $question_item = array(
                            'id' => $question->id,
                            'question' => $question->question,
                            'frm_option' => json_decode($question->frm_option),
                            'type'=> $question->type,
                            'survey_id'=> $question->survey_id,
                            'order' => $question->order_by,
                            'date_created' => $question->date_created
                        );
                        
                        array_push($question_arr['question'], $question_item);
                    }
    
                    array_push($chart_arr['data'],$question_arr);
                    
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }
                
                if (count($resultAnswers) > 0){
                    $answer_arr = array();
                    $answer_arr['answer'] = array();
    
                    foreach($resultAnswers as $answer){
                    
                        $answer_item = array(
                            'id' => $answer->id, //23
                            'survey_id' => $answer->survey_id,
                            'user_id' => $answer->user_id,
                            'answer'=> $answer->answer,
                            'question_id'=> $answer->question_id,
                            'date_created' => $answer->date_created
                        );

                        array_push($answer_arr['answer'], $answer_item);
                    }
    
                    array_push($chart_arr['data'],$answer_arr);
                    
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }
                

                echo json_encode($chart_arr);



            }//else from if parent
           
            //parent else
            else{
                echo json_encode(array(
                    'messsage' => 'Inavlid Request'
                ));
            }
        }



        //job active for dashboard
        public function job_portal($request_type){
            if($request_type == 'active'){
                $result = $this->apiModel->job_portal_active_read();
              
                //array_print($result);
                if (count($result) > 0){
                    $jobs_arr = array();
                    $jobs_arr['data'] = array();
    
                    foreach($result as $job){
                        $job_item = array(
                            'activeJobs' => $job->job_active,
                        );
    
                        array_push($jobs_arr['data'], $job_item);
                    }
    
                    echo json_encode($jobs_arr);
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }
            }

            //parent else
            else{
                echo json_encode(array(
                    'messsage' => 'Inavlid Request'
                ));
            }
        }

        public function login_count($request_type){
            if($request_type == 'Daily'){
                $result = $this->apiModel->getDailyCount();
                $count_arr = array();

                if(!empty($result)){
                    array_push($count_arr, $result->visit_count);
                }
                else{
                    echo json_encode(
                        array('Count' => 0)
                    );
                }

                echo json_encode($count_arr);
            }
            else if($request_type == 'Monthly'){
                $result = $this->apiModel->getMonthlyCount();
                $count_arr = array();

                if(!empty($result)){
                    array_push($count_arr, $result[0]->visit_count);
                }
                else{
                    echo json_encode(
                        array('Count' => 0)
                    );
                }

                echo json_encode($count_arr);

            }
            else if($request_type == 'Yearly'){
                $result = $this->apiModel->getYearlyCount();
                $count_arr = array();

                if(!empty($result)){
                    array_push($count_arr, $result[0]->visit_count);
                }
                else{
                    echo json_encode(
                        array('Count' => 0)
                    );
                }

                echo json_encode($count_arr);
            }
        }

        public function survey($request_type){
            if($request_type == 'latest'){
                $result = $this->apiModel->latestSurvey_read();
                $resultRespondents = $this->apiModel->user_count_read();
                $resultTaken = $this->apiModel->taken_count_read($result[0]->id);
                //array_print($result);

                $survey_arr = array();
                $survey_arr['latest'] = array();


                if (count($result) > 0){
                    $latest_arr = array();
                    $latest_arr['latestSurvey'] = array();
    
                    foreach($result as $survey){
                        $survey_item = array(
                            'id' => $survey->id,
                            'title' => $survey->title,
                            'description' => $survey->description,
                            'start_date'=> $survey->start_date,
                            'end_date'=> $survey->end_date,
                            'date_created' => $survey->date_created
                        );
                        array_push($latest_arr['latestSurvey'], $survey_item);
                    }
                    
                    array_push($survey_arr['latest'], $latest_arr);
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }

                if(!empty($resultRespondents)){
                    $respondents_arr = array();
                    $respondents_arr['totalUser'] = array();

                    foreach($resultRespondents as $users){
                        $users_item = array(
                            'respondents' => $users->respondents,
                        );
                        array_push($respondents_arr['totalUser'], $users_item);
                    }
                    
                    array_push($survey_arr['latest'], $respondents_arr);
                }

                $taken_arr = array();
                $taken_arr['taken'] = array();

                array_push($taken_arr['taken'], $resultTaken);
                array_push($survey_arr['latest'],$taken_arr);

                echo json_encode($survey_arr);

            }
            //parent else
            else{
                echo json_encode(array(
                    'messsage' => 'Inavlid Request'
                ));
            }

            
        }

        public function batch($request_type){
            if($request_type == 'read'){
                $result = $this->apiModel->batch_read();
              
                //array_print($result);
                if (count($result) > 0){
                    $batch_arr = array();
                    $batch_arr['data'] = array();
    
                    foreach($result as $batch){
                        $batch_item = array(
                            'id' => $batch->id,
                            'year'=> $batch->year
                        );
    
                        array_push($batch_arr['data'], $batch_item);
                    }
    
                    echo json_encode($batch_arr);
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }


            }
            //parent else
            else{
                echo json_encode(array(
                    'messsage' => 'Inavlid Request'
                ));
            }
        }

        public function masterlist($request_type, $batch_id){
            if($request_type == 'read'){
                $resultCourses = $this->apiModel->masterlist_read($batch_id);
              
                //array_print($result);
                $alumniML = array();
                $alumniML['masterlist'] = array();



                if (count($resultCourses) > 0){
                    $courses_arr = array();
                    $courses_arr['course'] = array();
                    $countPerCourse = array();
                    $countPerCourse['data'] =array();

                    foreach($resultCourses as $course){
                        $course_item = array(
                            'id' => $course->course_id,
                            'name'=> $course->course_name,
                            'code' => $course->course_code
                        );
    
                        array_push($courses_arr['course'], $course_item);


                        $resultAlumniCount = $this->apiModel->alumni_count_read($course->course_id, $course->batch_id);

                        foreach($resultAlumniCount as $alumniCount){
                            $alumni_item = array(
                                $course->course_code => $alumniCount->alumniCount
                            );

                            array_push($countPerCourse['data'], $alumni_item);
                        }

                    }
                    
                    array_push($alumniML['masterlist'], $countPerCourse);
                    array_push($alumniML['masterlist'], $courses_arr);
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }

                echo json_encode($alumniML);
            }
            //parent else
            else{
                echo json_encode(array(
                    'messsage' => 'Inavlid Request'
                ));
            }
        }


        public function forum($request_type){
            if($request_type == 'read'){
                $resultTopic = $this->apiModel->topic_read();
                $resultComments = $this->apiModel->comments_read();
                $resultReplies = $this->apiModel->replies_read();
                $arr1 = $resultTopic;
                $arr2 = $resultComments;
                $arr3 = $resultReplies;

                $forumArr = array();

                if($arr2 != 0 && $arr3 != 0){
                    $arrMerged = array_merge($arr1,$arr2, $arr3);
                }
                else if ($arr2 != 0 && $arr3 == 0){
                    $arrMerged = array_merge($arr1,$arr2);
                }
                else {
                    $arrMerged = $arr1;    
                }

                usort($arrMerged, function($a, $b) {
                    return strtotime($b->rCreated_at) - strtotime($a->rCreated_at);
                });

                if(count($arrMerged) > 4){
                    $arrMerged = $this->limitArray($arrMerged);
                }

                
                for($i = 0; $i < count($arrMerged); $i++ ){
                    array_push($forumArr, $arrMerged[$i]);
                } 

                echo json_encode($forumArr);
                
            }
        }

        function limitArray($arr){
            $newArr = array();
            for($i = 0; $i < 4; $i++){
                array_push($newArr, $arr[$i]);
            }
    
            return $newArr;
        }

    
      
    }