<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <h2>Grades</h2>
                <span>
                    <?php if($type == "Parent"):?>
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

<!-- Teacher's Row -->
<?php if($type == "Teacher" || $type == "Administrator"): ?>
<div class="row"> 
    <div class="col-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Students</span>
                <div class="dropdown">
                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="sectionDropdownBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="Grade 1" data-value="1">
                        Grade 1
                    </button>
                    <div class="dropdown-menu" aria-labelledby="sectionDropdownBtn">
                        <a class="dropdown-item" href="#" data-value="1">Grade 1</a>
                        <a class="dropdown-item" href="#" data-value="2">Grade 2</a>
                        <a class="dropdown-item" href="#" data-value="3">Grade 3</a>
                        <a class="dropdown-item" href="#" data-value="4">Grade 4</a>
                        <a class="dropdown-item" href="#" data-value="5">Grade 5</a>
                        <a class="dropdown-item" href="#" data-value="6">Grade 6</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul id="studentList" class="list-group custom-list-group"></ul>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Subjects</span>
                <div>
                    <button class="btn btn-primary btn-sm saveBtn" type="button" disabled>
                        Save
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" id="subjectTable" class="w-100 bcma-table">
                        <thead class="customTh">
                            <tr>
                                <th style="width:40%"></th>
                                <th>1st</th>
                                <th>2nd</th>
                                <th>3rd</th>
                                <th>4th</th>
                            </tr>
                        </thead>
                        <tbody class="customTd"></tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <span></span>
                <div>
                    <button class="btn btn-primary btn-sm saveBtn" type="button" disabled>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>

<!-- Parent's Row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">Overall Grades</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" id="gradesTable" class="w-100 bcma-table">
                        <thead class="customTh">
                            <tr>
                                <th style="width: 30%"> Subject Name </th>
                                <th style="width: 10%">Grade Level</th>
                                <!-- <th style="width: 15%">Section</th> -->
                                <!-- <th style="width: 15%">Teacher</th> -->
                                <th style="width: 8%">1st</th>
                                <th style="width: 8%">2nd</th>
                                <th style="width: 8%">3rd</th>
                                <th style="width: 8%">4th</th>
                                <th style="width: 15%">Final Grade</th>
                            </tr>
                        </thead>
                        <tbody class="customTd">
                            <tr><th class="text-center text-muted" colspan="7"><i>No Student Selected</i></th></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function enableSaveBtnOnChange() {
        $('.saveBtn').attr('disabled',false);
    }

    // Retrieve Students By Level
    function getStudentsByLevel(level) {
        $.ajax({
            url: 'students/view/' + level,
            dataType: 'json',
            success: function(data) {
                $('#studentList').html('');
                if(data.length > 0 ) {
                    for(var c=0; c < data.length; c++) {
                        var studentListItemTemplate = '<li class="list-group-item" data-value="' + data[c].id + '">'
                                                    + data[c].firstname + ' ' + data[c].lastname + '</li>';
                        $('#studentList').append(studentListItemTemplate);
     
                        // Allows selection of student
                        $('#studentList > li').click(function(e) {
                            e.preventDefault()
                            $(this).parent().find('li').removeClass('active');
                            $(this).addClass('active');
                        });
                    }
                } else {
                    var studentListItemTemplate = '<li class="list-group-item"><i class="text-muted">No Students Assigned</i></li>';
                        $('#studentList').append(studentListItemTemplate);
                }
            }
        });   
    }
    
    // Retrieve Subjects By Level
    function getSubjectsByLevel(level) {
        $.ajax({
            url: 'subjects/view/' + level,
            dataType: 'json',
            success: function(data) {
                $('#subjectTable').find('tbody').html('');
                if(data.length > 0) {
                    for(var c=0; c < data.length; c++) {
                        var subjectRowTemplate =    '<tr data-value=' + data[c].id + '>'
                                                +       '<td>' + data[c].subject + '</td>'
                                                +       '<td>'
                                                +           '<input maxlength="3" onkeypress="enableSaveBtnOnChange()" type="text" class="form-control" name="1st">'
                                                +       '</td>'
                                                +       '<td>'
                                                +           '<input maxlength="3" onkeypress="enableSaveBtnOnChange()" type="text" class="form-control" name="2nd">'
                                                +       '</td>'
                                                +       '<td>'
                                                +           '<input maxlength="3" onkeypress="enableSaveBtnOnChange()" type="text" class="form-control" name="3rd">'
                                                +       '</td>'
                                                +       '<td>'
                                                +           '<input maxlength="3" onkeypress="enableSaveBtnOnChange()" type="text" class="form-control" name="4th">'
                                                +       '</td>'
                                                +   '</tr>';
                        $('#subjectTable').append(subjectRowTemplate);
                    }
                } else {
                    var subjectRowTemplate =    '<tr><td class="text-center text-muted" colspan="5"><i>No Subjects Assigned</i></td></tr>';
                    $('#subjectTable').append(subjectRowTemplate);
                }
            }
        });   
    }

    // Retrieves Grades By Student
    function getGradesByStudent(studentId) {
        var avgGrades = [0,0,0,0];
        $('input').val("");
        $.ajax({
            url: 'grades/view/' + studentId ,
            dataType: 'json',
            success: function(data) {
                for(var c=0; c < data.length; c++) {
                    if($('#subjectTable').length) {
                        $('#subjectTable').find('tr[data-value='+ data[c].subjects_id +']').find('input')[0].value = data[c].firstgrading;
                        $('#subjectTable').find('tr[data-value='+ data[c].subjects_id +']').find('input')[1].value = data[c].secondgrading;
                        $('#subjectTable').find('tr[data-value='+ data[c].subjects_id +']').find('input')[2].value = data[c].thirdgrading;
                        $('#subjectTable').find('tr[data-value='+ data[c].subjects_id +']').find('input')[3].value = data[c].fourthgrading;
                    }

                    avgGrades[0] += parseInt(data[c].firstgrading);
                    avgGrades[1] += parseInt(data[c].secondgrading);
                    avgGrades[2] += parseInt(data[c].thirdgrading);
                    avgGrades[3] += parseInt(data[c].fourthgrading);
                }
                var avg1 = avgGrades[0]/data.length;
                var avg2 = avgGrades[1]/data.length;
                var avg3 = avgGrades[2]/data.length;
                var avg4 = avgGrades[3]/data.length;

                if(isNaN(avg1) || avg1 < 1) {
                    $('#1stgrading').text("NG");
                } else {
                    $('#1stgrading').text(avg1.toFixed(2));
                }
                
                if(isNaN(avg2) || avg2 < 1) {
                    $('#2ndgrading').text("NG");
                } else {
                    $('#2ndgrading').text(avg2.toFixed(2));
                }

                if(isNaN(avg3) || avg3 < 1 ) {
                    $('#3rdgrading').text("NG");
                } else {
                    $('#3rdgrading').text(avg3.toFixed(2));
                }

                if(isNaN(avg4) || avg4 < 1) {
                    $('#4thgrading').text("NG");
                } else {
                    $('#4thgrading').text(avg4.toFixed(2));
                }

            }
        });

        $("#gradesTable").dataTable().fnDestroy();
        var table = $('#gradesTable').DataTable({
            'select': true,
            'ajax': {
                url: 'grades/view/' + studentId,
                dataSrc: ''
            },
            'columns': [
                { data: 'subject' },
                { data: 'gradelevel'},
                { 
                    data: 'firstgrading',
                    render: function(data) {
                        if(data == null || data < 1 || isNaN(data)) {
                            return "NG";
                        } else {
                            return data;
                        }
                    } 
                },
                { 
                    data: 'secondgrading',
                    render: function(data) {
                        if(data == null || data < 1 || isNaN(data)) {
                            return "NG";
                        } else {
                            return data;
                        }
                    } 
                },
                { 
                    data: 'thirdgrading',
                    render: function(data) {
                        if(data == null || data < 1 || isNaN(data)) {
                            return "NG";
                        } else {
                            return data;
                        }
                    } 
                },
                { 
                    data: 'fourthgrading',
                    render: function(data) {
                        if(data == null || data < 1 || isNaN(data)) {
                            return "NG";
                        } else {
                            return data;
                        }
                    } 
                },
                {
                    render: function(data,type,full) {
                        console.log(full);
                        var avg = parseInt(full.firstgrading) + parseInt(full.secondgrading) + parseInt(full.thirdgrading) + parseInt(full.fourthgrading) 
                        if(avg == null || avg < 1 || isNaN(avg)) {
                            return "NG";
                        } else {
                            return avg/4;;
                        }
                    }
                }
            ],
            "rowid": "id"
        });
    }
 
    $(document).ready(function () {
        var date = new Date();
        var formData = {
            'year'              : date.getFullYear(),
            'month'             : (date.getMonth()+1),
            'day'               : date.getDate(),
            'student_id'        : 1,
            'schoolyear_id'     : 3
        };

        <?php if($type == "Parent"): ?>
        // Student Dropdown
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

                getGradesByStudent(data[0].id);

                $('.dropdown-menu a').click(function(){
                    $('#studentDropdownBtn').text($(this).text());
                    $('#studentDropdownBtn').val($(this).text());
                    $('#studentDropdownBtn').attr('data-value',$(this).data('value'));

                    getGradesByStudent($(this).data('value'));
                });
            }
        });
        <?php endif; ?>

        getStudentsByLevel($('#sectionDropdownBtn').data('value'));
        getSubjectsByLevel($('#sectionDropdownBtn').data('value'));

        $('.loader').hide();
    });

    $('.saveBtn').click(function(){
        var grades = [];
        if($('li.active').length > 0) {
            // Pushes input in each row to an array
            for(var c=1; c < $('#subjectTable').find('tr').length; c++) {
                var subjectsId = $('#subjectTable').find('tr').eq(c).data('value');
                grades.push({
                    'subjects_id': subjectsId,
                    'firstgrading': $('#subjectTable').find('tr').eq(c).find('input').eq(0).val(),
                    'secondgrading': $('#subjectTable').find('tr').eq(c).find('input').eq(1).val(),
                    'thirdgrading': $('#subjectTable').find('tr').eq(c).find('input').eq(2).val(),
                    'fourthgrading': $('#subjectTable').find('tr').eq(c).find('input').eq(3).val()
                });
            }

            // Data to be updated
            var updateData = {
                'studentId': $('li.active').attr('data-value'),
                'gradeLevel': $('#sectionDropdownBtn').data('value'),
                'grades': grades
            }

            // Update Grades AJAX
            $.ajax({
                type: 'POST',
                url: 'grades/update',
                dataType: 'json',
                data: updateData,
                beforeSend: function() {
                    $('.grading').text("");
                    $('.loader').show();
                },
                success: function(data) {
                    swal("Success!", "Grades updated!", "success");
                    $('.loader').hide();
                    getGradesByStudent($('li.active').data('value'));
                },
                error: function() {
                    swal("Error!", "Something's wrong!", "error");
                    $('.loader').hide();
                    getGradesByStudent($('li.active').data('value'));
                }
            });

            // Disable save button when ajax sucess
            $('.saveBtn').attr('disabled',true);
        } else {
            swal("Hold on!", "Please select a Student.","info");
        }

        
    });

    $('.dropdown-menu a').click(function(){
        $('#sectionDropdownBtn.btn:first-child').text($(this).text());
        $('#sectionDropdownBtn.btn:first-child').val($(this).text());
        getStudentsByLevel($(this).data('value'));
        getSubjectsByLevel($(this).data('value'));
    });

    // Retrieves grades of selected student
    $('#studentList').click(function(e) {
        if($('li.active').length > 0) {
            $('#gradesTable > tbody').html('');
            getGradesByStudent($('li.active').attr('data-value'));
        }
    });
</script>