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
        <?php
            if ($this->session->has_userdata('logged_in')) {
                echo "$('#wrapper').addClass('toggled');";
                echo "$('#menu-toggle').show();";
            } else {
                echo "$('#wrapper').removeClass('toggled');";
                echo "$('#menu-toggle').hide();";
            }
        ?>
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
        </script>
    </body>
</html>