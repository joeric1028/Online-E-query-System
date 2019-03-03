<?php
class Grades_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}

	public function create_grades() {
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
		
		foreach ($query->result() as $row) {
			if ($data['student_id'] == $row->student_id && $data['schoolyear_id'] == $row->schoolyear_id) {
				return false; //error: grades exist. Can't create grades.
			}
		}

		//success: Grades not found. Can create grades.
		$query = $this->db->insert('grades', $data);
	}

	public function read_grades() {
		$where = array(
        	//'schoolyear_id' => $this->input->post('schoolyear_id'),
        	'student_id' => $this->input->post('student_id')
		);

		$query = $this->db->get_where('grades', $where);
		$result = $query->result();
			
		if ($query->row(0) == null) {	
			$errorMessage = 'NG';
			$error = array('warning' => $errorMessage);
			echo json_encode($error);
		} else {
			$data = array(
				'data' => $result
			);
			echo json_encode($data);
		}
	}

	public function get_gradesByStudent($studentId) {
		$query = $this->db->get_where('grades_view', array('student_id' => $studentId));
		echo json_encode($query->result());
	}

	public function update_grades()
	{
		$data = array(
        	'firstgrading' 	=> $this->input->post('firstgrading'),
        	'secondgrading' => $this->input->post('secondgrading'),
        	'thirdgrading' 	=> $this->input->post('thirdgrading'),
        	'fourthgrading' => $this->input->post('fourthgrading'),
        	'schoolyear_id' => $this->input->post('schoolyear_id'),
        	'student_id' 	=> $this->input->post('student_id')
        );
		
		$where = array(
        	'schoolyear_id' => $this->input->post('schoolyear_id'),
        	'student_id' 	=> $this->input->post('student_id')
		);

		$query = $this->db->update('grades', $data, $where);
	}

	// public function delete_user()
	// {
	// 	$data = array(
    //     	'firstgrading' => $this->input->post('firstgrading'),
    //     	'secondgrading' => $this->input->post('secondgrading'),
    //     	'thirdgrading' => $this->input->post('thirdgrading'),
    //     	'fourthgrading' => $this->input->post('fourthgrading'),
    //     	'schoolyear_id' => $this->input->post('schoolyear_id'),
    //     	'student_id' => $this->input->post('student_id')
    //     );

	// 	$where = array(
    //     	'schoolyear_id' => $this->input->post('schoolyear_id'),
    //     	'student_id' => $this->input->post('student_id')
	// 	);
		
	// 	$query = $this->db->delete('grades', $data, $where);
	// }
}

