<?php
class Api extends CI_Controller {
    
    public function user_list()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $data = json_encode($this->User_model->get_users());

        echo $data;
    }
}
