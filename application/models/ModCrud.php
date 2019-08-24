<?php

/**
 * Created by PhpStorm.
 * User: Shehzad
 * Date: 11/18/2017
 * Time: 6:52 PM
 */
class ModCrud extends CI_Model
{
    public function addUser($userData){
        return $this->db->insert('students',$userData);
    }

    public function getAllRecords()
    {
        $this->db->order_by('id','desc');
        return $this->db->get('students');
    }

    public function checkStudent($id){
      return   $this->db->get_where('students',array('id'=>$id))
          ->result_array();
    }
    public function udpateStudent($data,$userId){
        $this->db->where('id',$userId);
      return   $this->db->update('students',$data);
    }
    public function deletStudent($id){
        $this->db->where('id',$id);
        return $this->db->delete('students');
    }
}