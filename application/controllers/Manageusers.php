<?php
class Manageusers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $activePage = "offnungszeiten.php";

        $data['title'] = 'Manage Users';
        $data['activePage'] = 'users';

        $this->load->view('templates/header', $data);
        $this->load->view('manage_users/index', $data);
        $this->load->view('templates/footer');
    }

    public function createuser()
    {
        $this->User_model->create_user();
    }

    public function deleteuser()
    {
        $this->User_model->delete_user();
    }
}
