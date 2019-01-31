<div class="row">  
  <div class="col-12">
    <div class="card">  
      <div class="card-body d-flex justify-content-between">
        <h2> Manage Users </h2>
        <span class="my-auto"><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add User</button></span>
      </div>
    </div>
  </div>
</div>
<div class="row row-cards">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <section>
        <?php 
        // foreach ($users as $user): 
        //   echo $user->firstname; 
        //   echo $user->middlename;
        //   echo $user->lastname;  
        //   endforeach; 
        // echo json_encode( $users );
        ?>
          <table cellpadding="0" cellspacing="0" border="0" id="user-table">
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
      <div class="modal-header">
        <h5 class="modal-title">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label">First Name</label>
          <input type="text" class="form-control" name="example-text-input">
        </div>
        <div class="form-group">
          <label class="form-label">Middle Name</label>
          <input type="text" class="form-control" name="example-text-input">
        </div>
        <div class="form-group">
          <label class="form-label">Last Name</label>
          <input type="text" class="form-control" name="example-text-input">
        </div>
        <div class="form-group">
          <label class="form-label">First Name</label>
          <input type="text" class="form-control" name="example-text-input">
        </div>
        <div class="form-group">
          <div class="form-label">Gender</div>
          <div class="custom-controls-stacked">
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" name="gender" value="male" checked="">
              <span class="custom-control-label">Male</span>
            </label>
            <label class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" name="gender" value="female">
              <span class="custom-control-label">Female</span>
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">User Type</label>
          <select class="form-control custom-select">
            <option value="teacher">Teacher</option>
            <option value="parent">Parent</option>
            <option value="admin">Admin</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addUser">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  
	$(document).ready( function () {
    // jQuery call to show add user modal
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })

    // DataTable initializer to fill in the data in the table
		$('#user-table').DataTable(
		{
      'select': true,
			'ajax': {
				url: '/users/list',
				dataSrc: ''
			},
			'columns': [
        { "data": "id"},
				{ "data": "firstname"},
				{ "data": "middlename"},
				{ "data": "lastname"},
				{ "data": "sex"},
        { "data": "type"},
			]
    });
    
    // Hides modal on clicking save changes
    $('#addUser').on('click', function() {
      $('#myModal').modal('hide');
    });
	});
</script>