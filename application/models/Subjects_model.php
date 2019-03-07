<?php
class Subjects_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
    
	public function get_subjects() {
		$query = $this->db->get('subjects');
		echo json_encode($query->result());
	}
    
	public function get_subjectsbylevel($gradelevel) {
		$query = $this->db->get_where('subjects',array('gradelevel' => $gradelevel));
		echo json_encode($query->result());
	}
    	
	public function create_subject() {
		$data = array(
        	'subject' => $this->input->post('subjectName'),
        	'gradelevel' => $this->input->post('gradeLevel')
		);
		
		$query = $this->db->insert('subjects', $data);
		$newSubject = $this->db->insert_id();

		if ($query == false) {
			$errorMessage = "Unable to proceed. Can't create subject";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		}
		else {
			if($this->input->post('selectedLevel') != "") {
				$query = $this->db->get_where('subjects',array('gradelevel' => $this->input->post('selectedLevel')));
				echo json_encode($query->result());
			} else {
				$query = $this->db->get('subjects');
				echo json_encode($query->result());
			}
		}
	}
} 