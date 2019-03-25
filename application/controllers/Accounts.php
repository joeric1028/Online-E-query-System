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
    
    public function updateaccounts() {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->update_accounts();
    }

    public function deleteaccounts() {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->delete_accounts();
    }

    public function getbalance($studentId) {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->get_balance($studentId);
    }
    /* Accounts */

    /* Assessments */
    public function getassessments()
    {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->get_assessments();
    }
 
    public function getassessmentsbystudentid($studentId) {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->get_assessmentsbystudentid($studentId);
    }

    public function addassessmentsbystudentid() {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->add_assessmentsbystudentid();
    }

    public function updateassessment() {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->update_assessment();
    }
 
    public function deleteassessment($assessmentId) {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->delete_assessment($assessmentId);
    }
    /* Assessments */

    /* Payments */
    public function getpaymentsbystudentid($studentId) {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->get_paymentsbystudentid($studentId);
    }

    public function createpaymentschedule() {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->create_paymentschedule();
    }

    public function deletepayment() {
        header("Content-Type: application/json; charset=UTF-8");
        $this->Accounts_model->delete_payment();
    }

    /* Payments */

}
 