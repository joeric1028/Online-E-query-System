<?php
class Login extends CI_Controller
{
    public function index()
    {
        $data['status'] = '';
        $data['errorstatus'] = '';
        $data['title'] = 'Login';
        $data['activePage'] = '';


        if ($this->form_validation->run('login') === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('login/index', $data);
            $this->load->view('templates/footer');
        } 
        else
        {
            if ($this->User_model->authenticate_user())
            {
                $data['status'] = 'Login Successful. Redirecting ...';
                
                $this->load->view('templates/header', $data);
                $this->load->view('login/index', $data);
                $this->load->view('templates/footer');

                $this->output->set_header('refresh:5;url=' . site_url('main'));
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