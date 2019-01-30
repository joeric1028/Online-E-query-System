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
				return true;
			}
		}
		return false;
	}

	public function create_user()
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
		
		$query = $this->db->get_where('users', array('idnumber' => $data['idnumber']));
		
		foreach ($query->result() as $row)
		{
			if ($data['idnumber'] == $row->idnumber)
			{
				return false; //error: User exist. Can't create user.
			}
		}

		//success: User not found. Can create user.
		$query = $this->db->insert('users', $data);
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
		
		$query = $this->db->replace('table', $data);
	}

	public function delete_user()
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
		
		$query = $this->db->delete('users', array('idnumber' => $data['idnumber']));
	}
}