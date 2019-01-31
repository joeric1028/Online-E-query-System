<?php
class Grades_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}

	public function create_grades()
	{
		$data = array(
        	'firstgrading' => $this->input->post('firstgrading'),
        	'secondgrading' => $this->input->post('secondgrading'),
        	'thirdgrading' => $this->input->post('thirdgrading'),
        	'fourthgrading' => $this->input->post('fourthgrading'),
        	'schoolyear_id' => $this->input->post('schoolyear_id'),
        	'student_id' => $this->input->post('student_id')
        );
        
        $where = array(
        	'schoolyear_id' => $this->input->post('schoolyear_id'),
        	'student_id' => $this->input->post('student_id')
		);
		
		$query = $this->db->get_where('grades', $where);
		
		foreach ($query->result() as $row)
		{
			if ($data['student_id'] == $row->student_id && $data['schoolyear_id'] == $row->schoolyear_id)
			{
				return false; //error: grades exist. Can't create grades.
			}
		}

		//success: Grades not found. Can create grades.
		$query = $this->db->insert('grades', $data);
	}

	public function read_grades($data)
	{
		$where = array(
        	'schoolyear_id' => $this->input->post('schoolyear_id'),
        	'student_id' => $this->input->post('student_id')
		);

		$query = $this->db->get_where('grades', $where);
		
		foreach ($query->result() as $row)
		{
			if ($where['student_id'] == $row->student_id && $where['schoolyear_id'] == $row->schoolyear_id)
			{
				//success: User exist. Read user.
				$data = array(
					'firstgrading' => $row->firstgrading,
					'secondgrading' => $row->secondgrading,
					'middlename' => $row->middlename,
					'thirdgrading' => $row->thirdgrading,
					'fourthgrading' => $row->fourthgrading,
					'schoolyear_id' => $row->schoolyear_id,
					'student_id' => $row->student_id
				);
				return $data;
			}
		}
		return false; //error: user not exist. Can't read user.
	}

	public function update_grades()
	{
		$data = array(
        	'firstgrading' => $this->input->post('firstgrading'),
        	'secondgrading' => $this->input->post('secondgrading'),
        	'thirdgrading' => $this->input->post('thirdgrading'),
        	'fourthgrading' => $this->input->post('fourthgrading'),
        	'schoolyear_id' => $this->input->post('schoolyear_id'),
        	'student_id' => $this->input->post('student_id')
        );
		
		$where = array(
        	'schoolyear_id' => $this->input->post('schoolyear_id'),
        	'student_id' => $this->input->post('student_id')
		);

		$query = $this->db->update('grades', $data, $where);
	}

	public function delete_user()
	{
		$data = array(
        	'firstgrading' => $this->input->post('firstgrading'),
        	'secondgrading' => $this->input->post('secondgrading'),
        	'thirdgrading' => $this->input->post('thirdgrading'),
        	'fourthgrading' => $this->input->post('fourthgrading'),
        	'schoolyear_id' => $this->input->post('schoolyear_id'),
        	'student_id' => $this->input->post('student_id')
        );

		$where = array(
        	'schoolyear_id' => $this->input->post('schoolyear_id'),
        	'student_id' => $this->input->post('student_id')
		);
		
		$query = $this->db->delete('grades', $data, $where);
	}
}