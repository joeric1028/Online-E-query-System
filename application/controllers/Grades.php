<?php
class Grades extends CI_Controller {

    public function index()
    {
        if (!$this->session->has_userdata('logged_in'))
        {
            $this->output->set_header('refresh:3;url=' . site_url('login'));
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
            'activePage' => 'grades'
        );

        $this->load->view('templates/header', $data);
        $this->load->view('grades/index', $data);
        $this->load->view('templates/footer');
    }

    public function getgrades()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Grades_model->read_grades();
    }
}