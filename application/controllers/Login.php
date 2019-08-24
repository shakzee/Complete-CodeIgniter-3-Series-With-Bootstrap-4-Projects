<?php
 /**
 * Created by PhpStorm.
 * User: Shehzad
 * Date: 12/2/2017
 * Time: 5:02 PM
 */
class Login extends CI_Controller
{
    public function index()
    {
		if ($this->session->userdata('uId')) {
			redirect('user');
		}
		else{
			$this->load->view('header/header');//<head>
			$this->load->view('header/css');
			$this->load->view('header/navigation');//</head>
			$this->load->view('registration/login');
			$this->load->view('footer/footer');
			$this->load->view('footer/js');
			$this->load->view('footer/endhtml');
		}
    }

    public function checkUser()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false ) {
            $this->index();
        }
        else{
            $data['email'] =  $this->input->post('email',TRUE);
            $data['password'] = $this->input->post('password',TRUE);
            $data['password'] =    hash('md5',$data['password']);
            $myvar = $this->modRegister->checkUserWithPssword($data);
            if (!empty($myvar) AND count($myvar) === 1){
                if($myvar[0]['status'] == 0){
                    $this->session->set_flashdata('message','Please Activate your account.');
                    redirect('login');
                }
                else if($myvar[0]['status'] == 2){
                    $this->session->set_flashdata('message','The Admin Bocked you Please contact the admin');
                    redirect('login');
                }
                 else if($myvar[0]['status'] == 1){
                    $sessValue = array(
                            'uId'=>$myvar[0]['id'],
                            'email'=>$myvar[0]['email'],
                            'fullName'=>$myvar[0]['fullName'],
                    );
                    $this->session->set_userdata($sessValue);
                    if ($this->session->userdata('uId')){
                        redirect('user');
                    }
                    else{
                        $this->session->set_flashdata('message','You can\'t login now please try again.');
                        redirect('login');
                    }

                 }
            }
            else{
                $this->session->set_flashdata('message','Please check your email address and password');
                redirect('login');
            }

        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}//class here
