<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <h2>Grades</h2>
                <span class="my-auto"><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Manage Grades</button></span>
            </div>
            <div class="card-footer">
                <span> Grade 6 - Bougainvillea </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-status bg-blue"></div>
            <div class="card-header"> 1st Grading </div>
            <div class="card-body p3 text-center align-middle mb-2">
                <div class="h2 m-0" id="1stgrading"></div>
                    <div id="loader1stgrading">
                        <div class="loader disable-selection" id="loader-4">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div> 
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-status bg-green"></div>
            <div class="card-header"> 2nd Grading </div>
            <div class="card-body p3 text-center align-middle mb-2">
                <div class="h2 m-0" id="2ndgrading"></div>
                <div id="loader2ndgrading">
                    <div class="loader disable-selection" id="loader-4">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-status bg-red"></div>
            <div class="card-header"> 3rd Grading </div>
            <div class="card-body p3 text-center align-middle mb-2">
                <div class="h2 m-0" id="3rdgrading"></div>
                <div id="loader3rdgrading">
                    <div class="loader disable-selection" id="loader-4">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-status bg-yellow"></div>
            <div class="card-header"> 4th Grading </div>
                <div class="card-body p3 text-center align-middle mb-2">
                    <div class="h2 m-0" id="4thgrading"></div>
                    <div id="loader4thgrading">
                        <div class="loader disable-selection" id="loader-4">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">Overall Grades</div>
            <div class="card-body">
                <table cellpadding="0" cellspacing="0" id="userTable">
                    <thead class="customTh">
                        <tr>
                            <th style="width: 10%">S.Y.</th>
                            <th style="width: 10%">Grade Level</th>
                            <th style="width: 15%">Section</th>
                            <th style="width: 15%">Teacher</th>
                            <th style="width: 8%">1st</th>
                            <th style="width: 8%">2nd</th>
                            <th style="width: 8%">3rd</th>
                            <th style="width: 8%">4th</th>
                            <th style="width: 12%">Final Grade</th>
                        </tr>
                    </thead>
                    <tbody class="customTd">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function () {
        var table = $('#userTable').DataTable({
            'select': true,
            'ajax': {
                url: "<?php echo base_url('api/user_list')?>",
                dataSrc: ''
            },
            'columns': [
                { "data": null },
                { "data": null },
                { "data": null },
                { "data": null },
                { "data": null },
                { "data": null },
                { "data": null },
                { "data": null },
                { "data": null,
                    "render": function() {
                        return "hello"; 
                    }
                }
            ],
            "rowid": "id"
        });

        var date = new Date();
        var formData = {
            'year'              : date.getFullYear(),
            'month'             : (date.getMonth()+1),
            'day'               : date.getDate(),
            'student_id'        : 1,
            'schoolyear_id'     : 3
        };

        
        
        // For Grades
        $.ajax({
				type: "POST",
				url: "<?php echo site_url('grades/view');?>",
                data: formData,
                beforeSend: function() {
                    $('div#loader1stgrading').show();
                    $('div#loader2ndgrading').show();
                    $('div#loader3rdgrading').show();
                    $('div#loader4thgrading').show();
                    $('div#1stgrading').hide();
                    $('div#2ndgrading').hide();
                    $('div#3rdgrading').hide();
                    $('div#4thgrading').hide();
                },
				error: function(xhr, status, error) {
                    $('div#loader1stgrading').hide();
                    $('div#loader2ndgrading').hide();
                    $('div#loader3rdgrading').hide();
                    $('div#loader4thgrading').hide();

                    $('div#1stgrading').show();
                    $('div#2ndgrading').show();
                    $('div#3rdgrading').show();
                    $('div#4thgrading').show();

                    alert( "error occured!\n"+error );
				},
				success: function(data) {
                    $('div#loader1stgrading').hide();
                    $('div#loader2ndgrading').hide();
                    $('div#loader3rdgrading').hide();
                    $('div#loader4thgrading').hide();

                    $('div#1stgrading').show();
                    $('div#2ndgrading').show();
                    $('div#3rdgrading').show();
                    $('div#4thgrading').show();
                    
					if (data.error != undefined)
					{
                        $('div#1stgrading').text(data.error);
                        $('div#2ndgrading').text(data.error);
                        $('div#3rdgrading').text(data.error);
                        $('div#4thgrading').text(data.error);
					} 
                    else
					{
                        if(data.warning != undefined)
                        {
                            $('div#1stgrading').text(data.warning);
                            $('div#2ndgrading').text(data.warning);
                            $('div#3rdgrading').text(data.warning);
                            $('div#4thgrading').text(data.warning);
                        }
                        else
                        {
                            if (data.data[0].firstgrading != null)
                            {
                                $('div#1stgrading').text(data.data[0].firstgrading);
                            }
                            else
                            {
                                $('div#1stgrading').text("No Grade yet.");
                            }

                            if (data.data[0].secondgrading != null)
                            {
                                $('div#2ndgrading').text(data.data[0].secondgrading);
                            }
                            else
                            {
                                $('div#2ndgrading').text("No Grade yet.");
                            }

                            if (data.data[0].thirdgrading != null)
                            {
                                $('div#3rdgrading').text(data.data[0].thirdgrading);
                            }
                            else
                            {
                                $('div#3rdgrading').text("No Grade yet.");
                            }

                            if (data.data[0].fourthgrading != null)
                            {
                                $('div#4thgrading').text(data.data[0].fourthgrading);
                            }
                            else
                            {
                                $('div#4thgrading').text("No Grade yet.");
                            }
                        }
					}
				}
			});
    });
</script>