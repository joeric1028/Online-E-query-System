<?php
class ManageStudents extends CI_Controller {
    public function index()
    {
        if(!is_https())
        {
            redirect('students', 'location', 301);
        }

        if (!$this->session->has_userdata('logged_in'))
        {
            redirect('login');
        }

        $data = array(
            'idnumber'  => $this->session->idnumber,
            'id'     => $this->session->id,
            'type'     => $this->session->type,
            'firstname'     => $this->session->firstname,
            'middlename'     => $this->session->middlename,
            'lastname'     => $this->session->lastname,
            'sex'     => $this->session->sex,
            'logged_in' => $this->session->logged_in,
            'title' =>  'Manage Students',
            'activePage' => 'students'
        );

        $this->load->view('templates/header', $data);
        $this->load->view('manage_students/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function getsubjects()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Subjects_model->get_subjects();
    }

}
