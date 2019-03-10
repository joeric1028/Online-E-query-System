<?php
    class ManageStudents extends CI_Controller {
        
        public function index() {
            if (!is_https()) {
                redirect('students', 'location', 301);
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
                'title'         =>  'Manage Students',
                'activePage'    =>  'students'
            );

            $this->load->view('templates/header', $data);
            $this->load->view('manage_students/index', $data);
            $this->load->view('templates/footer');
        }
        
        /* Students */
        public function getstudents() {
            header("Content-Type: application/json; charset=UTF-8");
            $this->Student_model->get_students();
        }

        public function getstudentsbylevel($gradelevel) {
            header("Content-Type: application/json; charset=UTF-8");
            $this->Student_model->get_studentsbylevel($gradelevel);
        }

        public function getstudentsbyparent($parentId) {
            header("Content-Type: application/json; charset=UTF-8");
            $this->Student_model->get_studentsbyparent($parentId);
        }

        public function createstudent() {
            header("Content-Type: application/json; charset=UTF-8");
            $this->Student_model->create_student();
        }
        /* Students */

        /* Subjects */
        public function getsubjects() {
            header("Content-Type: application/json; charset=UTF-8");
            $this->Subjects_model->get_subjects();
        }

        public function getsubjectsbylevel($gradelevel) {
            header("Content-Type: application/json; charset=UTF-8");
            $this->Subjects_model->get_subjectsbylevel($gradelevel);
        }

        public function createsubject() {
            header("Content-Type: application/json; charset=UTF-8");
            $this->Subjects_model->create_subject();
        }
        /* Subjects */
  
    }

    