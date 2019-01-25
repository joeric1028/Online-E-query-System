<?php
class login_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_student($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('student');
			return $query->result_array();
		}
		$query = $this->db->get_where('student', array('slug' => $slug));
		return $query->row_array();
	}
}