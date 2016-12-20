<?php $this->load->view('header.php'); ?>

	<div class="row">
		<div class="col-sm-8 col-xs-12 col-sm-offset-2">
			<h2>Installation Step 2/3</h2>
		</div>
	</div>

	<div class="row">
		<?= validation_errors() ?>
	</div>

	<?php if (isset($message)): ?>
	<div class="row">
		<div class="alert alert-danger">
			<p><?= $message ?></p>
		</div>
	</div>
	<?php endif ?>

	<form action="" class="form" role="form" id="stepTwoForm" method="post" accept-charset="utf-8">
	<div class="row">
		<div class="col-sm-6 container-bg">
			<h4>Administrative User</h4>
			<p class="text-center">
				Enter the information you would like to use to log in to Open Blog. 
			</p>
			<p class="text-justify"><b>Important Note:</b> This user has unrestricted access to the Blog and all settings. Please make sure you keep these 
				credentials in a safe place and do not share them with anyone.
			</p>


		</div>
		<div class="col-sm-6 container-bg">
			<h4>Admin User:</h4>

			<div class="row">
				<div class="form-group text-left">
				    <label for="username" class="control-label col-sm-3">Username</label>
				    <div class="col-sm-9">
				    	<input name="username" type="text" class="form-control" id="username" value="<?= set_value('username') ?>" placeholder="Username">
				    </div>
				 </div>
			</div>

			<div class="row m-t">
				<div class="form-group text-left">
				    <label for="email" class="control-label col-sm-3">Email Address</label>
				    <div class="col-sm-9">
				    	<input name="email" type="text" class="form-control" id="email" value="<?= set_value('email') ?>" placeholder="Email Address">
				    </div>
				 </div>
			</div>

			<div class="row m-t">
				<div class="form-group text-left">
					<label for="firstName" class="control-label col-sm-3">First Name</label>
					<div class="col-sm-9">
						<input name="first_name" type="text" class="form-control" id="firstName" value="<?= set_value('first_name') ?>" placeholder="First Name">
					</div>
				</div>
			</div>

			<div class="row m-t">
				<div class="form-group text-left">
					<label for="lastName" class="control-label col-sm-3">Last Name</label>
					<div class="col-sm-9">
						<input name="last_name" type="text" class="form-control" id="lastName" value="<?= set_value('last_name') ?>" placeholder="Last Name">
					</div>
				</div>
			</div>

			<div class="row m-t">
				<div class="form-group text-left">
					<label for="password" class="control-label col-sm-3">Password</label>
					<div class="col-sm-9">
						<input name="password" type="password" class="form-control" id="password" placeholder="Password">
					</div>
				</div>
			</div>

			<div class="row m-t">
				<div class="form-group text-left">
					<label for="passConf" class="control-label col-sm-3"> Confirm Password</label>
					<div class="col-sm-9">
						<input name="pass_conf" type="password" class="form-control" id="passConf" placeholder="Confirm Password">
					</div>
				</div>
			</div>

			

			<div class="row">
				<div class="text-left" style="padding: 8px;">
					<p><small><em>Note: </em>Please use a strong password or passphrase. Weak passwords with pet names, birthdays, 'l337' and even combinations of those
						can be fairly easily discovered.  Use a combination of upper and lower case characters, numbers, and special characters to help ensure you have a
						very strong password. The minimum limit for your password is 8 characters and maximum is 255 characters.
					</small></p>
				</div>
			</div>
		</div>		
	</div>
		
	<div class="row" style="margin-top: 20px;">
		<div class="col-sm-8 col-xs-12 col-sm-offset-2">
			<p>If at any point you get stuck please ask your web hosting provider or <a href="http://open-blog.org" target="_blank">contact us</a> for support.</p>
			<p>Clicking 'Continue' will begin the installation on your server.</p>

			<p><?= form_submit('submit', 'Continue', 'class="btn btn-default btn-lg"') ?></p>

		</div>
	</div>


	
<?php $this->load->view('footer.php'); ?>