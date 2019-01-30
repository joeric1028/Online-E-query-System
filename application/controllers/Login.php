<?php
class Login extends CI_Controller
{
    public function index()
    {
        $data['status'] = '';
        $data['errorstatus'] = '';
        $data['title'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('login/index', $data);
            $this->load->view('templates/footer');
        } 
        else
        {
            if ($this->Login_model->authenticate_user())
            {
                $data['status'] = 'Login Successfully!';
                
                $this->load->view('templates/header', $data);
                $this->load->view('login/index', $data);
                $this->load->view('templates/footer');

                redirect('/users');
            }
            else
            {
                $data['errorstatus'] = 'Login Failed! Please try again!';

                $this->load->view('templates/header', $data);
                $this->load->view('login/index', $data);
                $this->load->view('templates/footer');
            }
        }
    }
}