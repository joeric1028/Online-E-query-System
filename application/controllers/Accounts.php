<?php
    class Accounts extends CI_Controller {
        public function index()
        {
            if(!is_https()) {
                redirect('accounts', 'location', 301);
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
                'title'         =>  'Accounts',
                'activePage'    =>  'accounts'
            );

            $this->load->view('templates/header', $data);
            $this->load->view('accounts/index', $data);
            $this->load->view('templates/footer');
        }

    /* Accounts */
    public function getaccounts()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->get_accounts();
    }
    /* Accounts */

    /* Assessments */
    public function getassessments()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->get_assessments();
    }

    public function getassessmetsbystudentid($studentId) {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->get_assessmentsbystudentid($studentId);
    }

    public function createassessment() {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->create_assessment();
    }

    public function deleteassessment($assessmentId) {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->delete_assessment();
    }
    /* Assessments */
}
