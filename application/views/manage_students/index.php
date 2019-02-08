<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <h2>Manage Students</h2>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="sectionDropdownBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="All Levels">
                        All Levels
                    </button>
                    <div class="dropdown-menu" aria-labelledby="sectionDropdownBtn">
                        <a class="dropdown-item" href="#" data-value="0">All Levels</a>
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
                <button class="btn btn-outline-success btn-sm" disabled type="button" id="addSubjectBtn">Add Subject</button>    
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        Filipino
                        <button type="button" class="close custom-close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </li>
                    <li class="list-group-item">
                        English
                        <button type="button" class="close custom-close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </li>
                    <li class="list-group-item">
                        Mathematics
                        <button type="button" class="close custom-close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card" id="studentCard">
            <div class="card-header d-flex justify-content-between">
                <span>Students</span>
                <button class="btn btn-outline-success btn-sm" type="button" id="addStudentBtn">Add Student</button>    
            </div>
            
            <div class="card-body">
                <table cellpadding="0" cellspacing="0" id="userTable">
                    <thead class="customTh">
                        <tr>
                            <th style="width: 20%">ID No.</th>
                            <th style="width: 80%">Full Name</th>
                        </tr>
                    </thead>
                    <tbody class="customTd">
                        <tr>
                            <td>12345</td>
                            <td>Jose Protacio Mercado Y Alonso Rizal</td> 
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $('.dropdown-menu a').click(function(){
        if($(this).text() == "All Levels") {
            $('#addSubjectBtn').attr('disabled',true);
            $('.active').removeClass('active');
        } else {
            $('#addSubjectBtn').attr('disabled',false);
            $('#addSubjectBtn').show();
        }

        $('.btn:first-child').text($(this).text());
        $('.btn:first-child').val($(this).text());
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
</script>