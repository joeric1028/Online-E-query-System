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
		$date = cal_days_in_month(CAL_GREGORIAN, $this->input->post('month'), $this->input->post('year'));
		$data = array(
			$this->input->post('year') . '-' . $this->input->post('month') . '-' . $this->input->post('day'),
			$this->input->post('year') . '-' . $this->input->post('month') . '-' . $date
		);

		$sql = "SELECT * FROM `schoolactivities` WHERE `startdate` BETWEEN ? AND ? ORDER BY `startdate` ASC;";
		$query = $this->db->query($sql, $data);

		if ($query)
		{
			$result = array( 'data' => $query->result());

			if ($query->first_row() != null)
			{
				echo json_encode($result);
			}
			else {
				$errorMessage = 'No event this month.';
				$error = array('warning' => $errorMessage);
	
				echo json_encode($error);
			}
		}
		else
		{
			$errorMessage = 'Unable to display.';
			$error = array('error' => $errorMessage);
	
			echo json_encode($error);
		}
	}

	public function get_schoolEvent()
	{
		if ($this->input->post('month') <= 3)
		{
			$year = ($this->input->post('year')-1);
		}
		else
		{
			$year = $this->input->post('year');
		}

		$data = array(
			$year . '-6-1',
			($year+1) . '-3-1'
		);

		$sqlactivities = "SELECT * FROM `schoolactivities` WHERE `startdate` BETWEEN ? AND ? ORDER BY `startdate` ASC;";
		$queryactivities = $this->db->query($sqlactivities, $data);

		$sqlyear = "SELECT * FROM `schoolyear` WHERE `id` = ? ;";
		$queryyear = $this->db->query($sqlyear, $queryactivities->first_row()->schoolyear_id);

		if ($queryactivities && $queryyear)
		{
			$result = array( 'data' => array('schoolactivities' => $queryactivities->result(), 
											'schoolyear' => $queryyear->result())
							);

			if ($queryactivities->first_row() != null)
			{
				echo json_encode($result);
			}
			else 
			{
				$errorMessage = 'No event this school year.';
				$error = array('warning' => $errorMessage);
	
				echo json_encode($error);
			}
		}
		else
		{
			$errorMessage = 'Unable to display.';
			$error = array('error' => $errorMessage);
	
			echo json_encode($error);
		}
	}

	public function create_event()
	{
		$date = explode('-', $this->input->post('startdate'));

		if ($date[1] <= 3)
		{
			$year = ($date[0]-1);
		}
		else
		{
			$year = $date[0];
		}

		$query = $this->db->get_where('schoolyear', array('start' => $year));

		foreach ($query->result() as $row)
		{
			if ($year == $row->start)
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
			'start' => $year,
			'end' => ($year+1)
		);

		$query = $this->db->insert('schoolyear', $schoolyeardata);

		if ($query == false)
		{
			$errorMessage = "Unable to proceed. Can't create event";
			$error = array('error' => $errorMessage);
			echo json_encode($error);
		}
		else {
			$query = $this->db->get_where('schoolyear', array('start' => $year));

			foreach ($query->result() as $row)
			{
				if ($year == $row->start)
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