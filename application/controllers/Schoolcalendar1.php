<?php
class SchoolCalendar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Welcome to E-Query System!';
        $data['activePage'] = "calendar";

        $this->load->view('templates/header', $data);
        $this->load->view('school_calendar/index', $data);
        $this->load->view('templates/footer');
    }
}