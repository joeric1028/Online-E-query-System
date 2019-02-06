<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2>Accounts</h2>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span class="my-auto">Assessment</span>
                <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addAssessmentModal">Add Assessment</button>
            </div>
            <div class="card-body">
                <table cellpadding="0" cellspacing="0" id="accountTable">
                    <thead class="customTh">
                        <tr>
                            <th>Particulars</th>
                            <th>Amount Due</th>
                        </tr>
                    </thead>
                    <tbody class="customTd">
                        <tr>
                            <td>Entrance Fee</td>
                            <td>2,700</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span class="my-auto">Schedule of Payments</span>
                <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addScheduleModal">Add Schedule</button>
            </div>
            <div class="card-body">
                <table cellpadding="0" cellspacing="0" id="accountTable">
                    <thead class="customTh">
                        <tr>
                            <th>Date</th>
                            <th>Particulars</th>
                            <th>O.R. No</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody class="customTd">
                        <tr>
                            <td>5/28/2018</td>
                            <td>Entrance Fee</td>
                            <td>7077</td>
                            <td>Amount</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ASSESSMENT MODAL -->
<div id="addAssessmentModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form name="addassessmentform" id="addAssessmentForm" action="" method="post">
      <div class="modal-header">
        <h5 class="modal-title">Add Assessment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label">Particulars</label>
          <input type="text" class="form-control" name="particulars" id="assessmentParticulars">
          <label class="error text-danger" for="particulars" id="particulars_error">This field is required.</label>
        </div>
        <div class="form-group">
          <label class="form-label">Amount Due</label>
          <input type="text" class="form-control" name="amountdue" id="assessmentAmountDue">
          <label class="error text-danger" for="amountdue" id="amountdue_error">This field is required.</label>
        </div>
      </div>
      <div class="modal-footer">
	  <label class="error form-label text-success" id="statussuccess"></label>
	  <label class="error form-label text-danger" id="statuserror"></label>
		<button type="submit" class="btn btn-primary" id="addAssessment">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="addUserCancel">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- SCHEDULE OF PAYMENTS MODAL -->
<div id="addScheduleModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form name="addscheduleform" id="addScheduleform" action="" method="post">
      <div class="modal-header">
        <h5 class="modal-title">Add Assessment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label">Date</label>
          <input type="text" class="form-control" name="scheduleDate" id="scheduleDate">
          <label class="error text-danger" for="scheduleDate" id="scheduleDate_error">This field is required.</label>
        </div>
        <div class="form-group">
          <label class="form-label">Particular</label>
          <input type="text" class="form-control" name="particulars" id="assessmentParticulars">
          <label class="error text-danger" for="particulars" id="particulars_error">This field is required.</label>
        </div>
        <div class="form-group">
          <label class="form-label">O.R. No.</label>
          <input type="text" class="form-control" name="orno" id="assessmentOrNo">
          <label class="error text-danger" for="orno" id="orno_error">This field is required.</label>
        </div>
        <div class="form-group">
          <label class="form-label">Amount Due</label>
          <input type="text" class="form-control" name="amountdue" id="assessmentAmountDue">
          <label class="error text-danger" for="amountdue" id="amountdue_error">This field is required.</label>
        </div>
      </div>
      <div class="modal-footer">
	  <label class="error form-label text-success" id="statussuccess"></label>
	  <label class="error form-label text-danger" id="statuserror"></label>
		<button type="submit" class="btn btn-primary" id="addAssessment">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="addUserCancel">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
    $('.error').hide();
</script>