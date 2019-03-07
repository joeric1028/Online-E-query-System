<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <h2>Manage Students</h2>
                <div class="dropdown">
                    <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="sectionDropdownBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="All Levels">
                        All Levels
                    </button>
                    <div class="dropdown-menu" aria-labelledby="sectionDropdownBtn">
                        <a class="dropdown-item" href="#" data-value="">All Levels</a>
                        <a class="dropdown-item" href="#" data-value="1">Grade 1</a>
                        <a class="dropdown-item" href="#" data-value="2">Grade 2</a>
                        <a class="dropdown-item" href="#" data-value="3">Grade 3</a>
                        <a class="dropdown-item" href="#" data-value="4">Grade 4</a>
                        <a class="dropdown-item" href="#" data-value="5">Grade 5</a>
                        <a class="dropdown-item" href="#" data-value="6">Grade 6</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="card" id="subjectCard">
            <div class="card-header d-flex justify-content-between">
                <span>Subjects</span>
                <button class="btn btn-outline-success btn-sm" type="button" id="addSubjectBtn" data-toggle="modal" data-target="#addSubjectModal">Add Subject</button>    
            </div>
            <div class="card-body">
                <ul id="subjectList" class="list-group custom-list-group">
         
                </ul>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card" id="studentCard">
            <div class="card-header d-flex justify-content-between">
                <span>Students</span>
                <button class="btn btn-outline-success btn-sm" type="button" id="addStudentBtn" data-toggle="modal" data-target="#addStudentModal">Add Student</button>    
            </div>
            
            <div class="card-body">
                <table cellpadding="0" cellspacing="0" id="studentTable">
                    <thead class="customTh">
                        <tr>
                            <th style="width: 20%">ID No.</th>
                            <th style="width: 80%">Full Name</th>
                        </tr>
                    </thead>
                    <tbody class="customTd"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

	<div id="addSubjectModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<form name="addsubjectform" id="addsubjectform" action="" method="post">
		<div class="modal-header">
			<h5 class="modal-title">Add Subject</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="addsubjectclosex">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="form-group">
			<label class="form-label">Subject Name</label>
			<input type="text" class="form-control" name="subjectname" id="subjectname">
			<label class="error text-danger" for="subjectname" id="subjectname_error">This field is required.</label>
			</div>
			<div class="form-group">
			<label class="form-label">Grade Level</label>
				<select class="form-control custom-select" name="type" id="subjectGradeLevel">
					<option value="1">Grade 1</option>
					<option value="2">Grade 2</option>
					<option value="3">Grade 3</option>
					<option value="4">Grade 4</option>
					<option value="5">Grade 5</option>
					<option value="6">Grade 6</option>
				</select>
			</div>
		</div>
		
		<div class="modal-footer">
			<label class="error form-label text-success" id="statussuccess"></label>
			<label class="error form-label text-danger" id="statuserror"></label>
			<button type="submit" class="btn btn-primary" id="addsubject">Add</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal" id="addsubjectclose">Cancel</button>
		</div>
		</form>
		</div>
	</div>
	</div>

	<div id="addStudentModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<form name="addStudentform" id="addStudentform" action="" method="post">
		<div class="modal-header">
			<h5 class="modal-title">Add Student</h5>
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
			<label class="form-label">Parent</label>
			<select class="form-control select2" name="selectParent" id="selectParent" style="width: 100%;height: 100px"><option></option></select>
			<label class="error text-danger" for="selectParent" id="selectparent_error">This field is required.</label>
			</div>
			<div class="form-group">
			<div class="form-label">Gender</div>
			<div class="custom-controls-stacked">
				<label class="custom-control custom-radio custom-control-inline">
				<input type="radio" class="custom-control-input" name="gender" id="genderMale" value="Male" checked="">
				<span class="custom-control-label">Male</span>
				</label>
				<label class="custom-control custom-radio custom-control-inline">
				<input type="radio" class="custom-control-input" name="gender" id="genderFemale" value="Female">
				<span class="custom-control-label">Female</span>
				</label>
			</div>
			</div>
			<div class="form-group">
			<label class="form-label">Grade Level</label>
				<select class="form-control custom-select" name="type" id="studentGradeLevel">
					<option value="1">Grade 1</option>
					<option value="2">Grade 2</option>
					<option value="3">Grade 3</option>
					<option value="4">Grade 4</option>
					<option value="5">Grade 5</option>
					<option value="6">Grade 6</option>
				</select>
			</div>
		</div>
		<div class="modal-footer">
			<label class="error form-label text-success" id="statussuccess"></label>
			<label class="error form-label text-danger" id="statuserror"></label>
			<button type="submit" class="btn btn-primary" id="addstudent">Add</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal" id="addstudentclose">Cancel</button>
		</div>
		</form>
		</div>
	</div>
	</div>


	<script>
	$(document).ready(function () {
		// Get Students
		$.ajax({
			url: 'students/view/',
			dataType: 'json',
			success: function(data) {
			$('#studentTable').find('tbody').html("");

			for(var c=0; c < data.length; c++) {
				var studentListItemTemplate = '<tr>' 
											+ '<td>' + data[c].id + '</td>' 
											+ '<td>' + data[c].firstname + ' ' + data[c].lastname + '</td>' 
											+ '</tr>'
				$('#studentTable').find('tbody').append(studentListItemTemplate);
			}
			}
		}); 
		
		// Get Subjects
		$.ajax({
			url: '<?php echo site_url('subjects/view');?>',
			dataType: 'json',
			success: function(data) {
				$('#subjectList').html("");

				for(var c=0; c < data.length; c++) {
				var subjectListItemTemplate = '<li class="list-group-item">'
												+ data[c].subject
												+ '<button type="button" class="close custom-close" aria-label="Close">'
												+ '<span aria-hidden="true">&times;</span>'
												+ '</button>'
											+ '</li>';
				$('#subjectList').append(subjectListItemTemplate);
				}
			}
			});

				

			$('.error').hide();
			$('#addSubjectModal').on('shown.bs.modal', function () {
				$('#subjectname').trigger('focus');
		});

		$('.dropdown-menu a').click(function(){
			// if($(this).text() == "All Levels") {
			//     $('#addSubjectBtn').attr('disabled',true);
			//     $('#addStudentBtn').attr('disabled',true);
			//     $('.active').removeClass('active');
			// } else {
			//     $('#addSubjectBtn').attr('disabled',false);
			//     $('#addSubjectBtn').show();
			// }

			$('#subjectList').html("");
			$('#studentTable').find('tbody').html("");
			
			// Get Subjects by Level
			$.ajax({
				url: 'subjects/view/' + $(this).data('value') ,
				dataType: 'json',
				success: function(data) {
					$('#subjectList').html("");

					for(var c=0; c < data.length; c++) {
						var subjectListItemTemplate = '<li class="list-group-item" data-value="'+ data[c].id +'">'
													+ data[c].subject
													+ '<button type="button" class="close custom-close" aria-label="Close">'
													+ '<span aria-hidden="true">&times;</span>'
													+ '</button>'
													+ '</li>';
						$('#subjectList').append(subjectListItemTemplate);
					}
				}
			});        

			// Get Students by Level
			$.ajax({
				url: 'students/view/' + $(this).data('value') ,
				dataType: 'json',
				success: function(data) {
					for(var c=0; c < data.length; c++) {
						var studentListItemTemplate = '<tr>' 
													+ '<td>' + data[c].id +'</td>' 
													+ '<td>' + data[c].firstname + ' ' + data[c].lastname + '</td>' 
												+ '</tr>'
					$('#studentTable').find('tbody').append(studentListItemTemplate);
					}
				}
			});        

			$('.btn:first-child').text($(this).text());
			$('.btn:first-child').val($(this).text());
			$('.btn:first-child').attr('data-value',$(this).data('value'));
		});

		// Add Subject
		$('#addsubject').click(function(event) {
			event.preventDefault();

			$.ajax({
				url: 'subjects/create/',
				type: 'POST',
				dataType: 'json',
				dataSrc: '',
				data: { 
					'subjectName': $('#subjectname').val(),
					'gradeLevel': $('#subjectGradeLevel').val(),
					'selectedLevel': $('#subjectGradeLevel').attr('data-value')
				}, 
				success: function(data) {
					$('#subjectList').html('');
					for(var c=0; c < data.length; c++) {
						var subjectListItemTemplate = '<li class="list-group-item" data-value="'+ data[c].id +'">'
														+ data[c].subject
														+ '<button type="button" class="close custom-close" aria-label="Close">'
														+ '<span aria-hidden="true">&times;</span>'
														+ '</button>'
													+ '</li>';
						$('#subjectList').append(subjectListItemTemplate);
					}

					$('#addSubjectModal').modal('hide');
				}
			});        
		});

		// Add Student
		$('#addstudent').click(function(event) {
			event.preventDefault();

			$.ajax({
				url: 'students/create/',
				type: 'POST',
				dataType: 'json',
				dataSrc: '',
				data: { 
					'firstName': $('#firstname').val(),
					'middleName': $('#middlename').val(),
					'lastName': $('#lastname').val(),
					'idNumber': $('#idnumber').val(),
					'gender': $('input[name=gender]:checked').val(),
					'parentId': $('#selectParent').val(),
					'gradeLevel': $('#studentGradeLevel').val(),
					'selectedLevel': $('#subjectGradeLevel').attr('data-value')
				},
				success: function(data) {
					$('#studentTable').find('tbody').html('');
					for(var c=0; c < data.length; c++) {
						var studentListItemTemplate = '<tr>' 
														+ '<td>' + data[c].id +'</td>' 
														+ '<td>' + data[c].firstname + " " + data[c].middlename + ' ' + data[c].lastname + '</td>' 
													+ '</tr>'
						$('#studentTable').find('tbody').append(studentListItemTemplate);
					}

					$('#addStudentModal').modal('hide');
				}
			});        
		});

		$('.list-group li').mouseenter(function(){
			if($('.btn:first-child').val() != "All Levels") {
				$(this).find('.custom-close').show();
			}
		}).mouseleave(function(){
			$(this).find('.custom-close').hide();
		});

		$('.list-group li').click(function(e) {
			e.preventDefault()
			if($(".btn:first-child").val() != "All Levels") {
				$(this).parent().find('li').removeClass('active');
				$(this).addClass('active');
			}
		});

		// Search Parent
		$('#selectParent').select2({
			placeholder: '--- Select Parent ---',
			ajax: {
				url: 'parents/search',
				dataType: 'json',
				delay: 250,
				processResults: function (data) {
					console.log(data);
					return {
						results: data
					};
				},
				cache: true
			}
		});
	});
	</script>