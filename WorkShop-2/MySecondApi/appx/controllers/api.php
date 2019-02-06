<?php
require(APPPATH.'/libraries/REST_Controller.php');
 
class Api extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('students');
    }
    //API - client sends id and on valid id student information is sent back
    function studentbyid_get(){
        $id  = $this->get('id');
        
        if(!$id){
            $this->response("No id specified", 400);
            exit;
        }
        $result = $this->Student_model->getStudentbyid( $id );
        if($result){
            $this->response($result, 200); 
            exit;
        } 
        else{
             $this->response("Invalid id", 404);
            exit;
        }
    } 
    //API -  Fetch All students
    function students_get(){
        $result = $this->Student_model->getallstudents();
        if($result){
            $this->response($result, 200); 
        } 
        else{
            $this->response("No record found", 404);
        }
    }
     
    //API - create a new student item in database.
    function addStudent_post(){
         $firstname      = $this->post('firstname');
         $lastname     = $this->post('lastname');
         $email    = $this->post('email');
         $address  = $this->post('address');
        
         if(!$firstname || !$lastname || !$email || !$address){
                $this->response("Enter complete student information to save", 400);
         }else{
            $result = $this->Student_model->add(array("firstname"=>$firstname, "lastname"=>$lastname, "email"=>$email, "address"=>$address));
            if($result === 0){
                $this->response("Student information coild not be saved. Try again.", 404);
            }else{
                $this->response("success", 200);  
            }
        }
    }
    
    //API - update a stuent
    function updateStudent_put(){
         
         $firstname      = $this->put('firstname');
         $lastname     = $this->put('lastname');
         $email    = $this->put('email');
         $address  = $this->put('address');
         
         if(!$firstname || !$lastname || !$email || !$address ){
                $this->response("Enter complete student information to save", 400);
         }else{
            $result = $this->Student_model->update($id, array("firstname"=>$firstname, "lastname"=>$lastname, "email"=>$email, "address"=>$address));
            if($result === 0){
                $this->response("Student information coild not be saved. Try again.", 404);
            }else{
                $this->response("success", 200);  
            }
        }
    }
    //API - delete a student 
    function deleteStudent_delete()
    {
        $id  = $this->delete('id');
        if(!$id){
            $this->response("Parameter missing", 404);
        }
         
        if($this->Student_model->delete($id))
        {
            $this->response("Success", 200);
        } 
        else
        {
            $this->response("Failed", 400);
        }
    }
}