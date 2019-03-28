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
    <div class="col-5">
        <div class="card" id="subjectCard">
            <div class="card-header d-flex justify-content-between">
                <span>Subjects</span>
                <button class="btn btn-outline-success btn-sm" type="button" id="addSubjectBtn" data-toggle="modal" data-target="#addSubjectModal">Add Subject</button>    
            </div>
            <div class="card-body">
			<div id="subjectlistloader">
                        <div class="loader disable-selection" id="loader-4">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                <ul id="subjectList" class="list-group custom-list-group">
         
                </ul>
            </div>
        </div>
    </div>
    <div class="col-7">
        <div class="card" id="studentCard">
            <div class="card-header d-flex justify-content-between">
                <span>Students</span>
                <button class="btn btn-outline-success btn-sm" type="button" id="addStudentBtn" data-toggle="modal" data-target="#addStudentModal">Add Student</button>    
            </div>
            
            <div class="card-body">
			<div id="studentlistloader">
                        <div class="loader disable-selection" id="loader-4">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
				<div class="table-responsive">
					<table cellpadding="0" cellspacing="0" class="bcma-table" id="studentTable">
						<thead class="customTh">
							<tr>
								<th style="width: 4em">ID No.</th>
								<th>Student Name</th>
								<th style="width: 10em">Parent</th>
								<th style="width: 50px"></th>
							</tr>
						</thead>
						<tbody class="customTd"></tbody>
					</table>
				</div>
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
			<button type="submit" class="btn btn-primary" id="updatesubject" hidden>Save</button>
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
			<select class="form-control select2 selectParent" name="selectParent" id="selectParent" style="width: 100%;height: 100px"><option></option></select>
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
	$('table#studentTable').hide();

	function initializeSelect2(){
		// Search Parent
		$('.selectParent').select2({
			placeholder: '--- Select Parent ---',
			ajax: {
				url: 'parents/search',
				dataType: 'json',
				delay: 250,
				processResults: function (data) {
					return {
						results: data
					};
				},
				cache: true
			}
		});
	}

	function getSubjects(currentLevel) {
		var url;
		if(currentLevel != undefined) {
			url = 'subjects/view/' + currentLevel;
		} else {
			url = 'subjects/view';
		}
		
		$.ajax({
			url: url,
			dataType: 'json',
			beforeSend: function() {
                $('div#subjectlistloader').show();
                $('#subjectList').html('');
            },
			success: function(data) {
				$('#subjectList').html("");
				$('div#subjectlistloader').hide();

				if (data.warning != undefined) {
					var subjectListItemTemplate = '<div>' + data.warning + '</div>';
					$('#subjectList').append(subjectListItemTemplate);
				} else {
					displaySubjectList(data);
				}
			}
		});
	}

	function getStudents(currentLevel) {
		var url;
		if(currentLevel != undefined) {
			url = 'students/view/' + currentLevel;
		} else {
			url = 'students/view';
		}

		$.ajax({
			url: url,
			dataType: 'json',
			beforeSend: function() {
				$('#studentTable').hide();
				$('div#studentlistloader').show();
            },
			success: function(data) {
				$('div#studentlistloader').hide();
				$('#studentTable').show();
				$('#studentTable').find('tbody').html("");

				if (data.warning != undefined) {
					var studentListItemTemplate = '<tr>' 
												+ '<td></td>' 
												+ '<td>' + data.warning + '</td>' 
												+ '</tr>';
					$('#studentTable').find('tbody').append(studentListItemTemplate);
				} else {
					displayStudentTable(data);
					$('.removeStudent').on('click', function(event) {
						deleteStudent($(this).parent().siblings().eq(0).html());
						$(this).parent().parent().remove();
					});
					
				}
			}
		}); 
	}

	function displaySubjectList(data) {
		for (var c=0; c < data.length; c++) {
			var subjectListItemTemplate = '<li class="list-group-item" data-value="' + data[c].id + '" data-level="' + data[c].gradelevel + '">'
									+ '<span>' + data[c].subject + '</span>'
									+ '<div class="item-action dropdown" style="float: right">'
									+ 	'<a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fas fa-ellipsis-v"></i></a>'
									+ 	'<div class="dropdown-menu dropdown-menu-right">'
									+ 		'<a href="javascript:void(0)" onClick="updateSubject(this)" class="dropdown-item"><i class="dropdown-icon far fa-edit"></i> Update </a>'
									+ 		'<a href="javascript:void(0)" onClick="deleteSubject(this)" class="dropdown-item"><i class="dropdown-icon far fa-trash-alt"></i> Delete </a>'
									+ 	'</div>'
									+ '</div>'
									+ '</li>';
			$('#subjectList').append(subjectListItemTemplate);
		}
	}

	function displayStudentTable(data) {
	    $('#studentTable').find('tbody').html('');
		for(var c=0; c < data.length; c++) {
			var studentFullName = data[c].firstname + " " + data[c].middlename + ' ' + data[c].lastname;
			var studentListItemTemplate = '<tr data-id="' + data[c].id + '">' 
										+ '<td>' + data[c].id + '</td>' 
										+ '<td data-fn="' + data[c].firstname + '" data-mi="' + data[c].middlename + '" data-ln="' + data[c].lastname + '" >' + studentFullName + '</td>'
										+ '<td data-id="' + data[c].parent_id + '">' + data[c].parent_firstname + " " + data[c].parent_lastname + '</td>'
										+ '<td class="text-center">'
										+	 '<div class="item-action dropdown">'
										+		'<a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fas fa-ellipsis-v"></i></a>'
										+		'<div class="dropdown-menu dropdown-menu-right">'
										+			'<a href="javascript:void(0)" onClick="updateStudent(this)" class="dropdown-item"><i class="dropdown-icon far fa-edit"></i> Update </a>'
										+			'<a href="javascript:void(0)" onClick="deleteStudent(this)" class="dropdown-item"><i class="dropdown-icon far fa-trash-alt"></i> Delete </a>'
										+		'</div>'
										+	'</div>'
										+ '</td>' 
										+ '</tr>'
			$('#studentTable').find('tbody').append(studentListItemTemplate);
		}
	}

	function addSubject() {
		$.ajax({
			url: 'subjects/create/',
			type: 'POST',
			dataType: 'json',
			dataSrc: '',
			data: { 
				'subjectName': $('#subjectname').val(),
				'gradeLevel': $('#subjectGradeLevel').val(),
				'selectedLevel': $('#sectionDropdownBtn').attr('data-value')
			}, 
			success: function(data) {
				swal("Success!", "New Subject Added!", "success");
				$('#subjectList').html('');
				displaySubjectList(data);

				$('#addSubjectModal').modal('hide');
			},
			error: function(status) {
				swal("Error!", "Something's wrong!", "error");
			}
		});     
	}
//
	function addStudent() {
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
				'parentId': $('.selectParent').val(),
				'gradeLevel': $('#studentGradeLevel').val(),
				'selectedLevel': $('#subjectGradeLevel').attr('data-value')
			},
			success: function(data, status) {
				swal("Success!", "New Student Added!", "success");
				displayStudentTable(data);
				$('#addStudentModal').modal('hide');
			},
			error: function(status) {
				swal("Error!", "Something's wrong!", "error");
			}
		});    
	}

	function updateSubject(selector) {
		var subject = $(selector).parent().parent().parent();
		var currSubject = subject.find('span').html();
		var currLevel = subject.data('level');
		var subjectDefaultTemplate = '<div class="item-action dropdown" style="float: right">'
								   + 	'<a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fas fa-ellipsis-v"></i></a>'
								   + 	'<div class="dropdown-menu dropdown-menu-right">'
								   + 		'<a href="javascript:void(0)" onclick="updateSubject(this)" class="dropdown-item"><i class="dropdown-icon far fa-edit"></i> Update </a>'
								   + 		'<a href="javascript:void(0)" onclick="deleteSubject(this)" class="dropdown-item"><i class="dropdown-icon far fa-trash-alt"></i> Delete </a>'
								   + 	'</div>'
								   + '</div>';
		var editSubjectTemplate = '<input value="' + currSubject + '" class="form-control" type="text"/>'
								+	'<select class="form-control edit-dropdown ml-1" name="type">'
								+ 		'<option value="1">Gr. 1</option>'
								+ 		'<option value="2">Gr. 2</option>'
								+ 		'<option value="3">Gr. 3</option>'
								+ 		'<option value="4">Gr. 4</option>'
								+ 		'<option value="5">Gr. 5</option>'
								+ 		'<option value="6">Gr. 6</option>'
								+ 	'</select>'
								+ 	'<button class="btn btn-sm btn-outline-success form-control ml-1 edit-save"><i class="fas fa-check"></i></button>'
								+	'<button class="btn btn-sm btn-outline-warning form-control ml-1 edit-cancel"><i class="fas fa-times"></i></button>';
		if(!subject.hasClass('d-flex')) {
			subject.addClass('d-flex');
		}
		subject.html(editSubjectTemplate);
		subject.find('select').val(currLevel);

		$('.edit-save').on('click', function(e) {
			e.preventDefault();
			var thisSubject = $(this).parent();
			var newSubject = $(this).siblings().eq(0).val();

			$.ajax({
				url: 'subjects/update',
				type: 'POST',
				dataType: 'json',
				dataSrc: '',
				data: { 
					'id': subject.data('value'),
					'subjectName': subject.find('input').val(),
					'gradeLevel': subject.find('select').val()
				}, 
				success: function(data) {
					swal("Success!", data, "success");
					thisSubject.html('<span>' + newSubject + '</span>' + subjectDefaultTemplate);
					if(thisSubject.hasClass('d-flex')) {
						thisSubject.removeClass('d-flex');
					}
				},
				error: function(status) {
					swal("Error!", "Something's wrong!", "error");
				}
			});     
		});

		$('.edit-cancel').on('click', function(e) {
			e.preventDefault();
			var thisSubject = $(this).parent();
			thisSubject.html('<span>' + currSubject + '</span>' + subjectDefaultTemplate);
			if(thisSubject.hasClass('d-flex')) {
				thisSubject.removeClass('d-flex');
			}
		});

	}

	function updateStudent(selector) {

		function getStudentRowTemplate(id,studentName,parent) {
			var studentRowTemplate ='<td>' + id + '</td>'
							   + 	'<td data-fn="' + studentName.firstname + '" data-mi="' + studentName.middlename + '" data-ln="' + studentName.lastname + '" >' + studentName.fullName + '</td>'
							   +	'<td data-id="' + parent.id + '">' + parent.name + '</td>'
							   + 	'<td class="text-center">'
							   + 	'<div class="item-action dropdown">'
							   + 		'<a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fas fa-ellipsis-v"></i>'
							   + 		'</a>'
							   + 	'<div class="dropdown-menu">'
							   +		'<a href="javascript:void(0)" onclick="updateStudent(this)" class="dropdown-item"><i class="dropdown-icon far fa-edit"></i> Update </a>'
							   +		'<a href="javascript:void(0)" onclick="deleteStudent(this)" class="dropdown-item"><i class="dropdown-icon far fa-trash-alt"></i> Delete </a></div></div>'
							   + 	'</td>';
			return studentRowTemplate;
		}

		var student = $(selector).parent().parent().parent().parent();
		var currStudent = {
			id: student.children().eq(0).html(),
			name: {
				firstname: student.children().eq(1).data('fn'),
				middlename: student.children().eq(1).data('mi'),
				lastname: student.children().eq(1).data('ln'),
				fullName: student.children().eq(1).html(),
			},
			parent: {
				id: student.children().eq(2).data('id'),
				name: student.children().eq(2).html()
			}
		};
		var editStudentTemplate =  	'<td><input value="' + currStudent.id + '" class="form-control" placeholder="ID No."/></td>'
							    + 	'<td>'
								+		'<div class="d-flex">'
								+ 			'<input value="' + currStudent.name.firstname + '" class="form-control" placeholder="First Name"/>'
								+ 			'<input value="' + currStudent.name.middlename + '" class="form-control ml-1" placeholder="MI" style="width: 3em"/>'
								+ 			'<input value="' + currStudent.name.lastname + '" class="form-control ml-1" placeholder="Last Name"/>'
								+		'</div>'
								+ 	'</td>'
							    +	'<td>'
								+ 		'<select class="form-control select2 selectParent" name="selectParent">'
								+			'<option value="' + currStudent.parent.id + '" selected="selected">' + currStudent.parent.name + '</option>'
								+		'</select>'
								+	'</td>'
							    + 	'<td class="text-center align-middle">'
								+		'<div class="d-flex">'
							    + 			'<button class="btn btn-sm btn-outline-success form-control ml-1 edit-save"><i class="fas fa-check"></i></button>'
							    +			'<button class="btn btn-sm btn-outline-warning form-control ml-1 edit-cancel"><i class="fas fa-times"></i></button>'
							    +		'</div>'
								+ 	'</td>';
		student.html(editStudentTemplate);
		initializeSelect2();

		$('.edit-save').on('click', function(e) {
			e.preventDefault();
			var thisStudentRow = $(this).parent().parent().parent();
			var newStudentId = thisStudentRow.find('input').eq(0).val();
			var newStudentName =  {
				firstname: thisStudentRow.find('input').eq(1).val(),
				middlename: thisStudentRow.find('input').eq(2).val(),
				lastname: thisStudentRow.find('input').eq(3).val(),
				get fullName() {
					return this.firstname + " " + this.lastname;
				}
			};
			var newParent = {
				id: thisStudentRow.find('select').val(),
				name: thisStudentRow.find('select').text()
			};
			
			$.ajax({
				url: 'students/update/' + thisStudentRow.data('id'),
				type: 'POST',
				dataType: 'json',
				dataSrc: '',
				data: { 
					'id': thisStudentRow.find('input').eq(0).val(),
					'firstName': thisStudentRow.find('input').eq(1).val(),
					'middleName': thisStudentRow.find('input').eq(2).val(),
					'lastName': thisStudentRow.find('input').eq(3).val(),
					'parentId': thisStudentRow.find('select').val()
				}, 
				success: function(data) {
					swal("Success!", data, "success");
					thisStudentRow.html(getStudentRowTemplate(newStudentId, newStudentName, newParent));
				},
				error: function(status) {
					swal("Error!", "Something's wrong!", "error");
				}
			});     
		});

		$('.edit-cancel').on('click', function(e) {
			e.preventDefault();
			var thisStudentRow = $(this).parent().parent().parent();
			thisStudentRow.html(getStudentRowTemplate(currStudent.id,currStudent.name,currStudent.parent));
		});
	}

	function deleteSubject(selector) {
		var subject = $(selector).parent().parent().parent();
		var subjectId = subject.data('value');
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
					url: 'subjects/delete/' + subjectId,
					dataType: 'json',
					success: function(status) {
						swal("Success!", "Subject Deleted!", "success");
						subject.remove();
					},
					error: function(status) {
						swal("Error!", "Something's wrong!", "error");
					}
				});
			}
		});
	}

	function deleteStudent(selector) {
		var student = $(selector).parent().parent().parent().parent();
		var studentId = student.data('id');

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
					url: 'students/delete/' + studentId ,
					dataType: 'json',
					success: function(data) {
						swal("Success!", data, "success");
						student.remove();
					},
					error: function(status) {
						swal("Error!", "Something's wrong!", "error");
					}
				});
			}
		});
		
	}

	$(document).ready(function () {
		getStudents();
		getSubjects();
				
		$('.error').hide();
		$('#addSubjectModal').on('shown.bs.modal', function () {
			$('#subjectname').trigger('focus');
		});

		$('.dropdown-menu a').click(function(){

			// Empyy Subject List
			$('#subjectList').html("");

			// Empty Student Table
			$('#studentTable').find('tbody').html("");
			
			// Get Subjects by Level
			getSubjects($(this).data('value'));    
			
			// Get Students by Level
			getStudents($(this).data('value'));

			$('button#sectionDropdownBtn').text($(this).text());
			$('button#sectionDropdownBtn').val($(this).text());
			$('button#sectionDropdownBtn').attr('data-value',$(this).data('value'));
		});

		// Add Subject
		$('#addsubject').click(function(event) {
			event.preventDefault();
			addSubject();
		});

		// Add Student
		$('#addstudent').click(function(event) {
			event.preventDefault();
			addStudent();
		});

		$('.list-group li').click(function(e) {
			e.preventDefault()
			if($(".btn:first-child").val() != "All Levels") {
				$(this).parent().find('li').removeClass('active');
				$(this).addClass('active');
			}
		});

		initializeSelect2();
	});
	</script>