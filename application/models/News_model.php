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
		$data = array(
        	'year' => $this->input->post('year'),
        	'month' => $this->input->post('month'),
        	'day' => $this->input->post('day')
		);
		
		$numberdays = cal_days_in_month(CAL_GREGORIAN, $data['month'], $data['year']);

		$query = $this->db->query("SELECT * FROM 'schoolactivities' WHERE 'startdate' BETWEEN '"+ $data['year'] + "-" + $data['month'] + "-" + $data['day']"' AND '"+ $data['year'] + "-" + $data['month'] + "-" + $numberdays +"';");

		if ($query) {
			echo json_encode($query->row_array());
		}
		else
		{

		}
		
	}

	public function create_event()
	{
		$query = $this->db->get_where('schoolyear', array('start' => $this->input->post('start')));

		foreach ($query->result() as $row)
		{
			if ($this->input->post('start') == $row->start)
			{
				$data = array(
					'name' => $this->input->post('name'),
					'startdate' => $this->input->post('startdate'),
					'enddate' => $this->input->post('enddate'),
					'schoolyear_id' => $row->id
				);

				$query = $this->db->insert('schoolactivities', $data);

				if ($query == false)
				{
					$errorMessage = "Unable to proceed. Can't create event";
					$error = array('error' => $errorMessage);
					echo json_encode($error);
				}
				else {
					$successMessage = "Creating event has been successful.";
					$success = array('success' => $successMessage);
					echo json_encode($success);
				}
				exit();
			}
		}

		// If current school year has no data
		$schoolyeardata = array(
			'start' => $this->input->post('start'),
			'end' => ($this->input->post('start')+1)
		);

		$query = $this->db->insert('schoolyear', $schoolyeardata);

		if ($query == false)
		{
			$errorMessage = "Unable to proceed. Can't create event";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		}
		else {
			$query = $this->db->get_where('schoolyear', array('start' => $this->input->post('start')));

			foreach ($query->result() as $row)
			{
				if ($this->input->post('start') == $row->start)
				{
					$data = array(
						'name' => $this->input->post('name'),
						'startdate' => $this->input->post('startdate'),
						'enddate' => $this->input->post('enddate'),
						'schoolyear_id' => $row->id
					);

					$query = $this->db->insert('schoolactivities', $data);

					if ($query == false)
					{
						$errorMessage = "Unable to proceed. Can't create event";
						$error = array('error' => $errorMessage);
						echo json_encode($error);
					}
					else {
						$successMessage = "Creating event has been successful.";
						$success = array('success' => $successMessage);
						echo json_encode($success);
					}
				}
			}
		}
	}
}