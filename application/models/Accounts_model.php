<?php
class Accounts_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
  }
  
  public function get_accounts()
	{

		$query = $this->db->get('schoolaccount');
		echo json_encode($query->result());
	}
    
  public function get_accountbystudent($studentId)
	{
	
    $query = $this->db->get_where('schoolaccount',array('student_id' => $studentId));
		echo json_encode($query->result());
	}

	/* Assessments */
	public function get_assessments()
  {
    
    $query = $this->db->get('assessments');
    echo json_encode($query->result());
    
  }

  public function get_assessmentsbystudentid($studentId) 
  {
    $this->db->select('assessments.id,amount,assessments.assessmentname');
    $this->db->from('assessments');
    $this->db->join('schoolaccount', 'assessments.id = schoolaccount.assessments_id');
    $this->db->where('student_id',$studentId);
    $query = $this->db->get();
    echo json_encode($query->result());
  }

  public function add_assessmentsbystudentid() {
    $this->db->insert('schoolaccount',array(
      'amount' => $this->input->post('amount'), 
      'assessments_id' => $this->input->post('assessmentsId'),
      'student_id' => $this->input->post('studentId')
    ));

    $this->db->select('assessments.id,amount,assessments.assessmentname');
    $this->db->from('assessments');
    $this->db->join('schoolaccount', 'assessments.id = schoolaccount.assessments_id');
    $this->db->where('student_id',$this->input->post('studentId'));
    $query = $this->db->get();
    echo json_encode($query->result());
  }
  
  public function update_assessment()
  {
    $data = $this->input->post('newAssessmentList');
    $this->db->empty_table('assessments');
    for($c=0; $c < count($data); $c++) {
      $this->db->insert('assessments',array(
        'assessmentname' => $data[$c]['assessmentname'], 
        'assessmenttype' => $data[$c]['assessmenttype']
      ));
    }
	}
	
	public function delete_assessment($assessmentId)
	{
		if($assessmentId != "") {
      $this->db->delete('assessments', array('id' => $assessmentId));
    }
    // $query = $this->db->get('assessments');
    // echo json_encode($query->result());

    $this->db->select('assessments.id,amount,assessments.assessmentname');
    $this->db->from('assessments');
    $this->db->join('schoolaccount', 'assessments.id = schoolaccount.assessments_id');
    $this->db->where('student_id',$this->input->post('studentId'));
    $query = $this->db->get();
    echo json_encode($query->result());
	}
    	
}