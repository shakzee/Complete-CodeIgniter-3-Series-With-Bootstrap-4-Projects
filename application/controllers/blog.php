<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2/11/2018
 * Time: 6:09 PM
 */

class blog extends CI_Controller
{
	public function index()
	{
		$data['blogs'] =  $this->blogs->getAllBlogs();
		$this->load->view('header/header');//<head>
		$this->load->view('header/css');
		$this->load->view('header/navigation');//</head>
		$this->load->view('blog/home',$data);
		$this->load->view('footer/footer');
		$this->load->view('footer/js');
		$this->load->view('footer/endhtml');
	}

	public function newblog()
	{
		$this->load->view('header/header');//<head>
		$this->load->view('header/css');
		$this->load->view('header/navigation');//</head>
		$this->load->view('blog/newblog');
		$this->load->view('footer/footer');
		$this->load->view('footer/js');
		$this->load->view('footer/endhtml');
	}

	public function addblog()
	{
		if ($this->session->userdata('uId')) {
			$data['bTitle'] = $this->input->post('btitle',true);
			$data['bBody'] = $this->input->post('bbody',true);
			$data['userId'] = $this->session->userdata('uId');
			$data['bDate'] = date('y:m:d');
			if (
				empty($data['bTitle']) || empty($data['bBody'])
			) {
				echo 'please fill the required fields';
			}
			else{
				$checkBlog = $this->blogs->checkBlog($data);
				if ($checkBlog->num_rows() > 0) {
					$this->session->set_flashdata('message','This blog:<strong> ' . $data['bTitle'] .'</strong>  is already exit.');
					redirect('blog/addblog');
				}
				else{
					$cblog = $this->blogs->addBlog($data);
					if ($cblog) {
						$this->session->set_flashdata('message','Your blog has been inserted.');
						redirect('blog/addblog');
					}
					else{
						$this->session->set_flashdata('message','We can\'t add your blog right now.');
						redirect('blog/addblog');
					}
				}

			}
		}
		else{
			$this->session->set_flashdata('message','Please login before adding any blog.');
			redirect('blog/addblog');
		}

	}

	public function readBlog($blogId)
	{
		if ($this->session->userdata('uId')) {
			if (!empty($blogId)) {
				$data['myblog'] = $this->blogs->checkBlogById($blogId);
				if (count($data['myblog'] === 1)) {
					$this->load->view('header/header');//<head>
					$this->load->view('header/css');
					$this->load->view('header/navigation');//</head>
					$this->load->view('blog/post',$data);
					$this->load->view('footer/footer');
					$this->load->view('footer/js');
					$this->load->view('footer/endhtml');
				}
				else{
					$this->session->set_flashdata('message','Blog not available.');
					redirect('blog');
				}
			}
			else{
				$this->session->set_flashdata('message','Blog not available.');
				redirect('blog');
			}
		}
		else{
			$this->session->set_flashdata('message','Please login before adding any blog.');
			redirect('blog');
		}
	}

}//class
