<?php

/**
 * Created by PhpStorm.
 * User: Shehzad
 * Date: 12/2/2017
 * Time: 2:20 PM
 */
class Signup extends CI_Controller
{
    public function index()
    {
        $this->load->view('header/header');//<head>
        $this->load->view('header/css');
        $this->load->view('header/navigation');//</head>
        $this->load->view('registration/singup');
        $this->load->view('footer/footer');
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }


    public function newUser()
    {

        $this->form_validation->set_rules('fullName', 'full Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('conPassword', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == false ){
            $this->index();
        }
        else{
            $data['fullName'] = $this->input->post('fullName',true);
            $data['email'] = $this->input->post('email',true);
            $data['password'] = $this->input->post('password',true);
            $data['password'] = hash('md5',$data['password']);
            $data['eLink'] = random_string('alnum',15);
            $data['date'] = date('Y-m-d H:i:s');
            $checkuser = $this->modRegister->checkUser($data['email']);
            if ($checkuser->num_rows() > 0){
                $this->session->set_flashdata('message','Email exist.');
                redirect('signup');
            }
            else{
                $myreturn = $this->modRegister->addNewUser($data);
                if ($myreturn){
                    if ($this->sendEamilToUser($data)){
                        $this->session->set_flashdata('message','We have successfully created your account and please go to your email address and activate the email');
                        redirect('signup');
                    }
                    else{
                        $this->session->set_flashdata('message','we have successfully created your account but we can\'t send an email to your address.');
                        redirect('signup');
                    }

                }
                else{
                    $this->session->set_flashdata('message','not added.');
                    redirect('signup');
                }

            }

        }


    }


    public function confirm($link = null)
    {
        if (isset($link) && !empty($link)){
            $xyz = $this->modRegister->checkLink($link);
            if ($xyz->num_rows() === 1){
                $data['status'] = 1;
                $data['eLink'] =  $link.'ok';
                $myRetrun = $this->modRegister->activateTheAccount($data,$link);
                if ($myRetrun){
                    $this->session->set_flashdata('message','You have successfully Activated you account.');
                    redirect('signup');
                }
                else{
                    $this->session->set_flashdata('message','We can\'t Activate your account right now.');
                    redirect('signup');
                }
            }
            else{
                $this->session->set_flashdata('message','The Link is expire.');
                redirect('signup');
            }

        }
        else{
            $this->session->set_flashdata('message','Please check the email address and try again.');
            redirect('signup');
        }
    }

    private function sendEamilToUser($data){

        $config = array(
            'useragent' => 'CodeIgniter',
            'protocol' => 'mail',
            'mailpath' => '/usr/sbin/sendmail',
            'smtp_host' => 'localhost',
            'smtp_user' => 'CI3@shakzee.com',
            'smtp_pass' => 'Shakzee123$',
            'smtp_port' => 25,
            'smtp_timeout' => 55,
            'wordwrap' => TRUE,
            'wrapchars' => 76,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'validate' => FALSE,
            'priority' => 3,
            'crlf' => "\r\n",
            'newline' => "\r\n",
            'bcc_batch_mode' => FALSE,
            'bcc_batch_size' => 200,
        );
        $message = '<strong>'.$data['fullName'].'</strong>'.anchor(site_url('signup/confirm/'.$data['eLink']),'Activate the link','class="myclass"');
        $this->load->library('email',$config);
        $this->email->set_newline('\r\n');
        $this->email->from('CI3@shakzee.com');
        $this->email->to($data['email']);
        $this->email->subject('Account Actvation');
        $this->email->message($message);
        $this->email->set_mailtype('html');

        if($this->email->send()){
            return TRUE;
        }
        else{
            return FALSE;
        }

    }


}//class ends here