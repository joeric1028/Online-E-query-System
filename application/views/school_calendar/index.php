<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <h2> School Calendar </h2>
                <span class="my-auto"><button class="btn btn-success" data-toggle="modal" data-target="#addEventModal">Add Event</button></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">School Events</div>
            <div class="card-body">
                <table id="calendarTable"> 
                    <thead class="customTh">
                        <tr>
                            <th style="width: 40%">School Year 2017 - 2018</th>
                            <th style="width: 60%"></th>
                        </tr>
                    </thead>
                    <tbody class="customTd">
                        <tr>
                            <td>August 27</td>
                            <td>National Heroes Day</td>
                        </tr>
                        <tr>
                            <td>November 1 - November 2</td>
                            <td>All Saints Day</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>    
    </div> 
    <div class="col-4">
        <div class="card">
            <div class="card-header"> Upcoming Events </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        Feb 2    
                    </div>
                    <div class="col-8">
                        All Bats Day
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Feb 14    
                    </div>
                    <div class="col-8">
                        Valentines Day
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>

<div id="addEventModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form name="adduserform" id="adduserform" action="" method="post">
      <div class="modal-header">
        <h5 class="modal-title">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="eventname" id="eventname">
          <label class="error text-danger" for="eventname" id="eventname_error">This field is required.</label>
        </div>
        <div class="form-group">
          <label class="form-label">Date of Occurance</label>
          <input type="text" class="form-control" name="eventdate" id="eventdate">
          <label class="error text-danger" for="eventdate" id="eventdate_error">This field is required.</label>
        </div>
      </div>
      <div class="modal-footer">
	  <label class="error form-label text-success" id="statussuccess"></label>
	  <label class="error form-label text-danger" id="statuserror"></label>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" id="addUser">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
    

    $('#addEventModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus');
        $("input#firstname").focus();
    });

    $('.error').hide();

    $('input[name="eventdate"]').daterangepicker({
        opens: 'right',
        drops: 'down'
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
</script>