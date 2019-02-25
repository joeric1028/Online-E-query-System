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
        	'firstname' => $this->input->post('firstName'),
			'middlename' => $this->input->post('middleName'),
			'lastname' => $this->input->post('firstName'),
			'gender' => $this->input->post('gender'),
			'gradelevel' => $this->input->post('gradeLevel'),
			//'parent_id' => $this->input->post('parentId'),
		);
		
		$query = $this->db->insert('student', $data);
		$newSubject = $this->db->insert_id();

		if ($query == false)
		{
			$errorMessage = "Unable to proceed. Can't add student";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		}
		else {
			$query = $this->db->get_where('student',array('gradelevel' => $this->input->post('gradeLevel')));
			echo json_encode($query->result());

		}
	}
}