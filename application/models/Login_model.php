<?php
class Login_model extends CI_Model {
	
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
}