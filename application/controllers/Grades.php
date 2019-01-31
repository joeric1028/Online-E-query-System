<?php
class Grades extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = 'Welcome to E-Query System!';
        $data['activePage'] = "grades";

        $this->load->view('templates/header', $data);
        $this->load->view('grades/index', $data);
        $this->load->view('templates/footer');
    }
}