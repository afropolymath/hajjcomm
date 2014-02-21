<div class="row">
	<div class="large-8 columns large-centered">
		<div class="login box">
			<div class="title">KronJobs New company registration</div>
			<div class="content">
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
					<tr>
						<td>
							<label for="manager_cv">CAC Registration Form</label>
							<input type="file" name="manager_cv"/>
						</td>
						<td>
							Incomplete
						</td>
						<td>
							<label for="manager_cv">Form CO2</label>
							<input type="file" name="manager_cv"/>
						</td>
						<td>
							Incomplete
						</td>
						<td>
							<label for="manager_cv">Form CO7</label>
							<input type="file" name="manager_cv"/>
						</td>
						<td>
							Incomplete
						</td>
				</table>
				
				<label for="manager_cv">Upload CV</label>
				<input type="file" name="manager_cv"/>
				<input type="submit" name="create" value="Next" class="tiny button radius" />
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>