<?php
class User_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}
	
	public function authenticate_user()
	{
    	$data = array(
        	'idnumber' => $this->input->post('username'),
        	'password' => $this->input->post('password')
		);
		
		$query = $this->db->get_where('users', array('idnumber' => $data['idnumber']));
		
		foreach ($query->result() as $row)
		{
			if ($data['idnumber'] == $row->idnumber && $data['password'] == $row->password)
			{
				$newdata = array(
					'idnumber'  => $row->idnumber,
					'id'     => $row->id,
					'type'     => $row->type,
					'firstname'     => $row->firstname,
					'middlename'     => $row->middlename,
					'lastname'     => $row->lastname,
					'sex'     => $row->sex,
					'logged_in' => TRUE
				);	
			
				$this->session->set_userdata($newdata);

				return true;
			}
		}
		return false;
	}

	public function logout()
	{
		$unsetdata = array(
			'idnumber',
			'id',
			'type',
			'firstname',
			'middlename',
			'lastname',
			'sex',
				'logged_in'
		);

		$this->session->unset_userdata($unsetdata);
	}

	public function create_user()
	{
		$data = array(
        	'idnumber' => $this->input->post('idnumber'),
        	'firstname' => $this->input->post('firstname'),
        	'middlename' => $this->input->post('middlename'),
        	'lastname' => $this->input->post('lastname'),
        	'sex' => $this->input->post('sex'),
        	'type' => $this->input->post('type'),
        	//'password' => $this->input->post('password')
		);

		
		$query = $this->db->get_where('users', array('idnumber' => $data['idnumber']));
		
		foreach ($query->result() as $row)
		{
			if ($data['idnumber'] == $row->idnumber)
			{
				$errorMessage = "User exist. Can't create user";
				$error = array('error' => $errorMessage);
				echo json_encode($error); //error: User exist. Can't create user.
				exit();
			}
		}

		//success: User not found. Can create user.
		$query = $this->db->insert('users', $data);

		if ($query == false)
		{
			$errorMessage = "Unable to proceed. Can't create user";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		}
		else {
			$successMessage = "Creating user account has been successful.";
			$success = array('success' => $successMessage);
			echo json_encode($success);
		}
	}

	public function get_users()
	{
		$query = $this->db->get('users');

		return $query->result();
	}

	public function read_user($data)
	{
		$query = $this->db->get_where('users', array('idnumber' => $data));
		
		foreach ($query->result() as $row)
		{
			if ($data == $row->idnumber)
			{
				//success: User exist. Read user.
				$data = array(
					'idnumber' => $row->username,
					'firstname' => $row->firstname,
					'middlename' => $row->middlename,
					'lastname' => $row->lastname,
					'sex' => $row->sex,
					'type' => $row->type,
					'password' => $row->password
				);
				return $data;
			}
		}
		return false; //error: user not exist. Can't read user.
	}

	public function update_user()
	{
		$data = array(
        	'idnumber' => $this->input->post('username'),
        	'firstname' => $this->input->post('firstname'),
        	'middlename' => $this->input->post('middlename'),
        	'lastname' => $this->input->post('lastname'),
        	'sex' => $this->input->post('sex'),
        	'type' => $this->input->post('type'),
        	'password' => $this->input->post('password')
		);

		$query = $this->db->update('users', $data, array('idnumber' => $data['idnumber']));

		if ($query == false)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function delete_user()
	{
		$data = array(
        	'id' => $this->input->post('id')
		);
		
		$query = $this->db->delete('users', $data);
		
		header("Content-Type: application/json; charset=UTF-8");

		if ($query == false)
		{
			$errorMessage = "Unable to proceed. Can't delete user";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		}
		else
		{
			$successMessage = "Deleting user account has been successful.";
			$error = array('success' => $successMessage);
			echo json_encode($error);
		}
	}
}