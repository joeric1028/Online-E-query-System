<?php
class Accounts extends CI_Controller
{
    public function index()
    {
        if(!is_https())
        {
            redirect('accounts', 'location', 301);
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
            'title' =>  'Welcome to E-Query System!',
            'activePage' => 'accounts'
        );

        $this->load->view('templates/header', $data);
        $this->load->view('accounts/index', $data);
        $this->load->view('templates/footer');
    }

    /* Subjects */
    public function getaccounts()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Subjects_model->get_accounts();
    }

    public function getsubjectsbylevel($gradelevel) {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Subjects_model->get_subjectsbylevel($gradelevel);
    }

    public function createsubject() {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Subjects_model->create_subject();
    }
    /* Subjects */
}