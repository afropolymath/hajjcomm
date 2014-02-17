<div class="row">
	<div class="large-6 columns large-centered">
		<div class="login box">
			<div class="title">Login to KronJobs</div>
			<div class="content">
				<?= validation_errors('<div class="alert-box alert radius">', '</div>'); ?>
				<?= $this->message->display('success'); ?>
				<?= form_open('verification/login'); ?>
				<label for="username">Username</label>
				<input type="text" name="username"/>
				<label for="password">Password</label>
				<input type="password" name="password"/>
				<input type="submit" name="login" value="Login" class="tiny button radius" />
				<p>First time applicant? <?= anchor("verification/create_user", "Create Account here"); ?></p>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>