<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body d-flex justify-content-between">
        <h2> Manage Accounts </h2>
        <span class="my-auto">
          <?php if($type == "Treasurer" || $type == "Administrator"): ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#manageAssessmentItemsModal">Manage Particulars</button>
          <?php endif; if($type == "Parent"):?>
          <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="studentDropdownBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="">
          </button>
          <div id="studentDropdownList" class="dropdown-menu" aria-labelledby="sectionDropdownBtn">
          </div>
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
            <div class="table-responsive">
              <table cellpadding="0" cellspacing="0" id="studentTable" class="w-100 bcma-table">
                <thead class="customTh">
                  <tr>
                    <th>ID No.</th>
                    <th>First name</th>
                    <th>Middle name</th>
                    <th>Last Name</th>
                    <th>Parent</th>
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
</div>
<?php endif;?>
<div class="row">
  <div class="col-4">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <span class="stamp stamp-md bg-blue mr-3">
          <i class="fas fa-money-bill-wave"></i>
        </span>
        <div>
          <h4 class="m-0" id="totalBalance"><span></span></h4>
          <small class="text-muted">Total Balance</small>
        </div>
      </div>
    </div>
  </div>
  <div class="col-4">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <span class="stamp stamp-md bg-green mr-3">
          <i class="fas fa-money-bill-wave"></i>
        </span>
        <div>
          <h4 class="m-0" id="totalPayments"><span></span></h4>
          <small class="text-muted">Total Payments</small>
        </div>
      </div>
    </div>
  </div>
  <div class="col-4">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <span class="stamp stamp-md bg-yellow mr-3">
          <i class="fas fa-money-bill-wave"></i>
        </span>
        <div>
          <h4 class="m-0" id="remainingBalance"><span></span></h4>
          <small class="text-muted">Remaining Balance</small>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-5">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <span class="my-auto">Assessment</span>
        <?php if($type == "Treasurer" || $type == "Administrator"): ?>
        <button class="btn btn-outline-success btn-sm add-buttons" data-toggle="modal" data-target="#addAssessmentModal" disabled>Add Assessment</button>
        <?php endif; ?>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table cellpadding="0" cellspacing="0" id="assessmentTable" class="bcma-table">
            <thead class="customTh">
              <tr>
                <th style="width:25%">Particulars</th>
                <th style="width:25%">Amount Due</th>
                <th style="width:10%"></th>
              </tr>
            </thead>
            <tbody class="customTd">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-7">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <span class="my-auto">Payments</span>
        <?php if($type == "Treasurer" || $type == "Administrator"): ?>
        <button class="btn btn-outline-success btn-sm add-buttons" data-toggle="modal" data-target="#addScheduleModal" disabled>Add Payment</button>
        <?php endif;?>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table cellpadding="0" cellspacing="0" id="paymentsTable" class="w-100 bcma-table">
            <thead class="customTh">
              <tr>
                <th style="width: 18%">Date</th>
                <th style="width: 30%">Particulars</th>
                <th style="width: 30">O.R. No</th>
                <th style="width: 19%">Amount</th>
                <th style="width: 50px"></th>
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
<!-- ASSESSMENT ITEMS MODAL -->
<div id="manageAssessmentItemsModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form name="manageassessmentform" id="manageAssessmentItemsForm" action="" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Manage Assessment Items</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-right mb-2">
            <button id="addAssessmentItemBtn" class="btn btn-success btn-sm">+ Add Assessment Item</button>
          </div>
          <div class="container mb-2">
            <div class="row">
              <h6 class="col-4">Assessment Name</h6>
              <h6 class="col-4">Set as Default</h6>
              <h6 class="col-2">Type</h6>
            </div>
          </div>
          <ul class="list-group" id="assessmentItemsList">
            <li class="list-group-item d-flex justify-content-between" data-id="10">
              <div class="col-5 align-center pt-1">Computer Labotary</div>
              <select class="col-4 form-control custom-select" name="type" id="assessmentType">
                <option value="Add">Add</option>
                <option value="Deduct">Deduct</option>
              </select>
              <button class="btn btn-link btn-sm text-danger delete-assessment-item">Remove</button>
            </li>
          </ul>
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
            <select class="form-control custom-select" name="type" id="particulars">
            </select>
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
          <h5 class="modal-title">Add Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="form-label">Date</label>
            <input type="text" class="form-control datepicker" name="scheduleDate" id="scheduleDate">
            <label class="error text-danger" for="scheduleDate" id="scheduleDate_error">This field is required.</label>
          </div>
          <div class="form-group">
            <label class="form-label">Particular</label>
            <select class="form-control custom-select" name="type" id="scheduleParticulars">
            </select>
            <label class="error text-danger" for="particulars" id="particulars_error">This field is required.</label>
          </div>
          <div class="form-group">
            <label class="form-label">O.R. No.</label>
            <input type="text" class="form-control" name="orno" id="scheduleOrNo">
            <label class="error text-danger" for="orno" id="orno_error">This field is required.</label>
          </div>
          <div class="form-group">
            <label class="form-label">Amount Paid</label>
            <input type="number" class="form-control" name="amountdue" id="scheduleAmountPaid" value="0" min="0">
            <label class="error text-danger"  for="amountdue" id="amountdue_error">This field is required.</label>
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
  var assessmentItems;
  var toBeRemovedAssessments;

  function getSelectedStudentData() {
    var studentTable = $('#studentTable').DataTable();
    var studentData = studentTable.row( '.selected' ).data();
    return studentData;
  }

  // Retrieves Assessment Items for Manage Particulars
  function getAssessmentItems() {
    $.ajax({
        url: '<?php echo base_url('assessments/view');?>',
        dataType: 'json',
        success: function(data) {
          for(var c=0; c < data.length; c++) {
            $('#particulars').append('<option value="' + data[c].id + '">' + data[c].assessmentname + '</option>');
            if(data[c].assessmenttype != "Deduct") {
              $('#scheduleParticulars').append('<option value="' + data[c].id + '">' + data[c].assessmentname + '</option>');
            }
          }
          assessmentItems = data;
        },
        error: function(response) {
          swal("Error", response, "error");
        },
        async: false
    });
  }

  function displayAssessmentItems(data) {
    $('#assessmentItemsList').html('');
    for(var c=0; c < data.length; c++) {
      var assessmentListItemTemplate = '<li class="list-group-item d-flex justify-content-between" data-id="' + data[c].id + '">'
                                      +   '<div class="col-4 align-center">'
                                      +     '<input value="' + data[c].assessmentname + '" type="text" class="form-control assessment-name" placeholder="Assessment Name"/>'
                                      +     '<label class="error text-danger small" for="assessmentname">This field is required.</label>'
                                      +   '</div>'
                                      +   '<div class="col-4 d-flex">'
                                      +     '<div class="pt-1 pr-4">'
                                      +       '<label class="custom-control custom-checkbox">'
                                      +         '<input type="checkbox" class="custom-control-input default-checkbox" ' + (data[c].setdefault > 0 ? 'checked' : '') + ' name="default" onchange="changeCheckbox(this)">'
                                      +         '<span class="custom-control-label small"></span>'
                                      +       '</label>'
                                      +     '</div>'
                                      +     '<div>'
                                      +       '<input value="' + data[c].amount + '" class="form-control amount" type="number" placeholder="Amount" ' + (data[c].setdefault > 0 ? '' : 'disabled') + '/>'
                                      +       '<label class="error text-danger small" for="amount" style="display: none;">This field is required.</label>'
                                      +     '</div>'
                                      +   '</div>'
                                      +   '<select class="col-2 form-control custom-select" name="type" id="assessmentType">'
                                      +     '<option value="Add"' + (data[c].assessmenttype == "Add" ? "selected" : "")  + '>Add</option>'
                                      +     '<option value="Deduct"' + (data[c].assessmenttype == "Deduct" ? "selected" : "")  + '>Deduct</option>'
                                      +   '</select>'
                                      +   '<div class="col-1 text-right pt-1">'
                                      +     '<a javascript:void(0) class="text-danger delete-assessment-item" onclick="removeAssessmentItem(this)"><i class="far fa-trash-alt"></i></a>'
                                      +   '</div>'
                                      + '</li>';
      $('#assessmentItemsList').append(assessmentListItemTemplate);
    }
  }

  // Displays Assessments For Selected Student
  function displayAssessments(data) {
    $('#assessmentTable > tbody').html("");
    $('#particulars').find('option').each(function(i) {
      $(this).attr('disabled',false);
    });
    for(var c=0; c < data.length; c++) {
      var assessmentTemplate = '<tr data-id="' + data[c].id + '">'
                              + '<td data-id="' + data[c].assessment_id + '">' + data[c].assessmentname + '</td>'
                              + '<td>' + data[c].amount + '</td>'
                              + '<td class="text-center">'
                              +	 '<div class="item-action dropdown">'
                              +		'<a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fas fa-ellipsis-v"></i></a>'
                              +		'<div class="dropdown-menu dropdown-menu-right">'
                              +			'<a href="javascript:void(0)" onClick="updateAssessment(this)" class="dropdown-item"><i class="dropdown-icon far fa-edit"></i> Update </a>'
                              +			'<a href="javascript:void(0)" onClick="deleteAssessment(this)" class="dropdown-item"><i class="dropdown-icon far fa-trash-alt"></i> Delete </a>'
                              +		'</div>'
                              +	'</div>'
                              + '</td>' 
                              + '</tr>';
      $('#assessmentTable > tbody').append(assessmentTemplate);
      $('#particulars').find('option[value=' + data[c].assessment_id + ']').attr('disabled', true);
      // $('#addAssessmentModal').modal('hide');
    }
    
  }

  // Displays Payments For Selected Student
  function displayPayments(data) {
    $('#paymentsTable > tbody').html("");
    for(var c=0; c < data.length; c++) {
      var paymentTemplate = '<tr data-id="' + data[c].id + '">'
                              + '<td>' + data[c].date + '</td>'
                              + '<td data-id="' + data[c].assessment_id + '">' + data[c].assessmentname + '</td>'
                              + '<td>' + data[c].ornumber + '</td>'
                              + '<td>' + data[c].amount + '</td>'
                              + '<td class="text-center">'
                              +	 '<div class="item-action dropdown">'
                              +		'<a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fas fa-ellipsis-v"></i></a>'
                              +		'<div class="dropdown-menu dropdown-menu-right">'
                              +			'<a href="javascript:void(0)" onClick="updatePayment(this)" class="dropdown-item"><i class="dropdown-icon far fa-edit"></i> Update </a>'
                              +			'<a href="javascript:void(0)" onClick="deletePayment(this)" class="dropdown-item"><i class="dropdown-icon far fa-trash-alt"></i> Delete </a>'
                              +		'</div>'
                              +	'</div>'
                              + '</td>' 
                              + '</tr>';
      $('#paymentsTable > tbody').append(paymentTemplate);
    }
  }

  // Retrieves Account Assessments of Selected Student
  function getAccountsAssessmentByStudent(studentId) {
    $.ajax({
      url: 'assessments/view/' + studentId,
      success: function(data) {
        displayAssessments(data);
      },
      error: function(response) {
        swal("Error!", "Something's wrong!", "error");
      }
    });
  }

  // Retrieves Account Payments of Selected Student
  function getAccountsPaymentByStudent(studentId) {
    $.ajax({
      url: 'payments/view/' + studentId,
      success: function(data) {
        $('#addScheduleModal').modal('hide');
        $('#paymentsTable > tbody').html("");
        displayPayments(data);
      },
      error: function(response) {
        swal("Error!", "Something's wrong!", "error");
      }
    });
  }

  function addAssessmentByStudentId(studentId) {
      $('.error').hide();
    var newAssessment = { 
        assessmentsId: $('#particulars').val(),
        amount: $('#assessmentAmountDue').val(),
        studentId: studentId
      };
    if(!(newAssessment.assessmentsId == "" || newAssessment.amount == "")) {
        $.ajax({
          type: "POST",
          url: '<?php echo base_url('assessments/add');?>',
          data: newAssessment,
          success: function(data, status) {
            swal("Success!", "Assessment Added!", "success");
            getBalanceByStudent(studentId);
            displayAssessments(data);
            $('#addAssessmentModal').modal('hide');
            
            // Deletes Assessment (in Add Assessment)
            $('.deleteAssessment').on('click', function(event) {
              var assessmentId = $(this).parent().parent().data('id');
              getBalanceByStudent(studentId);
              deleteAssessment(assessmentId, studentId);
            });
          },
          error: function(status) {
            swal("Error!", "Something's wrong!", "error");
          }
        });
    } else {
        if(newAssessment.assessmentsId == "") {
            $('#particulars_error').show();
        }
        if(newAssessment.amount == ""){
            $('#amountdue_error').show();
        }
    }
  }

  function addPaymentByStudentId(studentId) {
    var newPayment = {
      date: $('#scheduleDate').val(),
      orNumber: $('#scheduleOrNo').val(),
      amount: $('#scheduleAmountPaid').val(),
      assessmentId: $('#scheduleParticulars').val(),
      studentId: studentId,
    };

    $('.error').hide();
  
    var orNumber = $("#scheduleOrNo").val();

    if (orNumber == "") {
      $("#orno_error").show();
      $("#scheduleOrNo").focus();
      return;
    } else {
      $.ajax({
        type: 'POST',
        url: 'payments/create',
        data: newPayment,
        success: function(data) {
          swal("Success!", "Payment Added!", "success");
          getBalanceByStudent(studentId);
          $('#addScheduleModal').modal('hide');
          displayPayments(data);
        }, 
        error: function(status) {
          swal("Error!", "Something's wrong!", "error");
        }
      });
    }
  }

  function updateAssessment(selector) {
    function getAssessmentTemplate(asst_id,name,amount) {
      var assessmentDefaultTemplate = '<td data-id="' + asst_id + '">' + name + '</td>'
                                  +   '<td>' + amount + '</td>'
                                  +   '<td class="text-center">'
                                  +   '<div class="item-action dropdown">'
                                  +     '<a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fas fa-ellipsis-v"></i></a>'
                                  +     '<div class="dropdown-menu dropdown-menu-right">'
                                  +       '<a href="javascript:void(0)" onclick="updateAssessment(this)" class="dropdown-item"><i class="dropdown-icon far fa-edit"></i> Update </a>'
                                  +       '<a href="javascript:void(0)" onclick="deleteAssessment(this)" class="dropdown-item"><i class="dropdown-icon far fa-trash-alt"></i> Delete </a>'
                                  +     '</div>'
                                  +   '</div>'
                                  + '</td>';
      return assessmentDefaultTemplate;
    }

    var assessmentItemsOptions = "";
    for(var c=0; c < assessmentItems.length; c++) {
      assessmentItemsOptions += '<option value="' + assessmentItems[c].id + '" selected="">' + assessmentItems[c].assessmentname + '</option>';
    }
    var assessment = $(selector).parent().parent().parent().parent();
    var currAssessmentId = assessment.data('id');
    var currAssessmentItemId = assessment.children().eq(0).data('id');
    var currAssessmentName  = assessment.children().eq(0).html();
    var currAssessmentAmount = assessment.children().eq(1).html();
    
    var editAssessmentTemplate  =   '<td><select class="form-control custom-select edit-assessment" name="type">'
                                +   assessmentItemsOptions
                                +   '</select></td>'
                                +   '<td><input value="' + currAssessmentAmount + '" class="form-control" type="number" /></td>'
                                +   '<td class="text-center align-middle">'
                                +   '<div class="item-action dropdown">'
                                +     '<div class="d-flex">'
                                + 			'<button class="btn btn-sm btn-outline-success form-control ml-1 edit-save"><i class="fas fa-check"></i></button>'
                                +			  '<button class="btn btn-sm btn-outline-warning form-control ml-1 edit-cancel"><i class="fas fa-times"></i></button>'
                                +		  '</div>'
                                +   '</div>'
                                +   '</td>';

    assessment.html(editAssessmentTemplate)
    assessment.find('select').val(currAssessmentItemId);

    $('.edit-save').on('click', function(e) {
			e.preventDefault();
			var thisAssessmentRow = $(this).parent().parent().parent().parent();
			var newAssessment = thisAssessmentRow.find('select').val();
      var newAssessmentName = thisAssessmentRow.find(".edit-assessment option:selected").text();
      var newAmount = thisAssessmentRow.find('input').val();

			$.ajax({
				url: 'accounts/update',
				type: 'POST',
				dataType: 'json',
				dataSrc: '',
				data: { 
          'id': thisAssessmentRow.data('id'), 
					'assessmentId': newAssessment,
					'amount': newAmount
				}, 
				success: function(data) {
					swal("Success!", data, "success");
					thisAssessmentRow.html(getAssessmentTemplate(newAssessment, newAssessmentName, newAmount));
				},
				error: function(status) {
					swal("Error!", "Something's wrong!", "error");
				}
			});     
		});

		$('.edit-cancel').on('click', function(e) {
			e.preventDefault();
			var thisAssessmentRow = $(this).parent().parent().parent().parent();
			thisAssessmentRow.html(getAssessmentTemplate(currAssessmentItemId,currAssessmentName,currAssessmentAmount));
		});
  }

  function updatePayment(selector) {
    function getPaymentTemplate(date,asst_id,asst_name,orNum,amount) {
      var paymentDefaultTemplate = '<td>' + date + '</td>'
                              + '<td data-id="' + asst_id + '">' + asst_name + '</td>'
                              + '<td>' + orNum + '</td>'
                              + '<td>' + amount + '</td>'
                              + '<td class="text-center">'
                              +    '<div class="item-action dropdown">'
                              +      '<a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>'
                              +      '<div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(-136px, -51px, 0px); top: 0px; left: 0px; will-change: transform;">'
                              +        '<a href="javascript:void(0)" onclick="updatePayment(this)" class="dropdown-item"><i class="dropdown-icon far fa-edit"></i> Update </a>'
                              +        '<a href="javascript:void(0)" onclick="deletePayment(this)" class="dropdown-item"><i class="dropdown-icon far fa-trash-alt"></i> Delete </a>'
                              +      '</div>'
                              +    '</div>'
                              +    '</td>';
      return paymentDefaultTemplate;
    }
    
    var assessmentItemsOptions = "";
    for(var c=0; c < assessmentItems.length; c++) {
      assessmentItemsOptions += '<option value="' + assessmentItems[c].id + '" selected="">' + assessmentItems[c].assessmentname + '</option>';
    }
    
    var payment = $(selector).parent().parent().parent().parent();
    var currPaymentId = payment.data('id');              
    var currDate = payment.children().eq(0).html();
    var currAssessmentId  = payment.children().eq(1).data('id'); 
    var currAssessmentName  = payment.children().eq(1).html(); 
    var currOrNumber = payment.children().eq(2).html();
    var currAmount = payment.children().eq(3).html();
    var editPaymentTemplate    = '<td><input value="' + currDate + '" class="form-control datepicker" type="text" /></td>'
                              + '<td><select class="form-control custom-select edit-payment" name="type">'
                              +   assessmentItemsOptions
                              + '</select></td>'
                              + '<td><input value="' + currOrNumber + '" class="form-control" type="text"/></td>'
                              + '<td><input value="' + currAmount + '" class="form-control" type="number"/></td>'
                              +   '<td class="text-center align-middle">'
                              +   '<div class="item-action dropdown">'
                              +     '<div class="d-flex">'
                              + 			'<button class="btn btn-sm btn-outline-success form-control ml-1 edit-save"><i class="fas fa-check"></i></button>'
                              +			  '<button class="btn btn-sm btn-outline-warning form-control ml-1 edit-cancel"><i class="fas fa-times"></i></button>'
                              +		  '</div>'
                              +   '</div>'
                              +  '</td>';      
    
    payment.html(editPaymentTemplate)
    payment.find('select').val(currAssessmentId);
    initializeDatePicker();

    $('.edit-save').on('click', function(e) {
			e.preventDefault();
			var thisPayment = $(this).parent().parent().parent().parent();
      var newDate = thisPayment.children().eq(0).find('input').val();
			var newAssessment = thisPayment.children().eq(1).find('select').val();
      var newAssessmentName = thisPayment.find(".edit-payment option:selected").text();
      var newOrNumber = thisPayment.children().eq(2).find('input').val();
      var newAmount = thisPayment.children().eq(3).find('input').val();

			$.ajax({
				url: 'payments/update',
				type: 'POST',
				dataType: 'json',
				dataSrc: '',
				data: { 
          'id': thisPayment.data('id'), 
					'date': newDate,
          'assessmentsId' : newAssessment,
					'ornumber': newOrNumber,
          'amount': newAmount
				}, 
				success: function() {
					swal("Success!", "Payment updated", "success");
					thisPayment.html(getPaymentTemplate(newDate, newAssessment, newAssessmentName, newOrNumber, newAmount));
				},
				error: function(status) {
					swal("Error!", "Something's wrong!", "error");
				}
			});     
		});

		$('.edit-cancel').on('click', function(e) {
			e.preventDefault();
			var thisPayment = $(this).parent().parent().parent().parent();
			thisPayment.html(getPaymentTemplate(currDate,currAssessmentId,currAssessmentName,currOrNumber,currAmount));
		});
  }

  // Deletes Payment of Selected Student
  function deletePayment(selector) {
    var payment = $(selector).parent().parent().parent().parent();
    var paymentId = payment.data('id');
    var student = getSelectedStudentData();

    swal({
      title: "Are you sure?",
      text: "Changes cannot be undone once deleted!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: "POST",
          url: 'payments/delete',
          data: { 
            paymentId: paymentId,
            studentId: student.id
          },
          success: function(data, status) {
            swal("Success!", "Payment successfuly deleted!", "success");
            displayPayments(data);
          },
          error: function(status) {
            swal("Error!", "Something's wrong!", "error");
          }
        });
      }
    });
  }

  // Deletes Assessment of Selected Student
  function deleteAssessment(selector) {
    var assessment = $(selector).parent().parent().parent().parent();
    var assessmentId = assessment.data('id');
    var student = getSelectedStudentData();
    swal({
      title: "Are you sure?",
      text: "Changes cannot be undone once deleted!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: "POST",
          url: 'accounts/delete',
          data: { 
            assessmentId: assessmentId,
            studentId: student.id
          },
          success: function(data, status) {
            swal("Success!", "Assessment successfuly deleted!", "success");
            displayAssessments(data);
            getBalanceByStudent(student.id);
          },
          error: function(status) {
            swal("Error!", "Something's wrong!", "error");
          }
        });
      } 
    }); 
  }

  // Retrieves Balance of Selected Student
  function getBalanceByStudent(id) {
    $.ajax({
        url: 'accounts/balance/view/' + id,
        dataType: 'json',
        success: function(data) {
          var totalBalance = data.totalBalance;
          var totalPayments = data.totalPayments;
          var remainingBalance = data.remainingBalance;
          
          $('#totalBalance > span').html("P " + numberWithCommas(totalBalance.toFixed(2)));
          $('#totalPayments > span').html("P " + numberWithCommas(totalPayments.toFixed(2)));
          $('#remainingBalance > span').html("P " + numberWithCommas(remainingBalance.toFixed(2)));
        },
        error: function(status) {
          swal("Error!", "Something's wrong!", "error");
        }
    });
  }

  function removeAssessmentItem(selector) {
    console.log($(selector).parent());
    if($(selector).parent().data('id') != "") {
      toBeRemovedAssessments.push($(selector).parent().parent().data('id'));
    }
    $(selector).parent().parent().remove();
  }

  function changeCheckbox(selector) {
    var checkbox = $(selector);
    var amount = $(selector).parent().parent().siblings().eq(0).children().eq(0);

    if(checkbox.prop('checked') == true) {
      amount.attr('disabled',false);
      amount.focus();
    } else {
      amount.attr('disabled',true);
    }
  }

  function initializeDatePicker() {
    $('.datepicker').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
    });
  }

  // Format Numbers with Commas
  function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
  }

  $(document).ready(function () {
    var assessmentItems;
    $('.error').hide();

    initializeDatePicker();
  
    // Select Students Table
    var table = $('#studentTable').DataTable({
      'select': {
        style: 'single'
      },
      'ajax': {
        url: '<?php echo base_url('/students/view');?>',
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
        { "render": function(data,type,full) {
            return full.parent_firstname + " " + full.parent_lastname;
          }
        },
        { "data": "gradelevel"},
      ]
    });
  
    // Retrieves Assessment Items for Add Assessment Modal
    getAssessmentItems();
  
    // Retrieves Assessment Items for Manage Assessments Modal
    $('#manageAssessmentItemsModal').on('show.bs.modal', function () {
      $('#assessmentItemsList').html("");
      $.ajax({
        url: '<?php echo base_url('assessments/view');?>',
        dataType: 'json',
        success: function(data) {
          if(data != null) {
            displayAssessmentItems(data);
            toBeRemovedAssessments = [];
          }
        }
      });
    });

    // Saves/Updates Assessment Items
    $('#saveAssessmentItems').on('click', function(event) {
      event.preventDefault();
      var assessmentList = [];

      function validateAssessmentItems() {
        var validationStatus = true;
        $('li.list-group-item').each(function(i) {
          if($(this).find('.assessment-name').val() != "") {
            assessmentList.push({
              id: $(this).data('id'),
              assessmentname: $(this).find('.assessment-name').val(),
              assessmenttype: $(this).find('select').val(),
              amount: $(this).find('.amount').val(),
              setdefault: ($(this).find('checkbox').prop('checked') == true ? '1' : '0')
            });
          } else {
            $(this).find('.assessment-name').siblings().eq(0).show();
            validationStatus = false;
          }
        });
        return validationStatus;
      }

      // If validateAssessmentItems() returns true(passed), it then proceeds to the ajax update
      if(validateAssessmentItems()) {
        $('.error').hide();
    
        // Update Assessment Items
        $.ajax({
          type: 'POST',
          url: 'assessments/update',
          data: { 
            newAssessmentList: assessmentList,
            removedAssessmentList: toBeRemovedAssessments 
          },
          success: function(data) {
            swal("Success!", "Assessment Items updated!", "success");
          },
          error: function(response) {
            swal("Error!", "Something's wrong", "error");
          }
        });
    
        $('#manageAssessmentItemsModal').modal('hide');
      }
    });
   
    // Select User / Student
    $('#studentTable tbody').on( 'click', 'tr', function () {
      var userData = table.row( this ).data();
      var name = userData.firstname + " ";
    
      if(userData.middlename != null && userData.middlename != "") {
        name += userData.middlename + " ";
      }
      name += userData.lastname;
  
      $('#selectedStudentName').text(name);
      $('#selectedStudentLevel').text("Grade " + userData.gradelevel);
      $('.collapse').collapse('hide');
      $('.add-buttons').prop('disabled',false);

      // Retrieve Student Balance
      getBalanceByStudent(userData.id);
  
      // Retrieve Accounts Assessments for Selected Student
      getAccountsAssessmentByStudent(userData.id);

      // Retrieve Account Payments for Selected Student
      getAccountsPaymentByStudent(userData.id);

 
      // Adds Assessment Assessment To User
      $('#addAssessment').on('click', function(event) {
        event.preventDefault();
        addAssessmentByStudentId(userData.id);
      });

      // Add Payment Schedule
      $('#addSchedule').on('click', function(event) {
        event.preventDefault();
        addPaymentByStudentId(userData.id);
      });
    });

    // Appends an Assessment Item Input Box to List Group
    $('#addAssessmentItemBtn').on('click',function(event) {
      event.preventDefault();
      if($('.new-assessment-item').length < 1) {
        var assessmentListItemTemplate = '<li class="list-group-item d-flex justify-content-between" data-id="">'
                                  +   '<div class="col-4 align-center">'
                                  +     '<input value="" type="text" class="form-control assessment-name" placeholder="Assessment Name"/>'
                                  +     '<label class="error text-danger" for="assessmentname">This field is required.</label>'
                                  +   '</div>'
                                  +   '<div class="col-4 d-flex">'
                                  +     '<div class="pt-1 pr-4">'
                                  +       '<label class="custom-control custom-checkbox">'
                                  +         '<input type="checkbox" class="custom-control-input default-checkbox" name="default" onchange="changeCheckbox(this)">'
                                  +         '<span class="custom-control-label small"></span>'
                                  +       '</label>'
                                  +     '</div><input value="" class="form-control amount" type="number" placeholder="Amount" disabled/>'
                                  +   '</div>'
                                  +   '<select class="col-2 form-control custom-select" name="type" id="assessmentType">'
                                  +     '<option value="Add" selected>Add</option>'
                                  +     '<option value="Deduct">Deduct</option>'
                                  +   '</select>'
                                  +   '<div class="col-1 text-right pt-1">'
                                  +     '<a javascript:void(0) class="text-danger delete-assessment-item" onclick="removeAssessmentItem(this)"><i class="far fa-trash-alt"></i></a>'
                                  +   '</div>'
                                  + '</li>';

                                  $('#assessmentItemsList').append(assessmentListItemTemplate);
        
        
      }
    });

    <?php if($type == "Parent"): ?>
    // Retrieve Students of Parents for Dropdown
    $.ajax({
      url: 'students/parent/view/' + <?php echo $id ?>,
      success: function(data) {
        if(data != null) {
          $('#studentDropdownBtn').html(data[0].firstname + " " + data[0].lastname);
          $('#studentDropdownBtn').val(data[0].firstname + " " + data[0].lastname);
          $('#studentDropdownBtn').attr('data-value',data[0].id);
          for(var c=0; c < data.length; c++) {
            $('#studentDropdownList').append('<a class="dropdown-item" href="#" data-value="' + data[c].id + '">' + data[c].firstname + " " + data[c].lastname + '</a>');
          }
        }

        // Retrieve Balance for Selected Student
        getBalanceByStudent($('#studentDropdownBtn').data('value'));

        // Retrieve Accounts Assessments for Selected Student
        getAccountsAssessmentByStudent($(this).data('value'));

        // Retrieve Account Payments for Selected Student
        getAccountsPaymentByStudent($(this).data('value'));

        // Student Dropdown onClick
        $('.dropdown-menu a').click(function(){
          $('#studentDropdownBtn').text($(this).text());
          $('#studentDropdownBtn').val($(this).text());
          $('#studentDropdownBtn').attr('data-value',$(this).data('value'));

          // Retrieve Balance for Selected Student
          getBalanceByStudent($(this).data('value'));

          // Retrieve Accounts Assessments for Selected Student
          getAccountsAssessmentByStudent($(this).data('value'));

          // Retrieve Account Payments for Selected Student
          getAccountsPaymentByStudent($(this).data('value'));
        });
      }
    });
    <?php endif; ?>
  });
</script>