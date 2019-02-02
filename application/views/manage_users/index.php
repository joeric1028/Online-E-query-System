<div class="row">  
  <div class="col-12">
    <div class="card">  
      <div class="card-body d-flex justify-content-between">
        <h2> Manage Users </h2>
        <span class="my-auto">
          <button class="btn btn-danger" id="deleteUserBtn" style="display: none">Delete User</button>
          <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add User</button>
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
          <table cellpadding="0" cellspacing="0" border="0" id="userTable">
            <thead>
                <tr>
                  <th>ID No.</th>
                  <th>First name</th>
                  <th>Middle name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>User Type</th>
                </tr>
            </thead>
          </table>
        </section>
      </div>
    </div>
  </div>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form name="adduserform" action="">
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
              <input type="radio" class="custom-control-input" name="gender" id="gender" value="Male" checked="">
              <span class="custom-control-label">Male</span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" name="gender" id="gender" value="Female">
              <span class="custom-control-label">Female</span>
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">User Type</label>
          <select class="form-control custom-select" name="type">
            <option value="Teacher">Teacher</option>
            <option value="Parent">Parent</option>
            <option value="Administrator">Administrator</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="addUser">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
	$(document).ready( function () {
    	// jQuery call to show add user modal
    	$('#myModal').on('shown.bs.modal', function () {
      		$('#myInput').trigger('focus')
    	});

    	// DataTable initializer to fill in the data in the table
    	var deleteButton = document.getElementById("deleteUserBtn");
			$('#userTable').DataTable(
			{
				'select': true,
						'ajax': {
							url: "<?php echo base_url('api/user_list');?>",
							dataSrc: ''
						},
						'columns': [
							{ "data": "idnumber"},
							{ "data": "firstname"},
							{ "data": "middlename"},
							{ "data": "lastname"},
							{ "data": "sex"},
							{ "data": "type"},
						]
    		}).on('select', function() {
      			if (deleteButton.style.display === "none" && $('.selected').length > 0) {
        			deleteButton.style.display = "inline-block";
      			}
    		}).on('deselect', function() {
      			if (deleteButton.style.display === "inline-block" && $('.selected').length == 0) {
        			deleteButton.style.display = "none";
      			};
    		});
    
    	//Hides modal on clicking Add user
    	// $('#addUser').on('click', function() {
    	//   $('#myModal').modal('hide');
    	// });

		$('.error').hide();

		$('#addUser').click(function() {
      		// validate and process form here
      
      		$('.error').hide();
		
			var firstname = $("input#firstname").val();
		
			if (firstname == "") {
				$("label#firstname_error").show();
				$("input#firstname").focus();
			}
		
			var middlename = $("input#middlename").val();
		
			if (middlename == "") {
				$("label#middlename_error").show();
				$("input#middlename").focus();
			}
		
			var lastname = $("input#lastname").val();
			
			if (lastname == "") {
				$("label#lastname_error").show();
				$("input#lastname").focus();
			}

			var idnumber = $("input#idnumber").val();

			if (idnumber == "") {
				$("label#idnumber_error").show();
				$("input#idnumber").focus();
			}

			if (firstname == "" || middlename == "" || lastname == "" || idnumber == "") {
				return false;
			}

			// $.ajax({
			// 	type: "POST",
			// 	url: "<?php echo base_url('users/create');?>",
			// 	data: dataString,
			// 	success: function() {
			// 		alert('Hello');
			// 	}
			// });
			
  			// return false;      
    	});
  	});
</script>