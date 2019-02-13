<?php
class Subjects_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
    }
    
    public function get_subjects()
	{
	
        $query = $this->db->get('subjects');
		echo json_encode($query);

	}
    	/*
	public function create_subject()
	{
		$data = array(
        	'id' => $this->input->post('idnumber'),
        	'subjectname' => $this->input->post('firstname'),
        	'gradelevel' => $this->input->post('middlename')
		);
		
		$query = $this->db->get_where('subjects', array('idnumber' => $data['id']));
		
		foreach ($query->result() as $row)
		{
			if ($data['id'] == $row->idnumber)
			{
				$errorMessage = "Subject exist. Can't create subject";
				$error = array('error' => $errorMessage);
				echo json_encode($error); //error: User exist. Can't create user.
				exit();
			}
		}

		//success: User not found. Can create user.
		$query = $this->db->insert('subjects', $data);

		if ($query == false)
		{
			$errorMessage = "Unable to proceed. Can't create subject";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		}
		else {
			$successMessage = "Creating subject has been successful.";
			$success = array('success' => $successMessage);
			echo json_encode($success);
		}
    }*/
}