<?php

/**
 * Created by PhpStorm.
 * User: Shehzad
 * Date: 11/18/2017
 * Time: 6:37 PM
 */
class Crud extends CI_Controller
{
    public function index(){
        $this->load->view('student');

    }
    public function newUser(){
        $data['fullName'] = $this->input->post('fullName',true);
        $data['email'] = $this->input->post('email',true);
        $data['password'] = $this->input->post('password',true);
        $data['age'] = $this->input->post('age',true);
        $data['date'] = date("Y-m-d h:i:sa");
        if (
            empty($data['fullName']) || empty($data['email']) ||
            empty($data['password']) || empty($data['age'])

        ){
            $this->session->set_flashdata('message','Please check required fields.');
            redirect('crud/allStudents');
        }
        else{
            $myreturn = $this->modCrud->addUser($data);
            if ($myreturn){
                $this->session->set_flashdata('message','You have successfully inserted.');
                redirect('crud/allStudents');
            }
            else{
                $this->session->set_flashdata('message','You can\'t insert your student right now, please try again.');
                redirect('crud/allStudents');
            }
        }
    }

    public function allStudents(){
       $data['allStudents'] = $this->modCrud->getAllRecords();
       $this->load->view('allStudents',$data);
    }

    public function editStudent($id =  null)
    {
        $data['stdRecord'] = $this->modCrud->checkStudent($id);
        if (count($data['stdRecord']) == 1){
          $this->load->view('editStudent',$data);
        }
        else{
            $this->session->set_flashdata('message','This record is not exist.');
            redirect('crud/allStudents');
        }

    }

    public function updateStudent()
    {
        $data['fullName'] = $this->input->post('fullName',true);
        $data['email'] = $this->input->post('email',true);
        $data['age'] = $this->input->post('age',true);
        $userId = $this->input->post('userId',true);

        if (
            empty($data['fullName']) || empty($data['email']) ||
           empty($data['age']) || empty($userId)
        ){
            $this->session->set_flashdata('message','Please These fields are required');
            redirect('crud/allStudents');
        }
        else{
            $myreturn = $this->modCrud->udpateStudent($data,$userId);
            if ($myreturn){
                $this->session->set_flashdata('message','You have successfully updated.');
                redirect('crud/allStudents');
            }
            else{
                $this->session->set_flashdata('message','Something went wrong.');
                redirect('crud/allStudents');
            }

        }


    }
    public function deleteStudent($id =  null){
        if (empty($id)){
            $this->session->set_flashdata('message','We can\'t delete your record right now.');
            redirect('crud/allStudents');
        }
        else{
            $idexit = $this->modCrud->checkStudent($id);
            if (count($idexit) === 1){
                $myretrn = $this->modCrud->deletStudent($id);
                if ($myretrn){
                    $this->session->set_flashdata('message','You have succssfully deleted student.');
                    redirect('crud/allStudents');
                }
                else{
                    $this->session->set_flashdata('message','We can\'t delete your record right now.');
                    redirect('crud/allStudents');
                }
            }
            else{
                $this->session->set_flashdata('message','Something went wrong.');
                redirect('crud/allStudents');
            }
        }

    }
}//class ends here