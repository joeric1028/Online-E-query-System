<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

	<div class="container-fluid">
		<div class="row justify-content-md-center mt-5">
			<h1>Online E-Query System</h1>	
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-4 col-md-offset-5">
				<div class="container login-container">
					<div class="card">
						<div class="card-body">
						<?php echo form_open('login'); ?>
							<div class="form-group">
								<label for="idnumber">ID Number</label>
								<input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="ID Number" value="<?php echo set_value('idnumber'); ?>" size="25"/>
								<div class="form-group text-danger"><?php echo form_error('idnumber'); ?></div>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" size="25"/>
								<div class="form-group text-danger"><?php echo form_error('password');?></div>
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
							<div class="form-group text-success"><?php echo $status;?></div>
							<div class="form-group text-danger"><?php echo $errorstatus;?></div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>