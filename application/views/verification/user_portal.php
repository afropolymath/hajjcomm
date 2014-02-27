<?
// Object Array conversion, record table row
$records = (array)$company_records;
$record_id = $records['id'];
$record_company_id = $records['company_id'];
$payment_status = $records['payment_status'];
unset($records['id']);
unset($records['company_id']);
unset($records['payment_status']);
$complete_status = true;
?>
<div id="document_upload" class="reveal-modal small" data-reveal>
	<?= form_open_multipart("verification/user_portal"); ?>
	<h3>Uploading <span>[[document_name]]</span></h3>
	<p class="lead">
		<input type="file" name="[[document_slug]]"/>
	</p>
	<input type="submit" name="document_upload" value="Upload" class="tiny button radius"/>
	<?= form_close(); ?>
	<a class="close-reveal-modal">&#215;</a>
</div>
<div class="form-title">
	<div class="row">
		<div class="large-12 columns">KronJobs New company registration</div>
	</div>
</div>
<div class="row">
	<div class="large-9 columns">
		<div class="alert-box instructions">
			Applicant Number: <strong><?= $this->session->userdata('interim_user'); ?></strong>
		</div>
	</div>
	<div class="large-3 columns" align="right">
		<?= anchor("verification/logout", "Continue Application Later", array("class" => "tiny button secondary radius")); ?>
	</div>
</div>
<div class="row">
	<div class="large-4 columns">
		<div class="side-box">
			<h1>Your Information</h1>
			<h2><strong><?= $company->company_name; ?></strong></h2>
			<p><?= $company->address; ?></p>
			<? list($status, $message) = $company->status == 0 ? [" err","Application not submitted"]  : [" yay","Application Submitted"]; ?>
			<small><a href="#">Edit Information</a></small>
			<div class="application-status<?= $status; ?>"><?= $message; ?></div>
		</div>
	</div>
	<div class="large-8 columns">
		<div class="form-content">
			<?= validation_errors('<div class="alert-box alert radius">', '</div>'); ?>
			<?= $this->message->display('error'); ?>
			<?= $this->message->display('success'); ?>
			<div class="alert-box notice">
				All the fields are necessary. Please supply all the documents accordingly
			</div>
			<table>
			<? foreach($records as $k=>$v): ?>
				<tr>
					<td>
						<label for="<?= $k; ?>"><?= ucwords( str_replace("_", " ", $k) ); ?></label>
					</td>
					<td><a href="#document_upload" class="dynamic-upload" data-reveal-id="document_upload">Upload Now</a></td>
					<td>
					<?
					if(isset($v)) {
						echo "<strong>Uploaded</strong>";
					} else {
						echo "Incomplete";
						$complete_status = false;
					}
					?></td>
				</tr>
			<? endforeach; ?>
			<tr><td colspan="3">Application is currently <?= $complete_status == true ? "Complete" : "Incomplete"; ?></td></tr>
			</table>
			<? form_open('verification/user_portal'); ?>
			<input type="text" name="processVar" value="<?= sha1($record_id); ?>">
			<input type="submit" name="process_application" value="Submit Application" class="tiny button radius"/>
			<?= form_close(); ?>
		</div>
	</div>
</div>