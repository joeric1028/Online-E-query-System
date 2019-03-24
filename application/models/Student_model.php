<?php
class Student_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	public function get_students()
	{
		$this->db->select('student.id, student.firstname, student.middlename, student.lastname, student.gradelevel, users.id AS parent_id, users.firstname AS parent_firstname, users.lastname AS parent_lastname');
		$this->db->from('student');
		$this->db->join('users', 'student.users_id = users.id');
		$query = $this->db->get();

		if ($query == false) {
			$errorMessage = "Error retrieving student.";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		} else {
			if ($query->num_rows() == 0){
				$errorMessage = "No student is enrolled.";
				$error = array('warning' => $errorMessage);
				echo json_encode($error);
			} else {
				echo json_encode($query->result());
			}
		}
	}
    
	public function get_studentsbylevel($gradelevel) {
		$this->db->select('student.id, student.firstname, student.middlename, student.lastname, student.gradelevel, users.id AS parent_id, users.firstname AS parent_firstname, users.lastname AS parent_lastname');
		$this->db->from('student');
		$this->db->where('gradelevel', $gradelevel);
		$this->db->join('users', 'student.users_id = users.id');
		$query = $this->db->get();
		// $query = $this->db->get_where('student',array('gradelevel' => $gradelevel));

		if ($query == false) {
			$errorMessage = "Error retrieving student.";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		} else {
			if ($query->num_rows() == 0){
				$errorMessage = "No student is enrolled.";
				$error = array('warning' => $errorMessage);
				echo json_encode($error);
			} else {
				echo json_encode($query->result());
			}
		}
	}

	public function get_studentsbyparent($parentId) {
		$query = $this->db->get_where('student',array('users_id' => $parentId));
		echo json_encode($query->result());
		
	}
    	
	public function create_student() {
		$data = array(
			'id' => $this->input->post('idNumber'),
        	'firstname' => $this->input->post('firstName'),
			'middlename' => $this->input->post('middleName'),
			'lastname' => $this->input->post('lastName'),
			'gender' => $this->input->post('gender'),
			'gradelevel' => $this->input->post('gradeLevel'),
			'users_id' => $this->input->post('parentId')
		);
 
		$query = $this->db->insert('student', $data);

		if ($query == false) {
			$errorMessage = "Unable to proceed. Can't add student";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		}
		else {
			$this->db->select('student.id, student.firstname, student.middlename, student.lastname, student.gradelevel, users.id AS parent_id, users.firstname AS parent_firstname, users.lastname AS parent_lastname');
			$this->db->from('student');
			$this->db->join('users', 'student.users_id = users.id');
			if($this->input->post('selectedLevel') != "") {
				$this->db->where('gradelevel', $this->input->post('selectedLevel'));
				$query = $this->db->get();
				echo json_encode($query->result());
			} else {
				$query = $this->db->get();
				echo json_encode($query->result());
			}

		}
	}

	public function update_student($studentId) {
		$data = array(
			'id' => $this->input->post('id'),
			'firstname' => $this->input->post('firstName'),
			'middlename' => $this->input->post('middleName'),
			'lastname' => $this->input->post('lastName'),
			'users_id' => $this->input->post('parentId')
		);

		$userExists = $this->db->get_where('student', array('id' => $studentId));

		$this->db->where('id',$studentId);
		$query = $this->db->update('student',$data);

		if($query) {
			$response_array['status'] = 'success';
			echo json_encode($data['firstname']." ".$data['lastname'].' updated!');
			return true;
		} else {
			$response_array['status'] = 'error';
			echo json_encode('error');
			return false;
		}
	}

	public function delete_student($studentId) {
		$this->db->select('CONCAT(firstname, " ", lastname' );
		$this->db->from('student');
		$this->db->where('id', $studentId);
		$studentName = $this->db->get();
		$query = $this->db->delete('student',array('id' => $studentId));

		if($query) {
			$response_array['status'] = 'success';
			echo json_encode($studentName.' deleted!');
			return true;
		} else {
			$response_array['status'] = 'error';
			echo json_encode('error');
			return false;
		}
	}
}