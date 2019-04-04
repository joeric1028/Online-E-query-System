<?php
class Subjects_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
    
	public function get_subjects() {
		$query = $this->db->get('subjects');

		if ($query == false) {
			$errorMessage = "Error retrieving subjects.";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		} else {
			if ($query->num_rows() == 0){
				$errorMessage = "No subject is added.";
				$error = array('warning' => $errorMessage);
				echo json_encode($error);
			} else {
				echo json_encode($query->result());
			}
		}
	}
    
	public function get_subjectsbylevel($gradelevel) {
		$query = $this->db->get_where('subjects',array('gradelevel' => $gradelevel));
		
		if ($query == false) {
			$errorMessage = "Error retrieving subjects.";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		} else {
			if ($query->num_rows() == 0){
				$errorMessage = "No subject is added.";
				$error = array('warning' => $errorMessage);
				echo json_encode($error);
			} else {
				echo json_encode($query->result());
			}
		}
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

	public function update_subject() {
		$data = array(
        	'id' => $this->input->post('id'),
        	'subject' => $this->input->post('subjectName'),
        	'gradelevel' => $this->input->post('gradeLevel'),
		);

		$this->db->where('id',$data['id']);
		$query = $this->db->update('subjects',$data);

		if($query) {
			$response_array['status'] = 'success';
			echo json_encode($data['subject'].' updated!');
			return true;
		} else {
			$response_array['status'] = 'error';
			echo json_encode('error');
			return false;
		}
	}

	public function delete_subject($subjectId) {
		$this->db->select('subject');
		$this->db->from('subjects');
		$this->db->where('id', $subjectId);
		$subject = $this->db->get()->row();
		$query = $this->db->delete('subjects',array('id' => $subjectId));

		if($query) {
			$response_array['status'] = 'success';
			echo json_encode($subject->subject.' deleted!');
			return true;
		} else {
			$response_array['status'] = 'error';
			echo json_encode('error');
			return false;
		}
	}
} 