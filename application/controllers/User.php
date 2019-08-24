<?php

/**
 * Created by PhpStorm.
 * User: Shehzad
 * Date: 12/2/2017
 * Time: 6:09 PM
 */
class User extends  CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('uId')){
            $this->load->view('header/header');//<head>
            $this->load->view('header/css');
            $this->load->view('header/navigation');//</head>
            $this->load->view('users/home');
            $this->load->view('footer/footer');
            $this->load->view('footer/js');
            $this->load->view('footer/endhtml');
        }
        else{
            $this->session->set_flashdata('message','Please Login first');
            redirect('login');
        }
    }
}