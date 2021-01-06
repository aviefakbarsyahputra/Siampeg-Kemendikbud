<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class User_model extends CI_Model {
    public function read(){
       $query = $this->db->query("select * from `akun`");
       return $query->row();
   }

   public function login($user, $pass) {
    $this->db->where(array(
        'username'      => $user, 
        'password'      => $pass));
      $akun         = $this->db->get('akun');
      $res['data']  = $akun->row();
      $res['count'] = $akun->num_rows();
      return $res;
   }

   public function insert($data){
       $this->user_name    = $data['name']; // please read the below note
       $this->user_password  = $data['pass'];
       $this->user_type = $data['type'];
       if($this->db->insert('akun',$this)) {    
           return 'Data is inserted successfully';
       } else {
           return "Error has occured";
       }
   }
   public function update($id,$data){
        $this->user_name    = $data['name']; // please read the below note
        $this->user_password  = $data['pass'];
        $this->user_type = $data['type'];
        $result = $this->db->update('akun',$this,array('user_id' => $id));
        if($result) {
           return "Data is updated successfully";
        }else{
           return "Error has occurred";
       }
   }
   public function delete($id){
       $result = $this->db->query("delete from `akun` where user_id = $id");
       if($result) {
           return "Data is deleted successfully";
       } else {
           return "Error has occurred";
       }
   }
}