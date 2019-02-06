<?php
  class Student_model extends CI_Model {
       
      public function __construct(){
          
        $this->load->database();
        
      }
      
      //API call - get a student record by isbn
      public function getStudentbyid($id){  
           $this->db->select('id, firstname, lastname, email, address');
           $this->db->from('students');
           $this->db->where('id',$id);
           $query = $this->db->get();
           
           if($query->num_rows() == 1)
           {
               return $query->result_array();
           }
           else
           {
             return 0;
          }
      }
    //API call - get all students record
    public function getallstudents(){   
        $this->db->select('id, firstname, lastname, email, address');
        $this->db->from('students');
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get();
        if($query->num_rows() > 0){
          return $query->result_array();
        }else{
          return 0;
        }
    }
   
   //API call - delete a student record
    public function delete($id){
       $this->db->where('id', $id);
       if($this->db->delete('students')){
          return true;
        }else{
          return false;
        }
   }
   
   //API call - add new student record
    public function add($data){
        if($this->db->insert('students', $data)){
           return true;
        }else{
           return false;
        }
    }
    
    //API call - update a student record
    public function update($id, $data){
       $this->db->where('id', $id);
       if($this->db->update('students', $data)){
          return true;
        }else{
          return false;
        }
    }
}