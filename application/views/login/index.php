<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-Query System</title>

	<link href="w3.css" rel="stylesheet" type="text/css">

</head>
<body>
	
	<div class="container-fluid">
		<div class="row justify-content-md-center mt-5">
			<h1>Online E-Query System</h1>	
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-4 col-md-offset-5">
				<div class="container login-container">
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="email" class="form-control" id="username" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>