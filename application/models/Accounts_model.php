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
   
  public function get_assessmentsbystudentid() 
  {
    $this->db->select('*');
    $this->db->from('assessments');
    $this->db->join('schoolaccount', 'assessments.id = schoolaccounts.assessments_id');
    $this->db->where('schoolaccounts',array(
      'student_id' => $this->input->post('studentId'),
      //'schoolyear_id' => $this->input->post('schoolYearId')
    ));
    $query = $this->db->get();
    echo json_encode($query->result());
  }
  
  public function create_assessment()
  {
    $data = array(
      'assessmentname' => $this->input->post('item'),
      'assessmenttype' => $this->input->post('type'),
    );
    
    $query      = $this->db->insert('assessments', $data);
    $newSubject = $this->db->insert_id();
    
    if ($query == false) {
      $errorMessage = "Unable to proceed. Can't create assessment";
      $error        = array(
        'error' => $errorMessage
      );
      echo json_encode($error);
    } else {
      $this->db->select('*');
      $this->db->from('assessments');
      $this->db->join('schoolaccount', 'assessments.id = schoolaccounts.assessments_id');
      $this->db->where('schoolaccounts',array(
        'student_id' => $this->input->post('studentId'),
        //'schoolyear_id' => $this->input->post('schoolYearId')
      ));
      $query = $this->db->get();
      echo json_encode($query->result());
      
    }
	}
	
	public function delete_assessment()
	{
		$this->db->delete('assessments', array('id' => $id));
		$query = $this->db->get('assessments');
    echo json_encode($query->result());
	}
    	
}