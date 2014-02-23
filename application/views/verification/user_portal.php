<?
$records = (array)$company_records;
$record_id = $records['id'];
$record_company_id = $records['company_id'];
unset($records['id']);
unset($records['company_id']);
?>
<!-- Size Classes: [small medium large xlarge expand] -->
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
	<div class="large-12 columns">
		<div class="form-content">
			<?= validation_errors('<div class="alert-box alert radius">', '</div>'); ?>
			<?= $this->message->display('error'); ?>
			<?= $this->message->display('success'); ?>
			<div class="alert-box instructions">
				Applicant Number: <strong><?= $this->session->userdata('interim_user'); ?></strong>
			</div>
			<?= form_open_multipart('verification/user_portal'); ?>
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
					<td><?= isset($v) ? "<strong>Uploaded</strong>" : "Incomplete"; ?></td>
				</tr>
			<? endforeach; ?>
			</table>
			<input type="submit" name="create" value="Next" class="tiny button radius" />
			<?= form_close(); ?>
		</div>
	</div>
</div>