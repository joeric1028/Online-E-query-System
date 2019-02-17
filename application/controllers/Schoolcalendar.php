<?php
class SchoolCalendar extends CI_Controller {

    public function index()
    {
        if(!is_https())
        {
            redirect('calendar', 'location', 301);
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
            'activePage' => 'calendar'
        );

        $this->load->view('templates/header', $data);
        $this->load->view('school_calendar/index', $data);
        $this->load->view('templates/footer');
    }

    public function upcomingevent()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $this->News_model->get_upcomingEvent();
    }

    public function schoolevent()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $this->News_model->get_schoolEvent();
    }

    public function createevent()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $this->News_model->create_event();
    }

    public function exportevent()
    {
        $this->load->view('school_calendar/exportpdf');
    }
}