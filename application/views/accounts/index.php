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
  <div class="col-5">
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
  </div><div class="col-5">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <span class="stamp stamp-md bg-green mr-3">
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
                <th style="width: 7%"></th>
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
          <div class="text-right mb-2">
            <button id="addAssessmentItemBtn" class="btn btn-success btn-sm">+ Add Assessment Item</button>
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
  // Retrieves Assessment Items for Manage Particulars
  function getAssessmentItems() {
    $.ajax({
        url: '<?php echo base_url('assessments/view');?>',
        dataType: 'json',
        success: function(data) {
          for(var c=0; c < data.length; c++) {
            $('#particulars').append('<option value="' + data[c].id + '" selected="">' + data[c].assessmentname + '</option>');
            if(data[c].assessmenttype != "Deduct") {
              $('#scheduleParticulars').append('<option value="' + data[c].id + '" selected="">' + data[c].assessmentname + '</option>');
            }
          }
        }
    });
  }

  function displayAssessmentItems(data) {
    for(var c=0; c < data.length; c++) {
      var assessmentListItemTemplate = '<li class="list-group-item d-flex justify-content-between" data-id="' + data[c].id + '">'
                                      +   '<div class="col-5 align-center pt-1">' + data[c].assessmentname + '</div>'
                                      +   '<select class="col-4 form-control custom-select" name="type" id="assessmentType">'
                                      +   '<option value="Add"' + (data[c].assessmenttype == "Add" ? "selected" : "")  + '>Add</option>'
                                      +    '<option value="Deduct"' + (data[c].assessmenttype == "Deduct" ? "selected" : "")  + '>Deduct</option>'
                                      +   '</select>'
                                      +   '<button class="btn btn-link btn-sm text-danger delete-assessment-item">Remove</button>'
                                      + '</li>';
      $('#assessmentItemsList').append(assessmentListItemTemplate);
    }
  }

  // Displays Assessments For Selected Student
  function displayAssessments(data) {
    $('#assessmentTable > tbody').html("");
    for(var c=0; c < data.length; c++) {
      var assessmentTemplate = '<tr data-id="' + data[c].id + '">'
                              + '<td>' + data[c].assessmentname + '</td>'
                              + '<td>' + data[c].amount + '</td>'
                              + '<td>'
                              +   '<button class="btn btn-link icon deleteAssessment">'
                              +   '<i class="fa fa-trash"></i>'
                              + '</button></td>'
                              + '</tr>';
      $('#assessmentTable > tbody').append(assessmentTemplate);
      // $('#addAssessmentModal').modal('hide');
    }
  }

  // Displays Payments For Selected Student
  function displayPayments(data) {
    $('#paymentsTable > tbody').html("");
    for(var c=0; c < data.length; c++) {
      var paymentTemplate = '<tr data-id="' + data[c].id + '">'
                              + '<td>' + data[c].date + '</td>'
                              + '<td>' + data[c].assessmentname + '</td>'
                              + '<td>' + data[c].ornumber + '</td>'
                              + '<td>' + data[c].amount + '</td>'
                              + '<td>'
                              +   '<button class="btn btn-link icon deletePayment">'
                              +   '<i class="fa fa-trash"></i>'
                              + '</button></td>'
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
        
        // Deletes Assessment (in Retrieve Assessment)
        $('.deleteAssessment').on('click', function(event) {
          var assessmentId = $(this).parent().parent().data('id');
          deleteAssessment(assessmentId, studentId);
        });
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

        // Deletes Payment (in Retrieve Payment)
        $('.deletePayment').on('click', function(event) {
          var paymentId = $(this).parent().parent().data('id');
          getBalanceByStudent(studentId);
          deletePayment(paymentId,studentId);
        });
      }
    });
  }

  function addAssessmentByStudentId(studentId) {
    var newAssessment = { 
        assessmentsId: $('#particulars').val(),
        amount: $('#assessmentAmountDue').val(),
        studentId: studentId
      };
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
  }

  function addPaymentByStudentId(studentId) {
    var newPayment = {
        date: $('#scheduleDate').val(),
        orNumber: $('#scheduleOrNo').val(),
        amount: $('#scheduleAmountPaid').val(),
        assessmentId: $('#scheduleParticulars').val(),
        studentId: studentId,
      };
    $.ajax({
      type: 'POST',
      url: 'payments/create',
      data: newPayment,
      success: function(data) {
        swal("Success!", "Payment Added!", "success");
        getBalanceByStudent(studentId);
        $('#addScheduleModal').modal('hide');
        displayPayments(data, status);

        // Deletes Payment (in Add Payment)
        $('.deletePayment').on('click', function(event) {
          var paymentId = $(this).parent().parent().data('id');
          deletePayment(paymentId,studentId);
          getBalanceByStudent(studentId);
        });
      }, 
      error: function(status) {
        swal("Error!", "Something's wrong!", "error");
      }
    });
  }

  // Deletes Payment of Selected Student
  function deletePayment(paymentId,studentId) {
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
            studentId: studentId
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
  function deleteAssessment(assessmentId,studentId) {
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
            studentId: studentId
          },
          success: function(data, status) {
            swal("Success!", "Assessment successfuly deleted!", "success");
            displayAssessments(data);
            getBalanceByStudent(studentId);
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
          var remainingBalance = data.remainingBalance;
          $('#totalBalance > span').html("P " + numberWithCommas(totalBalance.toFixed(2)));
          $('#remainingBalance > span').html("P " + numberWithCommas(remainingBalance.toFixed(2)));
        }
    });
  }

  // Format Numbers with Commas
  function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
  }

  $(document).ready(function () {
    $('.error').hide();

    $('#scheduleDate').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
    });
  
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
            var toBeRemovedAssessments = [];

            // Removes Assessment Item
            $('.delete-assessment-item').on('click', function(e){
              e.preventDefault();
              if($(this).parent().data('id') != "") {
                toBeRemovedAssessments.push($(this).parent().data('id'));
              }
              $(this).parent().remove();
            });

            // Saves/Updates Assessment Items
            $('#saveAssessmentItems').on('click', function(event) {
                //event.preventDefault();
                var assessmentList = [];
                $('li.list-group-item').each(function(i) {
                  assessmentList.push({
                    id: $(this).data('id'),
                    assessmentname: $(this).find('div').text(),
                    assessmenttype: $(this).find('select').val()
                  });
                });
            
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
                    swal("Error!", "Something's wrong!", "error");
                  }
                });
            
                $('#manageAssessmentItemsModal').modal('hide');
              });
          }
        }
      });
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
        $('#assessmentItemsList').append('<input class="list-group-item new-assessment-item" placeholder="Enter Assessment Name">');
      
        $('input.new-assessment-item').keydown(function (e) {
          if (e.keyCode == 13) {
            e.preventDefault();

            var assessmentListItemTemplate = '<li class="list-group-item d-flex justify-content-between" data-id="">'
                                            +   '<div class="col-5 align-center pt-1">' + $(this).val() + '</div>'
                                            +   '<select class="col-4 form-control custom-select" name="type" id="assessmentType">'
                                            +       '<option value="Add">Add</option>'
                                            +       '<option value="Deduct">Deduct</option>'
                                            +   '</select>'
                                            +   '<button class="btn btn-link btn-sm text-danger delete-assessment-item">Remove</button>'
                                            + '</li>';
  
            $('#assessmentItemsList').append(assessmentListItemTemplate);
            $('.new-assessment-item').remove();
            
            // Removes Assessment Item
            $('.delete-assessment-item').on('click', function(e){
              e.preventDefault();
              $(this).parent().remove();
            });
            
            return false;
  
          } else if( e.keyCode == 27 ) {
            e.preventDefault();
            $(this).remove();
            return false;
          }   
        });
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