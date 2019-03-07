<?php
class Student_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_students()
	{
	
		$query = $this->db->get('student');
		echo json_encode($query->result());

	}
    
	public function get_studentsbylevel($gradelevel)
	{
	
		$query = $this->db->get_where('student',array('gradelevel' => $gradelevel));
		echo json_encode($query->result());

	}
    	
	public function create_student()
	{
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

		if ($query == false)
		{
			$errorMessage = "Unable to proceed. Can't add student";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		}
		else {
			if($this->input->post('selectedLevel') != "") {
				$query = $this->db->get_where('student',array('gradelevel' => $this->input->post('selectedLevel')));
				echo json_encode($query->result());
			} else {
				$query = $this->db->get('student');
				echo json_encode($query->result());
			}

		}
	}
}