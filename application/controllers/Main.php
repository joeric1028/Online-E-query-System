<?php
class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['news'] = $this->Student_model->get_student();
        $data['title'] = 'Welcome to E-Query System!';
        $data['activePage'] = "dashboard";

        $this->load->view('templates/header', $data);
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
}