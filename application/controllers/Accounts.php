<?php
class Accounts extends CI_Controller
{
    public function index()
    {
        if (!$this->session->has_userdata('logged_in'))
        {
            $this->output->set_header('refresh:3;url=' . site_url('login'));
            exit();
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
            'activePage' => 'accounts'
        );

        $this->load->view('templates/header', $data);
        $this->load->view('accounts/index', $data);
        $this->load->view('templates/footer');
    }
}