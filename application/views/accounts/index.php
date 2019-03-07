<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
              <h2> Manage Accounts </h2>
              <span class="my-auto">
                <?php if($type == "Treasurer" || $type == "Administrator"): ?>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#manageAssessmentItemsModal">Manage Particulars</button>
                <?php endif;?>
              </span>
            </div>
        </div>
    </div>
</div>
<?php if($type == "Treasurer" || $type == "Administrator"): ?>
  <div class="row">
    <div class="col-12">
      <div class="accordion">
        <div class="card">
          <div class="card-header d-flex justify-content-between" id="headingOne">
            <div class="my-auto">
              <span class="ml-2 d-none d-lg-block">
                <span id="selectedStudentName" class="text-default"><i>Select a User</i></span>
                <small id="selectedStudentLevel" class="text-muted d-block mt-1"></small>
              </span>
            </div>
            <button id="selectUser" class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Select User
            </button>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <table cellpadding="0" cellspacing="0" id="studentTable">
                <thead class="customTh">
                    <tr>
                        <th>ID No.</th>
                        <th>First name</th>
                        <th>Middle name</th>
                        <th>Last Name</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody class="customTd">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif;?>
  <div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span class="my-auto">Assessment</span>
                <?php if($type == "Treasurer" || $type == "Administrator"): ?>
                  <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addAssessmentModal">Add Assessment</button>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <table cellpadding="0" cellspacing="0" id="assessmentTable">
                    <thead class="customTh">
                        <tr>
                            <th style="width:25%">Particulars</th>
                            <th style="width:25%">Amount Due</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead> 
                    <tbody class="customTd">
                        <tr>
                            <td>Entrance Fee</td>
                            <td>2,700</td>
                            <td><button class="btn btn-link icon deleteAssessment"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-7">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span class="my-auto">Schedule of Payments</span>
                <?php if($type == "Treasurer" || $type == "Administrator"): ?>
                  <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addScheduleModal">Add Schedule</button>
                <?php endif;?>
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

<!-- ASSESSMENT ITEMS MODAL -->
<div id="manageAssessmentItemsModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form name="manageassessmentform" id="manageAssessmentItemsForm" action="" method="post">
      <div class="modal-header">
        <h5 class="modal-title">Manage Assessment Items</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group" id="assessmentItemsList">
          
        </ul>
        <div style="margin-top: 0.5em">
          <button id="addAssessmentItemBtn" class="btn btn-link btn-sm">+ Add Assessment Item</button>
        </div>
      </div>
      <div class="modal-footer">
        <label class="error form-label text-success" id="statussuccess"></label>
        <label class="error form-label text-danger" id="statuserror"></label>
        <button type="submit" class="btn btn-primary" id="saveAssessmentItems">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelAssessmentItems">Cancel</button>
      </div>
      </form>
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
          <input type="text" class="form-control" name="particulars" id="scheduleParticulars">
          <label class="error text-danger" for="particulars" id="particulars_error">This field is required.</label>
        </div>
        <div class="form-group">
          <label class="form-label">O.R. No.</label>
          <input type="text" class="form-control" name="orno" id="scheduleOrNo">
          <label class="error text-danger" for="orno" id="orno_error">This field is required.</label>
        </div>
        <div class="form-group">
          <label class="form-label">Amount Paid</label>
          <input type="text" class="form-control" name="amountdue" id="scheduleAmountPaid">
          <label class="error text-danger" for="amountdue" id="amountdue_error">This field is required.</label>
        </div>
      </div>
      <div class="modal-footer">
	  <label class="error form-label text-success" id="statussuccess"></label>
	  <label class="error form-label text-danger" id="statuserror"></label>
		<button type="submit" class="btn btn-primary" id="addSchedule">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="addScheduleCancel">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
  $(document).ready(function () {
    $('.error').hide();

    // Select Students Table
    var table = $('#studentTable').DataTable({
      'select': {
        style: 'single'
      },
      'ajax': {
        url: '/students/view',
        dataSrc: ''
      },
      'columns': [
        { "data": "id"},
        { "data": "firstname"},
        { "data": "middlename",
          render: function(data) {
            if(data == "" || data == null) {
              return "<i>n/a</i>";
            } else {
              return data;
            }
          }
        },
        { "data": "lastname"},
        { "data": "gradelevel"},
      ]
    });

    // Retrieves Assessment Items
    $('#manageAssessmentItemsModal').on('show.bs.modal', function (event) {
      $.ajax({
        url: '<?php echo site_url('assessments/view');?>',
        dataType: 'json',
        success: function(data) {
          $('#assessmentItemsList').html("");

          for(var c=0; c < data.length; c++) {
            var assessmentListItemTemplate = '<li class="list-group-item d-flex justify-content-between" data-id=' + data[c].id + '>'
                                        + '<span>' + data[c].assessmentname + '</span>'
                                        + '<button class="btn btn-link btn-sm text-danger delete-assessment-item">Remove</button>'
                                        + '</li>'
            $('#assessmentItemsList').append(assessmentListItemTemplate);
          }
        }
      });
    });

    // Select User
    $('#studentTable tbody').on( 'click', 'tr', function () {
      var userData = table.row( this ).data();
      var name = userData.firstname + " ";
    
      if(userData.middlename != null || userData.middlename != "") {
        name += userData.middlename + " ";
      }
      name += userData.lastname;

      $('#selectedStudentName').text(name);
      $('#selectedStudentLevel').text("Grade " + userData.gradelevel);
      $('.collapse').collapse('hide');
    });

    // Appends an Assessment Item Input to List Group
    $('#addAssessmentItemBtn').on('click',function(event) {
      event.preventDefault();
      if($('.new-assessment-item').length < 1) {
        $('#assessmentItemsList').append('<input class="list-group-item new-assessment-item">');
      
        $('input.new-assessment-item').keydown(function (e) {
          if (e.keyCode == 13) {
            e.preventDefault();

            var assessmentListItemTemplate = '<li class="list-group-item d-flex justify-content-between">'
                                          + '<span>' + $(this).val() + '</span>'
                                          + '<button class="btn btn-link btn-sm text-danger delete-assessment-item">Remove</button>'
                                          + '</li>';

            $('#assessmentItemsList').append(assessmentListItemTemplate);
            $('.new-assessment-item').remove();

            return false;
          } 
        });
      }

      // Removes Assessment Item
      $('.delete-assessment-item').on('click', function(e){
        alert("HAHA!");
        e.preventDefault();
        $(this).parent().remove();
      });
    });

    
  });
</script>