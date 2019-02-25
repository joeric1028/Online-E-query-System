<?php
class Accounts_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
    
  	public function get_accounts() {
		$query = $this->db->get('subjects');
		echo json_encode($query->result());
	}
    
  	public function get_accountbystudent($studentId) {
		$query = $this->db->get_where('subjects',array('student_id' => $studentId));
		echo json_encode($query->result());
	}
    	
	public function create_assessment() {
		$data = array(
        	'item' => $this->input->post('assessmentName'),
        	'gradelevel' => $this->input->post('gradeLevel')
		);
		
		$query = $this->db->insert('accounts', $data);
		$newSubject = $this->db->insert_id();

		if ($query == false) {
			$errorMessage = "Unable to proceed. Can't create subject";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		} else {
			$query = $this->db->get_where('subjects',array('gradelevel' => $this->input->post('gradeLevel')));
			echo json_encode($query->result());
		}
	}
}