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
            var USER_TYPE = "<?php if ($this->session->has_userdata('logged_in'))echo $type?>";

            $("a#menu-toggle").click(function() {
              $("div#wrapper").toggleClass("toggled");
            });

            //Side bar change password button
            $('a#changepasswordbtn').click(function(){
                $('.error').hide();
                
                $('input#currentPassword').val('');
                $('input#newPassword').val('');
                $('input#retypePassword').val('');
            });

            //Update Photo button
            $('button#profile').click(function () {
                $('.error').hide();

                $('input#uploadPic').val('');
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
                            $
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
            });

            //Change Profile Picture
            $('#profilesubmit').submit(function (event) {
                event.preventDefault();
                
                $('.error').hide();

                var uploadPic = $("input#image_file").val();
                if (uploadPic == "") {
                    $("label#profilestatuserror").show();
                    $("label#profilestatuserror").text('Unable to continue. No file chosen yet.');
                    $("input#image_file").focus();
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('api/changepic');?>",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('input#submitprofile').attr("disabled", "disabled");
                        $('button#closeprofile').attr("disabled", "disabled");
                    },
                    error: function() {
                        $("label#profilestatuserror").show();
                        $('input#submitprofile').removeAttr("disabled");
                        $('button#closeprofile').removeAttr("disabled");
                    },
                    success: function(data) {
                        $("label#profilestatussuccess").show();
                        $('input#submitprofile').removeAttr("disabled");
                        $('button#closeprofile').removeAttr("disabled");

                        if (data.success != undefined)
                        {
                            $("label#profilestatussuccess").show();
                            $("label#profilestatussuccess").html(data.success);
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
                        }
                        else
                        {
                            $("label#profilestatuserror").show();
                            if (data.warning != undefined)
                            {
                                $("label#profilestatuserror").html(data.warning);
                            }
                            else
                            {
                                $("label#profilestatuserror").html(data.error);
                            }
                        }
                    }
			    });
            });

            //file type validation
            $("#userfile").change(function() {
                var file = this.files[0];
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg","image/gif"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3]))){
                    alert('Please select a valid image file (JPEG/JPG/PNG).');
                    $("#file").val('');
                    return false;
                }
            });

            
        });
        </script>
    </body>
</html>