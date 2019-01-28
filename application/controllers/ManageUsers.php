<?php
class ManageUsers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = 'Manage Users';
        $data['activePage'] = "users";

        $this->load->view('templates/header', $data);
        $this->load->view('manage_users/index', $data);
        $this->load->view('templates/footer');
    }
}