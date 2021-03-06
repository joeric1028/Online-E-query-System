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
			'student_id' => $this->input->post('student_id'),
			'gradelevel' => $this->input->post('gradeLevel')
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
		// $data = array(
        // 	'firstgrading' => $this->input->post('firstgrading'),
        // 	'secondgrading' => $this->input->post('secondgrading'),
        // 	'thirdgrading' => $this->input->post('thirdgrading'),
        // 	'fourthgrading' => $this->input->post('fourthgrading'),
        // 	'schoolyear_id' => $this->input->post('schoolyear_id'),
		// 	'student_id' => $this->input->post('student_id'),
		// 	'subjects_id' => $this->input->post('subjects_id')
		// );
		
		$data = array(
			'studentId' => $this->input->post('studentId'),
			'grades' => $this->input->post('grades'),
		);
		
		for($c=0; $c < count($data['grades']); $c++){
			$duplicateCheck = $this->db->get_where('grades', array(
				'student_id' => $data['studentId'],
				'subjects_id' => $data['grades'][$c]['subjects_id']));
 
			if($duplicateCheck->num_rows() > 0) {
				$this->db->update('grades',$data['grades'][$c],array(
					'student_id' => $data['studentId'],
					'subjects_id' => $data['grades'][$c]['subjects_id']));
			} else if($duplicateCheck->num_rows() == 0) {
				$this->db->set('firstgrading', $data['grades'][$c]['firstgrading']);
				$this->db->set('secondgrading', $data['grades'][$c]['secondgrading']);
				$this->db->set('thirdgrading', $data['grades'][$c]['thirdgrading']);
				$this->db->set('fourthgrading', $data['grades'][$c]['fourthgrading']);

				$this->db->set('subjects_id', $data['grades'][$c]['subjects_id']);
				$this->db->set('student_id', $data['studentId']);

				$this->db->insert('grades');
				echo "num rows: " + $duplicateCheck->num_rows();
			}
		}
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

