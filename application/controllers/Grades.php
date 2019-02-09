<?php
class Grades extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Welcome to E-Query System!';
        $data['activePage'] = "grades";

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