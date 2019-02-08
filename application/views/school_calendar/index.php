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
                    <div class="container" id="upcomingEvent">
                    <!-- <div class="col-4">
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
                </div> -->
                    </div>
                    <div id="loaderevent">
                        <div class="loader disable-selection" id="loader-4">
                            <span></span>
                            <span></span>
                            <span></span>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="addeventclosex">
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
      <button type="submit" class="btn btn-primary" id="addevent">Add</button>
      <button type="button" class="error btn btn-primary" id="addanothereventadd">Add Another Event?</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal" id="addeventclose">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
    $(document).ready(function () {
        $('#addEventModal').on('shown.bs.modal', function () {
            $("input#eventname").focus();
            $("input#eventname").val('');
            $('.error').hide();
            $('#addeventclose').text('Cancel');
            $("button#addevent").show();
        });

        $("input#eventname").val('');
        $('.error').hide();
        $('#upcomingEvent').hide();
        
        $('#addeventclose').text('Cancel');
        $("button#addevent").show();

        //Upcoming Event
        $('input[name="eventdate"]').daterangepicker({
            opens: 'right',
            drops: 'down'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });

        var date = new Date();
        var formData = {
        	    'year'      : date.getFullYear(),
        	    'month'     : (date.getMonth()+1),
                'day'       : date.getDate(),
        	};
            
        $.ajax({
				type: "POST",
				url: "<?php echo site_url('calendar/upcoming');?>",
                data: formData,
                beforeSend: function() {
                    $('#upcomingEvent').hide();
                    $('#loaderevent').show();
                    $('#upcomingEvent').html('');
                },
				error: function(xhr, status, error) {
                    $('#upcomingEvent').show();
                    $('#loaderevent').hide();
                    alert( "error occured!\n"+error );
				},
				success: function(data) {
                    $('#upcomingEvent').show();
                    $('#loaderevent').hide();
					if (data.error != undefined)
					{
                        var error = $('<div class="container"></div>').text(data.error);
                        $("div#upcomingEvent").append(error);
					} 
                    else
					{
                        if(data.warning != undefined)
                        {
                            alert('test warning');
                            var error = $('<div class="container"></div>').text(data.warning);
                            $("div#upcomingEvent").append(error);
                        }
                        else
                        {
                            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];

                            for (var i = 0; i < data.data.length; i++) {
                                var getmonthday = new Date(data.data[i].startdate);
                                var row = $('<div class="row"></div>');
                                var date = $('<div class="col-4"></div>').text(months[getmonthday.getMonth()] + ' ' + getmonthday.getDate());
                                var name = $('<div class="col-8"></div>').text(data.data[i].name);
                                row.append(date, name);
                                $("div#upcomingEvent").append(row);
                            }
                        }
					}
				}
			});

        // Add Event Button
		$('#addevent').click(function(event) {
      		// validate and process form here

			event.preventDefault();
      
			$('.error').hide();

			var name = $("input#eventname").val();

			if (name == "") {
				$("label#eventname_error").show();
				$("input#eventname").focus();
			}
		
            var splitdate = $("input#eventdate").val().split('-');
            var start = splitdate[0];
            var end = splitdate[1];
            
            if (start == "") {
				$("label#eventdate_error").show();
				$("input#eventdate").focus();
            }
            
            if (end == "") {
				$("label#eventdate_error").show();
				$("input#eventdate").focus();
			}

			if (name == "" || start == "" || end == "") {
				return;
            }
            
            var splitstart = new Date(start);
            var splitend = new Date(end); 
            var start = splitstart.getFullYear() + '-' + (splitstart.getMonth()+1) + '-' + splitstart.getDate();
            var end = splitend.getFullYear() + '-' + (splitend.getMonth()+1) + '-' + splitend.getDate();

			var formData = {
        	    'name'          : name,
        	    'startdate'     : start,
                'enddate'       : end,
                'start'         : splitstart.getFullYear(),
        	};
            
            $("button#addeventclose").text('Cancel');

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('calendar/create');?>",
				data: formData,
				error: function() {
					$("label#statuserror").show();
					$("button#addanothereventadd").hide();
					$("button#addevent").show();
				},
				success: function(data) {
                    $("label#statussuccess").show();
                    $("label#statuserror").hide();

					if (data['success'] == 'Creating event has been successful.')
					{
						$("label#statussuccess").show();
                        $("label#statussuccess").text(data['success']);
                        $("button#addanothereventadd").show();
                        $("button#addevent").hide();
                        $("button#addeventclose").text('Close');
					}
					else
					{
						$("label#statuserror").show();
                        $("label#statuserror").text(data['error']);
                        $("button#addanothereventadd").hide();
                        $("button#addevent").show();
					}
				}
			});
        });
        
        // Add Another Event Button
		$('#addanothereventadd').click(function(event) {
            // validate and process form here

            $("input#eventname").val('');
            $("label#statuserror").hide();
            $("label#statussuccess").hide();
			$("button#addanothereventadd").hide();
            $("button#addevent").show();
            $('#addeventclose').text('Cancel');
        });

        $('#addeventclose').click(function(event) {
            // validate and process form here
            $('#addeventclose').text('Cancel');
            $("input#eventname").val('');
            $('.error').hide();
            $("button#addevent").show();
            $('.error').hide();
        });

        $('#addeventclosex').click(function(event) {
            // validate and process form here
            $('#addeventclose').text('Cancel');
            $("input#eventname").val('');
            $('.error').hide();
            $("button#addevent").show();
            $('.error').hide();
        });
    });
</script>