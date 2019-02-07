<?php
class SchoolCalendar extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Welcome to E-Query System!';
        $data['activePage'] = "calendar";

        $this->load->view('templates/header', $data);
        $this->load->view('school_calendar/index', $data);
        $this->load->view('templates/footer');
    }

    public function upcomingevent()
    {
        $this->News_model->get_upcomingEvent();
    }

    public function createevent()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $this->News_model->create_event();
    }
}