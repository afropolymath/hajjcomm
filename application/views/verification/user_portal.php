<div class="row">
	<div class="large-8 columns large-centered">
		<div class="login box">
			<div class="title">KronJobs New company registration</div>
			<div class="content">
				<?= validation_errors('<div class="alert-box alert radius">', '</div>'); ?>
				<?= $this->message->display('error'); ?>
				<div class="alert-box instructions">
					Your key has been created. Take note of it.<br/>
					<strong><?= $this->session->userdata('interim_user'); ?></strong>
				</div>
				<?= form_open_multipart('verification/create_user'); ?>
				<label for="company_name">Company Name</label>
				<input type="text" name="company_name" value="<?= set_value('company_name'); ?>"/>
				<label for="address">Company Address</label>
				<input type="text" name="address" value="<?= set_value('address'); ?>"/>
				<div class="alert-box notice">
					Note that this e-mail address will be used for all communication between you and NAHCON henceforth
				</div>
				<label for="email">Company E-mail Address</label>
				<input type="text" name="email" value="<?= set_value('email'); ?>"/>
				<h2 class="sub-section">Account Manager Details</h2>
				<div class="alert-box notice">
					Enter details of the person that will be in contact with NAHCON
				</div>
				<label for="manager_name">Name</label>
				<input type="text" name="manager_name" value="<?= set_value('manager_name'); ?>"/>
				<label for="manager_role">Role in your company</label>
				<input type="text" name="manager_role" value="<?= set_value('manager_role'); ?>"/>
				<label for="manager_cv">Upload CV</label>
				<input type="file" name="manager_cv"/>
				<input type="submit" name="create" value="Next" class="tiny button radius" />
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>