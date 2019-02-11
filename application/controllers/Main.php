<?php
class Main extends CI_Controller {

    public function index()
    {
        if(!is_https())
        {
            redirect('main', 'location', 301);
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
            'activePage' => 'dashboard'
        );

        $this->load->view('templates/header', $data);
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
}