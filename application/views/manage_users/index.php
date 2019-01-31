

<div class="card">
	<div class="card-body">
		<div class="card-title d-flex justify-content-between">
				<h1> Manage Users </h1>
				<span class="my-auto"><button class="btn btn-success">Add User</button></span>
			</div>
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
								<th>First name</th>
								<th>Middle name</th>
								<th>Last Name</th>
								<th>Gender</th>
								<th>User Type</th>
								<th>Password</th>
						</tr>
				</thead>
			</table>
		</section>
	</div>
</div>


<script>
	$(document).ready( function () {
		$('#user-table').DataTable(
		{
			'ajax': {
				url: '/users/list',
				dataSrc: ''
			},
			'columns': [
				{ "data": "id"},
				{ "data": "firstname"},
				{ "data": "middlename"},
				{ "data": "lastname"},
				{ "data": "idnumber"},
				{ "data": "firstname"},
			]
		});
	});
</script>