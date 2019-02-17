<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" id="bootstrap-css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/custompdf.css');?>" />
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    </head>
    <body>
        <div class="container">
            <h2>Northemtern Mindanao Mission EDUCATION DEPARTMENT Km.3 Ba-an, Butuan City</h2>
        </div>
    </body>


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
        $('table#calendarTable').hide();
        
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
                    $('#loaderupcomingevent').show();
                    $('#upcomingEvent').html('');
                },
				error: function(xhr, status, error) {
                    $('#upcomingEvent').show();
                    $('#loaderupcomingevent').hide();
                    alert( "error occured!\n"+error );
				},
				success: function(data) {
                    $('#upcomingEvent').show();
                    $('#loaderupcomingevent').hide();
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
                            var fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                            for (var i = 0; i < data.data.length; i++) {
                                var getmonthday = new Date(data.data[i].startdate);
                                var row = $('<div class="row"></div>');
                                var date = $('<div class="col-4"></div>').text(months[getmonthday.getMonth()] + ' ' + getmonthday.getDate());
                                var name = $('<div class="col-8"></div>').text(data.data[i].name);
                                row.append(date, name);
                                $("div#upcomingEvent").append(row);
                            }

                            $("div#monthevent").text("Upcoming Events - " + fullMonths[getmonthday.getMonth()]);
                        }
					}
				}
			});

            // For School Events
            $.ajax({
				type: "POST",
				url: "<?php echo site_url('calendar/school');?>",
                data: formData,
                beforeSend: function() {
                    $('table#calendarTable').hide();
                    $('#loaderschoolevent').show();
                    $('table#calendarTable').html('');
                },
				error: function(xhr, status, error) {
                    $('table#calendarTable').show();
                    $('#loaderschoolevent').hide();
                    alert( "error occured!\n"+error );
				},
				success: function(data) {
                    $('table#calendarTable').show();
                    $('#loaderschoolevent').hide();
					if (data.error != undefined)
					{
                        var error = $('<div class="container"></div>').text(data.error);
                        $("table#calendarTable").append(error);
					} 
                    else
					{
                        if(data.warning != undefined)
                        {
                            alert('test warning');
                            var error = $('<div class="container"></div>').text(data.warning);
                            $("table#calendarTable").append(error);
                        }
                        else
                        {
                            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                            var table = $("table#calendarTable");

                            var thead = $('<thead class="customTh"></thead>');
                            
                            var th1 = $('<th style="width: 40%"></th>').text('School Year '+ data.data.schoolyear[0].start +' - '+ data.data.schoolyear[0].end);
                            var th2 = $('<th style="width: 60%"></th>');
                            var tbody = $('<tbody class="customTd"></tbody>');
                            
                            thead.append(th1,th2);
                            table.append(thead);
                            
                            for (var i = 0; i < data.data.schoolactivities.length; i++)
                            {
                                var getstartmonthday = new Date(data.data.schoolactivities[i].startdate);
                                var getendmonthday = new Date(data.data.schoolactivities[i].enddate);

                                var tr = $('<tr id="'+ i +'"></tr>');

                                var td1 = $('<td></td>').text(months[getstartmonthday.getMonth()] + ' ' + getstartmonthday.getDate() + ' - ' + months[getendmonthday.getMonth()] + ' ' + getendmonthday.getDate());
                                var td2 = $('<td></td>').text(data.data.schoolactivities[i].name);
                                tr.append(td1, td2);
                                tbody.append(tr);
                            }

                            table.append(tbody);
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

</html>