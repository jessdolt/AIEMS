<?php 



Class Example extends Controller {

    public function __construct(){
       

    }

    public function saveTest(){
        $eventModel = $this->model('event');
        $json  = json_decode(file_get_contents('php://input'));

        $isSaved = $eventModel->addEvent($json);

     
        $response = ['message' => 'Successfully Fetched', 'isSaved' => 1];
        
        echo json_encode($response);
    }

    public function testSingleEvent($id) {
        $eventModel = $this->model('event');
        $event = $eventModel->singleEvent($id);

        // print_r($event);
    
        $response = ['message' => 'Successfully Fetched', 'data' => $event];
        
        echo json_encode($response);
        // if($event){
        //     Response::ok('successfully fetched');
        // }
        // else{
        //     Response::badRequest('something went wrong');
        // }
    }

    public function editTest($id){
        $eventModel = $this->model('event');
        $json  =  json_decode(file_get_contents('php://input'));


        $isUpdated = $eventModel->editEvent($json, $id);

     
        if($isUpdated){
            $response = ['message' => 'Successfully Fetched', 'isSuccess' => 1];
            echo json_encode($response);
        }
        else{
            $bad_request = ['message' => 'Something went wrong', 'isSuccess' => 0];
            echo json_encode($bad_request);
            //error
        }
        
    }

  

    public function deleteTest($id){
        $eventModel = $this->model('event');


        $isDeleted = $eventModel->deleteEvent2($id);

     
        if($isDeleted){
            $response = ['message' => 'Successfully Deleted', 'isSuccess' => 1];
            echo json_encode($response);
        }
        else{
            $bad_request = ['message' => 'Something went wrong', 'isSuccess' => 0];
            echo json_encode($bad_request);
            //error
        }
        
    }
}