<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body d-flex justify-content-between">
        <h2> Manage Users </h2>
        <span class="my-auto">
        <button class="btn btn-danger" id="deleteUserBtn" style="display: none" data-toggle="modal" data-target="#deleteUserModal">Delete User</button>
        <button class="btn btn-success" data-toggle="modal" data-target="#addUserModal">Add User</button>
        </span>
      </div>
    </div>
  </div>
</div>
<div class="row row-cards">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <section>
          <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" id="userTable" class="w-100">
              <thead class="customTh">
                <tr>
                  <th>ID No.</th>
                  <th>First name</th>
                  <th>Middle name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>User Type</th>
                </tr>
              </thead>
              <tbody class="customTd">
              </tbody>
            </table>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
<div id="addUserModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form name="adduserform" id="adduserform" action="" method="post">
        <div class="modal-header">
          <h5 class="modal-title">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" name="firstname" id="firstname">
            <label class="error text-danger" for="firstname" id="firstname_error">This field is required.</label>
          </div>
          <div class="form-group">
            <label class="form-label">Middle Name</label>
            <input type="text" class="form-control" name="middlename" id="middlename">
            <label class="error text-danger" for="middlename" id="middlename_error">This field is required.</label>
          </div>
          <div class="form-group">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lastname" id="lastname">
            <label class="error text-danger" for="lastname" id="lastname_error">This field is required.</label>
          </div>
          <div class="form-group">
            <label class="form-label">ID Number</label>
            <input type="text" class="form-control" name="idnumber" id="idnumber">
            <label class="error text-danger" for="idnumber" id="idnumber_error">This field is required.</label>
          </div>
          <div class="form-group">
            <div class="form-label">Gender</div>
            <div class="custom-controls-stacked">
              <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" name="gender" value="Male" checked="">
              <span class="custom-control-label">Male</span>
              </label>
              <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" name="gender" value="Female">
              <span class="custom-control-label">Female</span>
              </label>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">User Type</label>
            <select class="form-control custom-select" name="type" id="type">
              <option id='optionTeacher' value="Teacher">Teacher</option>
              <option id='optionParent' value="Parent">Parent</option>
              <option id='optionTreasurer' value="Treasurer">Treasurer</option>
              <option id='optionAdministrator' value="Administrator">Administrator</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <label class="error form-label text-success" id="statussuccess"></label>
          <label class="error form-label text-danger" id="statuserror"></label>
          <button type="submit" class="btn btn-primary" id="addUser">Add</button>
          <button type="button" class="error btn btn-primary" id="addAnotherUserAdd">Add Another User?</button>
          <button type="button" class="error btn btn-secondary" data-dismiss="modal" id="addAnotherUserClose">Close</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="addUserCancel">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="deleteUserModal" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <form name="delete" id="delete" action="" method="post">
      <div class="modal-header">
        <h5 class="modal-title">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="form-label">Are you sure you want to delete?</div>
        </div>
        <div class="form-group">
          <div class="form-label">ID Number &nbsp&nbsp: &nbsp&nbsp<label id="deleteId"></label></div>
          <div class="form-label">Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp<label id="deleteName"></label></div>
        </div>
        <div class="modal-footer">
          <label class="error form-label text-success" id="deleteStatusSuccess"></label>
          <label class="error form-label text-danger" id="deleteStatusError"></label>
          <button type="submit" class="btn btn-primary" id="deleteUser">Delete</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="deleteUserCancel">Cancel</button>
        </div>
    </form>
    </div>
  </div>
</div>
<script>
	function  myCallbackFunction(updatedCell, updatedRow, oldValue) {
		if(oldValue != updatedCell.data()) {
			$.ajax({
					type: "POST",
					url: 'users/update',
					dataType: 'json',
					data: updatedRow.data(),
					success: function(data) {
						swal("Success!", data, "success");
						console.log(data.status);
					},
					error: function(data) {
						swal('Update error!');
						console.log(data.status);
					}
			});
		}
	}


  $(document).ready(function () {
		// jQuery call to show add user modal
		$('#addUserModal').on('shown.bs.modal', function () {
				$("input#firstname").focus();
		});
  
  	$('#deleteUserModal').on('shown.bs.modal');
  
		// DataTable initializer to fill in the data in the table
		var deleteButton = document.getElementById("deleteUserBtn");
  	var table = $('#userTable').DataTable(
  		{
  			'select': true,
  			'responsive': true,
					'ajax': {
						url: "<?php echo base_url('api/user_list')?>",
						dataSrc: ''
					},
					'columns': [
						{ "data": "idnumber"},
						{ "data": "firstname"},
						{ "data": "middlename"},
						{ "data": "lastname"},
						{ "data": "sex"},
						{ "data": "type"},
					],
					"rowid": "id"
     		}).on('select', function() {
					if (deleteButton.style.display === "none" && $('.selected').length > 0) {
						deleteButton.style.display = "inline-block";
					}
     		}).on('deselect', function() {
					if (deleteButton.style.display === "inline-block" && $('.selected').length == 0) {
						deleteButton.style.display = "none";
					}
     		});
	
		table.MakeCellsEditable({
			"onUpdate": myCallbackFunction,
			"inputCss":'my-input-class',
			"columns": [1,2,3,4,5,6],
			"allowNulls": {
					"columns": [1],
					"errorClass": 'error'
			},
			"confirmationButton": { 
					"confirmCss": 'my-confirm-class',
					"cancelCss": 'my-cancel-class'
			},
		"inputTypes": [{
				"column":1, 
				"type":"text", 
				"options":null 
			}, {
				"column":2, 
				"type":"text", 
				"options":null 
			}, {
				"column":3, 
				"type":"text", 
				"options":null 
			}, {
				"column":4, 
				"type": "list",
				"options":[
						{ "value": "Male", "display": "Male" },
						{ "value": "Female", "display": "Female" }
				]
			}, {
				"column":5, 
				"type": "list",
				"options":[
						{ "value": "Administrator", "display": "Administrator" },
						{ "value": "Teacher", "display": "Teacher" },
						{ "value": "Parent", "display": "Parent" },
						{ "value": "Treasurer", "display": "Treasurer" }
				]
			}]
		});		 

  	$('.error').hide();
  	
  	var indexid;
  	$('#userTable tbody').on('click', 'tr', function () {
  		indexid = table.row(this).index();
  	});
  
  	//Delete User Button
  	$('#deleteUserBtn').click(function() {
  		var data = table.row(indexid).data();
  		$('#deleteId').text(data['idnumber']);
  		$('#deleteName').text(data['firstname'] + ' ' + data['middlename'] + ' ' + data['lastname']);
  	});
  
  	//Delete User Form - Delete Button
  	$('#deleteUser').click(function(event) {
  		event.preventDefault();
  		var formData = {
					'id'       : table.row(indexid).data()['id']
			};
  				
  		$('#deleteUser').prop("disabled", true);
  		$.ajax({
  			type: "POST",
  			url: "<?php echo base_url('users/delete');?>",
  			data: formData,
  			dataType: "json",
  			error: function() {
  				$("label#deleteStatusError").show();
  			},
  			success: function(data) {
  				if (data['success'] == 'Deleting user account has been successful.')
  				{
  					$("label#deleteStatusSuccess").show();
  					$("label#deleteStatusSuccess").text(data['success']);
  					setTimeout(function() {location.reload()}, 3000);
  				}
  				else
  				{
  					$("label#deleteStatusError").show();
  					$("label#deleteStatusError").text(data['error']);
  				}
  			}
  		});
  		$('#deleteUser').removeAttr("disabled");
  	});
  
  	// Add User Button
  	$('#addUser').click(function(event) {
			// validate and process form here
  		event.preventDefault();
       
  		$('.error').hide();
  
  		var idnumber = $("input#idnumber").val();
  
  		if (idnumber == "") {
  			$("label#idnumber_error").show();
  			$("input#idnumber").focus();
  		}
  
  		var lastname = $("input#lastname").val();
  		
  		if (lastname == "") {
  			$("label#lastname_error").show();
  			$("input#lastname").focus();
  		}
  
  		var middlename = $("input#middlename").val();
  	
  		if (middlename == "") {
  			$("label#middlename_error").show();
  			$("input#middlename").focus();
  		}
  
  		var firstname = $("input#firstname").val();
  
  		if (firstname == "") {
  			$("label#firstname_error").show();
  			$("input#firstname").focus();
  		}
  
  		if (firstname == "" || middlename == "" || lastname == "" || idnumber == "") {
  			return;
  		}
  		
  		var formData = {
         	    'firstname'      : firstname,
         	    'middlename'     : middlename,
  						'lastname'       : lastname,
  						'sex'            : $("input[type=radio][name=gender]:checked").val(),
  						'type'           : $("select#type").val(),
     	        'idnumber'       : idnumber
         	};
       
  		$.ajax({
  			type: "POST",
  			url: "<?php echo base_url('users/create');?>",
  			data: formData,
  			error: function() {
  				$("label#statuserror").show();
  				$("button#addAnotherUserAdd").hide();
  				$("button#addAnotherUserClose").hide();
  				$("button#addUser").show();
  				$("button#addUserCancel").show();
  			},
  			success: function(data) {
  				$("label#statussuccess").show();
  				$("button#addAnotherUserAdd").show();
  				$("button#addAnotherUserClose").show();
  				$("button#addUser").hide();
  				$("button#addUserCancel").hide();
  
  				if (data['success'] == 'Creating user account has been successful.')
  				{
  					$("label#statussuccess").show();
  					$("label#statussuccess").text(data['success']);
  
  					table.ajax.reload();
  					table.ajax.draw();
  				}
  				else
  				{
  					$("label#statuserror").show();
  					$("label#statuserror").text(data['error']);
  				}
  			}
  		});
     	});
  
  	// Add Another User Form - Add Button
  	$('#addAnotherUserAdd').click(function() {
  		$("input#firstname").val('');
  		$("input#middlename").val('');
  		$("input#lastname").val('');
  		$("input#idnumber").val('');
  		$("input#gender").val('Male');
  		$("select#type").val('Teacher');
  
  		$("label#statussuccess").hide();
  		$("button#addAnotherUserAdd").hide();
  		$("button#addAnotherUserClose").hide();
  		$("button#addUser").show();
  		$("button#addUserCancel").show();
  
  		table.ajax.reload();
  		table.ajax.draw();
  	});
  
  	
  	// Add Another User Form - Close Button
  	$('#addAnotherUserClose').click(function() {
  		$("input#firstname").val('');
  		$("input#middlename").val('');
  		$("input#lastname").val('');
  		$("input#idnumber").val('');
  		document.getElementById("gender").checked = true;
  		document.getElementById("optionTeacher").selected = true;
  
  		$("label#statussuccess").hide();
  		$("button#addAnotherUserAdd").hide();
  		$("button#addAnotherUserClose").hide();
  		$("button#addUser").show();
  		$("button#addUserCancel").show();
  		
  		table.ajax.reload();
  		table.ajax.draw();
  	});
  
  	// Add User Form - Cancel Button
  	$('#addUserCancel').click(function() {
  		$("input#firstname").val('');
  		$("input#middlename").val('');
  		$("input#lastname").val('');
  		$("input#idnumber").val('');
  		document.getElementById("gender").checked = true;
  		document.getElementById("optionTeacher").selected = true;
  
  		$("label#statussuccess").hide();
  		$("button#addAnotherUserAdd").hide();
  		$("button#addAnotherUserClose").hide();
  		$("button#addUser").show();
  		$("button#addUserCancel").show();
  		
  		table.ajax.reload();
  		table.ajax.draw();
  	});
	});
</script>