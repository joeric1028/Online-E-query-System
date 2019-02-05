<?php
class ManageStudents extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Manage Students';
        $data['activePage'] = 'students';

        $this->load->view('templates/header', $data);
        $this->load->view('manage_students/index', $data);
        $this->load->view('templates/footer');
    }

}
