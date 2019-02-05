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
                <div class="h2 m-0"> 94.56 </div>
            </div> 
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-status bg-green"></div>
            <div class="card-header"> 2nd Grading </div>
            <div class="card-body p3 text-center align-middle mb-2">
                <div class="h2 m-0"> 92.6 </div>
            </div> 
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-status bg-red"></div>
            <div class="card-header"> 3rd Grading </div>
            <div class="card-body p3 text-center align-middle mb-2">
                <div class="h2 m-0"> 93.1 </div>
            </div> 
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-status bg-yellow"></div>
            <div class="card-header"> 4th Grading </div>
            <div class="card-body p3 text-center align-middle mb-2">
                <div class="h2 m-0"> 94 </div>
            </div> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Overall Grades 
            </div>
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
</div>


<script>
    
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
</script>