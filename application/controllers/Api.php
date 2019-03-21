<?php
    class Api extends CI_Controller {
        
        public function user_list() {
            header("Content-Type: application/json; charset=UTF-8");
            $data = json_encode($this->User_model->get_users());

            echo $data;
        }

        public function logout() {
            $this->User_model->logout();

            redirect('login');
        }

        public function get_pic() {
            header("Content-Type: application/json; charset=UTF-8");
            
            if ($this->session->has_userdata('logged_in')) {
                if ($this->session->has_userdata('pic')) {
                    $data = array('data' => array('pic' => base_url('uploads/' . $this->session->pic)));

                    echo json_encode($data);
                } else {
                    if ($this->session->sex == 'Male') {
                        $data = array('data' => array('pic' => base_url('assets/img/profilepictures/avatarM.png')));

                        echo json_encode($data);
                    } else {
                        $data = array('data' => array('pic' => base_url('assets/img/profilepictures/avatarF.png')));

                        echo json_encode($data);
                    }
                }
            } else {
                $data = array('data' => array('pic' => base_url('assets/img/profilepictures/avatarM.png')));

                echo json_encode($data);
            } 
        }

        public function changepassword() {
            header("Content-Type: application/json; charset=UTF-8");
            $this->User_model->changepassword();
        }

        public function changepic() {
            header("Content-Type: application/json; charset=UTF-8");
            $this->User_model->changepic();
        }
    }
