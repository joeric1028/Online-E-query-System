<?php
    class ManageUsers extends CI_Controller {

        public function index() {
            if (!is_https()) {
                redirect('users', 'location', 301);
            }

            if (!$this->session->has_userdata('logged_in')) {
                redirect('login');
            }

            $data = array(
                'idnumber'      =>  $this->session->idnumber,
                'id'            =>  $this->session->id,
                'type'          =>  $this->session->type,
                'firstname'     =>  $this->session->firstname,
                'middlename'    =>  $this->session->middlename,
                'lastname'      =>  $this->session->lastname,
                'sex'           =>  $this->session->sex,
                'logged_in'     =>  $this->session->logged_in,
                'title'         =>  'Manage Users',
                'activePage'    =>  'users'
            );

            $this->load->view('templates/header', $data);
            $this->load->view('manage_users/index', $data);
            $this->load->view('templates/footer');
        }

        public function createuser() {
            header("Content-Type: application/json; charset=UTF-8");
            $this->User_model->create_user();
        }

        public function updateuser() {
            header("Content-Type: application/json; charset=UTF-8");
            $this->User_model->update_user();
        }

        public function deleteuser() {
            header("Content-Type: application/json; charset=UTF-8");
            $this->User_model->delete_user();
        }

        public function searchparent() {
            header("Content-Type: application/json; charset=UTF-8");
            $this->User_model->search_parent();
        }
    }
