<?php $this->load->view('header.php'); ?>

	<div class="row">
		<div class="col-sm-8 col-xs-12 col-sm-offset-2">
			<h2>Installation Complete!</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6 container-bg" style="height: 150px;">
			<h4>Congratulations!</h4>
			<p class="text-center">
				<b>You have succcessfully completed installation of Open Blog!</b>  
			</p>
			<p class="text-justify">
				<b>Important Note:</b> Make sure to delete the /installer/ directory, it is a security risk to keep it on the server. We'll give you a reminder in the Open Blog Admin panel until it's deleted.
			</p>


		</div>
		<div class="col-sm-6 container-bg" style="height: 150px;">
			<h4>What Now?</h4>
			<div class="row">
				<div class="text-center" style="padding: 8px;">
					<p class="">
						<a href="<?= $view_url ?>">Click to see</a> your new website!
					</p>

					<p class="">
						<a href="<?= $login_url ?>">Click to Login</a>.
					</p>

				</div>
			</div>
		</div>		
	</div>
<?php $this->load->view('footer.php'); ?>
