            </div>

        </div>
        <!-- /#page-content-wrapper -->
      </div>
      <footer class="footer mt-auto fixed-bottom">
            <div class="container d-flex justify-content-between">
                <span>Page rendered in <strong>{elapsed_time}</strong> seconds.</span>
                <span><code>support@jvty13.heliohost.com</code><em> &copy; 2019</em><span>
            </div>
        </footer>
        <script>
        $(document).ready(function () {
            var USER_TYPE = "<?php echo $type?>";

            $("#menu-toggle").click(function(e) {
              e.preventDefault();
              $("#wrapper").toggleClass("toggled");
            });

            $.ajax({
                type: "GET",
                    url: "<?php echo site_url('api/get_pic');?>",
                    beforeSend: function() {
                        $('#profile').show();
                        $('div#loaderprof').show();
                        $('img#pic').attr('style', 'opacity:0.2;');
                    },
                    error: function() {
                        $('#profile').hide();
                        $('div#loaderprof').hide();
                        //alert('error occured');
                    },
                    success: function(data) {
                        $('#profile').show();
                        $('div#loaderprof').hide();
                        $('img#pic').attr('src', data.data.pic);
                        $('img#pic').attr('style', 'opacity:1;');
                    }
                });
            });

            //Change password
            $('button#submitpassword').click(function (event) {
                event.preventDefault();
                
                $('.error').hide();

                var retypePassword = $("input#retypePassword").val();
                if (retypePassword == "") {
                    $("label#retypepassword_error").show();
                    $("input#retypePassword").focus();
                }

                var newPassword = $("input#newPassword").val();
                
                if (newPassword == "") {
                    $("label#newpassword_error").show();
                    $("input#newPassword").focus();
                }

                var currentPassword = $("input#currentPassword").val();

                if (currentPassword == "") {
                    $("label#currentpassword_error").show();
                    $("input#currentPassword").focus();
                }

                if (currentPassword == "" || newPassword == "" || retypePassword == "") {
                    return;
                }
                
                var formData = {
                    'currentpassword'       : currentPassword,
                    'newpassword'            : newPassword,
                    'confirmnewpassword'    : retypePassword
                };

                $.ajax({
				type: "POST",
				url: "<?php echo base_url('api/changepassword');?>",
				data: formData,
				error: function() {
					$("label#changepasswordstatuserror").show();
				},
				success: function(data) {
					$("label#changepasswordstatussuccess").show();

					if (data.success != undefined)
					{
						$("label#changepasswordstatussuccess").show();
						$("label#changepasswordstatussuccess").text(data.success);
					}
					else
					{
						$("label#changepasswordstatuserror").show();
                        if (data.warning != undefined)
                        {
                            $("label#changepasswordstatuserror").text(data.warning);
                        }
                        else
                        {
						    $("label#changepasswordstatuserror").text(data.error);
                        }
					}
				}
			});

            $('a#changepasswordbtn').click(function(){
                $('.error').hide();
                
                $('input#currentPassword').val('');
                $('input#newPassword').val('');
                $('input#retypePassword').val('');
            });
        });    
        </script>
    </body>
</html>