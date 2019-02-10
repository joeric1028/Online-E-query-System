<?php
class ManageUsers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

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
            'title' =>  'Manage Users',
            'activePage' => 'users'
        );

        $this->load->view('templates/header', $data);
        $this->load->view('manage_users/index', $data);
        $this->load->view('templates/footer');
    }

    public function createuser()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $this->User_model->create_user();
    }

    public function deleteuser()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $this->User_model->delete_user();
    }
}
