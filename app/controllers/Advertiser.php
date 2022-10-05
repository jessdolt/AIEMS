<?php 

class Advertiser extends Controller {
    public function __construct(){
       

    }

    public function index(){
       $data =[];

       $this->view('external_user/home', $data);
    }

    public function accountSettings(){
        $data =[];
 
        $this->view('external_user/accountSettings', $data);
    }

     
    public function changePassword(){
        $data =[];
 
        $this->view('external_user/changePass', $data);
    }

    public function create(){
        $data =[];
 
        $this->view('external_user/create', $data);
     }


     public function signup(){
        $data =[];
 
        $this->view('external_user/signup', $data);
     }
     public function logOut(){
        // $data =[];
 
        // $this->view('external_user/logOut', $data);
     }
}
?>