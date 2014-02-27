<div class="create-applicant box">
	<div class="title">Applicants &raquo; Create Applicants</div>
	<div class="content">
		<?= validation_errors('<div class="alert-box alert radius">', '</div>'); ?>
		<?= $this->message->display('error'); ?>
		<?= form_open_multipart('applicants/create'); ?>
		<div class="row">
			<div class="medium-6 columns">
				<label for="title">Title</label>
			    <select name="title">
			    	<option value="mr">Mr.</option>
			    	<option value="mrs">Mrs.</option>
			    	<option value="miss">Miss.</option>
			    	<option value="dr">Dr.</option>
			    </select>
		    </div>
			<div class="medium-6 columns">
				<label for="firstname">First Name</label>
				<input type="text" name="firstname" value="<?= set_value('firstname'); ?>"/>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 columns">
				<label for="middlename">Middle Name</label>
				<input type="text" name="middlename" value="<?= set_value('middlename'); ?>"/>
			</div>
			<div class="medium-6 columns">
				<label for="lastname">Last Name</label>
				<input type="text" name="lastname" value="<?= set_value('lastname'); ?>"/>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 columns">
				<label for="passport_number">Passport Number</label>
				<input type="text" name="passport_number" value="<?= set_value('passport_number'); ?>"/>
			</div>
			<div class="medium-6 columns">
				<label for="issue_place">Place Issued</label>
				<input type="text" name="issue_place" value="<?= set_value('issue_place'); ?>"/>
			</div>
		</div>
		<div class="row">
			<div class="medium-6 columns">
				<label for="issue_date">Issue Date</label>
				<input type="date" name="issue_date" value="<?= set_value('issue_date'); ?>"/>
			</div>
			<div class="medium-6 columns">
				<label for="expiry_date">Expiry Date</label>
				<input type="date" name="expiry_date" value="<?= set_value('expiry_date'); ?>"/>
			</div>
		</div>
		<div class="row">
			<div class="medium-4 columns">
				<label for="state">State of Origin</label>
			    <select name="state">
			    	<option value="lagos">Lagos</option>
			    	<option value="imo">Imo</option>
			    	<option value="ekiti">Ekiti</option>
			    </select>
			</div>
			<div class="medium-4 columns">
				<label for="phone">Phone Number</label>
				<input type="text" name="phone" value="<?= set_value('phone'); ?>"/>
			</div>
			<div class="medium-4 columns">
				<label for="email">E-mail Address</label>
				<input type="email" name="email" value="<?= set_value('email'); ?>"/>
			</div>
		</div>
		
		<label for="passport_scan">Passport Scan</label>
		<input type="file" name="passport_scan"/>
		<input type="submit" name="create" value="Create Applicant" class="tiny button radius" />
		<?= form_close(); ?>
	</div>
</div>