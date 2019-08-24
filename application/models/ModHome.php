<?php

/**
 * Created by PhpStorm.
 * User: Shehzad
 * Date: 10/29/2017
 * Time: 7:47 PM
 */
class ModHome extends CI_Model
{


    public function mychaining(){
        return $this->db->select('cName')
            ->from('students')
            ->where('id','7')
            ->join('classes','classes.userId = students.id')
            ->get();
    }
    public function allClassesWithStudents()
    {
        $this->db->select('cName');
        $this->db->from('classes');
        $this->db->join('students','students.id = classes.userId','right');
        $this->db->where('students.id',1);
       return  $this->db->get();
    }
    public function mylastquery(){
        $this->db->get_where('students',array('id'=>6));
       return $this->db->last_query();
    }
    public function myreturnId($myarray)
    {
        $this->db->insert('students',$myarray);
       return  $this->db->insert_id();
    }
    public function mydelete($userId){
        $this->db->where('id',$userId);
        return $this->db->delete('students');
    }

    public function myupdate($myarray,$userId){
        $this->db->where('id',$userId);
        return $this->db->update('students',$myarray);
    }

    public function Inserting($array){
        return $this->db->insert('students',$array);
        //return $this->db->insert_batch('students',$array);
    }

    public function myorderby(){
        $this->db->limit(2,3);
        $this->db->order_by('id','desc');
      return   $this->db->get('students');
    }

    public function mylike($name){
        $this->db->like('fullName',$name,'full');
        $this->db->or_like('fullName','s');
        $this->db->get('students');
        echo $this->db->last_query();
    }
    public function mywhereIn(){
        $this->db->where_in('id',array(1,22,3,44,65,7,77,99));
        return $this->db->get('students');
    }

    public function myAgr()
    {
      $this->db->select_sum('age');
      $this->db->select('fullName,email');
      return $this->db->get('students');
    }


    public function getAllRecords(){
       return  $this->db->get('students');
    }
    public function myget(){
        return $this->db->get_where('students',array('id'=>1));
    }
    public function mixup(){
        $this->db->select('fullName,email,password,id');
        $this->db->from('students');
        $this->db->where('id',2);
        $this->db->where('password','ll');
       return  $this->db->get();
       //SELECT fullName,email,password from students
    }
	public function addBlog($data)
	{
		return $this->db->insert('blogs',$data);
	}
}
