<?php 

    class Generate_report extends Controller {
        
       
        public function __construct() {
          
        }

        public function index(){
        
        }


        public function getColleges(){
            $grm = $this->model('generate_report_model');
            
            $colleges = $grm->getColleges();

            if(!empty($colleges)){
                echo json_encode($colleges);
            }
            else{
                echo json_encode('No Data');
            }
        }

        public function getCourses(){
            $grm = $this->model('generate_report_model');
            
            $courses = $grm->getCourses();

            if(!empty($courses)){
                echo json_encode($courses);
            }
            else{
                echo json_encode('No Data');
            }
        }

        public function getBatches(){
            $grm = $this->model('generate_report_model');
            
            $batches = $grm->getBatches();

            if(!empty($batches)){
                echo json_encode($batches);
            }
            else{
                echo json_encode('No Data');
            }
        }


        public function save_report(){

            $grm = $this->model('generate_report_model');

            $type = $_POST['type'];
            $year = $_POST['year'];
            $chosen = $_POST['chosen'];
            $toInsertData = [
                'type' => $type,
                'year' => $year,
                'chosen' => join(',',$chosen)
            ];

            $isAdded = $grm->addReport($toInsertData);

            if($isAdded){
                echo json_encode([
                    'id' => $isAdded,
                    'status' => 201
                ]);
            }
            else{ 
                echo json_encode('error');
            }

        }


        public function print($id){
            $grm = $this->model('generate_report_model');

            $result = $grm->fetchReport($id);
     
            if(empty($result)){
                return;
            }

            $type = $result->type;
            $year = $result->year;
            $chosen =  explode(',',$result->chosen);
        
            $arrayData = [];         

            if($type === 'college'){
                $arrayOfColleges = [];

                foreach($chosen as $c){
                    $college = $grm->getCollegeById($c);
                    array_push($arrayOfColleges, $college);
                }

                foreach($arrayOfColleges as $college){
                    $test = [
                        'college_name' => $college->department_name,
                        'data' => []
                    ];

                    $courses = $grm->getCourseByCollegeId($college->id);

                    foreach($courses as $course){
                        $classifications = $grm->getClassficationByCourseId($course->id);

                        $courseTest = [
                            'name' => $course->course_name,
                            'courseCode' => $course->course_code,
                            'data' => []
                        ];

                        $classifications = $grm->getClassficationByCourseId($course->id);

                   
                        foreach($classifications as $classication){
                            $batch = $grm->getBatchById($classication->batch_id);

                            $batchTest = [
                                'year' => $batch->year,
                                'alumni' => []
                            ];

                            $alumni = $grm->getAlumniByClass($classication->course_id, $classication->batch_id);

                            foreach($alumni as $a){
                                $answer = $grm->getEmployementResult($a->alumni_id, $year);

                                if(!empty($answer)){
                                  $newAnswer = $answer[0];

                                  if($newAnswer->status === 'Employed' && $newAnswer->if_related == 'yes'){
                                    $newAnswer->status = 'Under Employed';
                                  }

                                  array_push($batchTest['alumni'], $newAnswer);
                                }
                                else{
                                    $a->employment='';
                                    $a->work_position ='';
                                    $a->if_related ='';
                                    $a->status ='';
                                    $a->type_of_work = '';
                                    $a->date_responded = '';
                                    array_push($batchTest['alumni'], $a);

                                }
                            }
                            array_push($courseTest['data'], $batchTest);
                        }
                        array_push($test['data'], $courseTest);
                    }
                    array_push($arrayData, $test);
                }

                
             $this->view('reports/print_college', $arrayData);

            }

            else if($type==='course'){
                $arrayOfCourses = [];

                foreach($chosen as $c){
                    $course = $grm->getCourseById($c);
                    array_push($arrayOfCourses, $course);
                }

                foreach($arrayOfCourses as $course){
                    $courseTest = [
                        'name' => $course->course_name,
                        'courseCode' => $course->course_code,
                        'data' => []
                    ];

                    $classifications = $grm->getClassficationByCourseId($course->id);

                    foreach($classifications as $classication){
                        $batch = $grm->getBatchById($classication->batch_id);

                        $batchTest = [
                            'year' => $batch->year,
                            'alumni' => []
                        ];

                        $alumni = $grm->getAlumniByClass($classication->course_id, $classication->batch_id);

                        foreach($alumni as $a){
                            $answer = $grm->getEmployementResult($a->alumni_id, $year);

                            if(!empty($answer)){
                              $newAnswer = $answer[0];

                              if($newAnswer->status === 'Employed' && $newAnswer->if_related == 'yes'){
                                $newAnswer->status = 'Under Employed';
                              }

                              array_push($batchTest['alumni'], $newAnswer);
                            }
                            else{
                                $a->employment='';
                                $a->work_position ='';
                                $a->if_related ='';
                                $a->status ='';
                                $a->type_of_work = '';
                                $a->date_responded = '';
                                array_push($batchTest['alumni'], $a);

                            }
                        }

                        array_push($courseTest['data'], $batchTest);
                    }

                    array_push($arrayData, $courseTest);
                }

                $this->view('reports/print_course', $arrayData);

            }

            else if($type==='batch'){
                $arrayOfBatches = [];

                foreach($chosen as $c){
                    $batch = $grm->getBatchById($c);
                    array_push($arrayOfBatches, $batch);
                }

                foreach($arrayOfBatches as $batch){
                    $batchTest = [
                        'year' => $batch->year,
                        'data' => []
                    ];

                    $classifications = $grm->getClassificationByBatchId($batch->id);
                    
                    foreach($classifications as $classication){
                        $course = $grm->getCourseById($classication->course_id);

                        $courseTest = [
                            'name' => $course->course_name,
                            'courseCode' => $course->course_code,
                            'alumni' => []
                        ];

                        $alumni = $grm->getAlumniByClass($classication->course_id, $classication->batch_id);

                        foreach($alumni as $a){
                            $answer = $grm->getEmployementResult($a->alumni_id, $year);

                            if(!empty($answer)){
                              $newAnswer = $answer[0];

                              if($newAnswer->status === 'Employed' && $newAnswer->if_related == 'yes'){
                                $newAnswer->status = 'Under Employed';
                              }

                              array_push($courseTest['alumni'], $newAnswer);
                            }
                            else{
                                $a->employment='';
                                $a->work_position ='';
                                $a->if_related ='';
                                $a->status ='';
                                $a->type_of_work = '';
                                $a->date_responded = '';
                                array_push($courseTest['alumni'], $a);

                            }
                        }

                        array_push($batchTest['data'], $courseTest);
                    }

                    array_push($arrayData, $batchTest);

                }

                $this->view('reports/print_batch', $arrayData);

            }


            // $arrayData =[];

            // $didNotAnswer=[];

            // if($type === 'college'){
            //     $colleges = $grm->getColleges();

            //     foreach($colleges as $college){
            //         $departments = $grm->getCourseByCollegeId($college->id);

            //         foreach($departments as $department){
            //             $classifications = $grm->getClassficationByCourseId($department->id);

            //             foreach($classifications as $classication){
            //                 $alumni = $grm->getAlumniByClass($classication->course_id, $classication->batch_id);
            //                 foreach($alumni as $a){
            //                     if($a->employment === ''){
            //                         array_push($didNotAnswer, $a);
            //                     }

            //                     else{
            //                         $answer = $grm->getEmployementResult($a->alumni_id, $year);
                               
                            
            //                         array_print($answer);
            //                     }
            //                 }



            //             }


            //         }


            //         $newArray= [
            //             'college' => $college,
            //             'departments' => $departments,
            //             'didNotAnswer' => $didNotAnswer
            //         ];

            //         array_push($arrayData, $newArray);
            //     }

            //     // array_print($arrayData);
            // }
        }

}