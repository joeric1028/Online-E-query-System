<?php
class Accounts_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
  }
  
  /* Accounts */
  public function get_accounts()
	{

		$query = $this->db->get('schoolaccount');
		echo json_encode($query->result());
  }
  
  public function update_accounts() 
  {
    $data = array(
			'id' => $this->input->post('id'),
			'assessments_id' => $this->input->post('assessmentId'),
			'amount' => $this->input->post('amount'),
		);

    $this->db->where('id',$data['id']);
		$query = $this->db->update('schoolaccount',$data);

		if($query) {
			$response_array['status'] = 'success';
			echo json_encode('Assessment updated!');
			return true;
		} else {
			$response_array['status'] = 'error';
			echo json_encode('error');
			return false;
		}
  }
    
  public function delete_accounts() 
  {
    $this->db->delete('schoolaccount',array(
      'id' => $this->input->post('assessmentId'),
      'student_id' => $this->input->post('studentId')
    ));

    $this->db->select('schoolaccount.id, assessments.id AS assessment_id,schoolaccount.amount,assessments.assessmentname');
    $this->db->from('assessments');
    $this->db->join('schoolaccount', 'assessments.id = schoolaccount.assessments_id');
    $this->db->where('student_id',$this->input->post('studentId'));
    $query = $this->db->get();
    echo json_encode($query->result());
  }

  public function get_balance($studentId) 
  {
    $balanceData = array(
      'totalBalance' => 0,
      'totalPayments' => 0,
      'remainingBalance' => 0
    );

    $this->db->select('assessments.id,schoolaccount.amount,assessments.assessmentname,assessments.assessmenttype');
    $this->db->from('assessments');
    $this->db->join('schoolaccount', 'assessments.id = schoolaccount.assessments_id');
    $this->db->where('student_id',$studentId);
    $query1 = $this->db->get();
    foreach ($query1->result() as $row)
    {
      if($row->assessmenttype == "Add") {
        $balanceData['totalBalance'] += floatVal($row->amount);
      } else {
        $balanceData['totalBalance'] -= floatVal($row->amount);
      }
    }

    $query2 = $this->db->get_where('payments', array('student_id' => $studentId));
    foreach ($query2->result() as $row)
    {
        $balanceData['totalPayments'] += floatVal($row->amount);
    }
    $balanceData['remainingBalance'] = $balanceData['totalBalance'] - $balanceData['totalPayments'];
    echo json_encode($balanceData);
  }

  public function get_accountbystudent($studentId)
	{
	
    $query = $this->db->get_where('schoolaccount',array('student_id' => $studentId));
		echo json_encode($query->result());
  }
  /* Accounts */

	/* Assessments */
	public function get_assessments()
  {
    
    $query = $this->db->get('assessments');
    echo json_encode($query->result());
    
  }

  public function get_assessmentsbystudentid($studentId) 
  {
    $this->db->select('schoolaccount.id,assessments.id AS assessment_id,schoolaccount.amount,assessments.assessmentname');
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

    $this->db->select('schoolaccount.id,assessments.id AS assessment_id,schoolaccount.amount,assessments.assessmentname');
    $this->db->from('assessments');
    $this->db->join('schoolaccount', 'assessments.id = schoolaccount.assessments_id');
    $this->db->where('student_id',$this->input->post('studentId'));
    $query = $this->db->get();
    echo json_encode($query->result());
  }
 
  public function update_assessment()
  {
    $updateData = $this->input->post('newAssessmentList');
    $deleteData = $this->input->post('removedAssessmentList');
    $updateStatus = true;
    $removeStatus = true;

    // Insert/Update Assessments
    for($c=0; $c < count($updateData); $c++) {
      if($updateData[$c]['id'] != "") {
        $this->db->where('id', $updateData[$c]['id']);
        $update = $this->db->update('assessments', array(
          'assessmentname' => $updateData[$c]['assessmentname'],
          'assessmenttype' => $updateData[$c]['assessmenttype'],
          'amount' => $updateData[$c]['amount'],
          'setdefault' => $updateData[$c]['setdefault']
        ));
      } else {
        $update = $this->db->insert('assessments', array(
          'assessmentname' => $updateData[$c]['assessmentname'],
          'assessmenttype' => $updateData[$c]['assessmenttype'],
          'amount' => $updateData[$c]['amount'],
          'setdefault' => $updateData[$c]['setdefault']
        ));
      }

      // Set update status to false if error is found in insert/update process
      if(!$update) {
        $updateStatus = false;
      }
    }
 
    // Delete Removed Assessments
    for($c=0; $c < count($deleteData); $c++) {
      $remove = $this->db->delete('assessments', array('id' => $deleteData[$c]));
      if(!$remove) {
        $removeStatus = false;
      }
    }

    if($updateStatus && $removeStatus) {
			$response_array['status'] = 'success';
			echo json_encode('Assessment Items updated!');
			return true;
		} else {
			$response_array['status'] = 'error';
			echo json_encode('error');
			return false;
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
  /* Assessments */

  /* Payments */
  public function get_paymentsbystudentid($studentId) {
    $this->db->select('payments.id,payments.date,payments.ornumber,payments.amount,assessments.id AS assessment_id,assessments.assessmentname');
    $this->db->from('payments');
    $this->db->join('assessments', 'assessments.id = payments.assessments_id');
    $this->db->where('student_id',$studentId);
    $query = $this->db->get();
		echo json_encode($query->result());
  }

  public function create_paymentschedule() {
    $this->db->insert('payments', array(
      'date' => $this->input->post('date'),
      'ornumber' => $this->input->post('orNumber'),
      'amount' => $this->input->post('amount'),
      'assessments_id' => $this->input->post('assessmentId'),
      'student_id' => $this->input->post('studentId')
    ));
    
    $this->db->select('payments.id,payments.date,payments.ornumber,payments.amount,assessments.id AS assessment_id,assessments.assessmentname');
    $this->db->from('payments');
    $this->db->join('assessments', 'assessments.id = payments.assessments_id');
    $this->db->where('student_id', $this->input->post('studentId'));
    $query = $this->db->get();
    echo json_encode($query->result());
  }

  public function update_payment() {
    $data = array(
      'id' => $this->input->post('id'),
      'date' => $this->input->post('date'),
      'ornumber' => $this->input->post('ornumber'),
      'assessments_id' => $this->input->post('assessmentsId'),
			'amount' => $this->input->post('amount')
		);

    $this->db->where('id',$data['id']);
		$query = $this->db->update('payments',$data);

		if($query) {
			$response_array['status'] = 'success';
			echo json_encode('Payment updated!');
			return true;
		} else {
			$response_array['status'] = 'error';
			echo json_encode('error');
			return false;
		}
  }

  public function delete_payment()
	{
    $this->db->delete('payments', array(
      'id' => $this->input->post('paymentId'),
      'student_id' => $this->input->post('studentId')
    ));

    $this->db->select('payments.id,payments.date,payments.ornumber,payments.amount,assessments.id AS assessment_id,assessments.assessmentname');
    $this->db->from('payments');
    $this->db->join('assessments', 'assessments.id = payments.assessments_id');
    $this->db->where('student_id', $this->input->post('studentId'));
    $query = $this->db->get();
    echo json_encode($query->result());
  }
  /* Payments */
}