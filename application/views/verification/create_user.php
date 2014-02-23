<!--
PROPOSED Database structure
id int(11)
company_name varchar(225)
address text
email varchar(225)
manager_name varchar(225)
manager_role varchar(30)
manager_cv_upload varchar(225)
cac_registration_document varchar(225)
cac form co2 varchar(225)
cac form co7 varchar(225)
iata license varchar(225)
audited statements of account varchar(225)
tax clearance varchar(225)
police report,affidavit on status of directors varchar(225)
status int(11)
login_key
-->
<div class="form-title">
	<div class="row">
		<div class="large-12 columns">KronJobs New company registration</div>
	</div>
</div>
<div class="row">
	<div class="large-12 columns">
		<div class="form-content">
			<?= validation_errors('<div class="alert-box alert radius">', '</div>'); ?>
			<?= $this->message->display('success'); ?>
			<?= $this->message->display('error'); ?>
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