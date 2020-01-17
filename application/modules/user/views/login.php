<div class="myContainer">
	<section id="myContent">
		<?php echo form_open('', array(
			'id' => 'login-form',
			'class' => 'form'
		)); ?>
		<br>
		<h1><img src="<?php echo base_url('assets/img/logos/logo2.png');?>" width="60%" height="60%" alt="Logo" /></h1>

		<h2>e-Business Permit and Licensing System</h2><br>
			<div class="form-group">
				<!--?php echo form_label('Username', 'username', array( 'class' => 'form-control' )); ?-->
				<?php echo form_input(array(
					'name' => 'username',
					'id' => 'username',
					'placeholder' => 'Username',
					'class' => 'form-control'

				)); ?>
			</div>
			<div class="form-group">
				<!--?php echo form_label('Password', 'password', array( 'class' => 'form-control' )); ?-->
				<?php echo form_password(array(
					'name' => 'password',
					'id' => 'password',
					'placeholder' => 'Password',
					'class' => 'form-control'

				)); ?>
			</div>

			<div class="form-group">
				<button type="submit" id="login-btn" class="btn btn-outline btn-success btn-lg btn-block">Sign-in &nbsp; <i class="fa fa-play-circle"></i>
				</button>
			</div>
			<div class="messages">
				<img class="loader margin-lr-10" style="display: none" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>">
					<div class="alert alert-danger fade in" style="margin: 20px; display: none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p></p>
					</div>
				</div>
		<?php echo form_close(); ?>
	</section>
</div>

	<?php $this->load->view('user/modal/add_users'); ?>
