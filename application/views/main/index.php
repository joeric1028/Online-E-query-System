<div class="card">
    <div class="card-body">
        <h1>Welcome, <?php if ($this->session->has_userdata('logged_in')) {
                      if ($this->session->sex == 'Male') {
                        echo 'Mr. ' . $firstname;
                      } else {
                        echo 'Ms. ' . $firstname;
                      }
                    } else {
                      echo 'Guest';
                    } 
                ?>!</h1>
    </div>
</div>