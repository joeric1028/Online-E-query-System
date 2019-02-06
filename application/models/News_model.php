<?php
class News_model extends CI_Model {

    public function __construct()
	{
		$this->load->database();
	}
	
	public function get_news($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('schoolactivities');
			return $query->result_array();
		}
		$query = $this->db->get_where('schoolactivities', array('slug' => $slug));
		return $query->row_array();
	}

	public function get_upcomingEvent()
	{
		// $splitdate = explode( '-', $this->input->post('eventdate'));
		// $data = array(
        // 	'name' => $this->input->post('eventname'),
        // 	'startdate' => $splitdate[0],
        // 	'enddate' => $splitdate[1]
		// );

		// $query = $this->db->get_where('schoolactivities', array('slug' => $slug));
		// return $query->row_array();
	}

	public function create_event()
	{
		// $splitdate = explode( '-', $this->input->post('eventdate'));
		// $data = array(
        // 	'name' => $this->input->post('eventname'),
        // 	'startdate' => $splitdate[0],
        // 	'enddate' => $splitdate[1]
		// );
		
		// $query = $this->db->get_where('schoolyear', array('slug' => $slug));
		// return $query->row_array();
	}
}