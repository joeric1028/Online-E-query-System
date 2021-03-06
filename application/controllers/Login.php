<?php
    class Login extends CI_Controller {
        
        public function index() {
            if (!is_https()) {
                redirect('login', 'location', 301);
            }

            $data = array(
                'status'        => '',
                'errorstatus'   => '',
                'title'         => 'Login',
                'activePage'    => ''
            );

            if ($this->form_validation->run('login') === FALSE) {
                //checks the session data if user logged in
                if ($this->session->has_userdata('logged_in')) {
                    $data['status'] = 'Already logged in. Redirecting ...';
                    $data['firstname'] = $this->session->firstname;

                    $this->output->set_header('refresh:3;url=' . site_url('main'));
                }

                $this->load->view('templates/header', $data);
                $this->load->view('login/index', $data);
                $this->load->view('templates/footer');
            } else {
                if ($this->User_model->authenticate_user()) {
                    $data['firstname'] = $this->session->firstname;
                    $data['status'] = 'Login Successful. Redirecting ...';
                    
                    $this->load->view('templates/header', $data);
                    $this->load->view('login/index', $data);
                    $this->load->view('templates/footer');

                    $this->output->set_header('refresh:3;url=' . site_url('main'));
                } else {
                    $data['errorstatus'] = 'Login Failed! Please try again!';

                    $this->load->view('templates/header', $data);
                    $this->load->view('login/index', $data);
                    $this->load->view('templates/footer');
                }
            }
        }
    }