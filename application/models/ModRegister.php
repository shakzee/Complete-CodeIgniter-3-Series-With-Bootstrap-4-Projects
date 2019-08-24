<?php

/**
 * Created by PhpStorm.
 * User: Shehzad
 * Date: 12/2/2017
 * Time: 2:54 PM
 */
class ModRegister extends CI_Model
{
    public function addNewUser($data)
    {
        return $this->db->insert('students',$data);
    }

    public function checkUser($data)
    {
        return  $this->db->get_where('students',array('email'=>$data));
    }

    public function checkLink($link)
    {
        return  $this->db->get_where('students',array('eLink'=>$link));
    }

    public function activateTheAccount($data,$link)
    {
        $this->db->where('eLink',$link);
        return $this->db->update('students',$data);
    }

    public function checkUserWithPssword($data)
    {
        return $this->db->get_where('students',$data)->result_array();
    }
}