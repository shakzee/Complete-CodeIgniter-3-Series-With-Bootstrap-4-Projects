<?php
/**
 * Created by PhpStorm.
 * User: Shehzad
 * Date: 10/29/2017
 * Time: 7:25 PM
 */
class Home extends CI_Controller
{
    
    public function index()
    {

            $this->load->view('header/header');//<head>
            $this->load->view('header/css');
            $this->load->view('header/navigation');//</head>
            $this->load->view('content/home');
            $this->load->view('footer/footer');
            $this->load->view('footer/js');
            $this->load->view('footer/endhtml');


    }


    public function about()
    {
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/customCSS/css');
        $this->load->view('header/navigation');
        $this->load->view('content/about');
        $this->load->view('footer/footer');
        $this->load->view('footer/js');
        $this->load->view('footer/customJS/js');
        $this->load->view('footer/endhtml');
    }

    public function contactus()
    {
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navigation');
        $this->load->view('content/contactus');
        $this->load->view('footer/footer');
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }

    public function user(){
        $fullName = $this->input->post('fullName',true);
        if (empty($fullName)){
            $this->load->library('session');
            $this->session->set_flashdata('message','Please fill the Full name field.');
            redirect('home');
        }
        else{
            echo 'working fine';
        }
        /* $this->load->library('form_validation');
        $this->form_validation->set_rules('fullName','Full Name','required|min_length[10]|trim');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required|max_length[8]');
        $this->form_validation->set_rules('confpassword','Confirm password','required|trim|matches[password]');

        if($this->form_validation->run() == false){
            $this->index();
        }
        else{
            echo 'fine';
        }*/

    }

    public function mysession(){
        $this->load->library('session');
        $mysession = $this->session->all_userdata();
        var_dump($mysession);
    }

    public function sessionDelete(){
        $this->load->library('session');
        $this->session->sess_destroy();
    }
    public function myfile(){
        $config['upload_path'] = APPPATH.'../assets/images/';
        $config['allowed_types'] =  'gif|png|jpg';
        $config['max_size'] = 100;
       // $config['max_width'] = 1024;
        //$config['max_height'] = 768;
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('myimg')){
            echo $this->upload->display_errors();
        }
        else{
           $myarra  = $this->upload->data();
           var_dump($myarra);
        }
    }




    public function another()
    {
        $this->load->library('encryption');
        echo $this->encryption->decrypt($myconvert);
    }


    public function showProduct()
    {
        $this->load->library('cart');
        foreach ($this->cart->contents() as $myprodcut){
            echo $myprodcut['id'].'<br>';
            echo $myprodcut['qty'].'<br>';
            echo $myprodcut['price'].'<br>';
            echo $myprodcut['name'].'<br>';
        }
    }



    public function login(){
        echo $this->input->get_post('name',true);

    }
    public function admin()
    {
        echo 'working..';
       // echo current_url();
    }
    

    
}
