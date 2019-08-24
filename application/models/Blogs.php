<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2/11/2018
 * Time: 6:39 PM
 */

class Blogs extends CI_Model
{
	public function checkBlog($data)
	{
		return $this->db->get_where('blogs',array('bTitle'=>$data['bTitle']));
	}

	public function addBlog($data)
	{
		return $this->db->insert('blogs',$data);
	}

	public function getAllBlogs()
	{
		return $this->db->select('blogs.*,students.*')
			->from('blogs')
			->where('bStatus',1)
			->join('students','students.id = blogs.userId')
			->get();
	}

	public function checkBlogById($bId)
	{
		return $this->db->select('blogs.*,students.*')
			->from('blogs')
			->where('bStatus',1)
			->where('bId',$bId)
			->join('students','students.id = blogs.userId')
			->get()
			->result_array();
	}
}//class
