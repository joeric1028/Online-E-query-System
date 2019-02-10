<div class="card">
    <div class="card-body">
        <h1>Welcome, <?php if ($this->session->has_userdata('logged_in'))
                {
                  echo $firstname;
                }
                else
                {
                  echo 'Guest';
                }
                ?>!</h1>
    </div>
</div>